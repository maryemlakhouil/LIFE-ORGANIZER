<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier Parent - Family Organizer</title>
    @vite(['resources/css/app.css'])
    <style>
        .parent-calendar-theme .bg-white { background-color: #fffaf3 !important; }
        .parent-calendar-theme .bg-blue-600,
        .parent-calendar-theme .bg-blue-500 { background-color: #8f6b43 !important; }
        .parent-calendar-theme .hover\:bg-blue-700:hover { background-color: #795936 !important; }
        .parent-calendar-theme .bg-blue-50,
        .parent-calendar-theme .hover\:bg-blue-50:hover,
        .parent-calendar-theme .bg-blue-100 { background-color: #efe2cf !important; }
        .parent-calendar-theme .bg-slate-100,
        .parent-calendar-theme .bg-slate-200,
        .parent-calendar-theme .bg-\[\#fafbfd\],
        .parent-calendar-theme .bg-\[\#f7f9fc\],
        .parent-calendar-theme .bg-\[\#f1f5fb\] { background-color: #f3e8d9 !important; }
        .parent-calendar-theme .text-blue-600,
        .parent-calendar-theme .hover\:text-blue-600:hover { color: #8f6b43 !important; }
        .parent-calendar-theme .text-slate-900 { color: #2f281f !important; }
        .parent-calendar-theme .text-slate-700 { color: #5d4c39 !important; }
        .parent-calendar-theme .text-slate-600,
        .parent-calendar-theme .text-slate-500 { color: #6d5c49 !important; }
        .parent-calendar-theme .text-slate-400,
        .parent-calendar-theme .text-slate-300 { color: #9a8469 !important; }
        .parent-calendar-theme .border-slate-100,
        .parent-calendar-theme .border-slate-200,
        .parent-calendar-theme .border-blue-100 { border-color: #eadfce !important; }
        .parent-calendar-theme .ring-blue-500 { --tw-ring-color: #8f6b43 !important; }
        .parent-calendar-theme select:focus { border-color: #8f6b43 !important; }
    </style>
</head>
<body class="parent-calendar-theme bg-[#f7f0e7] text-[#2f281f] min-h-screen">

    <!-- TOPBAR -->
    <header class="bg-[#fffaf3]/90 backdrop-blur border-b border-[#eadfce]">
        <div class="max-w-[1180px] mx-auto px-5 py-3 flex items-center justify-between gap-6">
            <div class="flex items-center gap-8">
                <a href="{{ route('parent.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-2xl bg-[#8f6b43] flex items-center justify-center shadow-sm">
                        <svg class="w-5 h-5 text-[#fffaf3]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <span class="text-lg font-black tracking-tight">Family Organizer</span>
                </a>

                <nav class="hidden lg:flex items-center gap-2 text-xs font-bold">
                    <a href="{{ route('parent.dashboard') }}" class="rounded-full bg-white px-4 py-2 text-[#6d5c49] hover:bg-[#efe2cf] hover:text-[#8f6b43]">Dashboard</a>
                    <a href="{{ route('parent.tasks') }}" class="rounded-full bg-white px-4 py-2 text-[#6d5c49] hover:bg-[#efe2cf] hover:text-[#8f6b43]">Tâches</a>
                    <a href="{{ route('parent.calendar') }}" class="rounded-full bg-[#8f6b43] px-4 py-2 text-white">Calendrier</a>
                    <a href="{{ route('parent.messages') }}" class="rounded-full bg-white px-4 py-2 text-[#6d5c49] hover:bg-[#efe2cf] hover:text-[#8f6b43]">Messages</a>
                    <a href="{{ route('parent.family') }}" class="rounded-full bg-white px-4 py-2 text-[#6d5c49] hover:bg-[#efe2cf] hover:text-[#8f6b43]">Famille</a>
                    <a href="{{ route('parent.nanny-profile') }}" class="rounded-full bg-white px-4 py-2 text-[#6d5c49] hover:bg-[#efe2cf] hover:text-[#8f6b43]">Nounou</a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <button id="todayShortcutBtn" class="hidden md:block px-5 py-2.5 rounded-full bg-[#8f6b43] text-white font-bold hover:bg-[#795936]">
                    Aujourd'hui
                </button>

                <button class="w-10 h-10 rounded-2xl flex items-center justify-center text-[#6d5c49] hover:bg-[#efe2cf]">
                    🔔
                </button>

                <div id="profileAvatarTop" class="w-10 h-10 rounded-2xl bg-[#d9b98c] text-white flex items-center justify-center font-black">
                    P
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-[1180px] mx-auto px-5 py-7">
        <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

        <div class="rounded-[32px] bg-gradient-to-br from-[#fffaf3] via-[#f2e3cf] to-[#d9b98c] border border-[#eadfce] p-6 md:p-8 shadow-sm overflow-hidden relative mb-7">
            <div class="absolute -right-16 -top-16 w-48 h-48 rounded-full bg-white/25"></div>
            <div class="relative flex flex-col xl:flex-row xl:items-end xl:justify-between gap-5">
                <div>
                    <p class="text-xs uppercase tracking-[0.22em] text-[#8f6b43] font-black mb-3">Planning familial</p>
                    <h1 class="text-3xl md:text-4xl font-black mb-3">Calendrier familial</h1>
                    <p class="text-[#6d5c49] text-sm md:text-base leading-7">
                    Visualisez les tâches planifiées jour par jour.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <button id="prevMonthBtn" class="px-5 py-3 rounded-full bg-[#fffaf3] border border-[#eadfce] font-bold hover:bg-[#efe2cf]">
                        ← Mois précédent
                    </button>
                    <button id="nextMonthBtn" class="px-5 py-3 rounded-full bg-[#fffaf3] border border-[#eadfce] font-bold hover:bg-[#efe2cf]">
                        Mois suivant →
                    </button>
                    <a href="{{ route('parent.tasks') }}" class="px-5 py-3 rounded-full bg-[#8f6b43] text-white font-bold hover:bg-[#795936] shadow">
                        Voir les tâches
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-[minmax(0,1fr)_340px] gap-6">
            <!-- LEFT -->
            <section class="space-y-6">

                <!-- HEADER CARD -->
                <div class="bg-[#fffaf3] border border-[#eadfce] rounded-[30px] shadow-sm p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">
                        <div>
                            <p class="text-[#b08a5f] text-xs uppercase tracking-[0.2em] font-black mb-2">Mois en cours</p>
                            <h2 id="monthLabel" class="text-3xl md:text-4xl font-black">Janvier 2026</h2>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <select id="statusFilter" class="rounded-full border border-[#eadfce] bg-white px-5 py-3 outline-none">
                                <option value="">Tous les statuts</option>
                                <option value="pending">En attente</option>
                                <option value="in_progress">En cours</option>
                                <option value="completed">Terminée</option>
                                <option value="cancelled">Annulée</option>
                            </select>

                            <button id="refreshBtn" class="px-5 py-3 rounded-full bg-[#f3e8d9] text-[#5d4c39] font-bold hover:bg-[#efe2cf]">
                                Actualiser
                            </button>
                        </div>
                    </div>
                </div>

                <!-- CALENDAR -->
                <section class="bg-[#fffaf3] border border-[#eadfce] rounded-[30px] shadow-sm overflow-hidden">
                    <div class="grid grid-cols-7 bg-[#f3e8d9] border-b border-[#eadfce] text-center text-sm font-black uppercase text-[#9a8469]">
                        <div class="py-4">Lun</div>
                        <div class="py-4">Mar</div>
                        <div class="py-4">Mer</div>
                        <div class="py-4">Jeu</div>
                        <div class="py-4">Ven</div>
                        <div class="py-4">Sam</div>
                        <div class="py-4">Dim</div>
                    </div>

                    <div id="calendarGrid" class="grid grid-cols-7"></div>
                </section>
            </section>

            <!-- RIGHT -->
            <aside class="space-y-6">

                <!-- SELECTED DAY -->
                <section class="bg-[#fffaf3] border border-[#eadfce] rounded-[30px] shadow-sm p-6">
                    <div class="mb-6">
                        <p class="text-[#b08a5f] text-xs uppercase tracking-[0.2em] font-black mb-2">Jour sélectionné</p>
                        <h3 id="selectedDateLabel" class="text-3xl font-black">Aujourd'hui</h3>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="rounded-[22px] bg-[#f8efe4] p-4 border border-[#eadfce]">
                            <p class="text-[#9a8469] text-sm mb-2">Tâches</p>
                            <p id="selectedDateTasksCount" class="text-2xl font-black">0</p>
                        </div>

                        <div class="rounded-[22px] bg-[#efe2cf] p-4 border border-[#eadfce]">
                            <p class="text-[#9a8469] text-sm mb-2">Terminées</p>
                            <p id="selectedDateCompletedCount" class="text-2xl font-black text-[#8f6b43]">0</p>
                        </div>
                    </div>

                    <div id="selectedDateTasksList" class="space-y-4">
                        <div class="text-[#9a8469]">Aucune tâche pour ce jour.</div>
                    </div>
                </section>

                <!-- UPCOMING -->
                <section class="bg-[#fffaf3] border border-[#eadfce] rounded-[30px] shadow-sm p-6">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-2xl font-black">Prochaines échéances</h3>
                        <span class="text-[#8f6b43] font-bold text-sm">7 jours</span>
                    </div>

                    <div id="upcomingTasksList" class="space-y-4">
                        <div class="text-[#9a8469]">Chargement...</div>
                    </div>
                </section>
            </aside>
        </div>
    </main>

    <script>
        const profileAvatarTop = document.getElementById('profileAvatarTop');
        const monthLabel = document.getElementById('monthLabel');
        const calendarGrid = document.getElementById('calendarGrid');
        const selectedDateLabel = document.getElementById('selectedDateLabel');
        const selectedDateTasksCount = document.getElementById('selectedDateTasksCount');
        const selectedDateCompletedCount = document.getElementById('selectedDateCompletedCount');
        const selectedDateTasksList = document.getElementById('selectedDateTasksList');
        const upcomingTasksList = document.getElementById('upcomingTasksList');
        const statusFilter = document.getElementById('statusFilter');
        const prevMonthBtn = document.getElementById('prevMonthBtn');
        const nextMonthBtn = document.getElementById('nextMonthBtn');
        const todayShortcutBtn = document.getElementById('todayShortcutBtn');
        const refreshBtn = document.getElementById('refreshBtn');
        const messageBox = document.getElementById('messageBox');

        let currentUser = null;
        let allTasks = [];
        let filteredTasks = [];
        let currentMonthDate = new Date();
        let selectedDate = formatDate(new Date());

        document.addEventListener('DOMContentLoaded', function () {
            checkAuth();
            loadUserInfo();
            loadTasks();
        });

        statusFilter.addEventListener('change', function () {
            applyFilters();
        });

        prevMonthBtn.addEventListener('click', function () {
            currentMonthDate = new Date(currentMonthDate.getFullYear(), currentMonthDate.getMonth() - 1, 1);
            renderCalendar();
        });

        nextMonthBtn.addEventListener('click', function () {
            currentMonthDate = new Date(currentMonthDate.getFullYear(), currentMonthDate.getMonth() + 1, 1);
            renderCalendar();
        });

        todayShortcutBtn.addEventListener('click', function () {
            currentMonthDate = new Date();
            selectedDate = formatDate(new Date());
            renderCalendar();
            renderSelectedDatePanel();
        });

        refreshBtn.addEventListener('click', function () {
            loadTasks();
        });

        function checkAuth() {
            const token = getToken();
            const user = localStorage.getItem('user');

            if (!token || !user) {
                window.location.href = '/login';
            }
        }

        function getToken() {
            return localStorage.getItem('access_token') || localStorage.getItem('token');
        }

        function loadUserInfo() {
            currentUser = JSON.parse(localStorage.getItem('user'));

            if (currentUser) {
                profileAvatarTop.textContent = getInitials(currentUser.name || 'P');
            }
        }

        async function loadTasks() {
            const token = getToken();

            try {
                const response = await fetch('/api/tasks', {
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
                    showMessage(result.message || 'Impossible de charger les tâches.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur lors du chargement des tâches.', 'error');
            }
        }

        function applyFilters() {
            const status = statusFilter.value;

            filteredTasks = allTasks.filter(function (task) {
                if (status !== '' && task.status !== status) {
                    return false;
                }
                return true;
            });

            renderCalendar();
            renderSelectedDatePanel();
            renderUpcomingTasks();
        }

        function renderCalendar() {
            renderMonthLabel();
            calendarGrid.innerHTML = '';

            const year = currentMonthDate.getFullYear();
            const month = currentMonthDate.getMonth();

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);

            let firstDayIndex = firstDay.getDay();
            if (firstDayIndex === 0) firstDayIndex = 7;

            const daysBefore = firstDayIndex - 1;
            const totalDays = lastDay.getDate();

            const prevMonthLastDay = new Date(year, month, 0).getDate();

            for (let i = daysBefore; i > 0; i--) {
                const dayNumber = prevMonthLastDay - i + 1;
                const cellDate = new Date(year, month - 1, dayNumber);
                calendarGrid.appendChild(createDayCell(cellDate, true));
            }

            for (let day = 1; day <= totalDays; day++) {
                const cellDate = new Date(year, month, day);
                calendarGrid.appendChild(createDayCell(cellDate, false));
            }

            const totalCellsNow = calendarGrid.children.length;
            const remaining = 42 - totalCellsNow;

            for (let day = 1; day <= remaining; day++) {
                const cellDate = new Date(year, month + 1, day);
                calendarGrid.appendChild(createDayCell(cellDate, true));
            }
        }

        function createDayCell(date, isOutsideMonth) {
            const dateString = formatDate(date);
            const isToday = dateString === formatDate(new Date());
            const isSelected = dateString === selectedDate;

            const tasksForDay = filteredTasks.filter(function (task) {
                return task.due_date === dateString;
            });

            const completedCount = tasksForDay.filter(function (task) {
                return task.status === 'completed';
            }).length;

            const cell = document.createElement('button');
            cell.type = 'button';
            cell.className = 'min-h-[135px] border-b border-r border-slate-100 p-3 text-left align-top transition hover:bg-blue-50';

            if (isOutsideMonth) {
                cell.classList.add('bg-[#fafbfd]', 'text-slate-300');
            } else {
                cell.classList.add('bg-white');
            }

            if (isSelected) {
                cell.classList.add('ring-2', 'ring-blue-500', 'ring-inset', 'bg-blue-50');
            }

            const dots = tasksForDay.slice(0, 3).map(function (task) {
                return '<span class="w-2.5 h-2.5 rounded-full ' + getTaskDotClass(task.status) + '"></span>';
            }).join('');

            const moreLabel = tasksForDay.length > 3
                ? '<span class="text-[11px] text-slate-400">+' + (tasksForDay.length - 3) + '</span>'
                : '';

            cell.innerHTML = `
                <div class="flex items-center justify-between mb-3">
                    <span class="${isToday ? 'w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold' : 'text-lg font-semibold'}">
                        ${date.getDate()}
                    </span>
                    ${tasksForDay.length > 0 ? `<span class="text-xs font-bold text-slate-400">${tasksForDay.length}</span>` : ''}
                </div>

                <div class="space-y-2">
                    ${tasksForDay.length > 0 ? `
                        <div class="flex items-center gap-2 flex-wrap">
                            ${dots}
                            ${moreLabel}
                        </div>
                        <p class="text-xs text-slate-500">${completedCount} terminée(s)</p>
                    ` : `
                        <p class="text-xs text-slate-300">Aucune tâche</p>
                    `}
                </div>
            `;

            cell.addEventListener('click', function () {
                selectedDate = dateString;
                renderCalendar();
                renderSelectedDatePanel();
            });

            return cell;
        }

        function renderMonthLabel() {
            monthLabel.textContent = currentMonthDate.toLocaleDateString('fr-FR', {
                month: 'long',
                year: 'numeric'
            }).replace(/^./, function (c) { return c.toUpperCase(); });
        }

        function renderSelectedDatePanel() {
            const tasks = filteredTasks.filter(function (task) {
                return task.due_date === selectedDate;
            });

            const completed = tasks.filter(function (task) {
                return task.status === 'completed';
            }).length;

            const dateObj = new Date(selectedDate + 'T00:00:00');
            selectedDateLabel.textContent = formatDisplayDate(dateObj);
            selectedDateTasksCount.textContent = tasks.length;
            selectedDateCompletedCount.textContent = completed;

            selectedDateTasksList.innerHTML = '';

            if (tasks.length === 0) {
                selectedDateTasksList.innerHTML = '<div class="text-slate-400">Aucune tâche pour ce jour.</div>';
                return;
            }

            tasks.forEach(function (task) {
                const item = document.createElement('div');
                item.className = 'rounded-[22px] border border-slate-200 bg-[#fafbfd] p-4';

                item.innerHTML = `
                    <div class="flex items-start justify-between gap-4 mb-3">
                        <h4 class="text-xl font-bold">${escapeHtml(task.title || '')}</h4>
                        <span class="px-3 py-1 rounded-full text-xs font-bold ${getStatusClass(task.status)}">
                            ${getStatusLabel(task.status)}
                        </span>
                    </div>

                    <p class="text-slate-500 text-sm mb-3">
                        ${task.description ? escapeHtml(task.description) : 'Aucune description'}
                    </p>

                    <div class="flex items-center justify-between gap-4">
                        <span class="text-sm font-semibold ${getPriorityTextClass(task.priority)}">
                            ${getPriorityLabel(task.priority)}
                        </span>

                        <button
                            class="px-3 py-2 rounded-full bg-blue-50 text-blue-600 text-sm font-semibold"
                            onclick="window.location.href='{{ route('parent.tasks') }}'"
                        >
                            Voir la tâche
                        </button>
                    </div>
                `;

                selectedDateTasksList.appendChild(item);
            });
        }

        function renderUpcomingTasks() {
            const today = formatDate(new Date());

            const upcoming = filteredTasks
                .filter(function (task) {
                    return task.due_date && task.due_date >= today;
                })
                .sort(function (a, b) {
                    return a.due_date.localeCompare(b.due_date);
                })
                .slice(0, 5);

            upcomingTasksList.innerHTML = '';

            if (upcoming.length === 0) {
                upcomingTasksList.innerHTML = '<div class="text-slate-400">Aucune échéance proche.</div>';
                return;
            }

            upcoming.forEach(function (task) {
                const item = document.createElement('div');
                item.className = 'rounded-[22px] bg-[#f7f9fc] border border-slate-100 p-4';

                item.innerHTML = `
                    <div class="flex items-center justify-between gap-4 mb-2">
                        <h4 class="font-bold">${escapeHtml(task.title || '')}</h4>
                        <span class="text-xs font-bold ${getPriorityTextClass(task.priority)}">
                            ${getPriorityLabel(task.priority)}
                        </span>
                    </div>
                    <p class="text-sm text-slate-500">${formatDateLabel(task.due_date)}</p>
                `;

                upcomingTasksList.appendChild(item);
            });
        }

        function getTaskDotClass(status) {
            if (status === 'completed') return 'bg-green-500';
            if (status === 'in_progress') return 'bg-blue-500';
            if (status === 'pending') return 'bg-yellow-500';
            if (status === 'cancelled') return 'bg-red-400';
            return 'bg-slate-300';
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
            return status || 'Sans statut';
        }

        function getPriorityTextClass(priority) {
            if (priority === 'high') return 'text-red-500';
            if (priority === 'medium') return 'text-slate-700';
            if (priority === 'low') return 'text-blue-600';
            return 'text-slate-500';
        }

        function getPriorityLabel(priority) {
            if (priority === 'high') return 'Haute';
            if (priority === 'medium') return 'Moyenne';
            if (priority === 'low') return 'Faible';
            return 'Sans priorité';
        }

        function getInitials(name) {
            if (!name) return 'P';

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

        function formatDisplayDate(date) {
            return date.toLocaleDateString('fr-FR', {
                weekday: 'long',
                day: 'numeric',
                month: 'long'
            }).replace(/^./, function (c) { return c.toUpperCase(); });
        }

        function formatDateLabel(dateString) {
            const date = new Date(dateString + 'T00:00:00');
            return date.toLocaleDateString('fr-FR', {
                day: 'numeric',
                month: 'long',
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
