<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie Nounou - Family Organizer</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,500,0,0" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .material-symbols-rounded {
            font-family: 'Material Symbols Rounded';
            font-weight: normal;
            font-style: normal;
            font-size: 20px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }
        .nounou-theme .bg-white { background-color: #fffaf3 !important; }
        .nounou-theme .bg-blue-600,
        .nounou-theme .bg-blue-500 { background-color: #8f6b43 !important; }
        .nounou-theme .hover\:bg-blue-700:hover { background-color: #795936 !important; }
        .nounou-theme .bg-blue-100,
        .nounou-theme .bg-blue-50,
        .nounou-theme .hover\:bg-blue-50:hover { background-color: #efe2cf !important; }
        .nounou-theme .bg-slate-100,
        .nounou-theme .bg-slate-200,
        .nounou-theme .hover\:bg-slate-100:hover,
        .nounou-theme .hover\:bg-slate-200:hover,
        .nounou-theme .bg-\[\#f3f6fb\],
        .nounou-theme .bg-\[\#f4f7fb\],
        .nounou-theme .bg-\[\#f7f9fc\],
        .nounou-theme .bg-\[\#f8fbff\],
        .nounou-theme .bg-\[\#f9fbff\] { background-color: #f3e8d9 !important; }
        .nounou-theme .text-blue-600,
        .nounou-theme .text-blue-700,
        .nounou-theme .hover\:text-blue-600:hover { color: #8f6b43 !important; }
        .nounou-theme .text-slate-900 { color: #2f281f !important; }
        .nounou-theme .text-slate-800,
        .nounou-theme .text-slate-700,
        .nounou-theme .text-slate-600 { color: #5d4c39 !important; }
        .nounou-theme .text-slate-500 { color: #6d5c49 !important; }
        .nounou-theme .text-slate-400,
        .nounou-theme .text-slate-300 { color: #9a8469 !important; }
        .nounou-theme .border-slate-100,
        .nounou-theme .border-slate-200,
        .nounou-theme .border-slate-300 { border-color: #eadfce !important; }
        .nounou-theme .focus\:border-blue-500:focus { border-color: #8f6b43 !important; }
        .shadow-call { box-shadow: 0 18px 45px rgba(92, 67, 38, 0.18); }
    </style>
</head>
<body class="nounou-theme bg-[#f7f0e7] text-[#2f281f] min-h-screen">

    <div class="flex min-h-screen">
        <aside class="w-[270px] bg-[#fffaf3] border-r border-[#eadfce] hidden lg:flex flex-col">
            <div class="px-7 pt-7 pb-7">
                <a href="{{ route('nounou.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-2xl bg-[#8f6b43] flex items-center justify-center shadow-sm">
                        <span class="material-symbols-rounded text-[#fffaf3]">groups</span>
                    </div>
                    <span class="text-lg font-black tracking-tight">Family Organiser</span>
                </a>
            </div>

            <div class="px-5 mt-8 space-y-3">
                <button id="backDashboardBtn" class="w-full flex items-center justify-center gap-2 rounded-2xl bg-[#efe2cf] px-4 py-3 text-sm font-bold text-[#8f6b43] hover:bg-[#e8d8c2]">
                    <span class="material-symbols-rounded !text-[18px]">arrow_back</span>
                    <span>Retour au dashboard</span>
                </button>
            </div>

            <div class="p-5 border-b border-slate-200 mt-5">
                <div class="relative">
                    <span class="material-symbols-rounded absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 !text-[18px]">search</span>
                    <input
                        type="text"
                        id="searchConversationInput"
                        placeholder="Rechercher..."
                        class="w-full rounded-2xl bg-[#f4f7fb] border border-transparent pl-11 pr-4 py-3 text-sm outline-none focus:border-blue-500"
                    >
                </div>
            </div>

            <div id="conversationsList" class="flex-1 overflow-y-auto">
                <div class="p-6 text-slate-400">Chargement des conversations...</div>
            </div>

            <div class="mt-auto px-7 pb-10 pt-6 border-t border-[#eadfce]">
                <div class="space-y-4 text-sm">
                    <button class="flex items-center gap-3 text-[#5d4c39] hover:text-[#8f6b43]">
                        <span class="material-symbols-rounded !text-base">settings</span>
                        <span>Paramètres</span>
                    </button>
                    <button id="logoutBtn" class="flex items-center gap-3 text-red-500 hover:text-red-600">
                        <span class="material-symbols-rounded !text-base">logout</span>
                        <span>Déconnexion</span>
                    </button>
                </div>
            </div>
        </aside>

        <div id="callPanel" class="hidden fixed inset-0 z-50 bg-[#2f281f]/45 backdrop-blur-sm p-4 md:p-8">
            <div class="max-w-5xl mx-auto h-full flex items-center justify-center">
                <div class="w-full bg-[#fffaf3] border border-[#eadfce] rounded-[32px] shadow-call overflow-hidden">
                    <div class="px-6 py-5 border-b border-[#eadfce] flex items-center justify-between gap-4">
                        <div>
                            <p class="text-xs uppercase tracking-[0.22em] text-[#8f6b43] font-black mb-2">Appel</p>
                            <h3 id="callPanelTitle" class="text-2xl font-black">Conversation en appel</h3>
                            <p id="callPanelStatus" class="text-sm text-[#6d5c49] mt-1">Préparation de l'appel...</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button id="acceptCallBtn" class="hidden px-4 py-2.5 rounded-full bg-green-600 text-white font-bold hover:bg-green-700">Accepter</button>
                            <button id="rejectCallBtn" class="hidden px-4 py-2.5 rounded-full bg-[#f3e8d9] text-[#5d4c39] font-bold hover:bg-[#efe2cf]">Refuser</button>
                            <button id="endCallBtn" class="hidden px-4 py-2.5 rounded-full bg-red-500 text-white font-bold hover:bg-red-600">Terminer</button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 p-6">
                        <div class="rounded-[28px] bg-[#f3e8d9] border border-[#eadfce] p-4">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="font-black text-lg">Vous</h4>
                                <span id="callTypeBadge" class="px-3 py-1 rounded-full bg-[#efe2cf] text-[#8f6b43] text-xs font-black uppercase">Audio</span>
                            </div>
                            <video id="localVideo" autoplay muted playsinline class="w-full aspect-video rounded-[22px] bg-[#d8c7ae] object-cover hidden"></video>
                            <div id="localFallback" class="aspect-video rounded-[22px] bg-[#d8c7ae] flex items-center justify-center text-[#8f6b43]">
                                <span class="material-symbols-rounded !text-[56px]">mic</span>
                            </div>
                        </div>

                        <div class="rounded-[28px] bg-[#f8efe4] border border-[#eadfce] p-4">
                            <div class="flex items-center justify-between mb-3">
                                <h4 id="remoteVideoTitle" class="font-black text-lg">Participant</h4>
                                <span id="callConnectionState" class="text-xs font-bold text-[#9a8469] uppercase">En attente</span>
                            </div>
                            <video id="remoteVideo" autoplay playsinline class="w-full aspect-video rounded-[22px] bg-[#efe2cf] object-cover hidden"></video>
                            <div id="remoteFallback" class="aspect-video rounded-[22px] bg-[#efe2cf] flex items-center justify-center text-[#8f6b43]">
                                <span class="material-symbols-rounded !text-[56px]">call</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 flex flex-col min-w-0">
            <header class="h-16 bg-white border-b border-slate-200 px-5 md:px-6 flex items-center justify-between">
                <div class="flex items-center gap-4 min-w-0">
                    <div id="chatAvatar" class="w-10 h-10 rounded-full bg-[#efe2cf] flex items-center justify-center text-[#8f6b43] font-bold text-base">
                        C
                    </div>

                    <div class="min-w-0">
                        <p id="chatTitle" class="text-lg md:text-xl font-bold truncate">Sélectionnez une conversation</p>
                        <div class="flex items-center gap-2 text-sm text-slate-500">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                            <span id="chatStatus">Aucune conversation ouverte</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button id="videoCallBtn" class="w-10 h-10 rounded-full bg-[#f4f7fb] text-slate-600 hover:bg-slate-200 flex items-center justify-center">
                        <span class="material-symbols-rounded">videocam</span>
                    </button>
                    <button id="audioCallBtn" class="w-10 h-10 rounded-full bg-[#f4f7fb] text-slate-600 hover:bg-slate-200 flex items-center justify-center">
                        <span class="material-symbols-rounded">call</span>
                    </button>
                    <button id="chatInfoBtn" class="w-10 h-10 rounded-full bg-[#f4f7fb] text-slate-600 hover:bg-slate-200 flex items-center justify-center">
                        <span class="material-symbols-rounded">info</span>
                    </button>
                </div>
            </header>

            <div class="px-6 py-3 bg-[#f9fbff] border-b border-slate-100">
                <div class="flex justify-center">
                    <span class="px-5 py-2 rounded-full bg-white text-slate-500 text-xs font-bold tracking-widest uppercase shadow-sm">
                        Aujourd'hui
                    </span>
                </div>
            </div>

            <div id="messagesContainer" class="flex-1 overflow-y-auto px-5 md:px-6 py-6 space-y-5 bg-[#f8fbff]">
                <div class="text-center text-slate-400">
                    Ouvrez une conversation pour voir les messages.
                </div>
            </div>

            <div id="typingIndicatorWrapper" class="hidden px-6 py-2 bg-[#f8fbff]">
                <div class="inline-flex items-center gap-3 bg-white px-4 py-2 rounded-full border border-slate-200 shadow-sm">
                    <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-600">
                        ...
                    </div>
                    <span id="typingIndicatorText" class="text-slate-400">Typing...</span>
                </div>
            </div>

            <div class="bg-white border-t border-slate-200 px-5 md:px-6 py-4">
                <div id="messageBox" class="hidden mb-4 rounded-xl p-4 text-sm"></div>

                <div class="flex items-center gap-3 bg-[#f7f9fc] border border-slate-200 rounded-[22px] px-4 py-2.5">
                    <button id="imageBtn" class="text-slate-500 hover:text-blue-600 flex items-center justify-center">
                        <span class="material-symbols-rounded">image</span>
                    </button>
                    <button id="fileBtn" class="text-slate-500 hover:text-blue-600 flex items-center justify-center">
                        <span class="material-symbols-rounded">attach_file</span>
                    </button>

                    <input
                        type="text" id="messageInput" placeholder="Tapez un message..."
                        class="flex-1 bg-transparent outline-none text-slate-700 text-base"
                    >

                    <button id="emojiBtn" class="text-slate-500 hover:text-blue-600 flex items-center justify-center">
                        <span class="material-symbols-rounded">mood</span>
                    </button>

                    <button id="sendMessageBtn" class="w-11 h-11 rounded-full bg-blue-600 text-white hover:bg-blue-700 flex items-center justify-center">
                        <span class="material-symbols-rounded">send</span>
                    </button>
                </div>

                <input id="imageInput" type="file" accept="image/*" class="hidden">
                <input id="fileInput" type="file" class="hidden">

                <div class="mt-3 flex items-center gap-6 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                    <button id="quickPhotoBtn" class="hover:text-blue-600 flex items-center gap-2">
                        <span class="material-symbols-rounded !text-base">photo_camera</span>
                        <span>envoyer photo</span>
                    </button>
                    <button id="quickReportBtn" class="hover:text-blue-600 flex items-center gap-2">
                        <span class="material-symbols-rounded !text-base">description</span>
                        <span>envoyer rapport</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const searchConversationInput = document.getElementById('searchConversationInput');
        const conversationsList = document.getElementById('conversationsList');
        const messagesContainer = document.getElementById('messagesContainer');

        const chatAvatar = document.getElementById('chatAvatar');
        const chatTitle = document.getElementById('chatTitle');
        const chatStatus = document.getElementById('chatStatus');

        const messageInput = document.getElementById('messageInput');
        const sendMessageBtn = document.getElementById('sendMessageBtn');
        const messageBox = document.getElementById('messageBox');

        const typingIndicatorWrapper = document.getElementById('typingIndicatorWrapper');
        const typingIndicatorText = document.getElementById('typingIndicatorText');

        const imageBtn = document.getElementById('imageBtn');
        const fileBtn = document.getElementById('fileBtn');
        const imageInput = document.getElementById('imageInput');
        const fileInput = document.getElementById('fileInput');
        const emojiBtn = document.getElementById('emojiBtn');
        const audioCallBtn = document.getElementById('audioCallBtn');
        const videoCallBtn = document.getElementById('videoCallBtn');
        const chatInfoBtn = document.getElementById('chatInfoBtn');
        const quickPhotoBtn = document.getElementById('quickPhotoBtn');
        const quickReportBtn = document.getElementById('quickReportBtn');
        const backDashboardBtn = document.getElementById('backDashboardBtn');
        const logoutBtn = document.getElementById('logoutBtn');

        const callPanel = document.getElementById('callPanel');
        const callPanelTitle = document.getElementById('callPanelTitle');
        const callPanelStatus = document.getElementById('callPanelStatus');
        const callTypeBadge = document.getElementById('callTypeBadge');
        const callConnectionState = document.getElementById('callConnectionState');
        const remoteVideoTitle = document.getElementById('remoteVideoTitle');
        const acceptCallBtn = document.getElementById('acceptCallBtn');
        const rejectCallBtn = document.getElementById('rejectCallBtn');
        const endCallBtn = document.getElementById('endCallBtn');
        const localVideo = document.getElementById('localVideo');
        const remoteVideo = document.getElementById('remoteVideo');
        const localFallback = document.getElementById('localFallback');
        const remoteFallback = document.getElementById('remoteFallback');

        let allConversations = [];
        let currentConversationId = null;
        let realtimeConversationId = null;
        let currentMessages = [];
        let currentUser = null;
        let callClient = null;

        document.addEventListener('DOMContentLoaded', function () {
            checkAuth();
            loadUser();
            loadConversations();
        });

        searchConversationInput.addEventListener('input', function () {
            renderConversations();
        });

        sendMessageBtn.addEventListener('click', function () {
            sendMessage();
        });

        messageInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                sendMessage();
            }
        });

        backDashboardBtn.addEventListener('click', function () {
            window.location.href = '/nounou/dashboard';
        });

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('access_token');
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            window.location.href = '/login';
        });

        imageBtn.addEventListener('click', function () {
            imageInput.click();
        });

        fileBtn.addEventListener('click', function () {
            fileInput.click();
        });

        imageInput.addEventListener('change', function () {
            if (imageInput.files.length > 0) {
                sendFileMessage(imageInput.files[0], 'image');
                imageInput.value = '';
            }
        });

        fileInput.addEventListener('change', function () {
            if (fileInput.files.length > 0) {
                sendFileMessage(fileInput.files[0], 'file');
                fileInput.value = '';
            }
        });

        emojiBtn.addEventListener('click', function () {
            showMessage('Sélecteur emoji sera branché ensuite.', 'success');
        });

        audioCallBtn.addEventListener('click', function () {
            startConversationCall('audio');
        });

        videoCallBtn.addEventListener('click', function () {
            startConversationCall('video');
        });

        chatInfoBtn.addEventListener('click', function () {
            showMessage('Informations conversation à brancher ensuite.', 'success');
        });

        quickPhotoBtn.addEventListener('click', function () {
            imageInput.click();
        });

        quickReportBtn.addEventListener('click', function () {
            showMessage('Envoi rapport rapide à brancher ensuite.', 'success');
        });

        acceptCallBtn.addEventListener('click', async function () {
            if (!callClient) return;

            try {
                await callClient.accept();
                setCallState('Appel accepté. Connexion en cours...');
                acceptCallBtn.classList.add('hidden');
                rejectCallBtn.classList.add('hidden');
                endCallBtn.classList.remove('hidden');
            } catch (error) {
                showMessage(error.message || 'Impossible d’accepter l’appel.', 'error');
            }
        });

        rejectCallBtn.addEventListener('click', async function () {
            if (!callClient) return;

            try {
                await callClient.reject();
            } catch (error) {
                showMessage(error.message || 'Impossible de refuser l’appel.', 'error');
            } finally {
                hideCallPanel();
            }
        });

        endCallBtn.addEventListener('click', async function () {
            await endCurrentCall();
        });

        function checkAuth() {
            const token = getToken();
            const user = getStoredUser();

            if (!token || !user) {
                window.location.href = '/login';
                return;
            }

            if (user.role === 'admin') {
                window.location.href = '/admin/dashboard';
                return;
            }

            if (user.role === 'parent') {
                window.location.href = '/parent/dashboard';
                return;
            }

            if (user.role !== 'nounou') {
                window.location.href = '/';
            }
        }

        function loadUser() {
            currentUser = getStoredUser();
        }

        async function loadConversations(autoOpen = true) {
            conversationsList.innerHTML = '<div class="p-5 text-sm text-slate-400">Chargement des conversations...</div>';

            try {
                const response = await fetch('/api/conversations', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    allConversations = result.data.data || result.data || [];
                    renderConversations();

                    if (autoOpen && allConversations.length > 0) {
                        openConversation(allConversations[0].id);
                    }
                } else {
                    conversationsList.innerHTML = '<div class="p-5 text-sm text-red-500">Impossible de charger les conversations.</div>';
                }
            } catch (error) {
                conversationsList.innerHTML = '<div class="p-5 text-sm text-red-500">Erreur serveur.</div>';
            }
        }

        function renderConversations() {
            const search = searchConversationInput.value.trim().toLowerCase();
            conversationsList.innerHTML = '';

            let conversations = allConversations;

            if (search !== '') {
                conversations = allConversations.filter(function (conversation) {
                    return getConversationName(conversation).toLowerCase().includes(search);
                });
            }

            if (conversations.length === 0) {
                conversationsList.innerHTML = '<div class="p-5 text-sm text-slate-400">Aucune conversation trouvée.</div>';
                return;
            }

            conversations.forEach(function (conversation) {
                const isActive = currentConversationId === conversation.id;
                const conversationName = getConversationName(conversation);
                const lastMessage = getConversationLastMessage(conversation);

                const item = document.createElement('button');
                item.className = 'w-full text-left px-4 py-3.5 border-b border-slate-100 hover:bg-[#f8fbff] transition';

                if (isActive) {
                    item.className += ' bg-blue-50';
                }

                item.innerHTML = `
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <div class="w-11 h-11 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-base">
                                ${getInitials(conversationName)}
                            </div>
                            <span class="absolute bottom-0 right-0 w-3.5 h-3.5 rounded-full bg-green-500 border-2 border-white"></span>
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-3">
                                <p class="font-bold text-sm truncate">${conversationName}</p>
                                <span class="text-xs text-slate-400">${getConversationTime(conversation)}</span>
                            </div>
                            <p class="text-sm text-slate-500 truncate">${lastMessage}</p>
                        </div>
                    </div>
                `;

                item.addEventListener('click', function () {
                    openConversation(conversation.id);
                });

                conversationsList.appendChild(item);
            });
        }

        function getToken() {
            return localStorage.getItem('access_token') || localStorage.getItem('token');
        }

        function getAuthHeaders() {
            return {
                Accept: 'application/json',
                Authorization: 'Bearer ' + getToken()
            };
        }

        function getStoredUser() {
            try {
                return JSON.parse(localStorage.getItem('user'));
            } catch (error) {
                return null;
            }
        }

        async function openConversation(conversationId) {
            currentConversationId = conversationId;
            renderConversations();
            updateChatHeader();
            await loadMessages(conversationId);
            subscribeToConversation(conversationId);
            setupCallClient(conversationId);
        }
        // connecter l’utilisateur à une conversation en temps réel 

        function subscribeToConversation(conversationId) {
            if (!window.Realtime || realtimeConversationId === conversationId) {
                return;
            }

            if (realtimeConversationId) {
                window.Realtime.leaveConversation(realtimeConversationId);
            }

            realtimeConversationId = conversationId;

            window.Realtime.listenPrivateConversation(conversationId, {
                messageSent: handleRealtimeMessageSent,
                messageUpdated: handleRealtimeMessageUpdated,
                messageDeleted: handleRealtimeMessageDeleted,
                error: function () {
                    showMessage('Connexion temps réel indisponible pour cette conversation.', 'error');
                },
            });
        }
        // gérer le système d’appel audio/vidéo d’une conversation
        function setupCallClient(conversationId) {
            if (!window.CallClient) {
                return;
            }

            if (callClient && Number(callClient.conversationId) === Number(conversationId)) {
                return;
            }

            if (callClient) {
                callClient.leave();
            }

            callClient = window.CallClient.create(conversationId, {
                localVideo: localVideo,
                remoteVideo: remoteVideo,
                onIncomingCall: function (payload) {
                    showCallPanel(payload.initiator?.name || getCurrentConversationName(), payload.type, 'Appel entrant...');
                    acceptCallBtn.classList.remove('hidden');
                    rejectCallBtn.classList.remove('hidden');
                    endCallBtn.classList.add('hidden');
                },
                onCallStarted: function (payload) {
                    showCallPanel(getCurrentConversationName(), payload.type, 'Invitation envoyée...');
                    endCallBtn.classList.remove('hidden');
                },
                onCallAccepted: function () {
                    setCallState('Appel accepté. Connexion en cours...');
                    acceptCallBtn.classList.add('hidden');
                    rejectCallBtn.classList.add('hidden');
                    endCallBtn.classList.remove('hidden');
                },
                onCallRejected: function () {
                    hideCallPanel();
                    showMessage('L’appel a été refusé.', 'error');
                },
                onCallEnded: function () {
                    hideCallPanel();
                    showMessage('L’appel est terminé.', 'success');
                },
                onConnectionStateChange: function (state) {
                    callConnectionState.textContent = state || 'en attente';
                    if (state === 'connected') {
                        setCallState('Connexion établie.');
                    }
                },
                onLocalStream: function (stream) {
                    updateVideoDisplay(stream, localVideo, localFallback);
                },
                onRemoteStream: function (stream) {
                    updateVideoDisplay(stream, remoteVideo, remoteFallback);
                },
                onError: function (error) {
                    showMessage(error.message || 'Erreur pendant l’appel.', 'error');
                },
            });
        }
        // traiter un nouveau message reçu en temps réel 
        function handleRealtimeMessageSent(message) {
            if (!currentConversationId || Number(message.conversation_id) !== Number(currentConversationId)) {
                return;
            }

            const exists = currentMessages.some(function (item) {
                return Number(item.id) === Number(message.id);
            });

            if (!exists) {
                currentMessages.push(message);
                renderMessages();
            }

            refreshMessageAttachmentsIfNeeded(message);
            loadConversations(false);
        }

        function refreshMessageAttachmentsIfNeeded(message) {
            const content = message.content || '';
            const mayHaveAttachment = content.startsWith('Image :') || content.startsWith('Fichier :');

            if (!mayHaveAttachment) {
                return;
            }

            setTimeout(function () {
                if (currentConversationId && Number(message.conversation_id) === Number(currentConversationId)) {
                    loadMessages(currentConversationId);
                }
            }, 800);
        }

        function handleRealtimeMessageUpdated(message) {
            currentMessages = currentMessages.map(function (item) {
                return Number(item.id) === Number(message.id) ? { ...item, ...message } : item;
            });

            renderMessages();
            loadConversations(false);
        }

        function handleRealtimeMessageDeleted(message) {
            currentMessages = currentMessages.filter(function (item) {
                return Number(item.id) !== Number(message.id);
            });

            renderMessages();
            loadConversations(false);
        }

        function updateChatHeader() {
            const conversation = allConversations.find(function (item) {
                return item.id === currentConversationId;
            });

            if (!conversation) return;

            const conversationName = getConversationName(conversation);
            chatTitle.textContent = conversationName;
            chatStatus.textContent = 'En ligne';
            chatAvatar.textContent = getInitials(conversationName);
            typingIndicatorText.textContent = conversationName + ' est en train d’écrire...';
        }

        async function loadMessages(conversationId) {
            messagesContainer.innerHTML = '<div class="text-center text-slate-400">Chargement des messages...</div>';

            try {
                const response = await fetch('/api/conversations/' + conversationId + '/messages', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    currentMessages = result.data.data || result.data || [];
                    renderMessages();
                } else {
                    messagesContainer.innerHTML = '<div class="text-center text-red-500">Impossible de charger les messages.</div>';
                }
            } catch (error) {
                messagesContainer.innerHTML = '<div class="text-center text-red-500">Erreur serveur.</div>';
            }
        }

        function renderMessages() {
            messagesContainer.innerHTML = '';

            if (currentMessages.length === 0) {
                messagesContainer.innerHTML = '<div class="text-center text-slate-400">Aucun message dans cette conversation.</div>';
                return;
            }

            currentMessages.forEach(function (message) {
                const isMine = currentUser && Number(message.user_id) === Number(currentUser.id);
                const wrapper = document.createElement('div');
                wrapper.className = isMine ? 'flex justify-end' : 'flex justify-start';

                wrapper.innerHTML = `
                    <div class="max-w-[70%]">
                        <div class="${isMine ? 'bg-blue-600 text-white rounded-[22px] rounded-br-md' : 'bg-white text-slate-700 rounded-[22px] rounded-bl-md border border-slate-200'} px-5 py-3 shadow-sm">
                            <p class="text-sm md:text-base leading-7 break-words">${escapeHtml(message.content || '')}</p>
                            ${renderMessageAttachments(message, isMine)}
                        </div>
                        <p class="text-xs text-slate-400 mt-2 ${isMine ? 'text-right' : 'text-left'}">
                            ${formatTime(message.sent_at || message.created_at)}
                        </p>
                    </div>
                `;

                messagesContainer.appendChild(wrapper);
            });

            scrollMessagesToBottom();
        }

        async function sendMessage() {
            const content = messageInput.value.trim();

            if (!currentConversationId) {
                showMessage('Veuillez sélectionner une conversation.', 'error');
                return;
            }

            if (content === '') {
                showMessage('Veuillez écrire un message.', 'error');
                return;
            }

            try {
                const response = await fetch('/api/messages', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        ...getAuthHeaders()
                    },
                    body: JSON.stringify({
                        conversation_id: currentConversationId,
                        content: content
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    messageInput.value = '';
                    hideTypingIndicator();
                    await loadMessages(currentConversationId);
                    await loadConversations(false);
                } else {
                    showMessage(readErrors(result), 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur lors de l’envoi du message.', 'error');
            }
        }

        async function sendFileMessage(file, type) {
            if (!currentConversationId) {
                showMessage('Veuillez sélectionner une conversation.', 'error');
                return;
            }

            const label = type === 'image' ? 'Image' : 'Fichier';
            const content = label + ' : ' + file.name;

            try {
                const messageResponse = await fetch('/api/messages', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        ...getAuthHeaders()
                    },
                    body: JSON.stringify({
                        conversation_id: currentConversationId,
                        content: content
                    })
                });

                const messageResult = await messageResponse.json();

                if (!messageResponse.ok) {
                    showMessage(readErrors(messageResult), 'error');
                    return;
                }

                const message = messageResult.data;
                const formData = new FormData();
                formData.append('message_id', message.id);
                formData.append('file', file);

                const attachmentResponse = await fetch('/api/message-attachments', {
                    method: 'POST',
                    headers: getAuthHeaders(),
                    body: formData
                });

                const attachmentResult = await attachmentResponse.json();

                if (!attachmentResponse.ok) {
                    showMessage(readErrors(attachmentResult), 'error');
                    return;
                }

                showMessage('Pièce jointe envoyée avec succès.', 'success');
                upsertMessageWithAttachment(message, attachmentResult.data);
                await loadConversations(false);
                setTimeout(function () {
                    if (Number(currentConversationId) === Number(message.conversation_id)) {
                        loadMessages(currentConversationId);
                    }
                }, 500);
            } catch (error) {
                showMessage('Erreur serveur lors de l’envoi de la pièce jointe.', 'error');
            }
        }

        async function startConversationCall(type) {
            if (!currentConversationId) {
                showMessage('Veuillez sélectionner une conversation.', 'error');
                return;
            }

            setupCallClient(currentConversationId);

            if (!callClient) {
                showMessage('Module d’appel indisponible.', 'error');
                return;
            }

            try {
                showCallPanel(getCurrentConversationName(), type, 'Préparation de l’appel...');
                acceptCallBtn.classList.add('hidden');
                rejectCallBtn.classList.add('hidden');
                endCallBtn.classList.remove('hidden');
                await callClient.start({
                    type: type,
                    targetUserId: getConversationTargetUserId(currentConversationId),
                });
            } catch (error) {
                setCallState(error.message || 'Impossible de démarrer l’appel.');
                showMessage(error.message || 'Impossible de démarrer l’appel.', 'error');
            }
        }

        async function endCurrentCall() {
            if (!callClient || !callClient.currentCallId) {
                hideCallPanel();
                return;
            }

            try {
                await callClient.end();
                hideCallPanel();
            } catch (error) {
                showMessage(error.message || 'Impossible de terminer l’appel.', 'error');
            }
        }

        function showCallPanel(name, type, status) {
            callPanel.classList.remove('hidden');
            callPanelTitle.textContent = name || 'Conversation';
            remoteVideoTitle.textContent = name || 'Participant';
            callTypeBadge.textContent = type === 'video' ? 'Vidéo' : 'Audio';
            callConnectionState.textContent = 'En attente';
            setCallState(status || 'Préparation de l’appel...');
            updateCallMode(type);
            updateVideoDisplay(null, localVideo, localFallback);
            updateVideoDisplay(null, remoteVideo, remoteFallback);
        }

        function hideCallPanel() {
            callPanel.classList.add('hidden');
            acceptCallBtn.classList.add('hidden');
            rejectCallBtn.classList.add('hidden');
            endCallBtn.classList.add('hidden');
            updateVideoDisplay(null, localVideo, localFallback);
            updateVideoDisplay(null, remoteVideo, remoteFallback);
        }

        function setCallState(status) {
            callPanelStatus.textContent = status;
        }

        function updateCallMode(type) {
            const localIcon = type === 'video' ? 'videocam' : 'mic';
            const remoteIcon = type === 'video' ? 'videocam' : 'call';
            localFallback.innerHTML = '<span class="material-symbols-rounded !text-[56px]">' + localIcon + '</span>';
            remoteFallback.innerHTML = '<span class="material-symbols-rounded !text-[56px]">' + remoteIcon + '</span>';
        }

        function updateVideoDisplay(stream, videoElement, fallbackElement) {
            const hasTracks = stream && stream.getTracks && stream.getTracks().length > 0;

            if (hasTracks) {
                videoElement.classList.remove('hidden');
                fallbackElement.classList.add('hidden');
            } else {
                videoElement.classList.add('hidden');
                fallbackElement.classList.remove('hidden');
            }
        }

        function getCurrentConversationName() {
            const conversation = allConversations.find(function (item) {
                return Number(item.id) === Number(currentConversationId);
            });

            return conversation ? getConversationName(conversation) : 'Conversation';
        }

        function getConversationTargetUserId(conversationId) {
            const conversation = allConversations.find(function (item) {
                return Number(item.id) === Number(conversationId);
            });

            if (!conversation || !conversation.users || !currentUser) {
                return null;
            }

            const otherUser = conversation.users.find(function (user) {
                return Number(user.id) !== Number(currentUser.id);
            });

            return otherUser ? otherUser.id : null;
        }

        function upsertMessageWithAttachment(message, attachment) {
            const messageWithAttachment = {
                ...message,
                attachments: [attachment],
            };

            const index = currentMessages.findIndex(function (item) {
                return Number(item.id) === Number(message.id);
            });

            if (index === -1) {
                currentMessages.push(messageWithAttachment);
            } else {
                currentMessages[index] = {
                    ...currentMessages[index],
                    ...messageWithAttachment,
                    attachments: mergeAttachments(currentMessages[index].attachments || [], attachment),
                };
            }

            renderMessages();
        }

        function mergeAttachments(attachments, attachment) {
            const exists = attachments.some(function (item) {
                return Number(item.id) === Number(attachment.id);
            });

            return exists ? attachments : [...attachments, attachment];
        }

        function getConversationName(conversation) {
            if (conversation.title && conversation.title.trim() !== '') {
                return conversation.title;
            }

            if (conversation.users && currentUser) {
                const otherUsers = conversation.users.filter(function (user) {
                    return Number(user.id) !== Number(currentUser.id);
                });

                if (otherUsers.length > 0) {
                    return otherUsers.map(function (user) {
                        return user.name;
                    }).join(', ');
                }
            }

            return 'Conversation';
        }

        function getConversationLastMessage(conversation) {
            if (conversation.messages && conversation.messages.length > 0) {
                const last = conversation.messages[conversation.messages.length - 1];
                return last.content || 'Pièce jointe';
            }

            return 'Aucun message';
        }

        function getConversationTime(conversation) {
            if (conversation.messages && conversation.messages.length > 0) {
                const last = conversation.messages[conversation.messages.length - 1];
                return formatSmallTime(last.sent_at || last.created_at);
            }

            return '';
        }

        function formatTime(dateString) {
            if (!dateString) return '';

            const date = new Date(dateString);
            return date.toLocaleTimeString('fr-FR', {
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function formatSmallTime(dateString) {
            if (!dateString) return '';

            const date = new Date(dateString);
            const now = new Date();
            const diff = Math.floor((now - date) / (1000 * 60));

            if (diff < 60) return diff + 'm';
            if (diff < 1440) return Math.floor(diff / 60) + 'h';
            return 'Hier';
        }

        function getInitials(name) {
            if (!name) return 'C';

            const parts = name.trim().split(' ');
            let initials = '';

            for (let i = 0; i < parts.length; i++) {
                if (parts[i].length > 0) {
                    initials += parts[i][0];
                }
            }

            return initials.substring(0, 2).toUpperCase();
        }

        function renderMessageAttachments(message, isMine) {
            const attachments = message.attachments || [];

            if (attachments.length === 0) {
                return '';
            }

            return `
                <div class="mt-3 space-y-2">
                    ${attachments.map(function (attachment) {
                        return renderAttachment(attachment, isMine);
                    }).join('')}
                </div>
            `;
        }

        function renderAttachment(attachment, isMine) {
            const url = '/storage/' + attachment.file_path;
            const name = escapeHtml(attachment.file_name || 'Pièce jointe');
            const type = attachment.file_type || '';
            const linkClass = isMine ? 'bg-white/15 text-white' : 'bg-slate-100 text-slate-700';

            if (type.startsWith('image/')) {
                return `
                    <a href="${url}" target="_blank" class="block overflow-hidden rounded-2xl border ${isMine ? 'border-white/20' : 'border-slate-200'}">
                        <img src="${url}" alt="${name}" class="max-h-56 w-full object-cover">
                    </a>
                `;
            }

            return `
                <a href="${url}" target="_blank" class="flex items-center gap-2 rounded-2xl px-3 py-2 text-sm ${linkClass}">
                    <span class="material-symbols-rounded !text-base">attach_file</span>
                    <span class="truncate">${name}</span>
                </a>
            `;
        }

        function escapeHtml(text) {
            return String(text)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        function readErrors(result) {
            if (result.errors) {
                let text = '';
                for (const key in result.errors) {
                    text += result.errors[key][0] + '<br>';
                }
                return text;
            }

            return result.message || 'Une erreur est survenue.';
        }

        function scrollMessagesToBottom() {
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function hideTypingIndicator() {
            typingIndicatorWrapper.classList.add('hidden');
        }

        function showMessage(message, type) {
            if (type === 'success') {
                messageBox.className = 'mb-4 rounded-xl p-4 text-sm bg-green-100 text-green-700';
            } else {
                messageBox.className = 'mb-4 rounded-xl p-4 text-sm bg-red-100 text-red-700';
            }

            messageBox.classList.remove('hidden');
            messageBox.innerHTML = message;

            setTimeout(function () {
                messageBox.classList.add('hidden');
            }, 3000);
        }
    </script>
</body>
</html>
