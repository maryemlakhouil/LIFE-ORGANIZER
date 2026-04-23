<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes tâches - Parent</title>
    @vite(['resources/css/app.css'])
    <style>
        .parent-theme .bg-white { background-color: #fffaf3 !important; }
        .parent-theme .bg-blue-600,
        .parent-theme .bg-blue-500 { background-color: #8f6b43 !important; }
        .parent-theme .hover\:bg-blue-700:hover { background-color: #795936 !important; }
        .parent-theme .bg-blue-100,
        .parent-theme .bg-blue-50,
        .parent-theme .hover\:bg-blue-50:hover { background-color: #efe2cf !important; }
        .parent-theme .bg-slate-100,
        .parent-theme .bg-slate-200,
        .parent-theme .hover\:bg-slate-100:hover,
        .parent-theme .hover\:bg-slate-200:hover,
        .parent-theme .bg-\[\#f7f8fb\],
        .parent-theme .bg-\[\#f7f9fc\],
        .parent-theme .bg-\[\#f4f7fb\] { background-color: #f3e8d9 !important; }
        .parent-theme .text-blue-600,
        .parent-theme .text-blue-700,
        .parent-theme .hover\:text-blue-600:hover { color: #8f6b43 !important; }
        .parent-theme .text-blue-300,
        .parent-theme .text-blue-100 { color: #b08a5f !important; }
        .parent-theme .text-slate-900 { color: #2f281f !important; }
        .parent-theme .text-slate-800,
        .parent-theme .text-slate-700 { color: #5d4c39 !important; }
        .parent-theme .text-slate-600,
        .parent-theme .text-slate-500 { color: #6d5c49 !important; }
        .parent-theme .text-slate-400,
        .parent-theme .text-slate-300 { color: #9a8469 !important; }
        .parent-theme .border-slate-100,
        .parent-theme .border-slate-200,
        .parent-theme .border-slate-300,
        .parent-theme .border-blue-100 { border-color: #eadfce !important; }
        .parent-theme .focus\:border-blue-500:focus { border-color: #8f6b43 !important; }
        .parent-theme .shadow-blue-600\/20 { box-shadow: 0 12px 24px rgba(143, 107, 67, 0.18) !important; }
    </style>
</head>

<body class="parent-theme bg-[#f7f0e7] text-[#2f281f] min-h-screen">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-[270px] bg-[#fffaf3] border-r border-[#eadfce] hidden lg:flex flex-col">
            <div class="px-7 pt-7 pb-7">
                <div class="flex items-center gap-4">
                    <div class="w-9 h-9 rounded-2xl bg-[#8f6b43] flex items-center justify-center shadow-sm">
                        <svg class="w-5 h-5 text-[#fffaf3]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-lg font-black leading-tight tracking-tight">Family Organiser</h1>
                    </div>
                </div>
            </div>

            <div class="px-5 pt-12">
                <div class="flex items-center gap-4 mb-10">
                    <div id="familyAvatar" class="w-12 h-12 rounded-2xl bg-[#efe2cf] flex items-center justify-center text-base font-black text-[#8f6b43]">
                        F
                    </div>

                    <div>
                        <p id="familyName" class="text-xl font-black leading-none mb-1">Ma famille</p>
                        <p class="text-[#9a8469] text-sm font-semibold">Premium plan</p>
                    </div>
                </div>

                <nav class="space-y-5">
                    <a href="{{ route('parent.dashboard') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <svg class="w-5 h-5 text-[#b08a5f]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('parent.tasks') }}" class="flex items-center gap-4 bg-[#efe2cf] text-[#8f6b43] px-6 py-3.5 rounded-[26px] text-lg font-black shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14H3V6a2 2 0 0 1 2-2Z"/>
                        </svg>
                        <span>Planning</span>
                    </a>

                    <a href="{{ route('parent.calendar') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <svg class="w-5 h-5 text-[#b08a5f]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14H3V6a2 2 0 0 1 2-2Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 14h3M8 18h8M14 14h2"/>
                        </svg>
                        <span>Calendrier</span>
                    </a>

                    <a href="{{ route('parent.messages') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <svg class="w-5 h-5 text-[#b08a5f]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>
                        </svg>
                        <span>Messagerie</span>
                    </a>

                    <a href="{{ route('parent.family') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <svg class="w-5 h-5 text-[#b08a5f]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 11l9-8 9 8"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10v10h14V10"/>
                        </svg>
                        <span>Profile Famille</span>
                    </a>

                    <a href="{{ route('parent.nannies') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <svg class="w-5 h-5 text-[#b08a5f]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="7" r="4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 21a7 7 0 0 1 14 0"/>
                        </svg>
                        <span>Nounous</span>
                    </a>

                    <a href="{{ route('parent.nanny-profile') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <svg class="w-5 h-5 text-[#b08a5f]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14c3.5 0 6 1.7 6 4v1H6v-1c0-2.3 2.5-4 6-4Z"/>
                            <circle cx="12" cy="8" r="3"/>
                        </svg>
                        <span>Profil nounou</span>
                    </a>
                </nav>
            </div>

            <div class="mt-auto px-7 pb-10">
                <div class="space-y-4 text-sm">
                    <button class="flex items-center gap-3 text-[#5d4c39] hover:text-[#8f6b43]">
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
            <header class="bg-[#fffaf3]/90 backdrop-blur px-6 md:px-8 py-5 flex items-center justify-between border-b border-[#eadfce]">
                <div>
                    <h2 class="text-2xl font-black mb-1">Mes tâches</h2>
                    <p class="text-[#9a8469] text-base font-semibold">Planifiez et suivez les tâches familiales</p>
                </div>

                <button id="openCreateModalBtn" class="bg-[#8f6b43] hover:bg-[#795936] text-white px-6 py-2.5 rounded-full text-base font-bold shadow-lg shadow-[#8f6b43]/20">
                    + Ajouter une tache
                </button>
            </header>

            <main class="p-5 md:p-8">

                <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

                <!-- STATS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-5">
                        <p class="text-slate-500 text-sm mb-2">Total des tâches</p>
                        <p id="totalTasksCount" class="text-3xl font-black">0</p>
                    </div>

                    <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-5">
                        <p class="text-slate-500 text-sm mb-2">En cours / en attente</p>
                        <p id="activeTasksCount" class="text-3xl font-black text-blue-600">0</p>
                    </div>

                    <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-5">
                        <p class="text-slate-500 text-sm mb-2">Terminées</p>
                        <p id="completedTasksCount" class="text-3xl font-black text-green-600">0</p>
                    </div>
                </div>

                <!-- FILTERS -->
                <section class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-5 mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Recherche</label>
                            <input id="searchInput" type="text" placeholder="Titre ou description"
                                   class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Statut</label>
                            <select id="statusFilter" class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                                <option value="">Tous</option>
                                <option value="pending">En attente</option>
                                <option value="in_progress">En cours</option>
                                <option value="completed">Terminée</option>
                                <option value="cancelled">Annulée</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Priorité</label>
                            <select id="priorityFilter" class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                                <option value="">Toutes</option>
                                <option value="low">Faible</option>
                                <option value="medium">Moyenne</option>
                                <option value="high">Haute</option>
                            </select>
                        </div>

                        <div class="flex items-end gap-3">
                            <button id="applyFiltersBtn" class="flex-1 rounded-2xl bg-blue-600 text-white py-3 font-semibold">
                                Filtrer
                            </button>
                            <button id="resetFiltersBtn" class="flex-1 rounded-2xl border border-slate-300 bg-white py-3 font-semibold">
                                Réinitialiser
                            </button>
                        </div>
                    </div>
                </section>

                <!-- TASKS LIST -->
                <section class="bg-white rounded-[24px] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
                        <h3 class="text-xl font-black">Liste des tâches</h3>
                        <span id="tasksCountLabel" class="text-slate-500">0 tâche(s)</span>
                    </div>

                    <div id="tasksList" class="divide-y divide-slate-200">
                        <div class="px-6 py-8 text-center text-slate-400">
                            Chargement...
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- MODAL -->
    <div id="taskModal" class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center px-4">
        <div class="bg-white rounded-[24px] w-full max-w-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 id="modalTitle" class="text-2xl font-black">Créer une tâche</h3>
                <button id="closeModalBtn" class="text-2xl text-slate-400 hover:text-slate-700">×</button>
            </div>

            <form id="taskForm" class="space-y-5">
                <input type="hidden" id="taskId">

                <div>
                    <label for="taskTitle" class="block text-sm text-slate-500 mb-2">Titre</label>
                    <input id="taskTitle" type="text"
                           class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                </div>

                <div>
                    <label for="taskDescription" class="block text-sm text-slate-500 mb-2">Description</label>
                    <textarea id="taskDescription" rows="4"
                              class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="taskPriority" class="block text-sm text-slate-500 mb-2">Priorité</label>
                        <select id="taskPriority" class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                            <option value="low">Faible</option>
                            <option value="medium" selected>Moyenne</option>
                            <option value="high">Haute</option>
                        </select>
                    </div>

                    <div>
                        <label for="taskStatus" class="block text-sm text-slate-500 mb-2">Statut</label>
                        <select id="taskStatus" class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                            <option value="pending">En attente</option>
                            <option value="in_progress">En cours</option>
                            <option value="completed">Terminée</option>
                            <option value="cancelled">Annulée</option>
                        </select>
                    </div>

                    <div>
                        <label for="taskDueDate" class="block text-sm text-slate-500 mb-2">Date d'échéance</label>
                        <input id="taskDueDate" type="date"
                               class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                    </div>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" id="cancelModalBtn" class="flex-1 border border-slate-300 rounded-2xl py-3 font-semibold">
                        Annuler
                    </button>
                    <button type="submit" id="saveTaskBtn" class="flex-1 bg-blue-600 text-white rounded-2xl py-3 font-semibold">
                        Enregistrer
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!--La Partie js de cette page des taches -->

    <script>
        const familyName = document.getElementById('familyName');
        const familyAvatar = document.getElementById('familyAvatar');
        const logoutBtn = document.getElementById('logoutBtn');
        

        const totalTasksCount = document.getElementById('totalTasksCount');
        const activeTasksCount = document.getElementById('activeTasksCount');
        const completedTasksCount = document.getElementById('completedTasksCount');
        const tasksCountLabel = document.getElementById('tasksCountLabel');

        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const priorityFilter = document.getElementById('priorityFilter');
        const applyFiltersBtn = document.getElementById('applyFiltersBtn');
        const resetFiltersBtn = document.getElementById('resetFiltersBtn');

        const tasksList = document.getElementById('tasksList');
        const messageBox = document.getElementById('messageBox');

        const taskModal = document.getElementById('taskModal');
        const openCreateModalBtn = document.getElementById('openCreateModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelModalBtn = document.getElementById('cancelModalBtn');
        const modalTitle = document.getElementById('modalTitle');
        const taskForm = document.getElementById('taskForm');

        const taskId = document.getElementById('taskId');
        const taskTitle = document.getElementById('taskTitle');
        const taskDescription = document.getElementById('taskDescription');
        const taskPriority = document.getElementById('taskPriority');
        const taskStatus = document.getElementById('taskStatus');
        const taskDueDate = document.getElementById('taskDueDate');

        let allTasks = [];
        let filteredTasks = [];

        document.addEventListener('DOMContentLoaded', function () {
            guardParentAccess();
            loadParentInfo();
            loadTasks();

            if (new URLSearchParams(window.location.search).get('create') === '1') {
                openCreateModal();
            }
        });

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('access_token');
            localStorage.removeItem('user');
            window.location.href = '/login';
        });

        openCreateModalBtn.addEventListener('click', function () {
            openCreateModal();
        });

        closeModalBtn.addEventListener('click', closeModal);
        cancelModalBtn.addEventListener('click', closeModal);

        applyFiltersBtn.addEventListener('click', function () {
            applyFilters();
        });

        resetFiltersBtn.addEventListener('click', function () {
            searchInput.value = '';
            statusFilter.value = '';
            priorityFilter.value = '';
            applyFilters();
        });

        taskForm.addEventListener('submit', function (e) {
            e.preventDefault();

            if (taskId.value === '') {
                createTask();
            } else {
                updateTask();
            }
        });

        function getToken() {
            return localStorage.getItem('access_token');
        }

        function getStoredUser() {
            try {
                return JSON.parse(localStorage.getItem('user'));
            } catch (error) {
                return null;
            }
        }

        function getAuthHeaders() {
            return {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + getToken()
            };
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

        function loadParentInfo() {
            const user = getStoredUser();

            if (user) {
                familyName.textContent = user.name || 'Ma famille';
                familyAvatar.textContent = getInitials(user.name || 'Famille');
            }
        }

        async function loadTasks() {
            tasksList.innerHTML = `
                <div class="px-6 py-8 text-center text-slate-400">
                    Chargement...
                </div>
            `;

            try {
                const response = await fetch('/api/tasks', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    allTasks = result.data.data || [];
                    applyFilters();
                } else if (response.status === 401 || response.status === 403) {
                    window.location.href = '/login';
                } else {
                    tasksList.innerHTML = `
                        <div class="px-6 py-8 text-center text-red-500">
                            Impossible de charger les tâches.
                        </div>
                    `;
                }
            } catch (error) {
                tasksList.innerHTML = `
                    <div class="px-6 py-8 text-center text-red-500">
                        Erreur serveur.
                    </div>
                `;
            }
        }
        // Filtrer les tâches selon : texte recherché && statut && priorité

        function applyFilters() {
            const search = searchInput.value.trim().toLowerCase();
            const status = statusFilter.value;
            const priority = priorityFilter.value;
        
            filteredTasks = allTasks.filter(function (task) {
                // vrai si la tâche respecte recherche && vrai status
                let matchesSearch = true;
                let matchesStatus = true;
                let matchesPriority = true;

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

                return matchesSearch && matchesStatus && matchesPriority;
            });

            renderStats();
            renderTasks();
        }
        // mettre à jour les statistiques affichées
        function renderStats() {
            const total = allTasks.length;
            const active = allTasks.filter(function (task) {
                return task.status === 'pending' || task.status === 'in_progress';
            }).length;
            const completed = allTasks.filter(function (task) {
                return task.status === 'completed';
            }).length;

            totalTasksCount.textContent = total;
            activeTasksCount.textContent = active;
            completedTasksCount.textContent = completed;
            tasksCountLabel.textContent = filteredTasks.length + ' tâche(s)';
        }
        // afficher les tâches dans la page HTML 
        function renderTasks() {
            tasksList.innerHTML = '';

            if (filteredTasks.length === 0) {
                tasksList.innerHTML = `
                    <div class="px-6 py-8 text-center text-slate-400">
                        Aucune tâche trouvée.
                    </div>
                `;
                return;
            }

            filteredTasks.forEach(function (task) {
                const item = document.createElement('div');
                item.className = 'px-6 py-5';

                item.innerHTML = `
                    <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5">
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <h4 class="text-lg font-black">${escapeHtml(task.title || '')}</h4>
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

                            <div class="flex flex-wrap gap-6 text-sm text-slate-400">
                                <span>Échéance : ${task.due_date ? formatDate(getTaskDueDate(task)) : '-'}</span>
                                <span>Créée le : ${task.created_at ? formatDateTime(task.created_at) : '-'}</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button
                                class="px-4 py-2 rounded-full bg-blue-50 text-sm font-semibold text-blue-600"
                                onclick="openEditModal(${task.id})"
                            >
                                Modifier
                            </button>

                            <button
                                class="px-4 py-2 rounded-full bg-green-50 text-sm font-semibold text-green-600"
                                onclick="markAsCompleted(${task.id})"
                            >
                                Terminer
                            </button>

                            <button
                                class="px-4 py-2 rounded-full bg-red-50 text-sm font-semibold text-red-600"
                                onclick="deleteTask(${task.id})"
                            >
                                Supprimer
                            </button>
                        </div>
                    </div>
                `;

                tasksList.appendChild(item);
            });
        }

        // Nouvelle tache model
        function openCreateModal() {
            modalTitle.textContent = 'Créer une tâche';
            // vider les champs
            taskId.value = '';
            taskTitle.value = '';
            taskDescription.value = '';
            taskPriority.value = 'medium';
            taskStatus.value = 'pending';
            taskDueDate.value = '';
            taskModal.classList.remove('hidden');
            taskModal.classList.add('flex');
        }

        // Model Pour MOdifier les taches 
        function openEditModal(id) {
            const task = allTasks.find(function (item) {
                return item.id === id;
            });

            if (!task) return;

            modalTitle.textContent = 'Modifier la tâche';
            taskId.value = task.id;
            taskTitle.value = task.title || '';
            taskDescription.value = task.description || '';
            taskPriority.value = task.priority || 'medium';
            taskStatus.value = task.status || 'pending';
            taskDueDate.value = getTaskDueDate(task);

            taskModal.classList.remove('hidden');
            taskModal.classList.add('flex');
        }

        function closeModal() {
            taskModal.classList.add('hidden');
            taskModal.classList.remove('flex');
        }
        // creer tache
        async function createTask() {
            try {
                const response = await fetch('/api/tasks', {
                    method: 'POST',
                    headers: {
                        ...getAuthHeaders(),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        title: taskTitle.value.trim(),
                        description: taskDescription.value.trim(),
                        priority: taskPriority.value,
                        status: taskStatus.value,
                        due_date: taskDueDate.value || null
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Tâche créée avec succès.', 'success');
                    closeModal();
                    loadTasks();
                } else {
                    showMessage(readErrors(result), 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }
        // modifier une tache

        async function updateTask() {
            try {
                const response = await fetch('/api/tasks/' + taskId.value, {
                    method: 'PUT',
                    headers: {
                        ...getAuthHeaders(),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        title: taskTitle.value.trim(),
                        description: taskDescription.value.trim(),
                        priority: taskPriority.value,
                        status: taskStatus.value,
                        due_date: taskDueDate.value || null
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Tâche mise à jour avec succès.', 'success');
                    closeModal();
                    loadTasks();
                } else {
                    showMessage(readErrors(result), 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }
        // comme complete 

        async function markAsCompleted(id) {
            try {
                const response = await fetch('/api/tasks/' + id + '/status', {
                    method: 'PATCH',
                    headers: {
                        ...getAuthHeaders(),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        status: 'completed'
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Tâche marquée comme terminée.', 'success');
                    loadTasks();
                } else {
                    showMessage(result.message || 'Erreur lors du changement de statut.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }
        // 
        async function deleteTask(id) {
            const confirmed = confirm('Voulez-vous vraiment supprimer cette tâche ?');

            if (!confirmed) return;

            try {
                const response = await fetch('/api/tasks/' + id, {
                    method: 'DELETE',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Tâche supprimée avec succès.', 'success');
                    loadTasks();
                } else {
                    showMessage(result.message || 'Erreur lors de la suppression.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }
        // couleur de status
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
            return priority;
        }

        function formatDate(dateString) {
            const date = new Date(dateString + 'T00:00:00');
            return date.toLocaleDateString('fr-FR', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
        }
        // date fin d'une tache
        function getTaskDueDate(task) {
            if (!task || !task.due_date) {
                return '';
            }

            return String(task.due_date).substring(0, 10);
        }
        // format de date
        function formatDateTime(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('fr-FR', {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
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
        // sécuriser un texte avant de l’afficher remplace 
        function escapeHtml(text) {
            return String(text)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }
        // lire les erreurs envoyées par le backend/AP 
        
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
