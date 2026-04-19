<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f5f7fb] min-h-screen text-slate-800">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-[260px] bg-white border-r border-slate-200 hidden lg:flex flex-col">
            <div class="h-20 flex items-center px-8 border-b border-slate-200">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold">Family Organizer</h1>
            </div>

            <div class="px-7 pt-8">
                <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-4">Menu principal</p>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
                        <span>▦</span>
                        <span>Tableau de bord</span>
                    </a>

                    <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-3 rounded-full bg-blue-600 text-white font-medium shadow">
                        <span>◉</span>
                        <span>Utilisateurs</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full text-slate-600 hover:bg-slate-100">
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
            <header class="h-20 bg-white border-b border-slate-200 px-5 md:px-8 flex items-center justify-between">
                <div class="flex items-center gap-4 w-full max-w-xl">
                    <div class="hidden md:flex items-center bg-[#f4f7fb] rounded-full px-5 py-3 w-full">
                        <span class="text-slate-400 mr-3">🔍</span>
                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Rechercher un utilisateur..."
                            class="bg-transparent w-full outline-none text-slate-600"
                        >
                    </div>
                </div>

                <div class="flex items-center gap-4 md:gap-6 ml-4">
                    <div class="hidden md:flex items-center gap-4 border-l border-slate-200 pl-6">
                        <div class="text-right">
                            <p class="font-bold text-slate-900" id="adminName">Admin</p>
                            <p class="text-sm text-slate-500" id="adminRole">admin</p>
                        </div>

                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700">
                            A
                        </div>
                    </div>
                </div>
            </header>

            <!-- CONTENT -->
            <main class="p-5 md:p-8">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-2">Gestion des Utilisateurs</h2>
                        <p class="text-slate-500 text-lg">
                            Gérez les comptes, les rôles et les statuts des utilisateurs.
                        </p>
                    </div>

                    <button id="refreshBtn" class="px-5 py-3 rounded-full bg-blue-600 text-white font-semibold shadow">
                        Actualiser
                    </button>
                </div>

                <!-- FILTERS -->
                <section class="bg-white rounded-[24px] border border-slate-200 p-5 shadow-sm mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Recherche</label>
                            <input
                                type="text"
                                id="filterSearch"
                                placeholder="Nom ou email"
                                class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500"
                            >
                        </div>

                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Rôle</label>
                            <select id="filterRole" class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                                <option value="">Tous</option>
                                <option value="parent">Parent</option>
                                <option value="nounou">Nounou</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm text-slate-500 mb-2">Statut</label>
                            <select id="filterStatus" class="w-full rounded-2xl border border-slate-200 bg-[#f7f8fb] px-4 py-3 outline-none focus:border-blue-500">
                                <option value="">Tous</option>
                                <option value="1">Actif</option>
                                <option value="0">Inactif</option>
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

                <!-- MESSAGE -->
                <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

                <!-- TABLE -->
                <section class="bg-white rounded-[24px] border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
                        <h3 class="text-3xl font-bold text-slate-900">Liste des Utilisateurs</h3>
                        <span class="text-slate-400" id="usersTotalLabel">0 utilisateur(s)</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-[#fafbfd]">
                                <tr class="text-left text-slate-400 uppercase text-sm">
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

                    <div class="px-6 py-5 border-t border-slate-200 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <p class="text-slate-500" id="paginationInfo">Chargement...</p>

                        <div class="flex gap-3">
                            <button id="prevPageBtn" class="px-5 py-2 rounded-full border border-slate-300 bg-white font-semibold">
                                Précédent
                            </button>
                            <button id="nextPageBtn" class="px-5 py-2 rounded-full border border-slate-300 bg-white font-semibold">
                                Suivant
                            </button>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- MODAL ROLE -->
    <div id="roleModal" class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center px-4">
        <div class="bg-white rounded-[24px] w-full max-w-md p-6">
            <h3 class="text-2xl font-bold mb-4">Changer le rôle</h3>

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

        resetFiltersBtn.addEventListener('click', function () {
            filterSearch.value = '';
            searchInput.value = '';
            filterRole.value = '';
            filterStatus.value = '';
            currentPage = 1;
            loadUsers();
        });

        searchInput.addEventListener('input', function () {
            filterSearch.value = searchInput.value;
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

        cancelRoleModalBtn.addEventListener('click', function () {
            closeRoleModal();
        });

        saveRoleBtn.addEventListener('click', function () {
            updateUserRole();
        });

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            window.location.href = '/login';
        });

        function loadAdminInfo() {
            const user = JSON.parse(localStorage.getItem('user'));

            if (user) {
                document.getElementById('adminName').textContent = user.name || 'Admin';
                document.getElementById('adminRole').textContent = user.role || 'admin';
            }
        }

        async function loadUsers() {
            const token = localStorage.getItem('token');

            usersTableBody.innerHTML = `
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-slate-400">
                        Chargement...
                    </td>
                </tr>
            `;

            let url = 'http://127.0.0.1:8000/api/admin/users?page=' + currentPage;

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
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    const users = result.data.data;
                    lastPage = result.data.last_page;

                    renderUsers(users);
                    usersTotalLabel.textContent = result.data.total + ' utilisateur(s)';
                    paginationInfo.textContent = 'Page ' + result.data.current_page + ' / ' + result.data.last_page;
                } else {
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
                row.className = 'border-t border-slate-100';

                row.innerHTML = `
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700">
                                ${getInitials(user.name)}
                            </div>
                            <div>
                                <p class="font-semibold text-slate-900">${user.name}</p>
                                <p class="text-sm text-slate-400">${user.email}</p>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-5">
                        <span class="px-3 py-1 rounded-full text-xs font-bold ${getRoleClass(user.role)}">
                            ${user.role.toUpperCase()}
                        </span>
                    </td>

                    <td class="px-6 py-5">
                        <div class="flex items-center gap-2 text-slate-500">
                            <span class="w-2.5 h-2.5 rounded-full ${user.is_active ? 'bg-green-500' : 'bg-slate-300'}"></span>
                            <span>${user.is_active ? 'Actif' : 'Inactif'}</span>
                        </div>
                    </td>

                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3 flex-wrap">
                            <button
                                class="px-3 py-2 rounded-full bg-blue-50 text-blue-600 text-sm font-semibold"
                                onclick="openRoleModal(${user.id}, '${user.role}')"
                            >
                                Rôle
                            </button>

                            <button
                                class="px-3 py-2 rounded-full ${user.is_active ? 'bg-orange-50 text-orange-600' : 'bg-green-50 text-green-600'} text-sm font-semibold"
                                onclick="toggleUserStatus(${user.id}, ${user.is_active ? 0 : 1})"
                            >
                                ${user.is_active ? 'Désactiver' : 'Activer'}
                            </button>

                            <button
                                class="px-3 py-2 rounded-full bg-red-50 text-red-600 text-sm font-semibold"
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

        function renderErrorRow(message) {
            usersTableBody.innerHTML = `
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-red-500">
                        ${message}
                    </td>
                </tr>
            `;
        }

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

        function getRoleClass(role) {
            if (role === 'parent') return 'bg-blue-100 text-blue-600';
            if (role === 'nounou') return 'bg-orange-100 text-orange-600';
            if (role === 'admin') return 'bg-purple-100 text-purple-600';
            return 'bg-slate-100 text-slate-600';
        }

        function openRoleModal(userId, role) {
            selectedUserId.value = userId;
            newRole.value = role;
            roleModal.classList.remove('hidden');
            roleModal.classList.add('flex');
        }

        function closeRoleModal() {
            roleModal.classList.add('hidden');
            roleModal.classList.remove('flex');
        }

        async function updateUserRole() {
            const token = localStorage.getItem('token');
            const userId = selectedUserId.value;

            try {
                const response = await fetch('http://127.0.0.1:8000/api/admin/users/' + userId + '/role', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
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

        async function toggleUserStatus(userId, newStatus) {
            const token = localStorage.getItem('token');

            try {
                const response = await fetch('http://127.0.0.1:8000/api/admin/users/' + userId + '/status', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
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

        async function deleteUser(userId) {
            const token = localStorage.getItem('token');

            const confirmed = confirm('Voulez-vous vraiment supprimer cet utilisateur ?');

            if (!confirmed) return;

            try {
                const response = await fetch('http://127.0.0.1:8000/api/admin/users/' + userId, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
                    }
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