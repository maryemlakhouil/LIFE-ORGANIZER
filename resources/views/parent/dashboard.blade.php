<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Parent - Family Organizer</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,500,0,0" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        .parent-dashboard-theme .bg-white { background-color: #fffaf3 !important; }
        .parent-dashboard-theme .bg-blue-600 { background-color: #8f6b43 !important; }
        .parent-dashboard-theme .bg-blue-700,
        .parent-dashboard-theme .hover\:bg-blue-700:hover { background-color: #795936 !important; }
        .parent-dashboard-theme .bg-blue-100,
        .parent-dashboard-theme .bg-blue-50,
        .parent-dashboard-theme .hover\:bg-blue-50:hover { background-color: #efe2cf !important; }
        .parent-dashboard-theme .bg-blue-300\/70 { background-color: rgba(216, 199, 174, 0.78) !important; }
        .parent-dashboard-theme .bg-slate-100,
        .parent-dashboard-theme .bg-slate-200 { background-color: #f3e8d9 !important; }
        .parent-dashboard-theme .text-blue-600,
        .parent-dashboard-theme .hover\:text-blue-600:hover { color: #8f6b43 !important; }
        .parent-dashboard-theme .text-blue-300 { color: #b08a5f !important; }
        .parent-dashboard-theme .text-slate-900 { color: #2f281f !important; }
        .parent-dashboard-theme .text-slate-700 { color: #5d4c39 !important; }
        .parent-dashboard-theme .text-slate-600 { color: #6d5c49 !important; }
        .parent-dashboard-theme .text-slate-500,
        .parent-dashboard-theme .text-slate-400 { color: #9a8469 !important; }
        .parent-dashboard-theme .border-slate-100,
        .parent-dashboard-theme .border-slate-200 { border-color: #eadfce !important; }
        .parent-dashboard-theme .shadow-blue-600\/20 { box-shadow: 0 12px 24px rgba(143, 107, 67, 0.18) !important; }
    </style>
</head>

<body class="parent-dashboard-theme bg-[#f7f0e7] text-[#2f281f] min-h-screen">

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
                        <p id="familyName" class="text-xl font-black leading-none mb-1">The Andersons</p>
                        <p id="familyPlan" class="text-[#9a8469] text-sm font-semibold">Premium plan</p>
                    </div>
                </div>

                <nav class="space-y-5">
                    <a href="{{ route('parent.dashboard') }}" class="flex items-center gap-4 bg-[#efe2cf] text-[#8f6b43] px-6 py-3.5 rounded-[26px] text-lg font-black shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('parent.tasks') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <svg class="w-5 h-5 text-[#b08a5f]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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
                        <span>Profil famille</span>
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
                            <circle cx="12" cy="7" r="4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 21a7 7 0 0 1 14 0"/>
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
                    <h2 class="text-2xl font-black mb-1">Dashboard Parent</h2>
                    <p id="todayDate" class="text-[#9a8469] text-base font-semibold">Mardi 24 Octobre</p>
                </div>

                <div class="flex items-center gap-4 md:gap-5">
                    <button id="notificationsBtn" class="relative text-[#5d4c39] hover:text-[#8f6b43]">
                        <span class="material-symbols-rounded !text-[24px]">notifications</span>
                        <span id="notificationsBadge" class="hidden absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 rounded-full bg-[#8f6b43] text-white text-[10px] font-black flex items-center justify-center">
                            0
                        </span>
                    </button>
                    <button id="addTaskBtn" class="bg-[#8f6b43] hover:bg-[#795936] text-white px-6 py-2.5 rounded-full text-base font-bold shadow-lg shadow-[#8f6b43]/20">
                        + Ajouter une tâche
                    </button>
                </div>
            </header>

            <main class="p-5 md:p-8">
                <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

                <!-- TOP AREA -->
                <div class="grid grid-cols-1 xl:grid-cols-4 gap-5 mb-8">

                    <!-- PROGRESS -->
                    <section class="xl:col-span-3 bg-[#fffaf3] rounded-[30px] shadow-[0_8px_24px_rgba(99,73,43,0.08)] border border-[#eadfce] p-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
                            <h3 class="text-lg font-black">Progression quotidienne</h3>
                            <div class="bg-[#efe2cf] text-[#8f6b43] px-6 py-2 rounded-full text-base font-bold">
                                <span id="progressPercent">0 % terminé</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-3">
                            <p id="progressDayLabel" class="text-base">Aujourd'hui</p>
                            <p id="progressRatio" class="text-base font-bold text-[#8f6b43]">0/0</p>
                        </div>

                        <div class="w-full h-2.5 bg-[#f3e8d9] rounded-full overflow-hidden mb-5">
                            <div id="progressBar" class="h-full bg-[#8f6b43] rounded-full" style="width: 0%;"></div>
                        </div>

                        <p id="progressText" class="text-sm text-[#6d5c49] mb-7">
                            Aucune tâche planifiée pour aujourd’hui.
                        </p>

                        <div id="todayTasksPreview" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-[#f3e8d9] rounded-2xl px-5 py-3.5 text-[#9a8469] text-sm">
                                Pas encore de tâches aujourd’hui
                            </div>
                        </div>
                    </section>

                    <!-- QUICK LINKS -->
                    <section class="bg-gradient-to-br from-[#8f6b43] to-[#b98e5d] rounded-[30px] text-white shadow-[0_8px_24px_rgba(143,107,67,0.20)] p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold mb-16">Liens rapides</h3>
                        </div>

                        <div class="space-y-3">
                            <button id="createTaskQuickBtn" class="w-full bg-[#fffaf3] text-[#8f6b43] rounded-full py-2.5 text-base font-bold flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                                </svg>
                                Créer une tâche
                            </button>

                            <button id="messageNannyBtn" class="w-full bg-white/25 text-white rounded-full py-2.5 text-base font-bold flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4 7 8 6 8-6"/>
                                </svg>
                                Message nounou
                            </button>

                            <button id="nannyProfileQuickBtn" class="w-full bg-white/15 text-white rounded-full py-2.5 text-base font-bold flex items-center justify-center gap-2 hover:bg-white/20">
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
                    <section class="bg-[#fffaf3] rounded-[28px] shadow-[0_8px_24px_rgba(99,73,43,0.08)] border border-[#eadfce] overflow-hidden">
                        <div class="px-6 pt-6 pb-5 flex items-center justify-between">
                            <h3 class="text-xl font-black">Activité récente</h3>
                            <a href="#" class="text-[#8f6b43] font-bold text-sm">Voir tout</a>
                        </div>

                        <div id="recentActivityList" class="divide-y divide-[#eadfce]">
                            <div class="px-7 py-5">
                                <p class="text-base font-bold">Chargement...</p>
                                <p class="text-[#9a8469] text-sm mt-1">Veuillez patienter</p>
                            </div>
                        </div>
                    </section>

                    <!-- WEEK -->
                    <section class="bg-[#fffaf3] rounded-[28px] shadow-[0_8px_24px_rgba(99,73,43,0.08)] border border-[#eadfce] p-6">
                        <h3 class="text-xl font-black mb-7">La semaine à venir</h3>

                        <div id="weekDaysRow" class="grid grid-cols-7 gap-2 text-center mb-7"></div>

                        <div id="weekTasksList" class="space-y-4">
                            <div class="text-[#9a8469] text-sm">Aucune tâche à venir.</div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>

    <div id="notificationsPanel" class="hidden fixed inset-0 z-50 bg-black/20">
        <div class="absolute right-4 top-4 md:right-8 md:top-20 w-[calc(100%-2rem)] max-w-[420px] rounded-[28px] border border-[#eadfce] bg-[#fffaf3] shadow-[0_18px_40px_rgba(86,67,44,0.18)] overflow-hidden">
            <div class="px-6 py-5 border-b border-[#eadfce] flex items-center justify-between gap-4">
                <div>
                    <h3 class="text-xl font-black">Notifications</h3>
                    <p class="text-sm text-[#9a8469]">Demandes, messages et réponses importantes.</p>
                </div>
                <button id="closeNotificationsPanelBtn" class="text-[#9a8469] hover:text-[#5d4c39]">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>

            <div class="px-6 py-4 border-b border-[#eadfce] flex items-center justify-between gap-4">
                <p class="text-sm font-semibold text-[#6d5c49]">
                    <span id="notificationsSummary">0 notification</span>
                </p>
                <button id="markAllNotificationsReadBtn" class="text-sm font-bold text-[#8f6b43] hover:underline">
                    Tout marquer comme lu
                </button>
            </div>

            <div class="px-6 py-4 border-b border-[#eadfce] flex flex-wrap gap-2">
                <button data-filter="all" class="notification-filter-btn rounded-full bg-[#8f6b43] text-white px-4 py-2 text-xs font-black">
                    Toutes
                </button>
                <button data-filter="reservations" class="notification-filter-btn rounded-full bg-[#efe2cf] text-[#8f6b43] px-4 py-2 text-xs font-black">
                    Réservations
                </button>
                <button data-filter="messages" class="notification-filter-btn rounded-full bg-[#efe2cf] text-[#8f6b43] px-4 py-2 text-xs font-black">
                    Messages
                </button>
                <button data-filter="tasks" class="notification-filter-btn rounded-full bg-[#efe2cf] text-[#8f6b43] px-4 py-2 text-xs font-black">
                    Tâches
                </button>
            </div>

            <div id="notificationsPanelList" class="max-h-[70vh] overflow-y-auto divide-y divide-[#eadfce]">
                <div class="px-6 py-6 text-sm text-[#9a8469]">Chargement...</div>
            </div>
        </div>
    </div>
    
    <!--La Partie js de la page dashboard du parent -->
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
        const notificationsBtn = document.getElementById('notificationsBtn');
        const notificationsBadge = document.getElementById('notificationsBadge');
        const notificationsPanel = document.getElementById('notificationsPanel');
        const closeNotificationsPanelBtn = document.getElementById('closeNotificationsPanelBtn');
        const markAllNotificationsReadBtn = document.getElementById('markAllNotificationsReadBtn');
        const notificationsPanelList = document.getElementById('notificationsPanelList');
        const notificationsSummary = document.getElementById('notificationsSummary');
        const notificationFilterButtons = Array.from(document.querySelectorAll('.notification-filter-btn'));
        const messageBox = document.getElementById('messageBox');

        let allTasks = [];
        let allNotifications = [];
        let currentNotificationFilter = 'all';
        let realtimeNotificationsUserId = null;

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

        notificationsBtn.addEventListener('click', function () {
            notificationsPanel.classList.remove('hidden');
            renderNotificationsPanel();
        });

        closeNotificationsPanelBtn.addEventListener('click', function () {
            notificationsPanel.classList.add('hidden');
        });

        notificationsPanel.addEventListener('click', function (event) {
            if (event.target === notificationsPanel) {
                notificationsPanel.classList.add('hidden');
            }
        });

        markAllNotificationsReadBtn.addEventListener('click', async function () {
            try {
                const response = await fetch('/api/notifications/read-all', {
                    method: 'PATCH',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    allNotifications = allNotifications.map(function (notification) {
                        return {
                            ...notification,
                            read_at: notification.read_at || new Date().toISOString()
                        };
                    });
                    renderNotificationsBadge();
                    renderNotificationsPanel();
                    renderRecentActivity();
                    showMessage(result.message || 'Notifications mises à jour.', 'success');
                } else {
                    showMessage(result.message || 'Impossible de marquer les notifications.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur lors de la mise à jour des notifications.', 'error');
            }
        });

        notificationFilterButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                currentNotificationFilter = button.dataset.filter || 'all';
                updateNotificationFilterButtons();
                renderNotificationsPanel();
            });
        });

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

        // Afficher date du jour 
        function renderTodayDate() {
            const now = new Date();
            const options = {
                weekday: 'long',
                day: 'numeric',
                month: 'long'
            };
            // lundi 21 avril

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
                subscribeToRealtimeNotifications(user);
            }
        }

        // Charger taches API 
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

        // Charger notifications 
        async function loadNotifications() {
            try {
                const response = await fetch('/api/notifications', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    allNotifications = result.data.data || [];
                    renderNotificationsBadge();
                    renderRecentActivity();
                    renderNotificationsPanel();
                } else {
                    renderNotificationsBadge();
                    renderRecentActivity();
                    renderNotificationsPanel();
                }
            } catch (error) {
                renderNotificationsBadge();
                renderRecentActivity();
                renderNotificationsPanel();
            }
        }

        function subscribeToRealtimeNotifications(user) {
            if (!user || !user.id || !window.Realtime) {
                return;
            }

            if (realtimeNotificationsUserId && realtimeNotificationsUserId !== user.id) {
                window.Realtime.leaveUserNotifications(realtimeNotificationsUserId);
            }

            if (realtimeNotificationsUserId === user.id) {
                return;
            }

            realtimeNotificationsUserId = user.id;

            window.Realtime.listenUserNotifications(user.id, {
                notification(notification) {
                    pushRealtimeNotification(notification);
                },
                error() {
                    console.warn('Impossible d ecouter les notifications temps reel.');
                }
            });
        }

        function pushRealtimeNotification(notification) {
            const normalized = normalizeIncomingNotification(notification);

            if (!normalized) {
                return;
            }

            allNotifications = [
                normalized,
                ...allNotifications.filter(function (item) {
                    return String(item.id) !== String(normalized.id);
                })
            ];

            renderNotificationsBadge();
            renderRecentActivity();
            renderNotificationsPanel();
            showMessage((normalized.data && normalized.data.title) ? normalized.data.title : 'Nouvelle notification reçue.', 'success');
        }

        function normalizeIncomingNotification(notification) {
            if (!notification) {
                return null;
            }

            if (notification.data) {
                return {
                    id: notification.id || 'rt-' + Date.now(),
                    data: notification.data,
                    read_at: notification.read_at || null,
                    created_at: notification.created_at || new Date().toISOString()
                };
            }

            return {
                id: notification.id || 'rt-' + Date.now(),
                data: notification,
                read_at: null,
                created_at: new Date().toISOString()
            };
        }

        // Progression du jour 
        function renderDailyProgress() {

            const today = new Date();
            const todayString = formatDate(today);

            // Garde seulement taches du jour
            const todayTasks = allTasks.filter(function (task) {
                return getTaskDueDate(task) === todayString;
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

        // Mini aperçu taches du jour 
        
        function renderTodayTasksPreview(tasks) {
            todayTasksPreview.innerHTML = '';

            if (tasks.length === 0) {
                todayTasksPreview.innerHTML = `
                    <div class="bg-slate-100 rounded-3xl px-5 py-4 text-slate-500 text-sm">
                        Pas encore de taches aujourd’hui
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

        // afficher les notifications recente

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
            // On Prend les 3 plus récentes
            const latest = allNotifications.slice(0, 3);

            latest.forEach(function (notification) {
                const item = document.createElement('div');
                item.className = 'px-7 py-5';

                const meta = getNotificationMeta(notification);
                const title = meta.title;
                const subtitle = meta.subtitle;
                let time = '';

                if (notification.created_at) {
                    time = formatDateTime(notification.created_at);
                }

                item.innerHTML = `
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 rounded-full ${meta.bgClass} flex items-center justify-center ${meta.textClass}">
                            <span class="material-symbols-rounded !text-[16px]">${meta.icon}</span>
                        </div>
                        <div>
                            <p class="text-base font-semibold">${escapeHtml(title)}</p>
                            <p class="text-slate-600 text-sm mt-1">${escapeHtml(subtitle)}</p>
                            <p class="text-slate-400 text-sm mt-1">${time}</p>
                        </div>
                    </div>
                `;

                recentActivityList.appendChild(item);
            });
        }

        function renderNotificationsBadge() {
            const unreadCount = allNotifications.filter(function (notification) {
                return !notification.read_at;
            }).length;

            if (unreadCount <= 0) {
                notificationsBadge.classList.add('hidden');
                notificationsBadge.textContent = '0';
                return;
            }

            notificationsBadge.classList.remove('hidden');
            notificationsBadge.textContent = unreadCount > 9 ? '9+' : String(unreadCount);
        }

        function renderNotificationsPanel() {
            if (!notificationsPanelList || !notificationsSummary) {
                return;
            }

            notificationsPanelList.innerHTML = '';
            const visibleNotifications = getFilteredNotifications();
            notificationsSummary.textContent = visibleNotifications.length + ' notification' + (visibleNotifications.length > 1 ? 's' : '');

            if (visibleNotifications.length === 0) {
                notificationsPanelList.innerHTML = '<div class="px-6 py-6 text-sm text-[#9a8469]">Aucune notification pour le moment.</div>';
                return;
            }

            visibleNotifications.forEach(function (notification) {
                const meta = getNotificationMeta(notification);
                const item = document.createElement('div');
                item.className = 'px-6 py-5';

                item.innerHTML = `
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-2xl ${meta.bgClass} ${meta.textClass} flex items-center justify-center shrink-0">
                            <span class="material-symbols-rounded !text-[18px]">${meta.icon}</span>
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="text-sm font-black">${escapeHtml(meta.title)}</p>
                                    <p class="text-sm text-[#6d5c49] mt-1 leading-6">${escapeHtml(meta.subtitle)}</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    ${notification.read_at ? '' : '<span class="w-2.5 h-2.5 rounded-full bg-[#8f6b43] shrink-0"></span>'}
                                </div>
                            </div>

                            <div class="flex items-center justify-between gap-3 mt-3">
                                <p class="text-xs text-[#9a8469]">${formatDateTime(notification.created_at)}</p>
                                <div class="flex items-center gap-2">
                                    ${notification.read_at ? '' : `<button onclick="markNotificationAsRead('${notification.id}')" class="text-xs font-bold text-[#8f6b43] hover:underline">Marquer comme lu</button>`}
                                    ${meta.actionLabel ? `<button onclick="${meta.actionHandler}" class="text-xs font-bold text-[#8f6b43] hover:underline">${meta.actionLabel}</button>` : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                notificationsPanelList.appendChild(item);
            });
        }

        function getFilteredNotifications() {
            if (currentNotificationFilter === 'all') {
                return allNotifications;
            }

            return allNotifications.filter(function (notification) {
                const type = (notification.data && notification.data.type) ? notification.data.type : '';

                if (currentNotificationFilter === 'reservations') {
                    return type === 'nanny_reservation_response' || type === 'nanny_reservation_request';
                }

                if (currentNotificationFilter === 'messages') {
                    return type === 'new_message';
                }

                if (currentNotificationFilter === 'tasks') {
                    return type === 'task_assigned' || type === 'task_overdue';
                }

                return true;
            });
        }

        function updateNotificationFilterButtons() {
            notificationFilterButtons.forEach(function (button) {
                const isActive = button.dataset.filter === currentNotificationFilter;
                button.className = isActive
                    ? 'notification-filter-btn rounded-full bg-[#8f6b43] text-white px-4 py-2 text-xs font-black'
                    : 'notification-filter-btn rounded-full bg-[#efe2cf] text-[#8f6b43] px-4 py-2 text-xs font-black';
            });
        }

        async function markNotificationAsRead(notificationId) {
            try {
                const response = await fetch('/api/notifications/' + notificationId + '/read', {
                    method: 'PATCH',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (!response.ok) {
                    showMessage(result.message || 'Impossible de mettre à jour la notification.', 'error');
                    return;
                }

                allNotifications = allNotifications.map(function (notification) {
                    if (String(notification.id) !== String(notificationId)) {
                        return notification;
                    }

                    return {
                        ...notification,
                        read_at: result.data.read_at || new Date().toISOString()
                    };
                });

                renderNotificationsBadge();
                renderNotificationsPanel();
                renderRecentActivity();
            } catch (error) {
                showMessage('Erreur serveur lors de la mise à jour de la notification.', 'error');
            }
        }

        function getNotificationMeta(notification) {
            const data = notification.data || {};
            const type = data.type || 'generic';

            if (type === 'nanny_reservation_response') {
                const accepted = data.status === 'accepted';

                return {
                    title: data.title || (accepted ? 'Réservation acceptée' : 'Réservation refusée'),
                    subtitle: data.message || 'Réponse de la nounou concernant votre demande.',
                    icon: accepted ? 'verified' : 'cancel',
                    bgClass: accepted ? 'bg-[#e6f3df]' : 'bg-[#fff1ed]',
                    textClass: accepted ? 'text-[#456b35]' : 'text-[#b55348]',
                    actionLabel: accepted ? 'Voir nounou' : 'Voir liste',
                    actionHandler: accepted
                        ? "window.location.href='{{ route('parent.nanny-profile') }}'"
                        : "window.location.href='{{ route('parent.nannies') }}'"
                };
            }

            if (type === 'new_message') {
                return {
                    title: data.title || 'Nouveau message',
                    subtitle: data.message || data.content || 'Vous avez reçu un nouveau message.',
                    icon: 'chat',
                    bgClass: 'bg-[#efe2cf]',
                    textClass: 'text-[#8f6b43]',
                    actionLabel: 'Ouvrir',
                    actionHandler: "window.location.href='{{ route('parent.messages') }}'"
                };
            }

            if (type === 'task_assigned') {
                return {
                    title: data.title || 'Tâche assignée',
                    subtitle: data.message || 'Une tâche a été assignée.',
                    icon: 'task_alt',
                    bgClass: 'bg-[#efe2cf]',
                    textClass: 'text-[#8f6b43]',
                    actionLabel: 'Voir tâches',
                    actionHandler: "window.location.href='{{ route('parent.tasks') }}'"
                };
            }

            if (type === 'task_overdue') {
                return {
                    title: data.title || 'Tâche en retard',
                    subtitle: data.message || 'Une tâche est en retard.',
                    icon: 'warning',
                    bgClass: 'bg-[#fff1ed]',
                    textClass: 'text-[#b55348]',
                    actionLabel: 'Voir tâches',
                    actionHandler: "window.location.href='{{ route('parent.tasks') }}'"
                };
            }

            return {
                title: data.title || 'Notification',
                subtitle: data.message || 'Nouvelle activité sur votre compte.',
                icon: 'notifications',
                bgClass: 'bg-[#efe2cf]',
                textClass: 'text-[#8f6b43]',
                actionLabel: '',
                actionHandler: ''
            };
        }

        // afficher les 7 jours de la semaine
        function renderWeekDays() {
            weekDaysRow.innerHTML = '';

            const base = new Date();
            const monday = getMonday(base);

            const labels = ['lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
            // si lendi 21 => [21,22,23,24...]
            for (let i = 0; i < 7; i++) {
                const day = new Date(monday);
                day.setDate(monday.getDate() + i);

                const label = document.createElement('div');
                label.className = 'text-center';

                const dayName = labels[i];
                // Numéro du jour 
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

            const weekStart = formatDate(monday);
            const weekEnd = formatDate(sunday);

            // filter les tahces de la semaine
            const weekTasks = allTasks.filter(function (task) {
                const dueDate = getTaskDueDate(task);

                return dueDate && dueDate >= weekStart && dueDate <= weekEnd;
            }).sort(function (a, b) {
                return getTaskDueDate(a).localeCompare(getTaskDueDate(b));
            });

            if (weekTasks.length === 0) {
                weekTasksList.innerHTML = `
                    <div class="text-slate-400 text-sm">Aucune tâche prévue cette semaine.</div>
                `;
                return;
            }
            // garder max 4 tahces 
            weekTasks.slice(0, 4).forEach(function (task) {
                const colorClass = getTaskColor(task.priority);

                const item = document.createElement('div');
                item.className = 'flex items-start gap-4';

                item.innerHTML = `
                    <div class="w-2 rounded-full h-12 ${colorClass}"></div>
                    <div>
                        <p class="text-base font-semibold">${task.title}</p>
                        <p class="text-slate-400 text-sm mt-1">${formatTaskDate(getTaskDueDate(task))}</p>
                    </div>
                `;

                weekTasksList.appendChild(item);
            });
        }
        // couleur de la prierotie
        function getTaskColor(priority) {
            if (priority === 'high') return 'bg-red-500';
            if (priority === 'medium') return 'bg-blue-600';
            if (priority === 'low') return 'bg-green-500';
            return 'bg-slate-300';
        }
        // d = 0 et j = 4 ==>d = 4-1=3 
        // date = 18 => 18 - 3 = (lundi de la semaine 15 ) 

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
                month: 'short' // comme janv
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
        
        // Recuperer la date de la tache 
        function getTaskDueDate(task) {
            if (!task || !task.due_date) {
                return '';
            }
            return String(task.due_date).substring(0, 10);
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
