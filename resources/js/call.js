const apiBaseUrl = import.meta.env.VITE_API_URL ?? 'http://localhost/api';

const defaultIceServers = [
    {
        urls: 'stun:stun.l.google.com:19302',
    },
];

const resolveApiToken = () =>
    window.localStorage.getItem('access_token') ||
    window.sessionStorage.getItem('access_token') ||
    null;

const buildAuthHeaders = () => {
    const token = resolveApiToken();

    return {
        Accept: 'application/json',
        ...(token ? { Authorization: `Bearer ${token}` } : {}),
    };
};

const postToApi = async (endpoint, payload = {}) => {
    const response = await window.axios.post(`${apiBaseUrl}${endpoint}`, payload, {
        headers: buildAuthHeaders(),
    });

    return response.data;
};

const attachStreamToElement = (element, stream) => {
    if (!element) {
        return;
    }

    element.srcObject = stream;

    if (typeof element.play === 'function') {
        element.play().catch(() => {});
    }
};

class ConversationCallClient {
    constructor(conversationId, options = {}) {
        this.conversationId = conversationId;
        this.options = options;
        this.channel = null;
        this.peerConnection = null;
        this.localStream = null;
        this.remoteStream = new MediaStream();
        this.pendingOffer = null;
        this.pendingIceCandidates = [];
        this.currentCallId = null;
        this.currentCallType = null;
        this.currentTargetUserId = null;
    }

    subscribe() {
        if (this.channel) {
            return this;
        }

        this.channel = window.Echo.private(`conversation.${this.conversationId}`)
            .listen('.call.invited', (payload) => {
                this.currentCallId = payload.call_id;
                this.currentCallType = payload.type;
                this.currentTargetUserId = payload.initiator?.id ?? null;
                this.options.onIncomingCall?.(payload);
            })
            .listen('.call.accepted', (payload) => {
                this.options.onCallAccepted?.(payload);
            })
            .listen('.call.rejected', (payload) => {
                this.options.onCallRejected?.(payload);
                this.resetPeerState();
            })
            .listen('.call.ended', (payload) => {
                this.options.onCallEnded?.(payload);
                this.resetPeerState();
            })
            .listen('.call.signal', async (payload) => {
                try {
                    await this.handleSignal(payload);
                } catch (error) {
                    this.options.onError?.(error);
                }
            });

        return this;
    }

    async start({ type = 'audio', targetUserId = null } = {}) {
        this.currentCallType = type;
        this.currentTargetUserId = targetUserId;

        const response = await postToApi(
            `/conversations/${this.conversationId}/calls/start`,
            {
                type,
                target_user_id: targetUserId,
            },
        );

        this.currentCallId = response.data.call_id;

        await this.prepareLocalPeer(type);
        await this.sendOffer();

        this.options.onCallStarted?.(response.data);

        return response.data;
    }

    async accept() {
        if (!this.currentCallId) {
            throw new Error('No incoming call to accept.');
        }

        const response = await postToApi(
            `/conversations/${this.conversationId}/calls/${this.currentCallId}/accept`,
        );

        await this.prepareLocalPeer(this.currentCallType ?? 'audio');

        if (this.pendingOffer) {
            await this.peerConnection.setRemoteDescription(
                new RTCSessionDescription(this.pendingOffer),
            );

            this.pendingOffer = null;

            await this.flushPendingIceCandidates();

            const answer = await this.peerConnection.createAnswer();
            await this.peerConnection.setLocalDescription(answer);

            await this.sendSignal('answer', answer);
        }

        return response.data;
    }

    async reject() {
        if (!this.currentCallId) {
            throw new Error('No incoming call to reject.');
        }

        const response = await postToApi(
            `/conversations/${this.conversationId}/calls/${this.currentCallId}/reject`,
        );

        this.resetPeerState();

        return response.data;
    }

    async end() {
        if (!this.currentCallId) {
            throw new Error('No active call to end.');
        }

        const response = await postToApi(
            `/conversations/${this.conversationId}/calls/${this.currentCallId}/end`,
        );

        this.resetPeerState();

        return response.data;
    }

    async handleSignal(payload) {
        this.currentCallId = payload.call_id;
        this.currentTargetUserId = payload.from_user?.id ?? this.currentTargetUserId;

        if (payload.signal_type === 'offer') {
            this.pendingOffer = payload.signal;
            this.options.onIncomingSignal?.(payload);
            return;
        }

        if (!this.peerConnection) {
            return;
        }

        if (payload.signal_type === 'answer') {
            await this.peerConnection.setRemoteDescription(
                new RTCSessionDescription(payload.signal),
            );

            await this.flushPendingIceCandidates();

            return;
        }

        if (payload.signal_type === 'ice-candidate') {
            const candidate = new RTCIceCandidate(payload.signal);

            if (this.peerConnection.remoteDescription) {
                await this.peerConnection.addIceCandidate(candidate);
                return;
            }

            this.pendingIceCandidates.push(candidate);
        }
    }

    async prepareLocalPeer(type) {
        await this.ensureLocalStream(type);
        this.createPeerConnection();
        this.attachLocalTracks();
        attachStreamToElement(this.options.localVideo, this.localStream);
    }

    async ensureLocalStream(type) {
        if (this.localStream) {
            return this.localStream;
        }

        const wantsVideo = type === 'video';

        this.localStream = await navigator.mediaDevices.getUserMedia({
            audio: true,
            video: wantsVideo,
        });

        this.options.onLocalStream?.(this.localStream);

        return this.localStream;
    }

    createPeerConnection() {
        if (this.peerConnection) {
            return this.peerConnection;
        }

        this.peerConnection = new RTCPeerConnection({
            iceServers: this.options.iceServers ?? defaultIceServers,
        });

        this.peerConnection.ontrack = (event) => {
            event.streams[0].getTracks().forEach((track) => {
                this.remoteStream.addTrack(track);
            });

            attachStreamToElement(this.options.remoteVideo, this.remoteStream);
            this.options.onRemoteStream?.(this.remoteStream);
        };

        this.peerConnection.onicecandidate = async (event) => {
            if (!event.candidate || !this.currentCallId) {
                return;
            }

            try {
                await this.sendSignal('ice-candidate', event.candidate.toJSON());
            } catch (error) {
                this.options.onError?.(error);
            }
        };

        this.peerConnection.onconnectionstatechange = () => {
            this.options.onConnectionStateChange?.(this.peerConnection.connectionState);
        };

        return this.peerConnection;
    }

    attachLocalTracks() {
        if (!this.peerConnection || !this.localStream) {
            return;
        }

        const senders = this.peerConnection.getSenders();

        this.localStream.getTracks().forEach((track) => {
            const alreadyAttached = senders.some((sender) => sender.track?.id === track.id);

            if (!alreadyAttached) {
                this.peerConnection.addTrack(track, this.localStream);
            }
        });
    }

    async sendOffer() {
        const offer = await this.peerConnection.createOffer();
        await this.peerConnection.setLocalDescription(offer);

        await this.sendSignal('offer', offer);
    }

    async sendSignal(signalType, signal) {
        return postToApi(
            `/conversations/${this.conversationId}/calls/${this.currentCallId}/signal`,
            {
                signal_type: signalType,
                signal,
                target_user_id: this.currentTargetUserId,
            },
        );
    }

    async flushPendingIceCandidates() {
        if (!this.peerConnection || this.pendingIceCandidates.length === 0) {
            return;
        }

        for (const candidate of this.pendingIceCandidates) {
            await this.peerConnection.addIceCandidate(candidate);
        }

        this.pendingIceCandidates = [];
    }

    muteAudio(muted = true) {
        this.localStream?.getAudioTracks().forEach((track) => {
            track.enabled = !muted;
        });
    }

    muteVideo(muted = true) {
        this.localStream?.getVideoTracks().forEach((track) => {
            track.enabled = !muted;
        });
    }

    leave() {
        if (this.channel) {
            window.Echo.leave(`conversation.${this.conversationId}`);
            this.channel = null;
        }

        this.resetPeerState();
    }

    resetPeerState() {
        if (this.peerConnection) {
            this.peerConnection.close();
            this.peerConnection = null;
        }

        if (this.localStream) {
            this.localStream.getTracks().forEach((track) => track.stop());
            this.localStream = null;
        }

        this.remoteStream = new MediaStream();
        attachStreamToElement(this.options.remoteVideo, null);
        attachStreamToElement(this.options.localVideo, null);
        this.pendingOffer = null;
        this.pendingIceCandidates = [];
        this.currentCallId = null;
        this.currentCallType = null;
        this.currentTargetUserId = null;
    }
}

window.CallClient = {
    create(conversationId, options = {}) {
        return new ConversationCallClient(conversationId, options).subscribe();
    },
};
