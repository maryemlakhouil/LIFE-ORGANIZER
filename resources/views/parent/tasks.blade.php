<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes tâches - Parent</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#eef3f9] text-slate-900 min-h-screen">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-[320px] bg-white border-r border-slate-300 hidden lg:flex flex-col">
            <div class="px-8 pt-10 pb-8 border-b border-slate-200">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-full bg-blue-600 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-4xl font-bold leading-tight">Organisateur<br>Familial</h1>
                    </div>
                </div>
            </div>

            <div class="px-6 pt-10">
                <div class="flex items-center gap-4 mb-10">
                    <div id="familyAvatar" class="w-20 h-20 rounded-full bg-pink-100 flex items-center justify-center text-2xl font-bold text-pink-600">
                        F
                    </div>

                    <div>
                        <p id="familyName" class="text-4xl font-semibold leading-none mb-2">Ma famille</p>
                        <p class="text-slate-500 text-2xl">Premium plan</p>
                    </div>
                </div>

                <nav class="space-y-6">
                    <a href="{{ route('parent.dashboard') }}" class="flex items-center gap-4 px-6 py-4 text-2xl text-slate-800 hover:text-blue-600">
                        <span class="text-3xl text-blue-300">▦</span>
                        <span>Tableau de bord</span>
                    </a>

                    <a href="{{ route('parent.tasks') }}" class="flex items-center gap-4 bg-blue-100 text-blue-600 px-6 py-5 rounded-[36px] text-2xl font-semibold">
                        <span class="text-3xl">🗓</span>
                        <span>Planning</span>
                    </a>

                    <a href="#" class="flex items-center gap-4 px-6 py-4 text-2xl text-slate-800 hover:text-blue-600">
                        <span class="text-3xl text-blue-300">💬</span>
                        <span>Messagerie</span>
                    </a>

                    <a href="#" class="flex items-center gap-4 px-6 py-4 text-2xl text-slate-800 hover:text-blue-600">
                        <span class="text-3xl text-blue-300">📈</span>
                        <span>Rapports</span>
                    </a>
                </nav>
            </div>

            <div class="mt-auto px-8 pb-10">
                <div class="space-y-5 text-xl">
                    <button class="flex items-center gap-3 text-slate-700 hover:text-blue-600">
                        <span>⚙</span>
                        <span>Paramètres</span>
                    </button>

                    <button id="logoutBtn" class="flex items-center gap-3 text-red-500 hover:text-red-600">
                        <span>↪</span>
                        <span>Déconnexions</span>
                    </button>
                </div>
            </div>
        </aside>

        <!-- MAIN -->
        <div class="flex-1 min-w-0">
            <header class="bg-white/70 backdrop-blur border-b border-slate-200 px-6 md:px-10 py-7 flex items-center justify-between">
                <div>
                    <h2 class="text-5xl font-bold mb-2">Mes tâches</h2>
                    <p class="text-slate-400 text-3xl">Planifiez et suivez les tâches familiales</p>
                </div>

                <button id="openCreateModalBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full text-2xl font-semibold shadow-lg">
                    + Ajouter une tâche
                </button>
            </header>

            <main class="p-6 md:p-10">
                <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

                <!-- STATS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-[32px] border border-slate-200 shadow-sm p-6">
                        <p class="text-slate-500 text-xl mb-3">Total des tâches</p>
                        <p id="totalTasksCount" class="text-5xl font-bold">0</p>
                    </div>

                    <div class="bg-white rounded-[32px] border border-slate-200 shadow-sm p-6">
                        <p class="text-slate-500 text-xl mb-3">En cours / en attente</p>
                        <p id="activeTasksCount" class="text-5xl font-bold text-blue-600">0</p>
                    </div>

                    <div class="bg-white rounded-[32px] border border-slate-200 shadow-sm p-6">
                        <p class="text-slate-500 text-xl mb-3">Terminées</p>
                        <p id="completedTasksCount" class="text-5xl font-bold text-green-600">0</p>
                    </div>
                </div>

                <!-- FILTERS -->
                <section class="bg-white rounded-[32px] border border-slate-200 shadow-sm p-6 mb-8">
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
                <section class="bg-white rounded-[32px] border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
                        <h3 class="text-3xl font-bold">Liste des tâches</h3>
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
        <div class="bg-white rounded-[28px] w-full max-w-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 id="modalTitle" class="text-3xl font-bold">Créer une tâche</h3>
                <button id="closeModalBtn" class="text-3xl text-slate-400 hover:text-slate-700">×</button>
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
            checkAuth();
            loadParentInfo();
            loadTasks();
        });

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('token');
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

        function checkAuth() {
            const token = localStorage.getItem('token');
            const user = localStorage.getItem('user');

            if (!token || !user) {
                window.location.href = '/login';
            }
        }

        function loadParentInfo() {
            const user = JSON.parse(localStorage.getItem('user'));

            if (user) {
                familyName.textContent = user.name || 'Ma famille';
                familyAvatar.textContent = getInitials(user.name || 'Famille');
            }
        }

        async function loadTasks() {
            const token = localStorage.getItem('token');

            tasksList.innerHTML = `
                <div class="px-6 py-8 text-center text-slate-400">
                    Chargement...
                </div>
            `;

            try {
                const response = await fetch('http://127.0.0.1:8000/api/tasks', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    allTasks = result.data.data || [];
                    applyFilters();
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

        function applyFilters() {
            const search = searchInput.value.trim().toLowerCase();
            const status = statusFilter.value;
            const priority = priorityFilter.value;

            filteredTasks = allTasks.filter(function (task) {
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
                item.className = 'px-6 py-6';

                item.innerHTML = `
                    <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5">
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <h4 class="text-2xl font-bold">${task.title}</h4>
                                <span class="px-3 py-1 rounded-full text-xs font-bold ${getStatusClass(task.status)}">
                                    ${getStatusLabel(task.status)}
                                </span>
                                <span class="px-3 py-1 rounded-full text-xs font-bold ${getPriorityClass(task.priority)}">
                                    ${getPriorityLabel(task.priority)}
                                </span>
                            </div>

                            <p class="text-slate-600 text-lg mb-3">
                                ${task.description ? task.description : 'Aucune description'}
                            </p>

                            <div class="flex flex-wrap gap-6 text-sm text-slate-400">
                                <span>Échéance : ${task.due_date ? formatDate(task.due_date) : '-'}</span>
                                <span>Créée le : ${task.created_at ? formatDateTime(task.created_at) : '-'}</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button
                                class="px-4 py-2 rounded-full bg-blue-50 text-blue-600 font-semibold"
                                onclick="openEditModal(${task.id})"
                            >
                                Modifier
                            </button>

                            <button
                                class="px-4 py-2 rounded-full bg-green-50 text-green-600 font-semibold"
                                onclick="markAsCompleted(${task.id})"
                            >
                                Terminer
                            </button>

                            <button
                                class="px-4 py-2 rounded-full bg-red-50 text-red-600 font-semibold"
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

        function openCreateModal() {
            modalTitle.textContent = 'Créer une tâche';
            taskId.value = '';
            taskTitle.value = '';
            taskDescription.value = '';
            taskPriority.value = 'medium';
            taskStatus.value = 'pending';
            taskDueDate.value = '';
            taskModal.classList.remove('hidden');
            taskModal.classList.add('flex');
        }

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
            taskDueDate.value = task.due_date || '';

            taskModal.classList.remove('hidden');
            taskModal.classList.add('flex');
        }

        function closeModal() {
            taskModal.classList.add('hidden');
            taskModal.classList.remove('flex');
        }

        async function createTask() {
            const token = localStorage.getItem('token');

            try {
                const response = await fetch('http://127.0.0.1:8000/api/tasks', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
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

        async function updateTask() {
            const token = localStorage.getItem('token');

            try {
                const response = await fetch('http://127.0.0.1:8000/api/tasks/' + taskId.value, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
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

        async function markAsCompleted(id) {
            const token = localStorage.getItem('token');

            try {
                const response = await fetch('http://127.0.0.1:8000/api/tasks/' + id + '/status', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
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

        async function deleteTask(id) {
            const token = localStorage.getItem('token');
            const confirmed = confirm('Voulez-vous vraiment supprimer cette tâche ?');

            if (!confirmed) return;

            try {
                const response = await fetch('http://127.0.0.1:8000/api/tasks/' + id, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
                    }
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