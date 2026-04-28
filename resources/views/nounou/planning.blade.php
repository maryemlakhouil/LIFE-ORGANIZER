<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning Nounou - Family Organizer</title>
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
        .nounou-planning-theme .bg-white { background-color: #fffaf3 !important; }
        .nounou-planning-theme .bg-blue-600,
        .nounou-planning-theme .bg-blue-500 { background-color: #8f6b43 !important; }
        .nounou-planning-theme .bg-blue-700,
        .nounou-planning-theme .hover\:bg-blue-700:hover { background-color: #795936 !important; }
        .nounou-planning-theme .bg-blue-100,
        .nounou-planning-theme .bg-blue-50,
        .nounou-planning-theme .hover\:bg-blue-50:hover { background-color: #efe2cf !important; }
        .nounou-planning-theme .bg-slate-100,
        .nounou-planning-theme .bg-slate-200,
        .nounou-planning-theme .hover\:bg-slate-50:hover,
        .nounou-planning-theme .bg-\[\#f7f8fb\],
        .nounou-planning-theme .bg-\[\#f7f9fc\],
        .nounou-planning-theme .bg-\[\#fbfcff\] { background-color: #f3e8d9 !important; }
        .nounou-planning-theme .text-blue-600,
        .nounou-planning-theme .text-blue-700,
        .nounou-planning-theme .hover\:text-blue-600:hover { color: #8f6b43 !important; }
        .nounou-planning-theme .text-slate-900 { color: #2f281f !important; }
        .nounou-planning-theme .text-slate-700 { color: #5d4c39 !important; }
        .nounou-planning-theme .text-slate-600 { color: #6d5c49 !important; }
        .nounou-planning-theme .text-slate-500,
        .nounou-planning-theme .text-slate-400 { color: #9a8469 !important; }
        .nounou-planning-theme .border-slate-200,
        .nounou-planning-theme .border-slate-300 { border-color: #eadfce !important; }
        .nounou-planning-theme .text-yellow-600 { color: #b08835 !important; }
        .nounou-planning-theme .text-green-600,
        .nounou-planning-theme .text-green-700 { color: #5b8b68 !important; }
        .nounou-planning-theme .text-red-700 { color: #b55348 !important; }
        .nounou-planning-theme .bg-yellow-100 { background-color: #f8edd5 !important; }
        .nounou-planning-theme .bg-green-100 { background-color: #e7f1e7 !important; }
        .nounou-planning-theme .bg-red-100 { background-color: #fff1ed !important; }
    </style>
</head>

<body class="nounou-planning-theme bg-[#f7f0e7] text-slate-900 min-h-screen">

    <div class="flex min-h-screen">
        <aside class="w-[270px] bg-[#fffaf3] border-r border-[#eadfce] hidden lg:flex flex-col">
            <div class="px-7 pt-7 pb-7">
                <div class="flex items-center gap-4">
                    <div class="w-9 h-9 rounded-2xl bg-[#8f6b43] flex items-center justify-center shadow-sm">
                        <span class="material-symbols-rounded text-[#fffaf3]">groups</span>
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
                        <p id="nannyNameTop" class="text-xl font-black leading-none mb-1">Marie </p>
                        <p class="text-[#9a8469] text-sm font-semibold">Espace nounou</p>
                    </div>
                </div>

                <nav class="space-y-5">
                    <a href="{{ route('nounou.dashboard') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">dashboard</span>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('nounou.planning') }}" class="flex items-center gap-4 bg-[#efe2cf] text-[#8f6b43] px-6 py-3.5 rounded-[26px] text-lg font-black shadow-sm">
                        <span class="material-symbols-rounded">calendar_month</span>
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
                    <h2 class="text-2xl font-black mb-1">Planning nounou</h2>
                    <p class="text-[#9a8469] text-base font-semibold">Retrouvez toutes les tâches prévues et organisez votre semaine.</p>
                </div>

                <div class="flex flex-wrap gap-4">
                    <button id="refreshBtn" class="px-5 py-2.5 rounded-full bg-white border border-slate-200 text-sm font-semibold hover:bg-blue-50">
                        Actualiser
                    </button>
                    <button id="todayBtn" class="px-5 py-2.5 rounded-full bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">
                        Aujourd'hui
                    </button>
                </div>
            </header>

            <main class="p-5 md:p-8">
                <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

                <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-7">
                    <div class="bg-white rounded-[22px] border border-slate-200 shadow-sm p-5">
                        <div class="w-10 h-10 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center mb-4">
                            <span class="material-symbols-rounded">task</span>
                        </div>
                        <p class="text-sm font-semibold text-slate-500 mb-2">Tâches totales</p>
                        <p id="totalTasksCount" class="text-2xl font-black">0</p>
                    </div>

                    <div class="bg-white rounded-[22px] border border-slate-200 shadow-sm p-5">
                        <div class="w-10 h-10 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center mb-4">
                            <span class="material-symbols-rounded">schedule</span>
                        </div>
                        <p class="text-sm font-semibold text-slate-500 mb-2">En attente</p>
                        <p id="pendingTasksCount" class="text-2xl font-black text-yellow-600">0</p>
                    </div>

                    <div class="bg-white rounded-[22px] border border-slate-200 shadow-sm p-5">
                        <div class="w-10 h-10 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center mb-4">
                            <span class="material-symbols-rounded">autorenew</span>
                        </div>
                        <p class="text-sm font-semibold text-slate-500 mb-2">En cours</p>
                        <p id="inProgressTasksCount" class="text-2xl font-black text-blue-600">0</p>
                    </div>

                    <div class="bg-white rounded-[22px] border border-slate-200 shadow-sm p-5">
                        <div class="w-10 h-10 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center mb-4">
                            <span class="material-symbols-rounded">task_alt</span>
                        </div>
                        <p class="text-sm font-semibold text-slate-500 mb-2">Terminées</p>
                        <p id="completedTasksCount" class="text-2xl font-black text-green-600">0</p>
                    </div>
                </section>

                <section class="grid grid-cols-1 xl:grid-cols-4 gap-6 mb-7 items-start">
                    <div class="xl:col-span-3 space-y-6">
                        <div class="bg-white rounded-[24px] border border-slate-200 shadow-sm p-5">
                            <div class="flex items-center gap-3 mb-5">
                                <span class="material-symbols-rounded text-blue-600">filter_alt</span>
                                <h2 class="text-xl font-black">Filtres</h2>
                            </div>

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
                                <button id="applyFiltersBtn" class="px-5 py-2.5 rounded-full bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">
                                    Filtrer
                                </button>
                                <button id="resetFiltersBtn" class="px-5 py-2.5 rounded-full border border-slate-300 bg-white text-sm font-semibold hover:bg-blue-50">
                                    Réinitialiser
                                </button>
                            </div>
                        </div>

                        <section class="bg-white rounded-[24px] border border-slate-200 shadow-sm overflow-hidden">
                            <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-rounded text-blue-600">event_note</span>
                                    <h2 class="text-xl font-black">Tâches planifiées</h2>
                                </div>
                                <span id="tasksCountLabel" class="text-sm text-slate-500">0 tâche(s)</span>
                            </div>

                            <div id="planningList" class="p-5 space-y-6">
                                <div class="text-slate-400 text-sm">Chargement...</div>
                            </div>
                        </section>
                    </div>

                    <div class="bg-white rounded-[24px] border border-slate-200 shadow-sm p-5">
                        <div class="flex items-center gap-3 mb-5">
                            <span class="material-symbols-rounded text-blue-600">date_range</span>
                            <h2 class="text-xl font-black">Cette semaine</h2>
                        </div>
                        <div id="weekMiniCalendar" class="space-y-3"></div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <div id="commentsModal" class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center px-4">
        <div class="bg-white rounded-[24px] w-full max-w-2xl p-6 max-h-[85vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-2xl font-black">Commentaires</h3>
                    <p id="commentsTaskTitle" class="text-sm text-slate-500 mt-1">Tâche</p>
                </div>
                <button id="closeCommentsModalBtn" class="text-2xl text-slate-400 hover:text-slate-700">×</button>
            </div>

            <div class="rounded-[20px] border border-slate-200 bg-[#fffaf3] p-4 mb-5">
                <label for="commentContentInput" class="block text-sm text-slate-500 mb-2">Ajouter un commentaire</label>
                <textarea id="commentContentInput" rows="3"
                          class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none focus:border-blue-500"
                          placeholder="Écrire un commentaire..."></textarea>
                <div class="flex justify-end mt-3">
                    <button id="saveCommentBtn" class="px-5 py-2.5 rounded-full bg-blue-600 text-white text-sm font-semibold">
                        Envoyer
                    </button>
                </div>
            </div>

            <div id="commentsList" class="space-y-3">
                <div class="text-sm text-slate-400">Chargement...</div>
            </div>
        </div>
    </div>

    <script>
        const nannyNameTop = document.getElementById('nannyNameTop');
        const nannyAvatarTop = document.getElementById('nannyAvatarTop');
        const logoutBtn = document.getElementById('logoutBtn');

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
        const commentsModal = document.getElementById('commentsModal');
        const closeCommentsModalBtn = document.getElementById('closeCommentsModalBtn');
        const commentsTaskTitle = document.getElementById('commentsTaskTitle');
        const commentsList = document.getElementById('commentsList');
        const commentContentInput = document.getElementById('commentContentInput');
        const saveCommentBtn = document.getElementById('saveCommentBtn');

        let currentUser = null;
        let allTasks = [];
        let filteredTasks = [];
        let currentCommentTaskId = null;
        let currentTaskComments = [];

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
        closeCommentsModalBtn.addEventListener('click', closeCommentsModal);
        commentsModal.addEventListener('click', function (event) {
            if (event.target === commentsModal) {
                closeCommentsModal();
            }
        });
        saveCommentBtn.addEventListener('click', function () {
            createComment();
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
                    matchesDate = normalizeTaskDate(task.due_date) === date;
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
        // afficher le planning des tâches, organisé par date 
        
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
                                    class="px-4 py-2 rounded-full bg-[#f3e8d9] text-[#8f6b43] text-sm font-semibold"
                                    onclick='openCommentsModal(${task.id}, ${JSON.stringify(task.title || "Tâche")})'
                                >
                                    Commentaires
                                </button>

                                <button
                                    class="px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-semibold"
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

        function openCommentsModal(id, title) {
            currentCommentTaskId = id;
            commentsTaskTitle.textContent = title || 'Tâche';
            commentContentInput.value = '';
            commentsList.innerHTML = '<div class="text-sm text-slate-400">Chargement...</div>';
            commentsModal.classList.remove('hidden');
            commentsModal.classList.add('flex');
            loadComments(id);
        }

        function closeCommentsModal() {
            commentsModal.classList.add('hidden');
            commentsModal.classList.remove('flex');
            currentCommentTaskId = null;
            currentTaskComments = [];
            commentContentInput.value = '';
        }

        async function loadComments(taskIdValue) {
            try {
                const response = await fetch('/api/tasks/' + taskIdValue + '/comments', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    currentTaskComments = extractCollection(result.data);
                    renderComments();
                } else {
                    commentsList.innerHTML = '<div class="text-sm text-red-500">Impossible de charger les commentaires.</div>';
                }
            } catch (error) {
                commentsList.innerHTML = '<div class="text-sm text-red-500">Erreur serveur.</div>';
            }
        }

        function renderComments() {
            commentsList.innerHTML = '';

            if (currentTaskComments.length === 0) {
                commentsList.innerHTML = '<div class="text-sm text-slate-400">Aucun commentaire pour le moment.</div>';
                return;
            }

            currentTaskComments.forEach(function (comment) {
                const item = document.createElement('div');
                item.className = 'rounded-[20px] border border-slate-200 bg-[#fffaf3] p-4';

                const authorName = comment.user && comment.user.name ? comment.user.name : 'Utilisateur';
                const canManage = currentUser && String(currentUser.id) === String(comment.user_id);

                item.innerHTML = `
                    <div class="flex items-start justify-between gap-4">
                        <div class="min-w-0">
                            <p class="text-sm font-black">${escapeHtml(authorName)}</p>
                            <p class="text-xs text-slate-400 mt-1">${comment.created_at ? formatDateTime(comment.created_at) : ''}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            ${canManage ? `<button onclick="editComment(${comment.id})" class="text-xs font-semibold text-[#8f6b43] hover:underline">Modifier</button>` : ''}
                            ${canManage ? `<button onclick="deleteCommentItem(${comment.id})" class="text-xs font-semibold text-red-500 hover:underline">Supprimer</button>` : ''}
                        </div>
                    </div>
                    <p class="text-sm text-slate-600 mt-3 leading-6">${escapeHtml(comment.content || '')}</p>
                `;

                commentsList.appendChild(item);
            });
        }

        async function createComment() {
            if (!currentCommentTaskId) {
                showMessage('Aucune tâche sélectionnée.', 'error');
                return;
            }

            if (!commentContentInput.value.trim()) {
                showMessage('Veuillez écrire un commentaire.', 'error');
                return;
            }

            try {
                const response = await fetch('/api/comments', {
                    method: 'POST',
                    headers: {
                        ...getAuthHeaders(),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        task_id: currentCommentTaskId,
                        content: commentContentInput.value.trim(),
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    commentContentInput.value = '';
                    showMessage('Commentaire ajouté avec succès.', 'success');
                    closeCommentsModal();
                } else {
                    showMessage(result.message || 'Impossible d’ajouter le commentaire.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }

        async function editComment(commentId) {
            const comment = currentTaskComments.find(function (item) {
                return String(item.id) === String(commentId);
            });

            if (!comment) {
                return;
            }

            const newContent = window.prompt('Modifier le commentaire', comment.content || '');

            if (newContent === null) {
                return;
            }

            if (!newContent.trim()) {
                showMessage('Le commentaire ne peut pas être vide.', 'error');
                return;
            }

            try {
                const response = await fetch('/api/comments/' + commentId, {
                    method: 'PUT',
                    headers: {
                        ...getAuthHeaders(),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        content: newContent.trim(),
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Commentaire modifié avec succès.', 'success');
                    loadComments(currentCommentTaskId);
                } else {
                    showMessage(result.message || 'Impossible de modifier le commentaire.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }

        async function deleteCommentItem(commentId) {
            const confirmed = window.confirm('Supprimer ce commentaire ?');

            if (!confirmed) {
                return;
            }

            try {
                const response = await fetch('/api/comments/' + commentId, {
                    method: 'DELETE',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Commentaire supprimé avec succès.', 'success');
                    loadComments(currentCommentTaskId);
                } else {
                    showMessage(result.message || 'Erreur lors de la suppression.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
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
                const dateA = normalizeTaskDate(a.due_date) || '9999-12-31';
                const dateB = normalizeTaskDate(b.due_date) || '9999-12-31';
                return dateA.localeCompare(dateB);
            });

            sorted.forEach(function (task) {
                const date = normalizeTaskDate(task.due_date) || 'Sans date';

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

        function normalizeTaskDate(value) {
            if (!value) {
                return '';
            }

            if (typeof value === 'string') {
                return value.slice(0, 10);
            }

            return '';
        }

        function extractCollection(payload) {
            if (Array.isArray(payload)) {
                return payload;
            }

            if (payload && Array.isArray(payload.data)) {
                return payload.data;
            }

            return [];
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
