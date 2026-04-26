<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs - Family Organizer</title>
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
        .admin-theme .bg-white { background-color: #fffaf3 !important; }
        .admin-theme .bg-blue-600,
        .admin-theme .bg-blue-500 { background-color: #8f6b43 !important; }
        .admin-theme .hover\:bg-blue-700:hover { background-color: #795936 !important; }
        .admin-theme .bg-blue-100,
        .admin-theme .bg-blue-50,
        .admin-theme .hover\:bg-blue-50:hover { background-color: #efe2cf !important; }
        .admin-theme .bg-slate-100,
        .admin-theme .bg-slate-200,
        .admin-theme .hover\:bg-slate-100:hover,
        .admin-theme .hover\:bg-slate-200:hover,
        .admin-theme .bg-\[\#f2f6ff\],
        .admin-theme .bg-\[\#f4f7fb\],
        .admin-theme .bg-\[\#fafbfd\],
        .admin-theme .bg-\[\#f7f8fb\],
        .admin-theme .bg-\[\#f8fafc\] { background-color: #f3e8d9 !important; }
        .admin-theme .text-blue-600,
        .admin-theme .text-blue-700,
        .admin-theme .hover\:text-blue-600:hover { color: #8f6b43 !important; }
        .admin-theme .text-blue-100,
        .admin-theme .text-blue-300 { color: #d9b98c !important; }
        .admin-theme .text-slate-900 { color: #2f281f !important; }
        .admin-theme .text-slate-800,
        .admin-theme .text-slate-700 { color: #5d4c39 !important; }
        .admin-theme .text-slate-600,
        .admin-theme .text-slate-500 { color: #6d5c49 !important; }
        .admin-theme .text-slate-400,
        .admin-theme .text-slate-300 { color: #9a8469 !important; }
        .admin-theme .border-slate-100,
        .admin-theme .border-slate-200,
        .admin-theme .border-slate-300,
        .admin-theme .border-blue-100 { border-color: #eadfce !important; }
        .admin-theme .focus\:border-blue-500:focus { border-color: #8f6b43 !important; }
    </style>
</head>

<body class="admin-theme bg-[#f7f0e7] min-h-screen text-[#2f281f]">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-[240px] bg-white border-r border-slate-200 hidden lg:flex flex-col">
            <div class="h-16 flex items-center px-8 border-b border-slate-200">
                <div class="w-9 h-9 rounded-2xl bg-blue-100 flex items-center justify-center mr-3">
                    <span class="material-symbols-rounded text-blue-600 !text-[18px]">groups</span>
                </div>
                <h1 class="text-xl font-black tracking-tight">Family Organizer</h1>
            </div>

            <div class="px-6 pt-7">
                <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-4">Menu principal</p>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <span class="material-symbols-rounded !text-[18px]">dashboard</span>
                        <span>Tableau de bord</span>
                    </a>

                    <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-3 rounded-full bg-blue-600 text-white font-medium shadow">
                        <span class="material-symbols-rounded !text-[18px]">group</span>
                        <span>Utilisateurs</span>
                    </a>

                    <a href="{{ route('admin.reports') }}" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <span class="material-symbols-rounded !text-[18px]">assessment</span>
                        <span>Rapports</span>
                    </a>
                </nav>

                <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mt-10 mb-4">Système</p>

                <nav class="space-y-2">
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <span class="material-symbols-rounded !text-[18px]">settings</span>
                        <span>Paramètres</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <span class="material-symbols-rounded !text-[18px]">shield</span>
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
                <div class="flex items-center gap-4 w-full max-w-xl">
                    <div class="hidden md:flex items-center bg-[#f4f7fb] rounded-full px-5 py-2.5 w-full max-w-[300px]">
                        <span class="material-symbols-rounded text-slate-400 mr-3 !text-[18px]">search</span>
                        <input
                            type="text" id="searchInput" placeholder="Rechercher un utilisateur..."
                            class="bg-transparent w-full outline-none text-sm text-slate-600"
                        >
                    </div>
                </div>

                <div class="flex items-center gap-4 md:gap-6 ml-4">
                    <div class="hidden md:flex items-center gap-4 border-l border-slate-200 pl-6">
                        <div class="text-right">
                            <p class="text-sm font-bold text-slate-900" id="adminName">Admin</p>
                            <p class="text-xs text-slate-500" id="adminRole">admin</p>
                        </div>

                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700">
                            A
                        </div>
                    </div>
                </div>
            </header>

            <!-- CONTENT -->
            <main class="p-5 md:p-8">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-2">Gestion des Utilisateurs</h2>
                        <p class="text-sm md:text-base text-slate-500">
                            Gérez les comptes, les rôles et les statuts des utilisateurs.
                        </p>
                    </div>

                    <button id="refreshBtn" class="px-5 py-2.5 rounded-full bg-blue-600 text-white text-sm font-semibold shadow">
                        Actualiser
                    </button>
                </div>

                <!-- FILTERS -->
                <section class="bg-white rounded-[20px] border border-slate-200 p-5 shadow-sm mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Recherche-->
                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Recherche</label>
                            <input
                                type="text" id="filterSearch" placeholder="Nom ou email"
                                class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500"
                            >
                        </div>
                        <!-- Role -->
                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Rôle</label>
                            <select id="filterRole" class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                                <option value="">Tous</option>
                                <option value="parent">Parent</option>
                                <option value="nounou">Nounou</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <!-- status actif ou inactif --> 
                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Statut</label>
                            <select id="filterStatus" class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                                <option value="">Tous</option>
                                <option value="1">Actif</option>
                                <option value="0">Inactif</option>
                            </select>
                        </div>
                        <!-- FILtrer et réinitialiser -->
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

                <!-- MESSAGE Pour erreur ou seccus -->
                <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

                <!-- TABLE des Users -->
                <section class="bg-white rounded-[20px] border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
                        <h3 class="text-xl font-bold text-slate-900">Liste des Utilisateurs</h3>
                        <span class="text-sm text-slate-400" id="usersTotalLabel">0 utilisateur(s)</span>
                    </div>
                    <!-- la table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-[#fafbfd]">
                                <tr class="text-left text-slate-400 uppercase text-xs">
                                    <th class="px-6 py-4">Utilisateur</th>
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
                    <!-- Pagination -->
                    <div class="px-6 py-5 border-t border-slate-200 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <p class="text-sm text-slate-500" id="paginationInfo">Chargement...</p>
                        
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
            </main>
        </div>
    </div>

    <!-- MODAL Changer le role -->
    <div id="roleModal" class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center px-4">
        <div class="bg-white rounded-[24px] w-full max-w-md p-6">
            <h3 class="text-xl font-bold mb-4">Changer le rôle</h3>

            <input type="hidden" id="selectedUserId">

            <div class="mb-5">
                <label class="block text-sm text-slate-500 mb-2">Nouveau rôle</label>
                <select id="newRole" class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                    <option value="parent">Parent</option>
                    <option value="nounou">Nounou</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="flex gap-3">
                <button id="cancelRoleModalBtn" class="flex-1 border border-slate-300 rounded-2xl py-3 font-semibold">
                    Annuler
                </button>
                <button id="saveRoleBtn" class="flex-1 bg-blue-600 text-white rounded-2xl py-3 font-semibold">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>
    
    <script>
        // declarations des variables 

        const usersTableBody = document.getElementById('usersTableBody');
        const usersTotalLabel = document.getElementById('usersTotalLabel');
        const paginationInfo = document.getElementById('paginationInfo');
        const prevPageBtn = document.getElementById('prevPageBtn');
        const nextPageBtn = document.getElementById('nextPageBtn');
        const messageBox = document.getElementById('messageBox');

        const searchInput = document.getElementById('searchInput');
        const filterSearch = document.getElementById('filterSearch');
        const filterRole = document.getElementById('filterRole');
        const filterStatus = document.getElementById('filterStatus');

        const applyFiltersBtn = document.getElementById('applyFiltersBtn');
        const resetFiltersBtn = document.getElementById('resetFiltersBtn');
        const refreshBtn = document.getElementById('refreshBtn');
        const logoutBtn = document.getElementById('logoutBtn');

        const roleModal = document.getElementById('roleModal');
        const selectedUserId = document.getElementById('selectedUserId');
        const newRole = document.getElementById('newRole');
        const cancelRoleModalBtn = document.getElementById('cancelRoleModalBtn');
        const saveRoleBtn = document.getElementById('saveRoleBtn');

        let currentPage = 1;
        let lastPage = 1;

        document.addEventListener('DOMContentLoaded', function () {
            guardAdminAccess();
            loadAdminInfo();
            loadUsers();
        });

        refreshBtn.addEventListener('click', function () {
            loadUsers();
        });

        applyFiltersBtn.addEventListener('click', function () {
            currentPage = 1;
            loadUsers();
        });
        // Vider tous 
        resetFiltersBtn.addEventListener('click', function () {
            filterSearch.value = '';
            searchInput.value = '';
            filterRole.value = '';
            filterStatus.value = '';
            currentPage = 1;
            loadUsers();
        });

        // Synchronise champ visible + filtre interne

        searchInput.addEventListener('input', function () {
            filterSearch.value = searchInput.value;
        });
        // eviter page negative 

        prevPageBtn.addEventListener('click', function () {
            if (currentPage > 1) {
                currentPage--;
                loadUsers();
            }
        });
        // éviter dépasser max

        nextPageBtn.addEventListener('click', function () {
            if (currentPage < lastPage) {
                currentPage++;
                loadUsers();
            }
        });

        cancelRoleModalBtn.addEventListener('click', function () {
            closeRoleModal();
        });

        saveRoleBtn.addEventListener('click', function () {
            updateUserRole();
        });

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('access_token');
            localStorage.removeItem('user');
            window.location.href = '/login';
        });

        function getToken() {
            return localStorage.getItem('access_token');
        }
        // autorisation 
        function getAuthHeaders() {
            return {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + getToken()
            };
        }
        // acces admin 
        function guardAdminAccess() {
            const token = getToken();
            const user = JSON.parse(localStorage.getItem('user'));

            if (!token || !user) {
                window.location.href = '/login';
                return;
            }

            if (user.role !== 'admin') {
                window.location.href = '/';
            }
        }

        function loadAdminInfo() {
            const user = JSON.parse(localStorage.getItem('user'));

            if (user) {
                document.getElementById('adminName').textContent = user.name || 'Admin';
                document.getElementById('adminRole').textContent = user.role || 'admin';
            }
        }

        async function loadUsers() {
            usersTableBody.innerHTML = `
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-slate-400">
                        Chargement...
                    </td>
                </tr>
            `;

            let url = '/api/admin/users?page=' + currentPage;

            if (filterSearch.value.trim() !== '') {
                url += '&search=' + encodeURIComponent(filterSearch.value.trim());
            }

            if (filterRole.value !== '') {
                url += '&role=' + encodeURIComponent(filterRole.value);
            }

            if (filterStatus.value !== '') {
                url += '&is_active=' + encodeURIComponent(filterStatus.value);
            }

            try {
                const response = await fetch(url, {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    const users = result.data.data;
                    lastPage = result.data.last_page;

                    renderUsers(users);
                    usersTotalLabel.textContent = result.data.total + ' utilisateur(s)';
                    paginationInfo.textContent = 'Page ' + result.data.current_page + ' / ' + result.data.last_page;
                } else {
                    if (response.status === 401 || response.status === 403) {
                        window.location.href = '/login';
                        return;
                    }

                    renderErrorRow('Impossible de charger les utilisateurs.');
                }
            } catch (error) {
                renderErrorRow('Erreur serveur.');
            }
        }

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
                        <span class="px-3 py-1 rounded-full text-xs font-bold ${getRoleClass(user.role)}">
                            ${user.role.toUpperCase()}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2 text-slate-500">
                            <span class="w-2.5 h-2.5 rounded-full ${user.is_active ? 'bg-green-500' : 'bg-slate-300'}"></span>
                            <span>${user.is_active ? 'Actif' : 'Inactif'}</span>
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3 flex-wrap">
                            <button
                                class="px-3 py-1.5 rounded-full bg-blue-50 text-blue-600 text-xs font-semibold"
                                onclick="openRoleModal(${user.id}, '${user.role}')"
                            >
                                Rôle
                            </button>

                            <button
                                class="px-3 py-1.5 rounded-full ${user.is_active ? 'bg-orange-50 text-orange-600' : 'bg-green-50 text-green-600'} text-xs font-semibold"
                                onclick="toggleUserStatus(${user.id}, ${user.is_active ? 0 : 1})"
                            >
                                ${user.is_active ? 'Désactiver' : 'Activer'}
                            </button>

                            <button
                                class="px-3 py-1.5 rounded-full bg-red-50 text-red-600 text-xs font-semibold"
                                onclick="deleteUser(${user.id})"
                            >
                                Supprimer
                            </button>
                        </div>
                    </td>
                `;

                usersTableBody.appendChild(row);
            });
        }
        // Affiche une ligne rouge dans le tableau avec un message d’erreur 
        function renderErrorRow(message) {
            usersTableBody.innerHTML = `
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-red-500">
                        ${message}
                    </td>
                </tr>
            `;
        }
        // Prendre les initiales du nom
        function getInitials(name) {
            if (!name) return 'U';

            const parts = name.trim().split(' ');
            let initials = '';

            for (let i = 0; i < parts.length; i++) {
                if (parts[i].length > 0) {
                    initials += parts[i][0];
                }
            }

            return initials.substring(0, 2).toUpperCase();
        } 
        // Retourne couleur CSS selon rôle
        function getRoleClass(role) {
            if (role === 'parent') return 'bg-blue-100 text-blue-600';
            if (role === 'nounou') return 'bg-orange-100 text-orange-600';
            if (role === 'admin') return 'bg-purple-100 text-purple-600';
            return 'bg-slate-100 text-slate-600';
        }
        // popup pour modifier rôle 
        function openRoleModal(userId, role) {
            selectedUserId.value = userId;
            newRole.value = role;
            roleModal.classList.remove('hidden');
            roleModal.classList.add('flex');
        }
        // Ferme popup rôle
        function closeRoleModal() {
            roleModal.classList.add('hidden');
            roleModal.classList.remove('flex');
        }
        // Modifier rôle utilisateur via API

        async function updateUserRole() {

            const userId = selectedUserId.value;

            try {
                const response = await fetch('/api/admin/users/' + userId + '/role', {
                    method: 'PATCH',
                    headers: {
                        ...getAuthHeaders(),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        role: newRole.value
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Rôle mis à jour avec succès.', 'success');
                    closeRoleModal();
                    loadUsers();
                } else {
                    showMessage(result.message || 'Erreur lors de la mise à jour du rôle.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }

        // Activer / désactiver utilisateur 

        async function toggleUserStatus(userId, newStatus) {
            try {
                const response = await fetch('/api/admin/users/' + userId + '/status', {
                    method: 'PATCH',
                    headers: {
                        ...getAuthHeaders(),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        is_active: newStatus
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Statut utilisateur mis à jour.', 'success');
                    loadUsers();
                } else {
                    showMessage(result.message || 'Erreur lors du changement de statut.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }

        // Supprimer utilisateur
        async function deleteUser(userId) {
            const confirmed = confirm('Voulez-vous vraiment supprimer cet utilisateur ?');

            if (!confirmed) return;

            try {
                const response = await fetch('/api/admin/users/' + userId, {
                    method: 'DELETE',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Utilisateur supprimé avec succès.', 'success');
                    loadUsers();
                } else {
                    showMessage(result.message || 'Erreur lors de la suppression.', 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }
        // Afficher message temporaire

        function showMessage(message, type) {
            messageBox.classList.remove('hidden');

            if (type === 'success') {
                messageBox.className = 'mb-6 rounded-2xl p-4 text-sm bg-green-100 text-green-700';
            } else {
                messageBox.className = 'mb-6 rounded-2xl p-4 text-sm bg-red-100 text-red-700';
            }

            messageBox.innerHTML = message;

            // Supprimer le message après 3 secondes
            setTimeout(function () {
                messageBox.classList.add('hidden');
            }, 3000);
        }
    </script>
</body>
</html>
