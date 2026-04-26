<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Nounou - Family Organizer</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,500,0,0" rel="stylesheet">
    @vite(['resources/css/app.css'])
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
        .nanny-dashboard-theme .bg-white { background-color: #fffaf3 !important; }
        .nanny-dashboard-theme .bg-blue-600,
        .nanny-dashboard-theme .bg-blue-500 { background-color: #8f6b43 !important; }
        .nanny-dashboard-theme .bg-blue-700,
        .nanny-dashboard-theme .hover\:bg-blue-700:hover { background-color: #795936 !important; }
        .nanny-dashboard-theme .bg-blue-100,
        .nanny-dashboard-theme .bg-blue-50,
        .nanny-dashboard-theme .hover\:bg-blue-50:hover { background-color: #efe2cf !important; }
        .nanny-dashboard-theme .bg-green-100 { background-color: #e6f1ea !important; }
        .nanny-dashboard-theme .bg-orange-100 { background-color: #fcebdd !important; }
        .nanny-dashboard-theme .bg-purple-100 { background-color: #efe6f6 !important; }
        .nanny-dashboard-theme .bg-\[\#eef3fb\] { background-color: #efe2cf !important; }
        .nanny-dashboard-theme .bg-\[\#f3f6fb\] { background-color: #f3e8d9 !important; }
        .nanny-dashboard-theme .text-blue-600,
        .nanny-dashboard-theme .text-blue-700,
        .nanny-dashboard-theme .hover\:text-blue-600:hover { color: #8f6b43 !important; }
        .nanny-dashboard-theme .text-green-600 { color: #5b8b68 !important; }
        .nanny-dashboard-theme .text-orange-500 { color: #c4814b !important; }
        .nanny-dashboard-theme .text-purple-600 { color: #8d6ab0 !important; }
        .nanny-dashboard-theme .text-slate-900 { color: #2f281f !important; }
        .nanny-dashboard-theme .text-slate-700 { color: #5d4c39 !important; }
        .nanny-dashboard-theme .text-slate-600 { color: #6d5c49 !important; }
        .nanny-dashboard-theme .text-slate-500,
        .nanny-dashboard-theme .text-slate-400 { color: #9a8469 !important; }
        .nanny-dashboard-theme .border-slate-200,
        .nanny-dashboard-theme .divide-slate-200 > :not([hidden]) ~ :not([hidden]) { border-color: #eadfce !important; }
        .nanny-dashboard-theme .border-slate-300 { border-color: #eadfce !important; }
        .nanny-dashboard-theme .shadow-blue-600\/20 { box-shadow: 0 12px 24px rgba(143, 107, 67, 0.18) !important; }
    </style>
</head>

<body class="nanny-dashboard-theme bg-[#f7f0e7] text-slate-900 min-h-screen">

    <div class="flex min-h-screen">
        <aside class="w-[270px] bg-[#fffaf3] border-r border-[#eadfce] hidden lg:flex flex-col">
            <div class="px-7 pt-7 pb-7">
                <div class="flex items-center gap-4">
                    <div class="w-9 h-9 rounded-2xl bg-[#8f6b43] flex items-center justify-center shadow-sm">
                        <span class="material-symbols-rounded text-white">groups</span>
                    </div>
                    <div>
                        <h1 class="text-lg font-black leading-tight tracking-tight">Family Organiser</h1>
                    </div>
                </div>
            </div>

            <div class="px-5 pt-12">
                <div class="flex items-center gap-4 mb-10">
                    <div id="nannyAvatarTop" class="w-12 h-12 rounded-2xl bg-[#efe2cf] flex items-center justify-center text-base font-black text-[#8f6b43]">
                        N
                    </div>
                    <div>
                        <p id="nannyNameTop" class="text-xl font-black leading-none mb-1">Marie</p>
                        <p class="text-[#9a8469] text-sm font-semibold">Espace nounou</p>
                    </div>
                </div>

                <nav class="space-y-5">
                    <a href="{{ route('nounou.dashboard') }}" class="flex items-center gap-4 bg-[#efe2cf] text-[#8f6b43] px-6 py-3.5 rounded-[26px] text-lg font-black shadow-sm">
                        <span class="material-symbols-rounded">dashboard</span>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('nounou.planning') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">calendar_month</span>
                        <span>Planning</span>
                    </a>
                    <a href="{{ route('nounou.messages') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">chat_bubble</span>
                        <span>Messagerie</span>
                    </a>
                    <a href="{{ route('nounou.profile') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">badge</span>
                        <span>Mon profil</span>
                    </a>
                </nav>
            </div>

            <div class="mt-auto px-7 pb-10">
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

        <div class="flex-1 min-w-0">
        <header class="bg-[#fffaf3]/90 backdrop-blur px-6 md:px-8 py-5 flex items-center justify-between border-b border-[#eadfce]">
            <div>
                <h2 class="text-2xl font-black mb-1">Dashboard nounou</h2>
                <p class="text-[#9a8469] text-base font-semibold">Retrouvez vos tâches, messages et rappels de la journée.</p>
            </div>

            <div class="flex items-center gap-4">
                <button class="w-10 h-10 rounded-2xl flex items-center justify-center text-[#6d5c49] hover:bg-[#efe2cf]">
                    <span class="material-symbols-rounded">notifications</span>
                </button>
            </div>
        </header>

        <main class="p-5 md:p-8">
            <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

            <!-- TITLE -->
            <section class="mb-6">
                <h1 id="helloTitle" class="text-2xl md:text-3xl font-black mb-2">Bonjour, Marie !</h1>
                <p class="text-sm text-slate-500 font-semibold">
                    C'est une belle journée pour s'occuper des enfants. Voici votre programme.
                </p>
            </section>

            <!-- CARDS -->
            <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-[18px] border border-slate-200 p-4 shadow-sm">
                    <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mb-3">
                        <span class="material-symbols-rounded !text-[18px]">pending_actions</span>
                    </div>
                    <p class="text-xs font-bold uppercase tracking-wide mb-2 text-slate-500">En attente</p>
                    <p id="pendingCount" class="text-2xl font-black text-slate-700">0 tâche</p>
                </div>

                <div class="bg-white rounded-[18px] border border-slate-200 p-4 shadow-sm">
                    <div class="w-9 h-9 rounded-full bg-green-100 text-green-600 flex items-center justify-center mb-3">
                        <span class="material-symbols-rounded !text-[18px]">task_alt</span>
                    </div>
                    <p class="text-xs font-bold uppercase tracking-wide mb-2 text-slate-500">Terminé</p>
                    <p id="completedCount" class="text-2xl font-black text-slate-700">0 tâche</p>
                </div>

                <div class="bg-white rounded-[18px] border border-slate-200 p-4 shadow-sm">
                    <div class="w-9 h-9 rounded-full bg-orange-100 text-orange-500 flex items-center justify-center mb-3">
                        <span class="material-symbols-rounded !text-[18px]">priority_high</span>
                    </div>
                    <p class="text-xs font-bold uppercase tracking-wide mb-2 text-slate-500">Priorité haute</p>
                    <p id="highPriorityCount" class="text-2xl font-black text-slate-700">0 urgente</p>
                </div>

                <div class="bg-white rounded-[18px] border border-slate-200 p-4 shadow-sm">
                    <div class="w-9 h-9 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center mb-3">
                        <span class="material-symbols-rounded !text-[18px]">chat</span>
                    </div>
                    <p class="text-xs font-bold uppercase tracking-wide mb-2 text-slate-500">Messages</p>
                    <p id="messagesCount" class="text-2xl font-black text-slate-700">0 nouveau</p>
                </div>
            </section>

            <!-- CONTENT -->
            <section class="grid grid-cols-1 xl:grid-cols-3 gap-5">

                <!-- LEFT -->
                <div class="xl:col-span-2 space-y-5">

                    <!-- TASKS TODAY -->
                    <div class="bg-white rounded-[20px] border border-slate-200 shadow-sm overflow-hidden">
                        <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-rounded text-blue-600">checklist</span>
                                <h2 class="text-lg font-black">Mes tâches d'aujourd'hui</h2>
                            </div>
                            <a href="{{ route('nounou.planning') }}" class="text-blue-600 text-sm font-semibold">Voir tout</a>
                        </div>

                        <div id="todayTasksList" class="divide-y divide-slate-200">
                            <div class="px-5 py-6 text-slate-400 text-sm">Chargement...</div>
                        </div>
                    </div>

                    <!-- RECENT MESSAGES -->
                    <div class="bg-white rounded-[20px] border border-slate-200 shadow-sm overflow-hidden">
                        <div class="px-5 py-4 border-b border-slate-200 flex items-center gap-3">
                            <span class="material-symbols-rounded text-blue-600">forum</span>
                            <h2 class="text-lg font-black">Messages récents</h2>
                        </div>

                        <div id="recentMessagesList" class="divide-y divide-slate-200">
                            <div class="px-5 py-6 text-slate-400 text-sm">Chargement...</div>
                        </div>

                        <div class="p-4">
                            <a href="{{ route('nounou.messages') }}" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white rounded-2xl py-2.5 text-sm font-semibold">
                                Ouvrir la messagerie
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-[20px] border border-slate-200 shadow-sm overflow-hidden">
                        <div class="px-5 py-4 border-b border-slate-200 flex items-center gap-3">
                            <span class="material-symbols-rounded text-blue-600">event_available</span>
                            <h2 class="text-lg font-black">Demandes de réservation</h2>
                        </div>

                        <div id="reservationRequestsList" class="divide-y divide-slate-200">
                            <div class="px-5 py-6 text-slate-400 text-sm">Chargement...</div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT -->
                <div class="space-y-5">

                    <!-- WEEK PREVIEW -->
                    <div class="bg-white rounded-[20px] border border-slate-200 shadow-sm overflow-hidden">
                        <div class="px-5 py-4 border-b border-slate-200 flex items-center gap-3">
                            <span class="material-symbols-rounded text-blue-600">date_range</span>
                            <h2 class="text-lg font-black">Aperçu de la semaine</h2>
                        </div>

                        <div id="weekPreviewList" class="p-4 space-y-3">
                            <div class="text-slate-400 text-sm">Chargement...</div>
                        </div>

                        <div class="mx-4 mb-4 rounded-[18px] border border-dashed border-blue-300 bg-blue-50 p-3.5">
                            <p class="text-blue-600 text-xs font-bold uppercase tracking-widest mb-2">Note de la semaine</p>
                            <p id="weekNoteText" class="text-sm text-slate-600 leading-6">
                                Pensez à vérifier les besoins particuliers des enfants avant chaque sortie.
                            </p>
                        </div>
                    </div>

                    <!-- QUICK ACTIONS -->
                    <div class="bg-blue-600 rounded-[20px] shadow-xl shadow-blue-600/20 p-4 text-white">
                        <h2 class="text-lg font-black mb-4">Actions rapides</h2>

                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('nounou.profile') }}" class="bg-white/10 hover:bg-white/20 rounded-[16px] py-4 flex flex-col items-center justify-center gap-2">
                                <span class="material-symbols-rounded">person</span>
                                <span class="text-sm font-semibold">Profil</span>
                            </a>

                            <button id="quickPhotoBtn" class="bg-white/10 hover:bg-white/20 rounded-[16px] py-4 flex flex-col items-center justify-center gap-2">
                                <span class="material-symbols-rounded">photo_camera</span>
                                <span class="text-sm font-semibold">Photo</span>
                            </button>

                            <button id="quickUrgencyBtn" class="bg-white/10 hover:bg-white/20 rounded-[16px] py-4 flex flex-col items-center justify-center gap-2">
                                <span class="material-symbols-rounded">warning</span>
                                <span class="text-sm font-semibold">Urgence</span>
                            </button>

                            <button id="quickMealBtn" class="bg-white/10 hover:bg-white/20 rounded-[16px] py-4 flex flex-col items-center justify-center gap-2">
                                <span class="material-symbols-rounded">restaurant</span>
                                <span class="text-sm font-semibold">Repas</span>
                            </button>

                            <button id="quickHistoryBtn" class="bg-white/10 hover:bg-white/20 rounded-[16px] py-4 flex flex-col items-center justify-center gap-2">
                                <span class="material-symbols-rounded">history</span>
                                <span class="text-sm font-semibold">Historique</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    </div>

    <script>
        const helloTitle = document.getElementById('helloTitle');
        const nannyNameTop = document.getElementById('nannyNameTop');
        const nannyAvatarTop = document.getElementById('nannyAvatarTop');

        const pendingCount = document.getElementById('pendingCount');
        const completedCount = document.getElementById('completedCount');
        const highPriorityCount = document.getElementById('highPriorityCount');
        const messagesCount = document.getElementById('messagesCount');

        const todayTasksList = document.getElementById('todayTasksList');
        const recentMessagesList = document.getElementById('recentMessagesList');
        const reservationRequestsList = document.getElementById('reservationRequestsList');
        const weekPreviewList = document.getElementById('weekPreviewList');
        const weekNoteText = document.getElementById('weekNoteText');
        const messageBox = document.getElementById('messageBox');
        const logoutBtn = document.getElementById('logoutBtn');

        const quickPhotoBtn = document.getElementById('quickPhotoBtn');
        const quickUrgencyBtn = document.getElementById('quickUrgencyBtn');
        const quickMealBtn = document.getElementById('quickMealBtn');
        const quickHistoryBtn = document.getElementById('quickHistoryBtn');

        let currentUser = null;
        let allTasks = [];
        let allNotifications = [];

        document.addEventListener('DOMContentLoaded', function () {
            checkAuth();
            loadUserInfo();
            loadTasks();
            loadNotifications();
        });

        quickPhotoBtn.addEventListener('click', function () {
            showMessage('Ajout photo sera branché ensuite.', 'success');
        });

        quickUrgencyBtn.addEventListener('click', function () {
            showMessage('Signalement urgence sera branché ensuite.', 'success');
        });

        quickMealBtn.addEventListener('click', function () {
            showMessage('Carnet repas sera branché ensuite.', 'success');
        });

        quickHistoryBtn.addEventListener('click', function () {
            showMessage('Historique détaillé sera branché ensuite.', 'success');
        });

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('access_token');
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            window.location.href = '/login';
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

        function loadUserInfo() {
            currentUser = getStoredUser();

            if (currentUser) {
                helloTitle.textContent = 'Bonjour, ' + firstName(currentUser.name) + ' !';
                nannyNameTop.textContent = currentUser.name + ' (Nounou)';
                nannyAvatarTop.textContent = getInitials(currentUser.name);
            }
        }

        async function loadTasks() {
            try {
                const response = await fetch('/api/tasks', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    allTasks = result.data.data || [];
                    renderTaskStats();
                    renderTodayTasks();
                    renderWeekPreview();
                } else {
                    showMessage(result.message || 'Impossible de charger les tâches.', 'error');
                    renderEmptyTaskBlocks();
                }
            } catch (error) {
                showMessage('Erreur serveur lors du chargement des tâches.', 'error');
                renderEmptyTaskBlocks();
            }
        }

        async function loadNotifications() {
            try {
                const response = await fetch('/api/notifications', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    allNotifications = result.data.data || [];
                    renderRecentMessages();
                    renderReservationRequests();
                    renderTaskStats();
                } else {
                    renderRecentMessages();
                    renderReservationRequests();
                }
            } catch (error) {
                renderRecentMessages();
                renderReservationRequests();
            }
        }

        function renderTaskStats() {
            const pending = allTasks.filter(function (task) {
                return task.status === 'pending' || task.status === 'in_progress';
            }).length;

            const completed = allTasks.filter(function (task) {
                return task.status === 'completed';
            }).length;

            const high = allTasks.filter(function (task) {
                return task.priority === 'high' && (task.status === 'pending' || task.status === 'in_progress');
            }).length;

            const newMessages = allNotifications.filter(function (notification) {
                return notification.data && notification.data.type === 'new_message' && !notification.read_at;
            }).length;

            pendingCount.textContent = pending + ' tâche' + (pending > 1 ? 's' : '');
            completedCount.textContent = completed + ' tâche' + (completed > 1 ? 's' : '');
            highPriorityCount.textContent = high + ' urgente' + (high > 1 ? 's' : '');
            messagesCount.textContent = newMessages + ' nouveau' + (newMessages > 1 ? 'x' : '');
        }

        function renderTodayTasks() {
            const today = formatDate(new Date());

            const todayTasks = allTasks.filter(function (task) {
                return task.due_date === today;
            });

            todayTasksList.innerHTML = '';

            if (todayTasks.length === 0) {
                todayTasksList.innerHTML = `
                    <div class="px-5 py-6 text-slate-400 text-sm">
                        Aucune tâche prévue aujourd'hui.
                    </div>
                `;
                return;
            }

            todayTasks.forEach(function (task) {
                const completed = task.status === 'completed';

                const item = document.createElement('div');
                item.className = 'px-5 py-4 flex items-center gap-3';

                item.innerHTML = `
                    <button
                        class="w-8 h-8 rounded-xl border-2 ${completed ? 'bg-blue-500 border-blue-500 text-white' : 'border-slate-300 bg-white'} flex items-center justify-center text-base"
                        onclick="toggleTaskStatus(${task.id}, '${task.status}')"
                    >
                        ${completed ? '✓' : ''}
                    </button>

                    <div class="flex-1">
                        <p class="text-base ${completed ? 'line-through text-slate-400' : 'font-semibold'}">
                            ${task.title}
                        </p>

                        <div class="flex flex-wrap items-center gap-3 mt-2 text-xs">
                            <span class="px-2.5 py-1 rounded-full font-bold ${getPriorityClass(task.priority)}">
                                ${getPriorityLabel(task.priority)}
                            </span>

                            <span class="text-slate-400">
                                ${task.description ? escapeHtml(task.description) : ''}
                            </span>
                        </div>
                    </div>
                `;

                todayTasksList.appendChild(item);
            });
        }

        function renderRecentMessages() {
            recentMessagesList.innerHTML = '';

            const messageNotifications = allNotifications.filter(function (notification) {
                return notification.data && notification.data.type === 'new_message';
            }).slice(0, 2);

            if (messageNotifications.length === 0) {
                recentMessagesList.innerHTML = `
                    <div class="px-5 py-6 text-slate-400 text-sm">
                        Aucun message récent.
                    </div>
                `;
                return;
            }

            messageNotifications.forEach(function (notification) {
                const item = document.createElement('div');
                item.className = 'px-5 py-4';

                const sender = notification.data.sender_name || 'Parent';
                const message = notification.data.content || 'Nouveau message';
                const time = formatNotificationTime(notification.created_at);

                item.innerHTML = `
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700 text-sm">
                            ${getInitials(sender)}
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-3">
                                <p class="text-sm font-bold">${sender}</p>
                                <span class="text-xs text-slate-400">${time}</span>
                            </div>

                            <p class="text-sm text-slate-600 mt-1.5 break-words">
                                "${escapeHtml(message)}"
                            </p>
                        </div>
                    </div>
                `;

                recentMessagesList.appendChild(item);
            });
        }

        function renderReservationRequests() {
            reservationRequestsList.innerHTML = '';

            const reservationNotifications = allNotifications.filter(function (notification) {
                return notification.data
                    && notification.data.type === 'nanny_reservation_request'
                    && (notification.data.status || 'pending') === 'pending';
            }).slice(0, 4);

            if (reservationNotifications.length === 0) {
                reservationRequestsList.innerHTML = `
                    <div class="px-5 py-6 text-slate-400 text-sm">
                        Aucune demande de réservation en attente.
                    </div>
                `;
                return;
            }

            reservationNotifications.forEach(function (notification) {
                const item = document.createElement('div');
                item.className = 'px-5 py-4';

                const parentName = notification.data.parent_name || 'Parent';
                const familyLabel = notification.data.family_label || 'Famille non précisée';
                const createdAt = formatNotificationTime(notification.created_at);

                item.innerHTML = `
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700 text-sm">
                            ${getInitials(parentName)}
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-3">
                                <p class="text-sm font-bold">${escapeHtml(parentName)}</p>
                                <span class="text-xs text-slate-400">${createdAt}</span>
                            </div>

                            <p class="text-sm text-slate-600 mt-1.5">
                                ${escapeHtml(parentName)} souhaite réserver votre profil.
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                ${escapeHtml(familyLabel)}
                            </p>

                            <div class="flex gap-2 mt-3">
                                <button
                                    onclick="respondToReservation('${notification.id}', 'accepted')"
                                    class="px-3 py-2 rounded-full bg-blue-600 text-white text-xs font-bold hover:bg-blue-700"
                                >
                                    Accepter
                                </button>
                                <button
                                    onclick="respondToReservation('${notification.id}', 'rejected')"
                                    class="px-3 py-2 rounded-full bg-[#f3e8d9] text-[#5d4c39] text-xs font-bold hover:bg-[#eadcc8]"
                                >
                                    Refuser
                                </button>
                            </div>
                        </div>
                    </div>
                `;

                reservationRequestsList.appendChild(item);
            });
        }
        // garde les 4 prochaines 
        function renderWeekPreview() {
            weekPreviewList.innerHTML = '';

            const now = new Date();
            const today = new Date(now);
            today.setHours(0, 0, 0, 0);

            const futureTasks = allTasks
                .filter(function (task) {
                    if (!task.due_date) return false;
                    const due = new Date(task.due_date + 'T00:00:00');
                    return due >= today;
                })
                .sort(function (a, b) {
                    return new Date(a.due_date) - new Date(b.due_date);
                })
                .slice(0, 4);

            if (futureTasks.length === 0) {
                weekPreviewList.innerHTML = `
                    <div class="text-slate-400 text-sm">Aucune tâche prévue cette semaine.</div>
                `;
                return;
            }

            futureTasks.forEach(function (task) {
                const due = new Date(task.due_date + 'T00:00:00');

                const item = document.createElement('div');
                item.className = 'flex items-start gap-3';

                item.innerHTML = `
                    <div class="w-10 h-10 rounded-xl bg-[#eef3fb] text-blue-600 flex flex-col items-center justify-center shrink-0">
                        <span class="text-xs font-bold uppercase">${dayNameShort(due)}</span>
                        <span class="text-base font-black">${due.getDate()}</span>
                    </div>

                    <div>
                        <p class="text-sm font-bold">${task.title}</p>
                        <p class="text-sm text-slate-500 mt-1">${fullDayName(due)}</p>
                        <p class="text-sm text-slate-400 mt-1">${task.description ? escapeHtml(task.description) : 'Tâche planifiée'}</p>
                    </div>
                `;

                weekPreviewList.appendChild(item);
            });

            weekNoteText.textContent = 'Pensez à consulter les détails des tâches de la semaine avant chaque déplacement.';
        }
        // changer rapidement le statut d’une tâche 
        async function toggleTaskStatus(taskId, currentStatus) {
            const nextStatus = currentStatus === 'completed' ? 'in_progress' : 'completed';

            try {
                const response = await fetch('/api/tasks/' + taskId + '/status', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        ...getAuthHeaders()
                    },
                    body: JSON.stringify({
                        status: nextStatus
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    loadTasks();
                } else {
                    showMessage(result.message || 'Impossible de modifier le statut.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }

        async function respondToReservation(notificationId, status) {
            try {
                const response = await fetch('/api/notifications/' + notificationId + '/reservation-response', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        ...getAuthHeaders()
                    },
                    body: JSON.stringify({ status: status })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage(result.message || 'Demande traitée.', 'success');
                    loadNotifications();
                } else {
                    showMessage(result.message || 'Impossible de traiter la demande.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }

        function renderEmptyTaskBlocks() {
            todayTasksList.innerHTML = '<div class="px-5 py-6 text-slate-400 text-sm">Aucune donnée.</div>';
            weekPreviewList.innerHTML = '<div class="text-slate-400 text-sm">Aucune donnée.</div>';
        }

        function getToken() {
            return localStorage.getItem('access_token') || localStorage.getItem('token');
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

        function getPriorityClass(priority) {
            if (priority === 'high') return 'bg-red-100 text-red-600';
            if (priority === 'medium') return 'bg-blue-100 text-blue-600';
            if (priority === 'low') return 'bg-green-100 text-green-600';
            return 'bg-slate-100 text-slate-600';
        }

        function getPriorityLabel(priority) {
            if (priority === 'high') return 'URGENT';
            if (priority === 'medium') return 'NORMAL';
            if (priority === 'low') return 'FAIBLE';
            return priority;
        }

        function firstName(name) {
            if (!name) return 'Nounou';
            return name.trim().split(' ')[0];
        }

        function getInitials(name) {
            if (!name) return 'N';

            const parts = name.trim().split(' ');
            let initials = '';

            for (let i = 0; i < parts.length; i++) {
                if (parts[i].length > 0) {
                    initials += parts[i][0];
                }
            }

            return initials.substring(0, 2).toUpperCase();
        }

        function formatDate(date) {
            const y = date.getFullYear();
            const m = String(date.getMonth() + 1).padStart(2, '0');
            const d = String(date.getDate()).padStart(2, '0');
            return y + '-' + m + '-' + d;
        }

        function dayNameShort(date) {
            const days = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
            return days[date.getDay()];
        }

        function fullDayName(date) {
            return date.toLocaleDateString('fr-FR', {
                weekday: 'long'
            }).replace(/^./, function (c) { return c.toUpperCase(); });
        }

        function formatNotificationTime(dateString) {
            if (!dateString) return '';

            const date = new Date(dateString);
            const now = new Date();
            const diffMinutes = Math.floor((now - date) / (1000 * 60));

            if (diffMinutes < 60) {
                return 'Il y a ' + diffMinutes + ' min';
            }

            return 'Ce matin';
        }

        function escapeHtml(text) {
            return String(text)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        function showMessage(message, type) {
            messageBox.classList.remove('hidden');

            if (type === 'success') {
                messageBox.className = 'mb-6 rounded-2xl p-4 text-sm bg-green-100 text-green-700';
            } else {
                messageBox.className = 'mb-6 rounded-2xl p-4 text-sm bg-red-100 text-red-700';
            }

            messageBox.innerHTML = message;

            setTimeout(function () {
                messageBox.classList.add('hidden');
            }, 3000);
        }
    </script>
</body>
</html>
