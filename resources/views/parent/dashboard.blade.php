<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Parent - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#f3f7fc] text-slate-900 min-h-screen">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-[270px] bg-white border-r border-slate-200 hidden lg:flex flex-col">
            <div class="px-7 pt-7 pb-7">
                <div class="flex items-center gap-4">
                    <div class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-lg font-bold leading-tight">Organisateur<br>Familial</h1>
                    </div>
                </div>
            </div>

            <div class="px-5 pt-12">
                <div class="flex items-center gap-4 mb-10">
                    <div id="familyAvatar" class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center text-base font-bold text-pink-600">
                        F
                    </div>

                    <div>
                        <p id="familyName" class="text-xl font-semibold leading-none mb-1">The Andersons</p>
                        <p id="familyPlan" class="text-slate-500 text-base">Premium plan</p>
                    </div>
                </div>

                <nav class="space-y-5">
                    <a href="{{ route('parent.dashboard') }}" class="flex items-center gap-4 bg-blue-100 text-blue-600 px-6 py-3.5 rounded-[26px] text-lg font-semibold shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z"/>
                        </svg>
                        <span>Tableau de bord</span>
                    </a>

                    <a href="{{ route('parent.tasks') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-slate-700 hover:text-blue-600 hover:bg-blue-50 rounded-[24px]">
                        <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14H3V6a2 2 0 0 1 2-2Z"/>
                        </svg>
                        <span>Planning</span>
                    </a>

                    <a href="{{ route('parent.messages') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-slate-700 hover:text-blue-600 hover:bg-blue-50 rounded-[24px]">
                        <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>
                        </svg>
                        <span>Messagerie</span>
                    </a>

                    <a href="{{ route('parent.family') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-slate-700 hover:text-blue-600 hover:bg-blue-50 rounded-[24px]">
                        <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 11l9-8 9 8"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10v10h14V10"/>
                        </svg>
                        <span>Profil famille</span>
                    </a>

                    <a href="{{ route('parent.nanny-profile') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-slate-700 hover:text-blue-600 hover:bg-blue-50 rounded-[24px]">
                        <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="7" r="4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 21a7 7 0 0 1 14 0"/>
                        </svg>
                        <span>Profil nounou</span>
                    </a>
                </nav>
            </div>

            <div class="mt-auto px-7 pb-10">
                <div class="space-y-4 text-sm">
                    <button class="flex items-center gap-3 text-slate-700 hover:text-blue-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="3"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 0-.4 1.1V21a2 2 0 1 1-4 0v-.09A1.7 1.7 0 0 0 8.6 19.4a1.7 1.7 0 0 0-1.88.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-.6-1 1.7 1.7 0 0 0-1.1-.4H3a2 2 0 1 1 0-4h.09A1.7 1.7 0 0 0 4.6 8.6a1.7 1.7 0 0 0-.34-1.88l-.06-.06A2 2 0 1 1 7.03 3.83l.06.06A1.7 1.7 0 0 0 9 4.6a1.7 1.7 0 0 0 1-.6 1.7 1.7 0 0 0 .4-1.1V3a2 2 0 1 1 4 0v.09A1.7 1.7 0 0 0 15 4.6a1.7 1.7 0 0 0 1.88-.34l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.7 1.7 0 0 0 19.4 9c.22.35.57.58 1 .6h.6a2 2 0 1 1 0 4h-.09A1.7 1.7 0 0 0 19.4 15Z"/>
                        </svg>
                        <span>Paramètres</span>
                    </button>

                    <button id="logoutBtn" class="flex items-center gap-3 text-red-500 hover:text-red-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16 17 5-5-5-5M21 12H9"/>
                        </svg>
                        <span>Déconnexion</span>
                    </button>
                </div>
            </div>
        </aside>

        <!-- MAIN -->
        <div class="flex-1 min-w-0">
            <header class="bg-white px-6 md:px-8 py-5 flex items-center justify-between border-b border-slate-100">
                <div>
                    <h2 class="text-2xl font-bold mb-1">Tableau de bord Parent</h2>
                    <p id="todayDate" class="text-slate-400 text-lg">Mardi 24 Octobre</p>
                </div>

                <div class="flex items-center gap-4 md:gap-5">
                    <button id="notificationsBtn" class="text-slate-700 hover:text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2a2 2 0 0 1-.6 1.4L4 17h5"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 21h4"/>
                        </svg>
                    </button>
                    <button id="addTaskBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-full text-base font-semibold shadow-lg shadow-blue-600/20">
                        + Ajouter une tâche
                    </button>
                </div>
            </header>

            <main class="p-5 md:p-8">
                <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

                <!-- TOP AREA -->
                <div class="grid grid-cols-1 xl:grid-cols-4 gap-5 mb-8">

                    <!-- PROGRESS -->
                    <section class="xl:col-span-3 bg-white rounded-[30px] shadow-[0_8px_24px_rgba(15,23,42,0.06)] border border-slate-100 p-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
                            <h3 class="text-lg font-bold">Progression quotidienne</h3>
                            <div class="bg-blue-50 text-blue-600 px-6 py-2 rounded-full text-base font-medium">
                                <span id="progressPercent">0 % terminé</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-3">
                            <p id="progressDayLabel" class="text-base">Aujourd'hui</p>
                            <p id="progressRatio" class="text-base font-semibold text-blue-600">0/0</p>
                        </div>

                        <div class="w-full h-2.5 bg-slate-200 rounded-full overflow-hidden mb-5">
                            <div id="progressBar" class="h-full bg-blue-600 rounded-full" style="width: 0%;"></div>
                        </div>

                        <p id="progressText" class="text-sm text-slate-600 mb-7">
                            Aucune tâche planifiée pour aujourd’hui.
                        </p>

                        <div id="todayTasksPreview" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-slate-100 rounded-2xl px-5 py-3.5 text-slate-500 text-sm">
                                Pas encore de tâches aujourd’hui
                            </div>
                        </div>
                    </section>

                    <!-- QUICK LINKS -->
                    <section class="bg-blue-600 rounded-[30px] text-white shadow-[0_8px_24px_rgba(37,99,235,0.18)] p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold mb-16">Liens rapides</h3>
                        </div>

                        <div class="space-y-3">
                            <button id="createTaskQuickBtn" class="w-full bg-white text-blue-600 rounded-full py-2.5 text-base font-semibold flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                                </svg>
                                Créer une tâche
                            </button>

                            <button id="messageNannyBtn" class="w-full bg-blue-300/70 text-white rounded-full py-2.5 text-base font-semibold flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4 7 8 6 8-6"/>
                                </svg>
                                Message nounou
                            </button>

                            <button id="nannyProfileQuickBtn" class="w-full bg-white/15 text-white rounded-full py-2.5 text-base font-semibold flex items-center justify-center gap-2 hover:bg-white/20">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="7" r="4"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 21a7 7 0 0 1 14 0"/>
                                </svg>
                                Profil nounou
                            </button>
                        </div>
                    </section>
                </div>

                <!-- BOTTOM AREA -->
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

                    <!-- RECENT ACTIVITY -->
                    <section class="bg-white rounded-[28px] shadow-[0_8px_24px_rgba(15,23,42,0.06)] border border-slate-100 overflow-hidden">
                        <div class="px-6 pt-6 pb-5 flex items-center justify-between">
                            <h3 class="text-xl font-bold">Activité récente</h3>
                            <a href="#" class="text-blue-600 font-semibold text-sm">Voir tout</a>
                        </div>

                        <div id="recentActivityList" class="divide-y divide-slate-200">
                            <div class="px-7 py-5">
                                <p class="text-base font-semibold">Chargement...</p>
                                <p class="text-slate-400 text-sm mt-1">Veuillez patienter</p>
                            </div>
                        </div>
                    </section>

                    <!-- WEEK -->
                    <section class="bg-white rounded-[28px] shadow-[0_8px_24px_rgba(15,23,42,0.06)] border border-slate-100 p-6">
                        <h3 class="text-xl font-bold mb-7">La semaine à venir</h3>

                        <div id="weekDaysRow" class="grid grid-cols-7 gap-2 text-center mb-7"></div>

                        <div id="weekTasksList" class="space-y-4">
                            <div class="text-slate-400 text-sm">Aucune tâche à venir.</div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
    
    <script>
        const todayDate = document.getElementById('todayDate');
        const familyName = document.getElementById('familyName');
        const familyPlan = document.getElementById('familyPlan');
        const familyAvatar = document.getElementById('familyAvatar');

        const progressPercent = document.getElementById('progressPercent');
        const progressRatio = document.getElementById('progressRatio');
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');
        const todayTasksPreview = document.getElementById('todayTasksPreview');

        const recentActivityList = document.getElementById('recentActivityList');
        const weekDaysRow = document.getElementById('weekDaysRow');
        const weekTasksList = document.getElementById('weekTasksList');

        const logoutBtn = document.getElementById('logoutBtn');
        const addTaskBtn = document.getElementById('addTaskBtn');
        const createTaskQuickBtn = document.getElementById('createTaskQuickBtn');
        const messageNannyBtn = document.getElementById('messageNannyBtn');
        const nannyProfileQuickBtn = document.getElementById('nannyProfileQuickBtn');
        const messageBox = document.getElementById('messageBox');

        let allTasks = [];
        let allNotifications = [];

        document.addEventListener('DOMContentLoaded', function () {
            guardParentAccess();
            renderTodayDate();
            loadParentInfo();
            loadTasks();
            loadNotifications();
            renderWeekDays();
        });

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('access_token');
            localStorage.removeItem('user');
            window.location.href = '/login';
        });

        addTaskBtn.addEventListener('click', function () {
            window.location.href = '{{ route('parent.tasks') }}?create=1';
        });

        createTaskQuickBtn.addEventListener('click', function () {
            window.location.href = '{{ route('parent.tasks') }}?create=1';
        });

        messageNannyBtn.addEventListener('click', function () {
            window.location.href = '{{ route('parent.messages') }}';
        });

        nannyProfileQuickBtn.addEventListener('click', function () {
            window.location.href = '{{ route('parent.nanny-profile') }}';
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

        function getStoredUser() {
            try {
                return JSON.parse(localStorage.getItem('user'));
            } catch (error) {
                return null;
            }
        }

        function guardParentAccess() {
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

            if (user.role !== 'parent') {
                window.location.href = '/';
            }
        }

        function renderTodayDate() {
            const now = new Date();
            const options = {
                weekday: 'long',
                day: 'numeric',
                month: 'long'
            };

            let formatted = now.toLocaleDateString('fr-FR', options);
            formatted = formatted.charAt(0).toUpperCase() + formatted.slice(1);
            todayDate.textContent = formatted;
        }

        function loadParentInfo() {
            const user = getStoredUser();

            if (user) {
                familyName.textContent = user.name || 'Ma famille';
                familyPlan.textContent = 'Premium plan';
                familyAvatar.textContent = getInitials(user.name || 'Famille');
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
                    renderDailyProgress();
                    renderWeekTasks();
                } else if (response.status === 401 || response.status === 403) {
                    window.location.href = '/login';
                } else {
                    showMessage(result.message || 'Impossible de charger les tâches.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur lors du chargement des tâches.', 'error');
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
                    renderRecentActivity();
                } else {
                    renderRecentActivity();
                }
            } catch (error) {
                renderRecentActivity();
            }
        }

        function renderDailyProgress() {
            const today = new Date();
            const todayString = formatDate(today);

            const todayTasks = allTasks.filter(function (task) {
                if (!task.due_date) return false;
                return task.due_date === todayString;
            });

            const completedTasks = todayTasks.filter(function (task) {
                return task.status === 'completed';
            });

            const total = todayTasks.length;
            const completed = completedTasks.length;

            let percent = 0;
            if (total > 0) {
                percent = Math.round((completed / total) * 100);
            }

            progressPercent.textContent = percent + ' % terminé';
            progressRatio.textContent = completed + '/' + total;
            progressBar.style.width = percent + '%';

            if (total === 0) {
                progressText.textContent = 'Aucune tâche planifiée pour aujourd’hui.';
            } else {
                const remaining = total - completed;
                progressText.textContent = 'Continuez ainsi ! il reste ' + remaining + ' tâche(s) pour aujourd’hui.';
            }

            renderTodayTasksPreview(todayTasks);
        }

        function renderTodayTasksPreview(tasks) {
            todayTasksPreview.innerHTML = '';

            if (tasks.length === 0) {
                todayTasksPreview.innerHTML = `
                    <div class="bg-slate-100 rounded-3xl px-5 py-4 text-slate-500 text-sm">
                        Pas encore de tâches aujourd’hui
                    </div>
                `;
                return;
            }

            const previewTasks = tasks.slice(0, 2);

            previewTasks.forEach(function (task) {
                const bgClass = task.status === 'completed' ? 'bg-[#dceec9]' : 'bg-[#eef2f7]';
                const icon = task.status === 'completed' ? '✔' : '◯';

                const card = document.createElement('div');
                card.className = bgClass + ' rounded-3xl px-5 py-4 flex items-center gap-4';

                card.innerHTML = `
                    <div class="w-5 h-5 rounded-full bg-blue-500 text-white flex items-center justify-center text-xs font-bold">
                        ${icon}
                    </div>
                    <p class="text-sm font-semibold">${task.title}</p>
                `;

                todayTasksPreview.appendChild(card);
            });
        }

        function renderRecentActivity() {
            recentActivityList.innerHTML = '';

            if (allNotifications.length === 0) {
                recentActivityList.innerHTML = `
                    <div class="px-7 py-5">
                        <p class="text-base font-semibold">Aucune activité récente</p>
                        <p class="text-slate-400 text-sm mt-1">Les notifications apparaîtront ici.</p>
                    </div>
                `;
                return;
            }

            const latest = allNotifications.slice(0, 3);

            latest.forEach(function (notification) {
                const item = document.createElement('div');
                item.className = 'px-7 py-5';

                let title = 'Notification';
                let subtitle = '';
                let time = '';

                if (notification.data) {
                    title = notification.data.title || 'Notification';
                    subtitle = notification.data.message || '';
                }

                if (notification.created_at) {
                    time = formatDateTime(notification.created_at);
                }

                item.innerHTML = `
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12M6 12h12"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-base font-semibold">${title}</p>
                            <p class="text-slate-600 text-sm mt-1">${subtitle}</p>
                            <p class="text-slate-400 text-sm mt-1">${time}</p>
                        </div>
                    </div>
                `;

                recentActivityList.appendChild(item);
            });
        }

        function renderWeekDays() {
            weekDaysRow.innerHTML = '';

            const base = new Date();
            const monday = getMonday(base);

            const labels = ['lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];

            for (let i = 0; i < 7; i++) {
                const day = new Date(monday);
                day.setDate(monday.getDate() + i);

                const label = document.createElement('div');
                label.className = 'text-center';

                const dayName = labels[i];
                const dayNumber = day.getDate();
                const isToday = formatDate(day) === formatDate(new Date());

                label.innerHTML = `
                    <p class="text-slate-400 text-sm mb-2">${dayName}</p>
                    <div class="${isToday ? 'w-8 h-8 mx-auto rounded-full bg-blue-600 text-white flex items-center justify-center text-sm font-semibold' : 'text-base font-medium'}">
                        ${dayNumber}
                    </div>
                `;

                weekDaysRow.appendChild(label);
            }
        }

        function renderWeekTasks() {
            weekTasksList.innerHTML = '';

            const now = new Date();
            const monday = getMonday(now);
            const sunday = new Date(monday);
            sunday.setDate(monday.getDate() + 6);

            const weekTasks = allTasks.filter(function (task) {
                if (!task.due_date) return false;

                const due = new Date(task.due_date + 'T00:00:00');
                return due >= monday && due <= sunday;
            });

            if (weekTasks.length === 0) {
                weekTasksList.innerHTML = `
                    <div class="text-slate-400 text-sm">Aucune tâche prévue cette semaine.</div>
                `;
                return;
            }

            weekTasks.slice(0, 4).forEach(function (task) {
                const colorClass = getTaskColor(task.priority);

                const item = document.createElement('div');
                item.className = 'flex items-start gap-4';

                item.innerHTML = `
                    <div class="w-2 rounded-full h-12 ${colorClass}"></div>
                    <div>
                        <p class="text-base font-semibold">${task.title}</p>
                        <p class="text-slate-400 text-sm mt-1">${formatTaskDate(task.due_date)}</p>
                    </div>
                `;

                weekTasksList.appendChild(item);
            });
        }

        function getTaskColor(priority) {
            if (priority === 'high') return 'bg-red-500';
            if (priority === 'medium') return 'bg-blue-600';
            if (priority === 'low') return 'bg-green-500';
            return 'bg-slate-300';
        }

        function getMonday(date) {
            const d = new Date(date);
            const day = d.getDay();
            const diff = d.getDate() - (day === 0 ? 6 : day - 1);
            d.setDate(diff);
            d.setHours(0, 0, 0, 0);
            return d;
        }

        function formatDate(date) {
            const y = date.getFullYear();
            const m = String(date.getMonth() + 1).padStart(2, '0');
            const d = String(date.getDate()).padStart(2, '0');
            return y + '-' + m + '-' + d;
        }

        function formatDateTime(dateString) {
            const date = new Date(dateString);

            return date.toLocaleDateString('fr-FR', {
                day: 'numeric',
                month: 'short'
            }) + ' - ' + date.toLocaleTimeString('fr-FR', {
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function formatTaskDate(dateString) {
            const date = new Date(dateString + 'T00:00:00');

            return date.toLocaleDateString('fr-FR', {
                weekday: 'long',
                hour: undefined,
                minute: undefined
            }) + ' - ' + date.toLocaleDateString('fr-FR', {
                day: 'numeric',
                month: 'long'
            });
        }

        function getInitials(name) {
            if (!name) return 'F';

            const parts = name.trim().split(' ');
            let initials = '';

            for (let i = 0; i < parts.length; i++) {
                if (parts[i].length > 0) {
                    initials += parts[i][0];
                }
            }

            return initials.substring(0, 2).toUpperCase();
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
