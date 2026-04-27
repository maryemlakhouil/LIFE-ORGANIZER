import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

const apiBaseUrl = (import.meta.env.VITE_API_URL ?? '').replace(/\/api$/, '');

const resolveApiToken = () =>
    window.localStorage.getItem('access_token') ||
    window.sessionStorage.getItem('access_token') ||
    null;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
    authEndpoint: `${apiBaseUrl}/broadcasting/auth`,
    authorizer: (channel, options) => {
        return {
            authorize: (socketId, callback) => {
                const token = resolveApiToken();

                window.axios
                    .post(
                        options.authEndpoint,
                        {
                            socket_id: socketId,
                            channel_name: channel.name,
                        },
                        {
                            headers: {
                                Accept: 'application/json',
                                ...(token
                                    ? {
                                          Authorization: `Bearer ${token}`,
                                      }
                                    : {}),
                            },
                        },
                    )
                    .then((response) => callback(null, response.data))
                    .catch((error) => callback(error));
            },
        };
    },
});

window.Realtime = {
    listenUserNotifications(userId, handlers = {}) {
        return window.Echo.private(`App.Models.User.${userId}`)
            .notification((notification) => handlers.notification?.(notification))
            .error((error) => handlers.error?.(error));
    },

    listenPrivateConversation(conversationId, handlers = {}) {
        return window.Echo.private(`conversation.${conversationId}`)
            .listen('.message.sent', (event) => handlers.messageSent?.(event))
            .listen('.message.updated', (event) => handlers.messageUpdated?.(event))
            .listen('.message.deleted', (event) => handlers.messageDeleted?.(event))
            .listen('.call.invited', (event) => handlers.callInvited?.(event))
            .listen('.call.accepted', (event) => handlers.callAccepted?.(event))
            .listen('.call.rejected', (event) => handlers.callRejected?.(event))
            .listen('.call.ended', (event) => handlers.callEnded?.(event))
            .listen('.call.signal', (event) => handlers.callSignal?.(event))
            .error((error) => handlers.error?.(error));
    },

    joinConversationPresence(conversationId, handlers = {}) {
        return window.Echo.join(`conversation.${conversationId}`)
            .here((users) => handlers.here?.(users))
            .joining((user) => handlers.joining?.(user))
            .leaving((user) => handlers.leaving?.(user))
            .error((error) => handlers.error?.(error));
    },

    leaveConversation(conversationId) {
        window.Echo.leave(`conversation.${conversationId}`);
    },

    leaveUserNotifications(userId) {
        window.Echo.leave(`App.Models.User.${userId}`);
    },
};
