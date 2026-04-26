<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Nounou - Family Organizer</title>
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
        .parent-nanny-theme .bg-white { background-color: #fffaf3 !important; }
        .parent-nanny-theme .bg-blue-600,
        .parent-nanny-theme .bg-blue-500 { background-color: #8f6b43 !important; }
        .parent-nanny-theme .hover\:bg-blue-700:hover { background-color: #795936 !important; }
        .parent-nanny-theme .bg-blue-100,
        .parent-nanny-theme .bg-blue-50,
        .parent-nanny-theme .hover\:bg-blue-50:hover { background-color: #efe2cf !important; }
        .parent-nanny-theme .bg-slate-100,
        .parent-nanny-theme .bg-slate-200 { background-color: #f3e8d9 !important; }
        .parent-nanny-theme .text-blue-600,
        .parent-nanny-theme .hover\:text-blue-600:hover { color: #8f6b43 !important; }
        .parent-nanny-theme .text-slate-900 { color: #2f281f !important; }
        .parent-nanny-theme .text-slate-700,
        .parent-nanny-theme .text-slate-600,
        .parent-nanny-theme .text-slate-500 { color: #6d5c49 !important; }
        .parent-nanny-theme .text-slate-400,
        .parent-nanny-theme .text-blue-300 { color: #9a8469 !important; }
        .parent-nanny-theme .border-slate-100,
        .parent-nanny-theme .border-slate-200,
        .parent-nanny-theme .border-blue-100,
        .parent-nanny-theme .border-blue-200 { border-color: #eadfce !important; }
        .availability-chip {
            border-radius: 14px;
            height: 38px;
            border: 1px solid #eadfce;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 800;
        }
        .availability-chip--on {
            background: linear-gradient(135deg, #b89569 0%, #8f6b43 100%);
            color: #fffaf3;
            border-color: #8f6b43;
            box-shadow: 0 10px 22px rgba(143, 107, 67, 0.18);
        }
        .availability-chip--off {
            background: #f3e8d9;
            color: #b49a7d;
        }
    </style>
</head>

<body class="parent-nanny-theme bg-[#f7f0e7] text-[#2f281f] min-h-screen">
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
                    <a href="{{ route('parent.nannies') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">person_search</span>
                        <span>Nounous</span>
                    </a>
                    <a href="{{ route('parent.nanny-profile') }}" class="flex items-center gap-4 bg-[#efe2cf] text-[#8f6b43] px-6 py-3.5 rounded-[26px] text-lg font-black shadow-sm">
                        <span class="material-symbols-rounded">badge</span>
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
                    <h2 class="text-2xl font-black mb-1">Profil nounou</h2>
                    <p class="text-[#9a8469] text-base font-semibold">Consultez les informations de la nounou sélectionnée.</p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('parent.nannies') }}" class="px-5 py-2.5 rounded-full border border-[#eadfce] bg-white text-[#8f6b43] font-bold hover:bg-[#efe2cf]">
                        Retour aux nounous
                    </a>
                    <button id="contactBtn" class="px-5 py-2.5 rounded-full bg-[#8f6b43] text-white font-bold hover:bg-[#795936]">
                        Contacter
                    </button>
                </div>
            </header>

            <main class="p-5 md:p-8">
                <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

                <section class="bg-white rounded-[32px] border border-[#eadfce] shadow-sm p-6 md:p-8 mb-6">
                    <div class="grid grid-cols-1 lg:grid-cols-[auto_1fr_auto] gap-6 items-center">
                        <div class="relative w-fit">
                            <img
                                id="nannyPhoto"
                                src="{{ asset('images/nany.jpeg') }}"
                                alt="Nounou"
                                class="w-28 h-28 md:w-32 md:h-32 rounded-[30px] object-cover border-4 border-[#efe2cf]"
                            >
                            <span class="absolute bottom-2 right-2 w-5 h-5 rounded-full bg-green-500 border-4 border-white"></span>
                        </div>

                        <div>
                            <h2 id="nannyName" class="text-3xl md:text-4xl font-black mb-1">Nounou</h2>
                            <p id="nannyTitle" class="text-[#8f6b43] text-lg font-semibold mb-2">Nounou de confiance</p>
                            <p id="nannyLocation" class="text-[#6d5c49] text-sm mb-5 flex items-center gap-2">
                                <span class="material-symbols-rounded !text-[18px]">location_on</span>
                                <span>Famille liée</span>
                            </p>

                            <div class="flex flex-wrap gap-5">
                                <div>
                                    <p id="nannyExperience" class="text-2xl md:text-3xl font-black">-</p>
                                    <p class="text-[#9a8469] uppercase text-xs font-semibold">Expérience</p>
                                </div>

                                <div class="border-l border-[#eadfce] pl-5">
                                    <p id="nannyEmail" class="text-base md:text-lg font-black break-all">-</p>
                                    <p class="text-[#9a8469] uppercase text-xs font-semibold">Email</p>
                                </div>

                                <div class="border-l border-[#eadfce] pl-5">
                                    <p id="nannyRate" class="text-base md:text-lg font-black">-</p>
                                    <p class="text-[#9a8469] uppercase text-xs font-semibold">Tarif</p>
                                </div>

                                <div class="border-l border-[#eadfce] pl-5">
                                    <p id="nannyFamilies" class="text-base md:text-lg font-black">-</p>
                                    <p class="text-[#9a8469] uppercase text-xs font-semibold">Famille</p>
                                </div>
                            </div>
                        </div>

                        <div class="justify-self-start lg:justify-self-end">
                            <div class="rounded-3xl border border-[#eadfce] bg-[#f8efe4] px-5 py-4 text-center min-w-[150px]">
                                <p id="nannyStatus" class="text-2xl font-black text-[#8f6b43]">Actif</p>
                                <p class="text-[#9a8469] uppercase text-xs font-semibold">Compte</p>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_320px] gap-6">
                    <div class="space-y-6">
                        <section class="bg-white rounded-[30px] border border-[#eadfce] shadow-sm p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="material-symbols-rounded text-[#8f6b43]">person</span>
                                <h3 class="text-2xl font-black">À propos</h3>
                            </div>

                            <p id="nannyAbout" class="text-[#6d5c49] text-base leading-7 whitespace-pre-line">
                                Profil nounou rattaché à votre famille.
                            </p>
                        </section>

                        <section class="bg-white rounded-[30px] border border-[#eadfce] shadow-sm p-6">
                            <div class="flex items-center gap-3 mb-5">
                                <span class="material-symbols-rounded text-[#8f6b43]">workspace_premium</span>
                                <h3 class="text-2xl font-black">Compétences & atouts</h3>
                            </div>

                            <div id="skillsList" class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6"></div>

                            <div>
                                <h4 class="text-lg font-black mb-3">Langues parlées</h4>
                                <div id="languagesList" class="flex flex-wrap gap-3"></div>
                            </div>
                        </section>
                    </div>

                    <div class="space-y-6">
                        <section class="bg-white rounded-[30px] border border-[#eadfce] shadow-sm p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="material-symbols-rounded text-[#8f6b43]">calendar_month</span>
                                <h3 class="text-2xl font-black">Disponibilités</h3>
                            </div>

                            <div class="rounded-[24px] bg-[#f8efe4] border border-[#eadfce] p-4 mb-5">
                                <div class="grid grid-cols-8 gap-2 mb-3 text-center">
                                    <div></div>
                                    <div class="text-[11px] uppercase tracking-[0.16em] font-black text-[#9a8469]">Lun</div>
                                    <div class="text-[11px] uppercase tracking-[0.16em] font-black text-[#9a8469]">Mar</div>
                                    <div class="text-[11px] uppercase tracking-[0.16em] font-black text-[#9a8469]">Mer</div>
                                    <div class="text-[11px] uppercase tracking-[0.16em] font-black text-[#9a8469]">Jeu</div>
                                    <div class="text-[11px] uppercase tracking-[0.16em] font-black text-[#9a8469]">Ven</div>
                                    <div class="text-[11px] uppercase tracking-[0.16em] font-black text-[#9a8469]">Sam</div>
                                    <div class="text-[11px] uppercase tracking-[0.16em] font-black text-[#9a8469]">Dim</div>
                                </div>

                                <div id="availabilityGrid" class="space-y-3"></div>
                            </div>

                            <div class="flex flex-wrap gap-4 mb-5 text-sm font-semibold text-[#6d5c49]">
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-[#8f6b43]"></span>
                                    <span>Disponible</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-[#d8c7ae]"></span>
                                    <span>Non disponible</span>
                                </div>
                            </div>

                            <div class="rounded-[22px] bg-[#fffaf3] border border-[#eadfce] p-4">
                                <p id="availabilityNote" class="text-[#6d5c49] text-sm leading-6">
                                    Disponibilités à confirmer directement avec cette nounou.
                                </p>
                            </div>
                        </section>

                        <section class="bg-white rounded-[30px] border border-[#eadfce] shadow-sm p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="material-symbols-rounded text-[#8f6b43]">map</span>
                                <h3 class="text-2xl font-black">Zone liée</h3>
                            </div>

                            <p id="zoneText" class="text-[#6d5c49] text-sm leading-7">Zone à confirmer</p>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        const nannyPhoto = document.getElementById('nannyPhoto');
        const nannyName = document.getElementById('nannyName');
        const nannyTitle = document.getElementById('nannyTitle');
        const nannyLocation = document.getElementById('nannyLocation');
        const nannyExperience = document.getElementById('nannyExperience');
        const nannyEmail = document.getElementById('nannyEmail');
        const nannyRate = document.getElementById('nannyRate');
        const nannyFamilies = document.getElementById('nannyFamilies');
        const nannyStatus = document.getElementById('nannyStatus');
        const nannyAbout = document.getElementById('nannyAbout');
        const skillsList = document.getElementById('skillsList');
        const languagesList = document.getElementById('languagesList');
        const availabilityGrid = document.getElementById('availabilityGrid');
        const availabilityNote = document.getElementById('availabilityNote');
        const zoneText = document.getElementById('zoneText');
        const sidebarAvatar = document.getElementById('sidebarAvatar');
        const sidebarName = document.getElementById('sidebarName');
        const logoutBtn = document.getElementById('logoutBtn');
        const contactBtn = document.getElementById('contactBtn');
        const messageBox = document.getElementById('messageBox');

        const defaultNannyPhoto = '{{ asset('images/nany.jpeg') }}';

        document.addEventListener('DOMContentLoaded', function () {
            guardParentAccess();
            loadUserInfo();
            renderNannyProfile();
        });

        nannyPhoto.addEventListener('error', function () {
            if (nannyPhoto.src !== defaultNannyPhoto) {
                nannyPhoto.src = defaultNannyPhoto;
            }
        });

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('access_token');
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            localStorage.removeItem('selectedNannyProfile');
            window.location.href = '/login';
        });

        contactBtn.addEventListener('click', function () {
            window.location.href = '{{ route('parent.messages') }}';
        });

        function getToken() {
            return localStorage.getItem('access_token') || localStorage.getItem('token');
        }

        function getStoredUser() {
            try {
                return JSON.parse(localStorage.getItem('user'));
            } catch (error) {
                return null;
            }
        }

        function getSelectedNanny() {
            try {
                return JSON.parse(localStorage.getItem('selectedNannyProfile'));
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
            const user = getStoredUser();

            if (!user) {
                return;
            }

            sidebarAvatar.textContent = getInitials(user.name || 'P');
            sidebarName.textContent = user.name || 'Espace parent';
        }

        function renderNannyProfile() {
            const nanny = getSelectedNanny();

            if (!nanny) {
                showMessage('Aucune nounou sélectionnée. Choisissez une nounou depuis la liste.', 'error');
                return;
            }

            nannyPhoto.src = nanny.photo || defaultNannyPhoto;
            nannyName.textContent = nanny.name || 'Nounou';
            nannyTitle.textContent = nanny.title || 'Nounou de confiance';
            nannyLocation.innerHTML = '<span class="material-symbols-rounded !text-[18px]">location_on</span><span>' + escapeHtml(nanny.location || 'Famille liée') + '</span>';
            nannyExperience.textContent = nanny.experience || 'Non renseigné';
            nannyEmail.textContent = nanny.email || 'Email indisponible';
            nannyRate.textContent = nanny.rate || '---';
            nannyFamilies.textContent = nanny.family_label || nanny.family_name || 'Famille liée';
            nannyStatus.textContent = nanny.is_active ? 'Actif' : 'Inactif';
            nannyAbout.textContent = nanny.about || 'Profil nounou rattaché à votre famille.';
            availabilityNote.textContent = nanny.availabilityNote || 'Disponibilités à confirmer directement avec cette nounou.';
            zoneText.textContent = nanny.zone || nanny.family_label || 'Zone à confirmer';

            renderSkills(nanny.skills || []);
            renderLanguages(nanny.languages || []);
            renderAvailability(nanny.availability || {});
        }

        function renderSkills(skills) {
            skillsList.innerHTML = '';

            if (skills.length === 0) {
                skillsList.innerHTML = '<div class="rounded-2xl bg-[#f8efe4] border border-[#eadfce] px-4 py-3 text-sm text-[#6d5c49]">Aucune compétence détaillée pour le moment.</div>';
                return;
            }

            skills.forEach(function (skill) {
                const item = document.createElement('div');
                item.className = 'rounded-2xl bg-[#f8efe4] border border-[#eadfce] px-4 py-3 text-sm font-semibold text-[#5d4c39]';
                item.innerHTML = '<span class="material-symbols-rounded !text-[16px] align-middle mr-2 text-[#8f6b43]">check_circle</span>' + escapeHtml(skill);
                skillsList.appendChild(item);
            });
        }

        function renderLanguages(languages) {
            languagesList.innerHTML = '';

            if (languages.length === 0) {
                languagesList.innerHTML = '<div class="rounded-full bg-[#efe2cf] text-[#8f6b43] px-3 py-2 text-sm font-semibold">Français</div>';
                return;
            }

            languages.forEach(function (lang) {
                const item = document.createElement('div');
                item.className = 'rounded-full bg-[#efe2cf] text-[#8f6b43] px-3 py-2 text-sm font-semibold';
                item.innerHTML = `
                    ${escapeHtml(lang.name)}
                    <span class="text-xs uppercase text-[#9a8469] ml-2">${escapeHtml(lang.level || '')}</span>
                `;
                languagesList.appendChild(item);
            });
        }

        function renderAvailability(availability) {
            availabilityGrid.innerHTML = '';

            const rows = [
                { label: 'Matin', key: 'matin' },
                { label: 'Après-midi', key: 'aprem' },
                { label: 'Soirée', key: 'soiree' }
            ];

            rows.forEach(function (row) {
                const values = Array.isArray(availability[row.key]) ? availability[row.key] : [0, 0, 0, 0, 0, 0, 0];
                const line = document.createElement('div');
                line.className = 'grid grid-cols-8 gap-2 items-center';

                let html = `<div class="text-sm font-black text-[#5d4c39]">${row.label}</div>`;

                values.forEach(function (value) {
                    const stateClass = value === 1 ? 'availability-chip availability-chip--on' : 'availability-chip availability-chip--off';
                    const stateIcon = value === 1 ? 'check' : 'remove';
                    html += `
                        <div class="${stateClass}">
                            <span class="material-symbols-rounded !text-[16px]">${stateIcon}</span>
                        </div>
                    `;
                });

                line.innerHTML = html;
                availabilityGrid.appendChild(line);
            });
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
