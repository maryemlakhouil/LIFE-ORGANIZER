<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning Nounou - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f4f7fb] text-slate-900 min-h-screen">

    <div class="min-h-screen">

        <!-- TOP NAV -->
        <header class="bg-white border-b border-slate-200">
            <div class="max-w-[1280px] mx-auto px-5 md:px-6 py-3.5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold">Family Organizer</span>
                </div>

                <nav class="hidden md:flex items-center gap-7 text-base">
                    <a href="{{ route('nounou.dashboard') }}" class="text-slate-600 hover:text-blue-600">
                        Tableau de bord
                    </a>
                    <a href="{{ route('nounou.planning') }}" class="text-blue-600 font-semibold border-b-2 border-blue-600 pb-1">
                        Planning
                    </a>
                    <a href="{{ route('nounou.messages') }}" class="text-slate-600 hover:text-blue-600">
                        Messagerie
                    </a>
                    <a href="#" id="nannyNameTop" class="text-slate-700 font-medium">Marie (Nounou)</a>
                </nav>

                <div id="nannyAvatarTop" class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 font-bold text-base">
                    N
                </div>
            </div>
        </header>

        <!-- PAGE -->
        <main class="max-w-[1280px] mx-auto px-5 md:px-6 py-7">
            <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

            <!-- HEADER -->
            <section class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5 mb-7">
                <div>
                    <h1 class="text-3xl md:text-[34px] font-black mb-2">Mon planning</h1>
                    <p class="text-sm md:text-base text-slate-500">
                        Retrouvez toutes les tâches prévues et organisez votre semaine.
                    </p>
                </div>

                <div class="flex flex-wrap gap-4">
                    <button id="refreshBtn" class="px-5 py-2.5 rounded-2xl bg-white border border-slate-200 text-sm font-semibold hover:bg-slate-50">
                        Actualiser
                    </button>
                    <button id="todayBtn" class="px-5 py-2.5 rounded-2xl bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">
                        Aujourd'hui
                    </button>
                </div>
            </section>

            <!-- SUMMARY CARDS -->
            <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-7">
                <div class="bg-white rounded-[22px] border border-slate-200 shadow-sm p-5">
                    <p class="text-sm font-semibold text-slate-500 mb-2">Tâches totales</p>
                    <p id="totalTasksCount" class="text-2xl font-black">0</p>
                </div>

                <div class="bg-white rounded-[22px] border border-slate-200 shadow-sm p-5">
                    <p class="text-sm font-semibold text-slate-500 mb-2">En attente</p>
                    <p id="pendingTasksCount" class="text-2xl font-black text-yellow-600">0</p>
                </div>

                <div class="bg-white rounded-[22px] border border-slate-200 shadow-sm p-5">
                    <p class="text-sm font-semibold text-slate-500 mb-2">En cours</p>
                    <p id="inProgressTasksCount" class="text-2xl font-black text-blue-600">0</p>
                </div>

                <div class="bg-white rounded-[22px] border border-slate-200 shadow-sm p-5">
                    <p class="text-sm font-semibold text-slate-500 mb-2">Terminées</p>
                    <p id="completedTasksCount" class="text-2xl font-black text-green-600">0</p>
                </div>
            </section>

            <!-- FILTERS + MINI CALENDAR -->
            <section class="grid grid-cols-1 xl:grid-cols-4 gap-6 mb-7">

                <!-- FILTERS -->
                <div class="xl:col-span-3 bg-white rounded-[24px] border border-slate-200 shadow-sm p-5">
                    <h2 class="text-xl font-black mb-5">Filtres</h2>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Recherche</label>
                            <input id="searchInput" type="text" placeholder="Titre ou description"
                                   class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-2.5 text-sm outline-none focus:border-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Statut</label>
                            <select id="statusFilter" class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-2.5 text-sm outline-none focus:border-blue-500">
                                <option value="">Tous</option>
                                <option value="pending">En attente</option>
                                <option value="in_progress">En cours</option>
                                <option value="completed">Terminée</option>
                                <option value="cancelled">Annulée</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Priorité</label>
                            <select id="priorityFilter" class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-2.5 text-sm outline-none focus:border-blue-500">
                                <option value="">Toutes</option>
                                <option value="low">Faible</option>
                                <option value="medium">Moyenne</option>
                                <option value="high">Haute</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Date</label>
                            <input id="dateFilter" type="date"
                                   class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-2.5 text-sm outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3 mt-5">
                        <button id="applyFiltersBtn" class="px-5 py-2.5 rounded-2xl bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">
                            Filtrer
                        </button>
                        <button id="resetFiltersBtn" class="px-5 py-2.5 rounded-2xl border border-slate-300 bg-white text-sm font-semibold hover:bg-slate-50">
                            Réinitialiser
                        </button>
                    </div>
                </div>

                <!-- WEEK MINI -->
                <div class="bg-white rounded-[24px] border border-slate-200 shadow-sm p-5">
                    <h2 class="text-xl font-black mb-5">Cette semaine</h2>
                    <div id="weekMiniCalendar" class="space-y-3"></div>
                </div>
            </section>

            <!-- TASKS BY DAY -->
            <section class="bg-white rounded-[24px] border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
                    <h2 class="text-xl font-black">Tâches planifiées</h2>
                    <span id="tasksCountLabel" class="text-sm text-slate-500">0 tâche(s)</span>
                </div>

                <div id="planningList" class="p-5 space-y-6">
                    <div class="text-slate-400 text-sm">Chargement...</div>
                </div>
            </section>
        </main>
    </div>

    <script>
        const nannyNameTop = document.getElementById('nannyNameTop');
        const nannyAvatarTop = document.getElementById('nannyAvatarTop');

        const totalTasksCount = document.getElementById('totalTasksCount');
        const pendingTasksCount = document.getElementById('pendingTasksCount');
        const inProgressTasksCount = document.getElementById('inProgressTasksCount');
        const completedTasksCount = document.getElementById('completedTasksCount');
        const tasksCountLabel = document.getElementById('tasksCountLabel');

        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const priorityFilter = document.getElementById('priorityFilter');
        const dateFilter = document.getElementById('dateFilter');
        const applyFiltersBtn = document.getElementById('applyFiltersBtn');
        const resetFiltersBtn = document.getElementById('resetFiltersBtn');
        const refreshBtn = document.getElementById('refreshBtn');
        const todayBtn = document.getElementById('todayBtn');

        const planningList = document.getElementById('planningList');
        const weekMiniCalendar = document.getElementById('weekMiniCalendar');
        const messageBox = document.getElementById('messageBox');

        let currentUser = null;
        let allTasks = [];
        let filteredTasks = [];

        document.addEventListener('DOMContentLoaded', function () {
            checkAuth();
            loadUserInfo();
            loadTasks();
            renderWeekMiniCalendar();
        });

        applyFiltersBtn.addEventListener('click', function () {
            applyFilters();
        });

        resetFiltersBtn.addEventListener('click', function () {
            searchInput.value = '';
            statusFilter.value = '';
            priorityFilter.value = '';
            dateFilter.value = '';
            applyFilters();
        });

        refreshBtn.addEventListener('click', function () {
            loadTasks();
        });

        todayBtn.addEventListener('click', function () {
            dateFilter.value = formatDate(new Date());
            applyFilters();
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
                nannyNameTop.textContent = currentUser.name + ' (Nounou)';
                nannyAvatarTop.textContent = getInitials(currentUser.name);
            }
        }

        async function loadTasks() {
            planningList.innerHTML = '<div class="text-slate-400 text-sm">Chargement...</div>';

            try {
                const response = await fetch('/api/tasks', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    allTasks = result.data.data || [];
                    applyFilters();
                } else {
                    showMessage(result.message || 'Impossible de charger les tâches.', 'error');
                    planningList.innerHTML = '<div class="text-sm text-red-500">Impossible de charger les tâches.</div>';
                }
            } catch (error) {
                showMessage('Erreur serveur lors du chargement des tâches.', 'error');
                planningList.innerHTML = '<div class="text-sm text-red-500">Erreur serveur.</div>';
            }
        }

        function applyFilters() {
            const search = searchInput.value.trim().toLowerCase();
            const status = statusFilter.value;
            const priority = priorityFilter.value;
            const date = dateFilter.value;

            filteredTasks = allTasks.filter(function (task) {
                let matchesSearch = true;
                let matchesStatus = true;
                let matchesPriority = true;
                let matchesDate = true;

                if (search !== '') {
                    const title = (task.title || '').toLowerCase();
                    const description = (task.description || '').toLowerCase();
                    matchesSearch = title.includes(search) || description.includes(search);
                }

                if (status !== '') {
                    matchesStatus = task.status === status;
                }

                if (priority !== '') {
                    matchesPriority = task.priority === priority;
                }

                if (date !== '') {
                    matchesDate = task.due_date === date;
                }

                return matchesSearch && matchesStatus && matchesPriority && matchesDate;
            });

            renderStats();
            renderPlanning();
        }

        function renderStats() {
            const total = allTasks.length;
            const pending = allTasks.filter(function (task) {
                return task.status === 'pending';
            }).length;
            const inProgress = allTasks.filter(function (task) {
                return task.status === 'in_progress';
            }).length;
            const completed = allTasks.filter(function (task) {
                return task.status === 'completed';
            }).length;

            totalTasksCount.textContent = total;
            pendingTasksCount.textContent = pending;
            inProgressTasksCount.textContent = inProgress;
            completedTasksCount.textContent = completed;
            tasksCountLabel.textContent = filteredTasks.length + ' tâche(s)';
        }

        function renderPlanning() {
            planningList.innerHTML = '';

            if (filteredTasks.length === 0) {
                planningList.innerHTML = '<div class="text-sm text-slate-400">Aucune tâche trouvée.</div>';
                return;
            }

            const grouped = groupTasksByDate(filteredTasks);

            for (const date in grouped) {
                const section = document.createElement('div');

                const dateTitle = document.createElement('div');
                dateTitle.className = 'flex items-center justify-between mb-4';
                dateTitle.innerHTML = `
                    <h3 class="text-lg font-black">${formatDisplayDate(date)}</h3>
                    <span class="text-sm text-slate-400">${grouped[date].length} tâche(s)</span>
                `;

                section.appendChild(dateTitle);

                const tasksWrapper = document.createElement('div');
                tasksWrapper.className = 'space-y-4';

                grouped[date].forEach(function (task) {
                    const card = document.createElement('div');
                    card.className = 'border border-slate-200 rounded-[22px] p-4 bg-[#fbfcff]';

                    card.innerHTML = `
                        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5">
                            <div class="flex-1">
                                <div class="flex flex-wrap items-center gap-3 mb-3">
                                    <h4 class="text-base font-bold">${escapeHtml(task.title || '')}</h4>
                                    <span class="px-3 py-1 rounded-full text-xs font-bold ${getStatusClass(task.status)}">
                                        ${getStatusLabel(task.status)}
                                    </span>
                                    <span class="px-3 py-1 rounded-full text-xs font-bold ${getPriorityClass(task.priority)}">
                                        ${getPriorityLabel(task.priority)}
                                    </span>
                                </div>

                                <p class="text-sm text-slate-600 mb-3">
                                    ${task.description ? escapeHtml(task.description) : 'Aucune description'}
                                </p>

                                <div class="flex flex-wrap gap-5 text-sm text-slate-400">
                                    <span>Échéance : ${task.due_date ? formatDisplayDate(task.due_date) : '-'}</span>
                                    <span>Créée le : ${task.created_at ? formatDateTime(task.created_at) : '-'}</span>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-3">
                                <button
                                    class="px-4 py-2 rounded-full bg-blue-50 text-blue-600 text-sm font-semibold"
                                    onclick="changeTaskStatus(${task.id}, 'in_progress')"
                                >
                                    Commencer
                                </button>

                                <button
                                    class="px-4 py-2 rounded-full bg-green-50 text-green-600 text-sm font-semibold"
                                    onclick="changeTaskStatus(${task.id}, 'completed')"
                                >
                                    Terminer
                                </button>

                                <button
                                    class="px-4 py-2 rounded-full bg-slate-100 text-slate-600 text-sm font-semibold"
                                    onclick="changeTaskStatus(${task.id}, 'pending')"
                                >
                                    Remettre
                                </button>
                            </div>
                        </div>
                    `;

                    tasksWrapper.appendChild(card);
                });

                section.appendChild(tasksWrapper);
                planningList.appendChild(section);
            }
        }

        async function changeTaskStatus(taskId, status) {
            try {
                const response = await fetch('/api/tasks/' + taskId + '/status', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        ...getAuthHeaders()
                    },
                    body: JSON.stringify({
                        status: status
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Statut mis à jour avec succès.', 'success');
                    loadTasks();
                } else {
                    showMessage(result.message || 'Impossible de modifier le statut.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
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

        function renderWeekMiniCalendar() {
            weekMiniCalendar.innerHTML = '';

            const monday = getMonday(new Date());

            for (let i = 0; i < 7; i++) {
                const day = new Date(monday);
                day.setDate(monday.getDate() + i);

                const item = document.createElement('div');
                item.className = 'flex items-center justify-between rounded-2xl bg-[#f7f9fc] px-4 py-3';

                item.innerHTML = `
                    <span class="font-semibold">${dayNameShort(day)}</span>
                    <span class="text-slate-500">${day.getDate()}</span>
                `;

                weekMiniCalendar.appendChild(item);
            }
        }

        function groupTasksByDate(tasks) {
            const grouped = {};

            const sorted = tasks.slice().sort(function (a, b) {
                const dateA = a.due_date || '9999-12-31';
                const dateB = b.due_date || '9999-12-31';
                return dateA.localeCompare(dateB);
            });

            sorted.forEach(function (task) {
                const date = task.due_date || 'Sans date';

                if (!grouped[date]) {
                    grouped[date] = [];
                }

                grouped[date].push(task);
            });

            return grouped;
        }

        function getStatusClass(status) {
            if (status === 'pending') return 'bg-yellow-100 text-yellow-700';
            if (status === 'in_progress') return 'bg-blue-100 text-blue-700';
            if (status === 'completed') return 'bg-green-100 text-green-700';
            if (status === 'cancelled') return 'bg-red-100 text-red-700';
            return 'bg-slate-100 text-slate-700';
        }

        function getStatusLabel(status) {
            if (status === 'pending') return 'En attente';
            if (status === 'in_progress') return 'En cours';
            if (status === 'completed') return 'Terminée';
            if (status === 'cancelled') return 'Annulée';
            return status;
        }

        function getPriorityClass(priority) {
            if (priority === 'low') return 'bg-green-100 text-green-700';
            if (priority === 'medium') return 'bg-blue-100 text-blue-700';
            if (priority === 'high') return 'bg-red-100 text-red-700';
            return 'bg-slate-100 text-slate-700';
        }

        function getPriorityLabel(priority) {
            if (priority === 'low') return 'Faible';
            if (priority === 'medium') return 'Moyenne';
            if (priority === 'high') return 'Haute';
            return priority || 'Sans priorité';
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

        function getMonday(date) {
            const d = new Date(date);
            const day = d.getDay();
            const diff = d.getDate() - (day === 0 ? 6 : day - 1);
            d.setDate(diff);
            d.setHours(0, 0, 0, 0);
            return d;
        }

        function dayNameShort(date) {
            const days = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
            let day = date.getDay();
            if (day === 0) day = 7;
            return days[day - 1];
        }

        function formatDate(date) {
            const y = date.getFullYear();
            const m = String(date.getMonth() + 1).padStart(2, '0');
            const d = String(date.getDate()).padStart(2, '0');
            return y + '-' + m + '-' + d;
        }

        function formatDisplayDate(dateString) {
            if (dateString === 'Sans date') return 'Sans date';

            const date = new Date(dateString + 'T00:00:00');

            return date.toLocaleDateString('fr-FR', {
                weekday: 'long',
                day: 'numeric',
                month: 'long'
            }).replace(/^./, function (c) { return c.toUpperCase(); });
        }

        function formatDateTime(dateString) {
            const date = new Date(dateString);

            return date.toLocaleDateString('fr-FR', {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            });
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
