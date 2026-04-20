<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Nounou - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f4f7fb] text-slate-900 min-h-screen">

    <div class="min-h-screen">

        <!-- TOP NAV -->
        <header class="bg-white border-b border-slate-200">
            <div class="max-w-[1180px] mx-auto px-5 md:px-6 py-3 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <span class="text-lg font-bold">Family Organizer</span>
                </div>

                <nav class="hidden md:flex items-center gap-6 text-sm">
                    <a href="{{ route('nounou.dashboard') }}" class="text-blue-600 font-semibold border-b-2 border-blue-600 pb-1">
                        Tableau de bord
                    </a>
                    <a href="{{ route('nounou.planning') }}" class="text-slate-600 hover:text-blue-600">Planning</a>
                    <a href="{{ route('nounou.messages') }}" class="text-slate-600 hover:text-blue-600">Messagerie</a>
                    <a href="{{ route('nounou.profile') }}" class="text-slate-600 hover:text-blue-600">Mon profil</a>
                    <a href="#" id="nannyNameTop" class="text-slate-700 font-medium">Marie (Nounou)</a>
                </nav>

                <div class="flex items-center gap-4">
                    <div id="nannyAvatarTop" class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 font-bold text-base">
                        N
                    </div>
                </div>
            </div>
        </header>

        <!-- PAGE -->
        <main class="max-w-[1180px] mx-auto px-5 md:px-6 py-6">
            <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

            <!-- TITLE -->
            <section class="mb-6">
                <h1 id="helloTitle" class="text-2xl md:text-3xl font-black mb-2">Bonjour, Marie !</h1>
                <p class="text-sm text-slate-500">
                    C'est une belle journée pour s'occuper des enfants. Voici votre programme.
                </p>
            </section>

            <!-- CARDS -->
            <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-[18px] border border-slate-200 p-4 shadow-sm">
                    <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-lg mb-3">◔</div>
                    <p class="text-xs font-bold uppercase tracking-wide mb-2 text-slate-500">En attente</p>
                    <p id="pendingCount" class="text-2xl font-black text-slate-700">0 tâche</p>
                </div>

                <div class="bg-white rounded-[18px] border border-slate-200 p-4 shadow-sm">
                    <div class="w-9 h-9 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-lg mb-3">✓</div>
                    <p class="text-xs font-bold uppercase tracking-wide mb-2 text-slate-500">Terminé</p>
                    <p id="completedCount" class="text-2xl font-black text-slate-700">0 tâche</p>
                </div>

                <div class="bg-white rounded-[18px] border border-slate-200 p-4 shadow-sm">
                    <div class="w-9 h-9 rounded-full bg-orange-100 text-orange-500 flex items-center justify-center text-lg mb-3">!</div>
                    <p class="text-xs font-bold uppercase tracking-wide mb-2 text-slate-500">Priorité haute</p>
                    <p id="highPriorityCount" class="text-2xl font-black text-slate-700">0 urgente</p>
                </div>

                <div class="bg-white rounded-[18px] border border-slate-200 p-4 shadow-sm">
                    <div class="w-9 h-9 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-lg mb-3">💬</div>
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
                                <span class="text-blue-600 text-lg">🗒</span>
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
                            <span class="text-blue-600 text-lg">💬</span>
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
                </div>

                <!-- RIGHT -->
                <div class="space-y-5">

                    <!-- WEEK PREVIEW -->
                    <div class="bg-white rounded-[20px] border border-slate-200 shadow-sm overflow-hidden">
                        <div class="px-5 py-4 border-b border-slate-200 flex items-center gap-3">
                            <span class="text-blue-600 text-lg">🗓</span>
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
                                <span class="text-xl">👤</span>
                                <span class="text-sm font-semibold">Profil</span>
                            </a>

                            <button id="quickPhotoBtn" class="bg-white/10 hover:bg-white/20 rounded-[16px] py-4 flex flex-col items-center justify-center gap-2">
                                <span class="text-xl">📷</span>
                                <span class="text-sm font-semibold">Photo</span>
                            </button>

                            <button id="quickUrgencyBtn" class="bg-white/10 hover:bg-white/20 rounded-[16px] py-4 flex flex-col items-center justify-center gap-2">
                                <span class="text-xl">◇</span>
                                <span class="text-sm font-semibold">Urgence</span>
                            </button>

                            <button id="quickMealBtn" class="bg-white/10 hover:bg-white/20 rounded-[16px] py-4 flex flex-col items-center justify-center gap-2">
                                <span class="text-xl">🍽</span>
                                <span class="text-sm font-semibold">Repas</span>
                            </button>

                            <button id="quickHistoryBtn" class="bg-white/10 hover:bg-white/20 rounded-[16px] py-4 flex flex-col items-center justify-center gap-2">
                                <span class="text-xl">↺</span>
                                <span class="text-sm font-semibold">Historique</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
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
        const weekPreviewList = document.getElementById('weekPreviewList');
        const weekNoteText = document.getElementById('weekNoteText');
        const messageBox = document.getElementById('messageBox');

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
                    renderTaskStats();
                } else {
                    renderRecentMessages();
                }
            } catch (error) {
                renderRecentMessages();
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

        function renderEmptyTaskBlocks() {
            todayTasksList.innerHTML = '<div class="px-5 py-6 text-slate-400 text-sm">Aucune donnée.</div>';
            weekPreviewList.innerHTML = '<div class="text-slate-400 text-sm">Aucune donnée.</div>';
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
