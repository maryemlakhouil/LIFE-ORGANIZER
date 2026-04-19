<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#f5f7fb] min-h-screen text-slate-800">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-[240px] bg-white border-r border-slate-200 hidden lg:flex flex-col">
            <div class="h-16 flex items-center px-8 border-b border-slate-200">
                <!-- logo -->
                <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </div>
                <h1 class="text-xl font-bold">Family Organizer</h1>
            </div>

            <!-- Menu -->
            <div class="px-6 pt-7">
                <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-4">Menu principal</p>

                <nav class="space-y-2">
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full bg-blue-600 text-white font-medium shadow">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4zM14 14h6v6h-6z"/>
                        </svg>
                        <span>Tableau de bord</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/>
                            <circle cx="10" cy="7" r="4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                        <span>Utilisateurs</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5V4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h8M8 10h8M8 14h5"/>
                        </svg>
                        <span>Rapports</span>
                    </a>
                </nav>

                <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mt-10 mb-4">Système</p>

                <nav class="space-y-2">
                    <!-- Parametres-->
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="3"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 0-.4 1.1V21a2 2 0 1 1-4 0v-.09A1.7 1.7 0 0 0 8.6 19.4a1.7 1.7 0 0 0-1.88.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-.6-1 1.7 1.7 0 0 0-1.1-.4H3a2 2 0 1 1 0-4h.09A1.7 1.7 0 0 0 4.6 8.6a1.7 1.7 0 0 0-.34-1.88l-.06-.06A2 2 0 1 1 7.03 3.83l.06.06A1.7 1.7 0 0 0 9 4.6a1.7 1.7 0 0 0 1-.6 1.7 1.7 0 0 0 .4-1.1V3a2 2 0 1 1 4 0v.09A1.7 1.7 0 0 0 15 4.6a1.7 1.7 0 0 0 1.88-.34l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.7 1.7 0 0 0 19.4 9c.22.35.57.58 1 .6h.6a2 2 0 1 1 0 4h-.09A1.7 1.7 0 0 0 19.4 15Z"/>
                        </svg>
                        <span>Paramètres</span>
                    </a>
                    <!-- Sécurite-->
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/>
                        </svg>
                        <span>Sécurité</span>
                    </a>
                </nav>
            </div>
            <!-- Besoin d'aide-->
            <div class="mt-auto p-5">
                <div class="bg-[#f2f6ff] border border-slate-200 rounded-[22px] p-4">
                    <h3 class="text-blue-600 font-bold mb-1">Besoin d'aide ?</h3>
                    <p class="text-xs text-slate-500 leading-5 mb-4">
                        Consultez la documentation technique de l'organisateur.
                    </p>
                    <button class="w-full bg-white border border-slate-300 rounded-full py-2.5 text-sm font-semibold">
                        Guide Admin
                    </button>
                </div>
            </div>
        </aside>

        <!-- main -->
        <div class="flex-1 flex flex-col">

            <!-- TOPBAR -->
            <header class="h-16 bg-white border-b border-slate-200 px-5 md:px-8 flex items-center justify-between">
                <!--Recherche-->
                <div class="flex items-center gap-4 w-full max-w-xl">
                    <div class="hidden md:flex items-center bg-[#f4f7fb] rounded-full px-5 py-2.5 w-full max-w-[300px]">
                        <svg class="w-4 h-4 text-slate-400 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"/>
                            <path stroke-linecap="round" d="m21 21-4.35-4.35"/>
                        </svg>
                        <input
                            type="text" id="searchInput" placeholder="Rechercher..."
                            class="bg-transparent w-full outline-none text-sm text-slate-600"
                        >
                    </div>
                </div>

                <div class="flex items-center gap-4 md:gap-6 ml-4">
                    <button class="w-10 h-10 rounded-full bg-[#f4f7fb] flex items-center justify-center text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2a2 2 0 0 1-.6 1.4L4 17h5"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 21h4"/>
                        </svg>
                    </button>

                    <button class="w-10 h-10 rounded-full bg-[#f4f7fb] flex items-center justify-center text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="3"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 0-.4 1.1V21a2 2 0 1 1-4 0v-.09A1.7 1.7 0 0 0 8.6 19.4a1.7 1.7 0 0 0-1.88.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-.6-1 1.7 1.7 0 0 0-1.1-.4H3a2 2 0 1 1 0-4h.09A1.7 1.7 0 0 0 4.6 8.6a1.7 1.7 0 0 0-.34-1.88l-.06-.06A2 2 0 1 1 7.03 3.83l.06.06A1.7 1.7 0 0 0 9 4.6a1.7 1.7 0 0 0 1-.6 1.7 1.7 0 0 0 .4-1.1V3a2 2 0 1 1 4 0v.09A1.7 1.7 0 0 0 15 4.6a1.7 1.7 0 0 0 1.88-.34l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.7 1.7 0 0 0 19.4 9c.22.35.57.58 1 .6h.6a2 2 0 1 1 0 4h-.09A1.7 1.7 0 0 0 19.4 15Z"/>
                        </svg>
                    </button>

                    <div class="hidden md:flex items-center gap-4 border-l border-slate-200 pl-6">
                        <div class="text-right">
                            <p class="text-sm font-bold text-slate-900" id="adminName">Admin Principal</p>
                            <p class="text-xs text-slate-500" id="adminRole">Super Admin</p>
                        </div>

                        <div class="w-10 h-10 rounded-full bg-blue-100 overflow-hidden flex items-center justify-center font-bold text-blue-700">
                            A
                        </div>
                    </div>
                </div>
            </header>

            <!-- CONTENT de dashboard -->

            <main class="p-5 md:p-8">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-7">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-2">Tableau de bord</h2>
                        <p class="text-slate-500 text-sm md:text-base">
                            Bienvenue dans l'administration de l'Organisateur Familial.
                        </p>
                    </div>

                    <div class="flex gap-3">
                        <button id="exportBtn" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-slate-300 bg-white text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v12m0 0 4-4m-4 4-4-4M4 21h16"/>
                            </svg>
                            Exporter
                        </button>
                        <button id="newUserBtn" class="px-5 py-2.5 rounded-full bg-blue-600 text-white text-sm font-semibold shadow">
                            + Nouvel Utilisateur
                        </button>
                    </div>
                </div>

                <!-- STATS -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">

                    <!--Totale Utilisateurs-->
                    <div class="bg-white rounded-[18px] border border-slate-200 p-6 shadow-sm">
                        <p class="text-slate-500 text-sm font-semibold mb-2">Utilisateurs totaux</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <p id="totalUsers" class="text-3xl font-bold text-slate-900">0</p>
                                <p class="text-sm text-slate-400 mt-3" id="newUsersInfo">0 nouveaux cette semaine</p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-100 flex items-center justify-center">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/>
                                    <circle cx="10" cy="7" r="4"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- Tache actives-->
                    <div class="bg-white rounded-[18px] border border-slate-200 p-6 shadow-sm">
                        <p class="text-slate-500 text-sm font-semibold mb-2">Tâches actives</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <p id="activeTasks" class="text-3xl font-bold text-slate-900">0</p>
                                <p class="text-sm text-slate-400 mt-3" id="completionInfo">Taux de complétion 0%</p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-100 flex items-center justify-center">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-5"/>
                                    <circle cx="12" cy="12" r="9"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!--Croissance mensuelle-->
                    <div class="bg-white rounded-[18px] border border-slate-200 p-6 shadow-sm">
                        <p class="text-slate-500 text-sm font-semibold mb-2">Croissance mensuelle</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <p id="growthValue" class="text-3xl font-bold text-slate-900">+0%</p>
                                <p class="text-sm text-slate-400 mt-3">Projection : fin du trimestre</p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-100 flex items-center justify-center">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 17l6-6 4 4 6-8"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 7h6v6"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TABLE + ACTIVITY -->
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

                    <!-- USERS TABLE -->
                    <section class="xl:col-span-2 bg-white rounded-[18px] border border-slate-200 shadow-sm overflow-hidden">
                        <!-- Tableau de gestion des Users-->
                        <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
                            <h3 class="flex items-center gap-2 text-lg font-bold text-slate-900">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/>
                                    <circle cx="10" cy="7" r="4"/>
                                </svg>
                                Gestion des Utilisateurs
                            </h3>
                            <div class="text-slate-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="5" r="1.8"/>
                                    <circle cx="12" cy="12" r="1.8"/>
                                    <circle cx="12" cy="19" r="1.8"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Body de ce tableau-->
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-[#fafbfd]">
                                    <tr class="text-left text-slate-400 uppercase text-xs">
                                        <th class="px-6 py-4">Nom & prénom</th>
                                        <th class="px-6 py-4">Rôle</th>
                                        <th class="px-6 py-4">Statut</th>
                                        <th class="px-6 py-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="usersTableBody">
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-slate-400">
                                            Chargement...
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination des users-->

                        <div class="px-6 py-5 border-t border-slate-200 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <p class="text-sm text-slate-500" id="usersCountInfo">Affichage des utilisateurs</p>

                            <div class="flex gap-3">
                                <button id="prevPageBtn" class="px-5 py-2 rounded-full border border-slate-300 bg-white text-sm font-semibold">
                                    Précédent
                                </button>
                                <button id="nextPageBtn" class="px-5 py-2 rounded-full border border-slate-300 bg-white text-sm font-semibold">
                                    Suivant
                                </button>
                            </div>
                        </div>

                    </section>

                    <!-- RECENT ACTIVITY -->
                    <section class="bg-white rounded-[18px] border border-slate-200 shadow-sm overflow-hidden">
                        <div class="px-6 py-5 border-b border-slate-200">
                            <h3 class="flex items-center gap-2 text-lg font-bold text-slate-900">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12a9 9 0 1 0 3-6.7"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4v5h5M12 7v5l3 2"/>
                                </svg>
                                Activités Récentes
                            </h3>
                        </div>

                        <div id="activityList" class="p-6 space-y-6">
                            <div class="flex gap-3">
                                <span class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12M6 12h12"/>
                                    </svg>
                                </span>
                                <div>
                                <p class="font-semibold text-slate-900">Chargement...</p>
                                <p class="text-sm text-slate-400 mt-1">Veuillez patienter</p>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </main>
        </div>
    </div>

    <!-- La partie js de dashboard admin-->

    <script>

        // les variables 
        const searchInput = document.getElementById('searchInput');
        const usersTableBody = document.getElementById('usersTableBody');
        const usersCountInfo = document.getElementById('usersCountInfo');
        const prevPageBtn = document.getElementById('prevPageBtn');
        const nextPageBtn = document.getElementById('nextPageBtn');
        const exportBtn = document.getElementById('exportBtn');
        const newUserBtn = document.getElementById('newUserBtn');

        const totalUsers = document.getElementById('totalUsers');
        const newUsersInfo = document.getElementById('newUsersInfo');
        const activeTasks = document.getElementById('activeTasks');
        const completionInfo = document.getElementById('completionInfo');
        const growthValue = document.getElementById('growthValue');
        const activityList = document.getElementById('activityList');

        let currentPage = 1;
        let currentSearch = '';
        let lastPage = 1;
        // vérifier si admin connecté && afficher nom admin && charger statistiques && charger liste utilisateur

        document.addEventListener('DOMContentLoaded', function () {
            guardAdminAccess();
            loadAdminInfo();
            loadDashboardStats();
            loadUsers();
        });

        searchInput.addEventListener('input', function () {
            currentSearch = searchInput.value.trim();
            currentPage = 1;
            loadUsers();
        });

        prevPageBtn.addEventListener('click', function () {
            if (currentPage > 1) {
                currentPage--;
                loadUsers();
            }
        });

        nextPageBtn.addEventListener('click', function () {
            if (currentPage < lastPage) {
                currentPage++;
                loadUsers();
            }
        });

        exportBtn.addEventListener('click', function () {
            downloadReport('/api/admin/reports/users/pdf');
        });

        newUserBtn.addEventListener('click', function () {
            window.location.href = '{{ route('register') }}';
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
        // Protection accès admin 

        function guardAdminAccess() {
            const token = getToken();
            const user = JSON.parse(localStorage.getItem('user'));
            // c'est pas connecte 
            if (!token || !user) {
                window.location.href = '{{ route('login') }}';
                return;
            }
            // Si connecté mais pas admin
            if (user.role !== 'admin') {
                window.location.href = '/';
            }
        }

        // Charger infos admin

        function loadAdminInfo() {
            const user = JSON.parse(localStorage.getItem('user'));

            if (user) {
                document.getElementById('adminName').textContent = user.name || 'Admin';
                document.getElementById('adminRole').textContent = user.role || 'admin';
            }
        }

        // Charger statistiques dashboard Appelle API : /api/admin/dashboard
        // attendre la réponse du serveur , Sans bloquer toute la page

        async function loadDashboardStats() {
            try {
                const response = await fetch('/api/admin/dashboard', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    // Stocker données
                    const stats = result.data;
                    // 4 nouveaux cette semaine 

                    totalUsers.textContent = stats.users.total;
                    newUsersInfo.textContent = stats.recent_activity.new_users_last_7_days + ' nouveaux cette semaine';
                    // Tâches
                    const pending = stats.tasks.pending || 0;
                    const inProgress = stats.tasks.in_progress || 0;
                    const completed = stats.tasks.completed || 0;
                    const totalTaskCount = stats.tasks.total || 0;
                    // Tâches actives
                    const activeCount = pending + inProgress;
                    activeTasks.textContent = activeCount;

                    // Taux de complétion : completed /total * 100 
                    
                    let completionRate = 0;
                    if (totalTaskCount > 0) {
                        completionRate = Math.round((completed / totalTaskCount) * 100);
                    }
                 
                    completionInfo.textContent = 'Taux de complétion ' + completionRate + '%';
                    // Croissance utilisateurs

                    let growth = 0;
                    if (stats.users.total > 0) {
                        growth = Math.round((stats.recent_activity.new_users_last_7_days / stats.users.total) * 100);
                    }
                    // +10%
                    growthValue.textContent = '+' + growth + '%';

                    renderActivities(stats);
                } else if (response.status === 401 || response.status === 403) {
                    window.location.href = '{{ route('login') }}';
                }
            } catch (error) {
                console.log('Erreur dashboard:', error);
            }
        }
        // afficher les activités récentes 

        function renderActivities(stats) {
            activityList.innerHTML = '';

            const activities = [
                {
                    title: 'Nouvel utilisateur inscrit',
                    text: stats.recent_activity.new_users_last_7_days + ' utilisateur(s) cette semaine',
                    color: 'bg-blue-100 text-blue-600',
                    icon: `<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12M6 12h12"/>`
                },
                {
                    title: 'Nouvelle tâche créée',
                    text: stats.recent_activity.new_tasks_last_7_days + ' tâche(s) cette semaine',
                    color: 'bg-emerald-100 text-emerald-600',
                    icon: `<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-5"/><circle cx="12" cy="12" r="9"/>`
                },
                {
                    title: 'Nouveaux messages',
                    text: stats.recent_activity.new_messages_last_7_days + ' message(s) cette semaine',
                    color: 'bg-amber-100 text-amber-600',
                    icon: `<path stroke-linecap="round" stroke-linejoin="round" d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>`
                }
            ];

            activities.forEach(function (activity) {
                const div = document.createElement('div');
                div.className = 'flex gap-3';

                div.innerHTML = `
                    <span class="w-9 h-9 rounded-full ${activity.color} flex shrink-0 items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            ${activity.icon}
                        </svg>
                    </span>
                    <div>
                        <p class="font-semibold text-slate-900">${activity.title}</p>
                        <p class="text-sm text-slate-500 mt-1">${activity.text}</p>
                    </div>
                `;

                activityList.appendChild(div);
            });
        }

        // charger la liste des utilisateurs depuis Laravel API

        async function loadUsers() {

            usersTableBody.innerHTML = `
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-slate-400">
                        Chargement...
                    </td>
                </tr>
            `;

            try {
                let url = '/api/admin/users?page=' + currentPage;
                // ali = /api/admin/users?page=1&search=ali 
                if (currentSearch !== '') {
                    url += '&search=' + encodeURIComponent(currentSearch);
                }

                const response = await fetch(url, {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    // Premier : objet pagination Laravel. Deuxième :liste utilisateurs.

                    const users = result.data.data;
                    lastPage = result.data.last_page;

                    renderUsers(users);
                    usersCountInfo.textContent = 'Affichage de ' + users.length + ' utilisateur(s) - page ' + currentPage + ' / ' + lastPage;
                } else {
                    if (response.status === 401 || response.status === 403) {
                        window.location.href = '{{ route('login') }}';
                        return;
                    }

                    usersTableBody.innerHTML = `
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-red-500">
                                Impossible de charger les utilisateurs.
                            </td>
                        </tr>
                    `;
                }
            } catch (error) {
                usersTableBody.innerHTML = `
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-red-500">
                            Erreur serveur.
                        </td>
                    </tr>
                `;
            }
        }

        // afficher les utilisateurs dans le tableau HTML

        function renderUsers(users) {
            usersTableBody.innerHTML = '';

            if (users.length === 0) {
                usersTableBody.innerHTML = `
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-400">
                            Aucun utilisateur trouvé.
                        </td>
                    </tr>
                `;
                return;
            }

            users.forEach(function (user) {
                const roleClass = getRoleClass(user.role);
                const statusDot = user.is_active ? 'bg-green-500' : 'bg-slate-300';
                const statusText = user.is_active ? 'Actif' : 'Inactif';

                const row = document.createElement('tr');
                row.className = 'border-t border-slate-100 text-sm';

                row.innerHTML = `
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700">
                                ${getInitials(user.name)}
                            </div>
                            <div>
                                <p class="font-semibold text-slate-900">${user.name}</p>
                                <p class="text-sm text-slate-400">${user.email}</p>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold ${roleClass}">
                            ${user.role.toUpperCase()}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2 text-slate-500">
                            <span class="w-2.5 h-2.5 rounded-full ${statusDot}"></span>
                            <span>${statusText}</span>
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4 text-slate-400">
                            <button title="${user.is_active ? 'Désactiver' : 'Activer'}" onclick="toggleUserStatus(${user.id}, ${user.is_active ? 'false' : 'true'})" class="hover:text-blue-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                                </svg>
                            </button>
                            <button title="Supprimer" onclick="deleteUser(${user.id})" class="hover:text-red-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 9-6 6M9 9l6 6"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                `;

                usersTableBody.appendChild(row);
            });
        }

        // afficher chaque rôle avec une couleur différente dans le tableau admin
        function getRoleClass(role) {
            if (role === 'parent') {
                return 'bg-blue-100 text-blue-600';
            }

            if (role === 'nounou') {
                return 'bg-orange-100 text-orange-500';
            }

            if (role === 'admin') {
                return 'bg-purple-100 text-purple-600';
            }

            return 'bg-slate-100 text-slate-600';
        }

        // Ali Ben   → AB

        function getInitials(name) {
            if (!name) return 'U';

            const parts = name.trim().split(' ');
            let initials = '';

            for (let i = 0; i < parts.length; i++) {
                if (parts[i].length > 0) {
                    initials += parts[i][0];
                }
            }
            // Garder seulement 2 lettres
            return initials.substring(0, 2).toUpperCase();
        }

        // activer ou désactiver un utilisateur : Envoie PATCH à Laravel 

        async function toggleUserStatus(userId, isActive) {
            try {
                const response = await fetch('/api/admin/users/' + userId + '/status', {
                    method: 'PATCH',
                    headers: {
                        ...getAuthHeaders(),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        is_active: isActive
                    })
                });

                if (response.ok) {
                    loadDashboardStats();
                    loadUsers();
                    return;
                }

                const result = await response.json();
                alert(result.message || 'Impossible de modifier le statut.');
            } catch (error) {
                alert('Erreur serveur.');
            }
        }

        // supprimer un utilisateur 

        async function deleteUser(userId) {
            if (!confirm('Voulez-vous vraiment supprimer cet utilisateur ?')) {
                return;
            }

            try {
                const response = await fetch('/api/admin/users/' + userId, {
                    method: 'DELETE',
                    headers: getAuthHeaders()
                });

                if (response.ok) {
                    loadDashboardStats();
                    loadUsers();
                    return;
                }

                const result = await response.json();
                alert(result.message || 'Impossible de supprimer cet utilisateur.');
            } catch (error) {
                alert('Erreur serveur.');
            }
        }

        // télécharger un fichier généré par le serveur

        async function downloadReport(endpoint) {
            try {
                const response = await fetch(endpoint, {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                if (!response.ok) {
                    const result = await response.json();
                    alert(result.message || 'Impossible de télécharger le rapport.');
                    return;
                }
                // Un Blob = données binaires du fichier
                // Le navigateur crée un lien temporaire vers le fichier

                const blob = await response.blob();
                const url = window.URL.createObjectURL(blob);
                const link = document.createElement('a');
                // le nom de fichier 
                link.href = url;
                link.download = 'rapport-utilisateurs.pdf';
                link.click();
                // Libérer mémoire
                window.URL.revokeObjectURL(url);
            } catch (error) {
                alert('Erreur serveur.');
            }
        }
    </script>
</body>
</html>
