<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie Nounou - Family Organizer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f3f6fb] text-slate-900 min-h-screen">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-[280px] bg-white border-r border-slate-200 hidden lg:flex flex-col">

            <div class="h-16 px-5 flex items-center border-b border-slate-200">
                <a href="{{ route('nounou.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold">Family Organizer</span>
                </a>
            </div>

            <div class="px-5 py-4 border-b border-slate-200">
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">🔎</span>
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

            <div class="p-4 border-t border-slate-200">
                <button id="backDashboardBtn" class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-[#f4f7fb]">
                    <span class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-lg">←</span>
                    <span class="text-sm font-medium">Retour dashboard</span>
                </button>
            </div>
        </aside>

        <!-- MAIN -->
        <div class="flex-1 flex flex-col min-w-0">

            <!-- HEADER -->
            <header class="h-16 bg-white border-b border-slate-200 px-5 md:px-6 flex items-center justify-between">
                <div class="flex items-center gap-4 min-w-0">
                    <div id="chatAvatar" class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 font-bold text-base">
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
                    <button id="videoCallBtn" class="w-10 h-10 rounded-full bg-[#f4f7fb] text-slate-600 hover:bg-slate-200">📹</button>
                    <button id="audioCallBtn" class="w-10 h-10 rounded-full bg-[#f4f7fb] text-slate-600 hover:bg-slate-200">📞</button>
                    <button id="chatInfoBtn" class="w-10 h-10 rounded-full bg-[#f4f7fb] text-slate-600 hover:bg-slate-200">ⓘ</button>
                </div>
            </header>

            <!-- LABEL -->
            <div class="px-6 py-3 bg-[#f9fbff] border-b border-slate-100">
                <div class="flex justify-center">
                    <span class="px-5 py-2 rounded-full bg-white text-slate-500 text-xs font-bold tracking-widest uppercase shadow-sm">
                        Aujourd'hui
                    </span>
                </div>
            </div>

            <!-- MESSAGES -->
            <div id="messagesContainer" class="flex-1 overflow-y-auto px-5 md:px-6 py-6 space-y-5 bg-[#f8fbff]">
                <div class="text-center text-slate-400">
                    Ouvrez une conversation pour voir les messages.
                </div>
            </div>

            <!-- TYPING -->
            <div id="typingIndicatorWrapper" class="hidden px-6 py-2 bg-[#f8fbff]">
                <div class="inline-flex items-center gap-3 bg-white px-4 py-2 rounded-full border border-slate-200 shadow-sm">
                    <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-600">
                        ...
                    </div>
                    <span id="typingIndicatorText" class="text-slate-400">Typing...</span>
                </div>
            </div>

            <!-- INPUT -->
            <div class="bg-white border-t border-slate-200 px-5 md:px-6 py-4">
                <div id="messageBox" class="hidden mb-4 rounded-xl p-4 text-sm"></div>

                <div class="flex items-center gap-3 bg-[#f7f9fc] border border-slate-200 rounded-[22px] px-4 py-2.5">
                    <button id="imageBtn" class="text-xl text-slate-500 hover:text-blue-600">🖼</button>
                    <button id="fileBtn" class="text-xl text-slate-500 hover:text-blue-600">📎</button>

                    <input
                        type="text"
                        id="messageInput"
                        placeholder="Tapez un message..."
                        class="flex-1 bg-transparent outline-none text-slate-700 text-base"
                    >

                    <button id="emojiBtn" class="text-xl text-slate-500 hover:text-blue-600">☺</button>

                    <button id="sendMessageBtn" class="w-11 h-11 rounded-full bg-blue-600 text-white text-xl hover:bg-blue-700 flex items-center justify-center">
                        ➤
                    </button>
                </div>

                <input id="imageInput" type="file" accept="image/*" class="hidden">
                <input id="fileInput" type="file" class="hidden">

                <div class="mt-3 flex items-center gap-6 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                    <button id="quickPhotoBtn" class="hover:text-blue-600">📷 envoyer photo</button>
                    <button id="quickReportBtn" class="hover:text-blue-600">📝 envoyer rapport</button>
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

        let allConversations = [];
        let currentConversationId = null;
        let realtimeConversationId = null;
        let currentMessages = [];
        let currentUser = null;

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
            showMessage('Appel audio sera branché après le chat temps réel.', 'success');
        });

        videoCallBtn.addEventListener('click', function () {
            showMessage('Appel vidéo sera branché après le chat temps réel.', 'success');
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
                    const name = getConversationName(conversation).toLowerCase();
                    return name.includes(search);
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
            return localStorage.getItem('access_token');
        }

        function getAuthHeaders() {
            return {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + getToken()
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
        }

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
                const isMine = currentUser && message.user_id === currentUser.id;

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
                    return user.id !== currentUser.id;
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
                    <span>📎</span>
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
            messageBox.classList.remove('hidden');

            if (type === 'success') {
                messageBox.className = 'mb-4 rounded-xl p-4 text-sm bg-green-100 text-green-700';
            } else {
                messageBox.className = 'mb-4 rounded-xl p-4 text-sm bg-red-100 text-red-700';
            }

            messageBox.innerHTML = message;

            setTimeout(function () {
                messageBox.classList.add('hidden');
            }, 3000);
        }
    </script>
</body>
</html>
