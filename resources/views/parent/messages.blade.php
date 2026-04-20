<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie Parent - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f3f6fb] text-slate-900 min-h-screen">

    <div class="flex min-h-screen">

        <!-- LEFT SIDEBAR -->
        <aside class="w-[300px] bg-white border-r border-slate-200 hidden lg:flex flex-col">

            <!-- LOGO -->
            <div class="px-6 pt-6 pb-5 border-b border-slate-100">
                <a href="{{ route('parent.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <span class="text-lg font-bold">Family Organizer</span>
                </a>

                <nav class="grid grid-cols-3 gap-2 mt-5 text-xs font-semibold">
                    <a href="{{ route('parent.dashboard') }}" class="rounded-full bg-slate-100 px-3 py-2 text-center text-slate-600 hover:bg-blue-50 hover:text-blue-600">Dashboard</a>
                    <a href="{{ route('parent.tasks') }}" class="rounded-full bg-slate-100 px-3 py-2 text-center text-slate-600 hover:bg-blue-50 hover:text-blue-600">Tâches</a>
                    <a href="{{ route('parent.messages') }}" class="rounded-full bg-blue-600 px-3 py-2 text-center text-white">Messages</a>
                </nav>
            </div>

            <!-- SEARCH -->
            <div class="p-5 border-b border-slate-200">
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/>
                        <path stroke-linecap="round" d="m21 21-4.35-4.35"/>
                    </svg>
                    <input
                        type="text"
                        id="searchConversationInput"
                        placeholder="Rechercher une conversation..."
                        class="w-full rounded-2xl bg-[#f4f7fb] border border-transparent pl-11 pr-4 py-3 text-sm outline-none focus:border-blue-500"
                    >
                </div>
            </div>

            <!-- CONVERSATIONS -->
            <div id="conversationsList" class="flex-1 overflow-y-auto">
                <div class="p-6 text-slate-400">Chargement des conversations...</div>
            </div>

            <!-- FOOTER -->
            <div class="p-5 border-t border-slate-200">
                <button id="accountSettingsBtn" class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-[#f4f7fb]">
                    <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="3"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 0-.4 1.1V21a2 2 0 1 1-4 0v-.09A1.7 1.7 0 0 0 8.6 19.4a1.7 1.7 0 0 0-1.88.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-.6-1 1.7 1.7 0 0 0-1.1-.4H3a2 2 0 1 1 0-4h.09A1.7 1.7 0 0 0 4.6 8.6a1.7 1.7 0 0 0-.34-1.88l-.06-.06A2 2 0 1 1 7.03 3.83l.06.06A1.7 1.7 0 0 0 9 4.6a1.7 1.7 0 0 0 1-.6 1.7 1.7 0 0 0 .4-1.1V3a2 2 0 1 1 4 0v.09A1.7 1.7 0 0 0 15 4.6a1.7 1.7 0 0 0 1.88-.34l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.7 1.7 0 0 0 19.4 9c.22.35.57.58 1 .6h.6a2 2 0 1 1 0 4h-.09A1.7 1.7 0 0 0 19.4 15Z"/>
                        </svg>
                    </span>
                    <span class="text-sm font-medium">Paramètres</span>
                </button>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col min-w-0">

            <!-- CHAT HEADER -->
            <header class="h-16 bg-white border-b border-slate-200 px-5 flex items-center justify-between">
                <div class="flex items-center gap-4 min-w-0">
                    <div id="chatAvatar" class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 font-bold text-sm">
                        M
                    </div>

                    <div class="min-w-0">
                        <p id="chatTitle" class="text-lg font-bold truncate">Sélectionnez une conversation</p>
                        <div class="flex items-center gap-2 text-xs text-slate-500">
                            <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
                            <span id="chatStatus">Aucun chat ouvert</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button id="videoCallBtn" class="w-10 h-10 rounded-full bg-[#f4f7fb] text-slate-600 hover:bg-slate-200">📹</button>
                    <button id="audioCallBtn" class="w-10 h-10 rounded-full bg-[#f4f7fb] text-slate-600 hover:bg-slate-200">📞</button>
                    <button id="chatInfoBtn" class="w-10 h-10 rounded-full bg-[#f4f7fb] text-slate-600 hover:bg-slate-200">ⓘ</button>
                </div>
            </header>

            <!-- DAY LABEL -->
            <div class="px-5 py-3 bg-[#f9fbff] border-b border-slate-100">
                <div class="flex justify-center">
                    <span class="px-5 py-2 rounded-full bg-white text-slate-500 text-xs font-bold tracking-widest uppercase shadow-sm">
                        Today
                    </span>
                </div>
            </div>

            <!-- MESSAGES -->
            <div id="messagesContainer" class="flex-1 overflow-y-auto px-5 py-6 space-y-5 bg-[#f8fbff]">
                <div class="text-center text-slate-400">
                    Ouvrez une conversation pour voir les messages.
                </div>
            </div>

            <!-- TYPING INDICATOR -->
            <div id="typingIndicatorWrapper" class="hidden px-6 py-2 bg-[#f8fbff]">
                <div class="inline-flex items-center gap-3 bg-white px-4 py-2 rounded-full border border-slate-200 shadow-sm">
                    <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-600">
                        ...
                    </div>
                    <span id="typingIndicatorText" class="text-slate-400">Typing...</span>
                </div>
            </div>

            <!-- INPUT BAR -->
            <div class="bg-white border-t border-slate-200 px-5 py-4">
                <div id="messageBox" class="hidden mb-4 rounded-xl p-4 text-sm"></div>

                <div class="flex items-center gap-3 bg-[#f7f9fc] border border-slate-200 rounded-[22px] px-4 py-2.5">
                    <button id="imageBtn" class="text-xl text-slate-500 hover:text-blue-600">🖼</button>
                    <button id="fileBtn" class="text-xl text-slate-500 hover:text-blue-600">📎</button>

                    <input
                        type="text"
                        id="messageInput"
                        placeholder="Tapez un message..."
                        class="flex-1 bg-transparent outline-none text-base text-slate-700"
                    >

                    <button id="emojiBtn" class="text-xl text-slate-500 hover:text-blue-600">☺</button>

                    <button id="sendMessageBtn" class="w-11 h-11 rounded-full bg-blue-600 text-white text-xl hover:bg-blue-700 flex items-center justify-center">
                        ➤
                    </button>
                </div>

                <div class="mt-3 flex items-center gap-6 text-xs font-bold uppercase tracking-wider text-slate-400">
                    <button id="setReminderBtn" class="hover:text-blue-600">⏰ Set reminder</button>
                    <button id="shareScheduleBtn" class="hover:text-blue-600">🗓 Share schedule</button>
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
        const emojiBtn = document.getElementById('emojiBtn');
        const audioCallBtn = document.getElementById('audioCallBtn');
        const videoCallBtn = document.getElementById('videoCallBtn');
        const chatInfoBtn = document.getElementById('chatInfoBtn');
        const setReminderBtn = document.getElementById('setReminderBtn');
        const shareScheduleBtn = document.getElementById('shareScheduleBtn');
        const accountSettingsBtn = document.getElementById('accountSettingsBtn');

        let allConversations = [];
        let currentConversationId = null;
        let currentMessages = [];
        let currentUser = null;

        document.addEventListener('DOMContentLoaded', function () {
            guardParentAccess();
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

        imageBtn.addEventListener('click', function () {
            showMessage('Upload image sera branché ensuite.', 'success');
        });

        fileBtn.addEventListener('click', function () {
            showMessage('Upload fichier sera branché ensuite.', 'success');
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
            showMessage('Panneau info conversation sera branché ensuite.', 'success');
        });

        setReminderBtn.addEventListener('click', function () {
            showMessage('Rappel message sera branché ensuite.', 'success');
        });

        shareScheduleBtn.addEventListener('click', function () {
            showMessage('Partage de planning sera branché ensuite.', 'success');
        });

        accountSettingsBtn.addEventListener('click', function () {
            showMessage('Page paramètres compte à brancher ensuite.', 'success');
        });

        function getToken() {
            return localStorage.getItem('access_token');
        }

        function getAuthHeaders() {
            return {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + getToken()
            };
        }

        function guardParentAccess() {
            const token = getToken();
            const user = JSON.parse(localStorage.getItem('user'));

            if (!token || !user) {
                window.location.href = '/login';
                return;
            }

            if (user.role === 'admin') {
                window.location.href = '/admin/dashboard';
                return;
            }

            if (user.role !== 'parent') {
                window.location.href = '/';
            }
        }

        function loadUser() {
            currentUser = JSON.parse(localStorage.getItem('user'));
        }

        async function loadConversations() {
            conversationsList.innerHTML = '<div class="p-6 text-slate-400">Chargement des conversations...</div>';

            try {
                const response = await fetch('/api/conversations', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    allConversations = result.data.data || result.data || [];
                    renderConversations();

                    if (allConversations.length > 0) {
                        openConversation(allConversations[0].id);
                    }
                } else if (response.status === 401 || response.status === 403) {
                    window.location.href = '/login';
                } else {
                    conversationsList.innerHTML = '<div class="p-6 text-red-500">Impossible de charger les conversations.</div>';
                }
            } catch (error) {
                conversationsList.innerHTML = '<div class="p-6 text-red-500">Erreur serveur.</div>';
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
                conversationsList.innerHTML = '<div class="p-6 text-slate-400">Aucune conversation trouvée.</div>';
                return;
            }

            conversations.forEach(function (conversation) {
                const isActive = currentConversationId === conversation.id;
                const conversationName = getConversationName(conversation);
                const lastMessage = getConversationLastMessage(conversation);

                const item = document.createElement('button');
                item.className = 'w-full text-left px-4 py-3 border-b border-slate-100 hover:bg-[#f8fbff] transition';

                if (isActive) {
                    item.className += ' bg-blue-50';
                }

                item.innerHTML = `
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <div class="w-11 h-11 rounded-full bg-blue-100 flex items-center justify-center text-sm font-bold text-blue-700">
                                ${getInitials(conversationName)}
                            </div>
                            <span class="absolute bottom-0 right-0 w-3 h-3 rounded-full bg-green-500 border-2 border-white"></span>
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-3">
                                <p class="truncate text-sm font-bold">${conversationName}</p>
                                <span class="text-xs text-slate-400">${getConversationTime(conversation)}</span>
                            </div>
                            <p class="truncate text-xs text-slate-500">${lastMessage}</p>
                        </div>
                    </div>
                `;

                item.addEventListener('click', function () {
                    openConversation(conversation.id);
                });

                conversationsList.appendChild(item);
            });
        }

        async function openConversation(conversationId) {
            currentConversationId = conversationId;
            renderConversations();
            updateChatHeader();
            await loadMessages(conversationId);
        }

        function updateChatHeader() {
            const conversation = allConversations.find(function (item) {
                return item.id === currentConversationId;
            });

            if (!conversation) return;

            const conversationName = getConversationName(conversation);

            chatTitle.textContent = conversationName;
            chatStatus.textContent = 'ONLINE';
            chatAvatar.textContent = getInitials(conversationName);

            typingIndicatorText.textContent = conversationName + ' is typing...';
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

                let content = message.content || '';

                wrapper.innerHTML = `
                    <div class="max-w-[70%]">
                        <div class="${isMine ? 'bg-blue-600 text-white rounded-[22px] rounded-br-md' : 'bg-white text-slate-700 rounded-[22px] rounded-bl-md border border-slate-200'} px-5 py-3 shadow-sm">
                            <p class="break-words text-sm leading-7">${escapeHtml(content)}</p>
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
                        ...getAuthHeaders(),
                        'Content-Type': 'application/json',
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
                    await loadConversations();
                } else {
                    showMessage(readErrors(result), 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur lors de l’envoi du message.', 'error');
            }
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

            if (diff < 60) {
                return diff + 'm';
            }

            if (diff < 1440) {
                return Math.floor(diff / 60) + 'h';
            }

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

        function escapeHtml(text) {
            return text
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
                messageBox.className = 'hidden mb-4 rounded-xl p-4 text-sm bg-green-100 text-green-700';
            } else {
                messageBox.className = 'hidden mb-4 rounded-xl p-4 text-sm bg-red-100 text-red-700';
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
