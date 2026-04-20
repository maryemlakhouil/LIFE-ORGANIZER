<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapports Admin - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#f5f7fb] min-h-screen text-slate-800">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-[240px] bg-white border-r border-slate-200 hidden lg:flex flex-col">
            <div class="h-16 flex items-center px-8 border-b border-slate-200">
                <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </div>
                <h1 class="text-xl font-bold">Family Organizer</h1>
            </div>

            <div class="px-6 pt-7">
                <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-4">Menu principal</p>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <span>▦</span>
                        <span>Tableau de bord</span>
                    </a>

                    <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <span>◉</span>
                        <span>Utilisateurs</span>
                    </a>

                    <a href="{{ route('admin.reports') }}" class="flex items-center gap-3 px-4 py-3 rounded-full bg-blue-600 text-white font-medium shadow">
                        <span>▣</span>
                        <span>Rapports</span>
                    </a>
                </nav>

                <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mt-10 mb-4">Système</p>

                <nav class="space-y-2">
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <span>⚙</span>
                        <span>Paramètres</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <span>🛡</span>
                        <span>Sécurité</span>
                    </a>
                </nav>
            </div>

            <div class="mt-auto p-5">
                <button id="logoutBtn" class="w-full bg-red-50 text-red-600 border border-red-200 rounded-full py-3 font-semibold hover:bg-red-100">
                    Se déconnecter
                </button>
            </div>
        </aside>

        <!-- MAIN -->
        <div class="flex-1 flex flex-col">

            <!-- TOPBAR -->
            <header class="h-16 bg-white border-b border-slate-200 px-5 md:px-8 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Rapports</h2>
                </div>

                <div class="hidden md:flex items-center gap-4 border-l border-slate-200 pl-6">
                    <div class="text-right">
                        <p class="text-sm font-bold text-slate-900" id="adminName">Admin</p>
                        <p class="text-xs text-slate-500" id="adminRole">admin</p>
                    </div>

                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700">
                        A
                    </div>
                </div>
            </header>

            <!-- CONTENT -->
            <main class="p-5 md:p-8">

                <div class="mb-8">
                    <h3 class="text-3xl md:text-4xl font-bold text-slate-900 mb-2">Exports et rapports</h3>
                    <p class="text-sm md:text-base text-slate-500">
                        Téléchargez les rapports PDF des utilisateurs et des tâches.
                    </p>
                </div>

                <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

                <!-- SUMMARY -->
                <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-7">
                    <div class="bg-white rounded-[18px] border border-slate-200 p-5 shadow-sm">
                        <p class="text-slate-500 text-sm font-semibold mb-2">Utilisateurs</p>
                        <p id="usersCount" class="text-3xl font-bold text-slate-900">0</p>
                    </div>

                    <div class="bg-white rounded-[18px] border border-slate-200 p-5 shadow-sm">
                        <p class="text-slate-500 text-sm font-semibold mb-2">Familles</p>
                        <p id="familiesCount" class="text-3xl font-bold text-slate-900">0</p>
                    </div>

                    <div class="bg-white rounded-[18px] border border-slate-200 p-5 shadow-sm">
                        <p class="text-slate-500 text-sm font-semibold mb-2">Tâches</p>
                        <p id="tasksCount" class="text-3xl font-bold text-slate-900">0</p>
                    </div>

                    <div class="bg-white rounded-[18px] border border-slate-200 p-5 shadow-sm">
                        <p class="text-slate-500 text-sm font-semibold mb-2">Messages</p>
                        <p id="messagesCount" class="text-3xl font-bold text-slate-900">0</p>
                    </div>
                </section>

                <!-- REPORT CARDS -->
                <section class="grid grid-cols-1 xl:grid-cols-2 gap-6">

                    <!-- USERS REPORT -->
                    <div class="bg-white rounded-[20px] border border-slate-200 shadow-sm p-5">
                        <div class="flex items-start justify-between gap-4 mb-5">
                            <div>
                                <h4 class="text-xl font-bold text-slate-900 mb-2">Rapport des utilisateurs</h4>
                                <p class="text-sm text-slate-500">
                                    Export complet des utilisateurs avec rôle, statut et date de création.
                                </p>
                            </div>
                           
                        </div>

                        <div class="space-y-2 mb-5 text-sm text-slate-600">
                            <p>• Total utilisateurs</p>
                            <p>• Parents / Nounous / Admins</p>
                            <p>• Utilisateurs actifs et inactifs</p>
                        </div>

                        <div class="flex gap-3">
                            <button id="downloadUsersPdfBtn" class="flex-1 rounded-2xl bg-blue-600 text-white py-2.5 text-sm font-semibold hover:bg-blue-700">
                                Télécharger PDF
                            </button>
                        </div>
                    </div>

                    <!-- TASKS REPORT -->
                    <div class="bg-white rounded-[20px] border border-slate-200 shadow-sm p-5">
                        <div class="flex items-start justify-between gap-4 mb-5">
                            <div>
                                <h4 class="text-xl font-bold text-slate-900 mb-2">Rapport des tâches</h4>
                                <p class="text-sm text-slate-500">
                                    Export des tâches avec priorité, statut, enfant associé et utilisateur affecté.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-2 mb-5 text-sm text-slate-600">
                            <p>• Tâches en attente, en cours, terminées</p>
                            <p>• Priorité et échéance</p>
                            <p>• Parent créateur et nounou affectée</p>
                        </div>

                        <div class="flex gap-3">
                            <button id="downloadTasksPdfBtn" class="flex-1 rounded-2xl bg-blue-600 text-white py-2.5 text-sm font-semibold hover:bg-blue-700">
                                Télécharger PDF
                            </button>
                        </div>
                    </div>

                </section>

                <!-- OPTIONAL FUTURE REPORTS -->
                <section class="mt-7 bg-white rounded-[20px] border border-slate-200 shadow-sm p-5">
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Rapports futurs</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-slate-500">
                        <div class="rounded-2xl bg-[#f8fafc] border border-slate-200 p-3.5">
                            Rapport des commentaires
                        </div>
                        <div class="rounded-2xl bg-[#f8fafc] border border-slate-200 p-3.5">
                            Rapport des conversations
                        </div>
                        <div class="rounded-2xl bg-[#f8fafc] border border-slate-200 p-3.5">
                            Rapport global par période
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script>
        const messageBox = document.getElementById('messageBox');
        const logoutBtn = document.getElementById('logoutBtn');

        const usersCount = document.getElementById('usersCount');
        const familiesCount = document.getElementById('familiesCount');
        const tasksCount = document.getElementById('tasksCount');
        const messagesCount = document.getElementById('messagesCount');

        const downloadUsersPdfBtn = document.getElementById('downloadUsersPdfBtn');
        const downloadTasksPdfBtn = document.getElementById('downloadTasksPdfBtn');

        document.addEventListener('DOMContentLoaded', function () {
            guardAdminAccess();
            loadAdminInfo();
            loadDashboardStats();
        });

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('access_token');
            localStorage.removeItem('user');
            window.location.href = '/login';
        });

        downloadUsersPdfBtn.addEventListener('click', function () {
            downloadReport('users');
        });

        downloadTasksPdfBtn.addEventListener('click', function () {
            downloadReport('tasks');
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

        function guardAdminAccess() {
            const token = getToken();
            const user = getStoredUser();

            if (!token || !user) {
                window.location.href = '/login';
                return;
            }

            if (user.role !== 'admin') {
                window.location.href = '/';
            }
        }

        function loadAdminInfo() {
            const user = getStoredUser();

            if (user) {
                document.getElementById('adminName').textContent = user.name || 'Admin';
                document.getElementById('adminRole').textContent = user.role || 'admin';
            }
        }

        async function loadDashboardStats() {
            const token = getToken();

            try {
                const response = await fetch('/api/admin/dashboard', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    const stats = result.data;

                    usersCount.textContent = stats.users.total || 0;
                    familiesCount.textContent = stats.families.total || 0;
                    tasksCount.textContent = stats.tasks.total || 0;
                    messagesCount.textContent = stats.communication.messages || 0;
                } else {
                    showMessage(result.message || 'Impossible de charger les statistiques.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur lors du chargement des statistiques.', 'error');
            }
        }

        async function downloadReport(type) {
            const token = getToken();
            let url = '';

            if (type === 'users') {
                url = '/api/admin/reports/users/pdf';
            } else if (type === 'tasks') {
                url = '/api/admin/reports/tasks/pdf';
            }

            try {
                const response = await fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/pdf, application/json',
                        'Authorization': 'Bearer ' + token
                    }
                });

                if (!response.ok) {
                    let message = 'Erreur lors du téléchargement du rapport.';

                    try {
                        const errorData = await response.json();
                        message = errorData.message || message;
                    } catch (error) {
                        message = response.status === 401 ? 'Session expirée. Veuillez vous reconnecter.' : message;
                    }

                    showMessage(message, 'error');
                    return;
                }

                const blob = await response.blob();
                const fileURL = window.URL.createObjectURL(blob);

                const link = document.createElement('a');
                link.href = fileURL;

                if (type === 'users') {
                    link.download = 'rapport_utilisateurs.pdf';
                } else {
                    link.download = 'rapport_taches.pdf';
                }

                document.body.appendChild(link);
                link.click();
                link.remove();

                window.URL.revokeObjectURL(fileURL);

                showMessage('Rapport téléchargé avec succès.', 'success');
            } catch (error) {
                showMessage('Erreur serveur lors du téléchargement.', 'error');
            }
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
