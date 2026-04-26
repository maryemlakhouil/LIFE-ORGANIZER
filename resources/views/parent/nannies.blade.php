<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nounous - Family Organizer</title>
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
        .parent-nannies-theme .bg-white { background-color: #fffaf3 !important; }
        .parent-nannies-theme .bg-blue-600,
        .parent-nannies-theme .bg-blue-500 { background-color: #8f6b43 !important; }
        .parent-nannies-theme .hover\:bg-blue-700:hover { background-color: #795936 !important; }
        .parent-nannies-theme .bg-blue-100,
        .parent-nannies-theme .bg-blue-50,
        .parent-nannies-theme .hover\:bg-blue-50:hover { background-color: #efe2cf !important; }
        .parent-nannies-theme .bg-slate-100,
        .parent-nannies-theme .bg-slate-200,
        .parent-nannies-theme .hover\:bg-slate-100:hover { background-color: #f3e8d9 !important; }
        .parent-nannies-theme .text-blue-600,
        .parent-nannies-theme .hover\:text-blue-600:hover { color: #8f6b43 !important; }
        .parent-nannies-theme .text-slate-900 { color: #2f281f !important; }
        .parent-nannies-theme .text-slate-700,
        .parent-nannies-theme .text-slate-600,
        .parent-nannies-theme .text-slate-500 { color: #6d5c49 !important; }
        .parent-nannies-theme .text-slate-400 { color: #9a8469 !important; }
        .parent-nannies-theme .border-slate-100,
        .parent-nannies-theme .border-slate-200,
        .parent-nannies-theme .border-slate-300,
        .parent-nannies-theme .border-blue-200 { border-color: #eadfce !important; }
        .parent-nannies-theme .focus\:border-blue-500:focus { border-color: #8f6b43 !important; }
    </style>
</head>

<body class="parent-nannies-theme bg-[#f7f0e7] text-[#2f281f] min-h-screen">
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
                    <div id="sidebarAvatar" class="w-12 h-12 rounded-2xl bg-[#efe2cf] flex items-center justify-center text-base font-black text-[#8f6b43]">
                        P
                    </div>
                    <div>
                        <p id="sidebarName" class="text-xl font-black leading-none mb-1">Chargement...</p>
                        <p class="text-[#9a8469] text-sm font-semibold">Espace parent</p>
                    </div>
                </div>

                <nav class="space-y-5">
                    <a href="{{ route('parent.dashboard') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">dashboard</span>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('parent.tasks') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">event_note</span>
                        <span>Planning</span>
                    </a>
                    <a href="{{ route('parent.calendar') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">calendar_month</span>
                        <span>Calendrier</span>
                    </a>
                    <a href="{{ route('parent.messages') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">chat_bubble</span>
                        <span>Messagerie</span>
                    </a>
                    <a href="{{ route('parent.family') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">home</span>
                        <span>Profil famille</span>
                    </a>
                    <a href="{{ route('parent.nannies') }}" class="flex items-center gap-4 bg-[#efe2cf] text-[#8f6b43] px-6 py-3.5 rounded-[26px] text-lg font-black shadow-sm">
                        <span class="material-symbols-rounded">person_search</span>
                        <span>Nounous</span>
                    </a>
                    <a href="{{ route('parent.nanny-profile') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">badge</span>
                        <span>Profil nounou</span>
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
                    <h2 class="text-2xl font-black mb-1">Trouver une nounou</h2>
                    <p class="text-[#9a8469] text-base font-semibold">Parcourez toutes les nounous disponibles sur la plateforme.</p>
                </div>

                <div class="flex items-center gap-3">
                    <button class="w-10 h-10 rounded-2xl flex items-center justify-center text-[#6d5c49] hover:bg-[#efe2cf]">
                        <span class="material-symbols-rounded">notifications</span>
                    </button>
                    <a href="{{ route('parent.nanny-profile') }}" class="px-5 py-2.5 rounded-full bg-[#8f6b43] text-white font-bold hover:bg-[#795936]">
                        Voir le profil
                    </a>
                </div>
            </header>

            <main class="p-5 md:p-8">
                <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

                <section class="rounded-[32px] bg-gradient-to-br from-[#fffaf3] via-[#f2e3cf] to-[#d9b98c] border border-[#eadfce] p-6 md:p-8 shadow-sm overflow-hidden relative flex flex-col lg:flex-row lg:items-start lg:justify-between gap-5 mb-7">
                    <div class="relative z-10 max-w-2xl">
                        <p class="text-xs uppercase tracking-[0.22em] text-[#8f6b43] font-black mb-3">Réseau de confiance</p>
                        <h1 class="text-3xl md:text-4xl font-black mb-3">Choisissez la bonne nounou pour votre foyer.</h1>
                        <p class="text-[#6d5c49] text-sm md:text-base leading-7">
                            Cette page affiche toutes les nounous de la plateforme. Le parent peut consulter librement les profils avant de faire son choix.
                        </p>
                    </div>

                    <div class="self-start rounded-full border border-[#eadfce] bg-white px-5 py-3 text-sm text-[#6d5c49] font-bold">
                        <span id="availableCount" class="text-[#8f6b43] font-black">0</span> nounou(s)
                    </div>
                </section>

                <section class="flex flex-col xl:flex-row gap-4 mb-8">
                    <div class="flex-1">
                        <div class="relative">
                            <span class="material-symbols-rounded absolute left-5 top-1/2 -translate-y-1/2 text-[#9a8469]">search</span>
                            <input
                                id="searchInput"
                                type="text"
                                placeholder="Rechercher par nom ou email..."
                                class="w-full rounded-[24px] border border-slate-200 bg-white pl-14 pr-5 py-3.5 text-base outline-none focus:border-blue-500"
                            >
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <select id="experienceFilter" class="rounded-full border border-slate-200 bg-white px-5 py-3.5 text-sm outline-none focus:border-blue-500">
                            <option value="">Expérience</option>
                            <option value="3">3 ans et +</option>
                            <option value="5">5 ans et +</option>
                            <option value="8">8 ans et +</option>
                        </select>

                        <select id="priceFilter" class="rounded-full border border-slate-200 bg-white px-5 py-3.5 text-sm outline-none focus:border-blue-500">
                            <option value="">Tarif max</option>
                            <option value="12">12€</option>
                            <option value="14">14€</option>
                            <option value="16">16€</option>
                            <option value="18">18€</option>
                        </select>

                        <select id="familyFilter" class="rounded-full border border-slate-200 bg-white px-5 py-3.5 text-sm outline-none focus:border-blue-500">
                            <option value="">Toutes les liaisons</option>
                            <option value="linked">Liées à une famille</option>
                            <option value="unlinked">Non liées</option>
                        </select>

                        <select id="statusFilter" class="rounded-full border border-slate-200 bg-white px-5 py-3.5 text-sm outline-none focus:border-blue-500">
                            <option value="">Tous les statuts</option>
                            <option value="active">Comptes actifs</option>
                            <option value="inactive">Comptes inactifs</option>
                        </select>
                    </div>
                </section>

                <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-10" id="nanniesGrid">
                    <div class="bg-white rounded-[28px] border border-slate-200 shadow-sm p-6 text-slate-400">
                        Chargement...
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const experienceFilter = document.getElementById('experienceFilter');
        const priceFilter = document.getElementById('priceFilter');
        const familyFilter = document.getElementById('familyFilter');
        const statusFilter = document.getElementById('statusFilter');
        const nanniesGrid = document.getElementById('nanniesGrid');
        const availableCount = document.getElementById('availableCount');
        const sidebarAvatar = document.getElementById('sidebarAvatar');
        const sidebarName = document.getElementById('sidebarName');
        const logoutBtn = document.getElementById('logoutBtn');
        const messageBox = document.getElementById('messageBox');

        let currentUser = null;
        let allNannies = [];
        let filteredNannies = [];

        document.addEventListener('DOMContentLoaded', function () {
            guardParentAccess();
            loadUserInfo();
            loadNannies();
        });

        searchInput.addEventListener('input', applyFilters);
        experienceFilter.addEventListener('change', applyFilters);
        priceFilter.addEventListener('change', applyFilters);
        familyFilter.addEventListener('change', applyFilters);
        statusFilter.addEventListener('change', applyFilters);

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('access_token');
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            localStorage.removeItem('selectedNannyProfile');
            window.location.href = '/login';
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

        function loadUserInfo() {
            currentUser = getStoredUser();

            if (!currentUser) {
                return;
            }

            sidebarAvatar.textContent = getInitials(currentUser.name || 'P');
            sidebarName.textContent = currentUser.name || 'Espace parent';
        }

        async function loadNannies() {
            try {
                const response = await fetch('/api/nannies', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (!response.ok) {
                    showMessage(result.message || 'Impossible de charger les nounous.', 'error');
                    return;
                }

                allNannies = extractNannies(normalizeCollection(result.data));
                populateFamilyFilter(allNannies);
                applyFilters();
            } catch (error) {
                showMessage('Impossible de charger les nounous.', 'error');
                nanniesGrid.innerHTML = `
                    <div class="xl:col-span-3 rounded-[28px] border border-slate-200 bg-white p-8 text-center text-[#9a8469]">
                        Une erreur est survenue pendant le chargement.
                    </div>
                `;
            }
        }
        // garantit que le résultat final sera toujours un tableau 
        function normalizeCollection(data) {
            if (Array.isArray(data)) {
                return data;
            }

            if (data && Array.isArray(data.data)) {
                return data.data;
            }

            return [];
        }
        // transforme les données des nounous reçues depuis l’API en objets propres et prêts à afficher dans l’interface
        function extractNannies(nannies) {

            return nannies.map(function (nanny) {
                const families = Array.isArray(nanny.families) ? nanny.families : [];
                const familyNames = families.map(function (family) {
                    return family.name;
                }).filter(Boolean);

                return {
                    id: nanny.id,
                    name: nanny.name || 'Nounou',
                    email: nanny.email || '',
                    photo: nanny.photo || '',
                    is_active: nanny.is_active !== false,
                    title: 'Nounou de confiance',
                    location: familyNames.length > 0 ? familyNames.join(', ') : 'Disponible sur la plateforme',
                    experience_years: nanny.experience_years,
                    experience: nanny.experience_years ? nanny.experience_years + ' ans' : 'Non renseigné',
                    rating: nanny.is_active ? '4.8' : '4.5',
                    reviewsCount: familyNames.length > 0 ? 12 : 0,
                    age: '-',
                    hourly_rate: nanny.hourly_rate,
                    rate: nanny.hourly_rate ? formatRate(nanny.hourly_rate) : '---',
                    about: familyNames.length > 0
                        ? 'Nounou visible sur la plateforme et déjà liée à une ou plusieurs familles.'
                        : 'Nounou visible sur la plateforme. Aucune famille liée pour le moment.',
                    skills: ['Garde d’enfants', 'Organisation', 'Suivi des routines'],
                    languages: [
                        { name: 'Français', level: 'Courant' }
                    ],
                    availability: {
                        matin: [1, 1, 1, 1, 1, 0, 0],
                        aprem: [1, 1, 1, 1, 1, 0, 0],
                        soiree: [0, 1, 0, 1, 1, 0, 0]
                    },
                    availabilityNote: 'Disponibilités à confirmer directement avec cette nounou.',
                    zone: familyNames.length > 0 ? familyNames.join(', ') : 'Zone à confirmer',
                    reviews: [],
                    family_names: familyNames,
                    family_label: familyNames.length > 0 ? familyNames.join(', ') : 'Aucune famille liée'
                };
            });
        }

        function populateFamilyFilter(nannies) {
            familyFilter.value = '';
        }
        // filter des nounous 
        function applyFilters() {
            const search = searchInput.value.trim().toLowerCase();
            const minExperience = experienceFilter.value;
            const maxPrice = priceFilter.value;
            const selectedFamily = familyFilter.value;
            const selectedStatus = statusFilter.value;

            filteredNannies = allNannies.filter(function (nanny) {
                let okSearch = true;
                let okExperience = true;
                let okPrice = true;
                let okFamily = true;
                let okStatus = true;

                if (search !== '') {
                    const haystack = [nanny.name, nanny.email, nanny.family_label].join(' ').toLowerCase();
                    okSearch = haystack.includes(search);
                }

                if (minExperience !== '') {
                    okExperience = (nanny.experience_years || 0) >= parseInt(minExperience, 10);
                }

                if (maxPrice !== '') {
                    okPrice = (nanny.hourly_rate || 0) <= parseFloat(maxPrice);
                }

                if (selectedFamily === 'linked') {
                    okFamily = nanny.family_names.length > 0;
                }

                if (selectedFamily === 'unlinked') {
                    okFamily = nanny.family_names.length === 0;
                }

                if (selectedStatus === 'active') {
                    okStatus = nanny.is_active === true;
                }

                if (selectedStatus === 'inactive') {
                    okStatus = nanny.is_active === false;
                }

                return okSearch && okExperience && okPrice && okFamily && okStatus;
            });

            availableCount.textContent = filteredNannies.length;
            renderNannies();
        }

        function renderNannies() {
            nanniesGrid.innerHTML = '';

            if (filteredNannies.length === 0) {
                nanniesGrid.innerHTML = `
                    <div class="xl:col-span-3 rounded-[28px] border-2 border-dashed border-slate-300 bg-white p-8 text-center">
                        <div class="w-16 h-16 rounded-full bg-[#efe2cf] text-[#8f6b43] mx-auto mb-5 flex items-center justify-center">
                            <span class="material-symbols-rounded !text-[28px]">person_search</span>
                        </div>
                        <h3 class="text-2xl font-black mb-3">Aucune nounou trouvée</h3>
                        <p class="text-[#6d5c49] text-base leading-7">
                            Les comptes nounou de la plateforme apparaissent ici automatiquement dès leur création.
                        </p>
                    </div>
                `;
                return;
            }

            filteredNannies.forEach(function (nanny) {
                const card = document.createElement('div');
                card.className = 'bg-white rounded-[28px] border border-slate-200 shadow-sm overflow-hidden flex flex-col';

                const photoMarkup = nanny.photo
                    ? `<img src="${escapeHtml(nanny.photo)}" alt="${escapeHtml(nanny.name)}" class="w-full h-full object-cover" onerror="this.remove(); this.parentElement.querySelector('.fallback-avatar').classList.remove('hidden');">`
                    : '';

                card.innerHTML = `
                    <div class="relative h-44 bg-[#f3e8d9] overflow-hidden">
                        ${photoMarkup}
                        <div class="fallback-avatar ${nanny.photo ? 'hidden' : ''} w-full h-full flex items-center justify-center text-4xl font-black text-[#8f6b43]">
                            ${escapeHtml(getInitials(nanny.name))}
                        </div>

                        <div class="absolute top-4 right-4 rounded-full bg-white/95 px-3 py-1.5 text-xs font-black shadow-sm text-[#8f6b43]">
                            ${nanny.is_active ? 'Actif' : 'Inactif'}
                        </div>
                    </div>

                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex items-start justify-between gap-4 mb-3">
                            <div>
                                <h3 class="text-xl font-black">${escapeHtml(nanny.name)}</h3>
                                <p class="text-sm text-[#9a8469] mt-1">${escapeHtml(nanny.email || 'Email indisponible')}</p>
                            </div>
                            <div class="w-11 h-11 rounded-2xl bg-[#efe2cf] text-[#8f6b43] flex items-center justify-center shrink-0">
                                <span class="material-symbols-rounded">badge</span>
                            </div>
                        </div>

                        <div class="space-y-3 mb-5">
                            <div class="grid grid-cols-2 gap-3">
                                <div class="rounded-2xl bg-[#f8efe4] border border-[#eadfce] px-4 py-3">
                                    <p class="text-[11px] uppercase tracking-[0.18em] text-[#b08a5f] font-black mb-1">Expérience</p>
                                    <p class="text-sm font-semibold text-[#5d4c39]">${escapeHtml(nanny.experience)}</p>
                                </div>
                                <div class="rounded-2xl bg-[#f8efe4] border border-[#eadfce] px-4 py-3">
                                    <p class="text-[11px] uppercase tracking-[0.18em] text-[#b08a5f] font-black mb-1">Tarif</p>
                                    <p class="text-sm font-semibold text-[#5d4c39]">${escapeHtml(nanny.rate)}</p>
                                </div>
                            </div>
                            <div class="rounded-2xl bg-[#f8efe4] border border-[#eadfce] px-4 py-3">
                                <p class="text-[11px] uppercase tracking-[0.18em] text-[#b08a5f] font-black mb-1">Liaison</p>
                                <p class="text-sm font-semibold text-[#5d4c39]">${escapeHtml(nanny.family_label || 'Aucune famille liée')}</p>
                            </div>
                            <div class="rounded-2xl bg-[#fff1ed] border border-[#f1c7bd] px-4 py-3">
                                <p class="text-[11px] uppercase tracking-[0.18em] text-[#c46b5f] font-black mb-1">Statut</p>
                                <p class="text-sm font-semibold text-[#7b4b42]">${nanny.is_active ? 'Compte actif' : 'Compte inactif'}</p>
                            </div>
                        </div>

                        <div class="mt-auto flex gap-3">
                            <button onclick="openNannyProfile(${nanny.id})" class="flex-1 rounded-full bg-[#8f6b43] text-white py-3 text-sm font-bold hover:bg-[#795936]">
                                Voir le profil
                            </button>
                            <button onclick="openConversation(${nanny.id})" class="w-12 h-12 rounded-full border border-[#eadfce] text-[#8f6b43] hover:bg-[#efe2cf]">
                                <span class="material-symbols-rounded">chat</span>
                            </button>
                        </div>
                    </div>
                `;

                nanniesGrid.appendChild(card);
            });
        }

        function openNannyProfile(nannyId) {
            const nanny = allNannies.find(function (item) {
                return String(item.id) === String(nannyId);
            });

            if (!nanny) {
                showMessage('Profil nounou introuvable.', 'error');
                return;
            }

            localStorage.setItem('selectedNannyProfile', JSON.stringify(nanny));
            window.location.href = '{{ route('parent.nanny-profile') }}';
        }

        function openConversation(nannyId) {
            openNannyProfile(nannyId);
        }
        // formater un tarif horaire pour l’affichage 
        function formatRate(rate) {
            const value = Number(rate);

            if (Number.isNaN(value)) {
                return '---';
            }

            return value % 1 === 0 ? value.toFixed(0) + '€/h' : value.toFixed(2) + '€/h';
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
                messageBox.className = 'mb-6 rounded-2xl p-4 text-sm bg-[#e6f3df] text-[#456b35] border border-[#cfe5c2]';
            } else {
                messageBox.className = 'mb-6 rounded-2xl p-4 text-sm bg-[#fff1ed] text-[#b55348] border border-[#f1c7bd]';
            }

            messageBox.innerHTML = message;

            setTimeout(function () {
                messageBox.classList.add('hidden');
            }, 3000);
        }
    </script>
</body>
</html>
