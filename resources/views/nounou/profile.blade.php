<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil Nounou - Family Organizer</title>
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
        .nounou-profile-theme .bg-white { background-color: #fffaf3 !important; }
        .nounou-profile-theme .bg-blue-600,
        .nounou-profile-theme .bg-blue-500 { background-color: #8f6b43 !important; }
        .nounou-profile-theme .hover\:bg-blue-700:hover { background-color: #795936 !important; }
        .nounou-profile-theme .bg-blue-100,
        .nounou-profile-theme .bg-blue-50,
        .nounou-profile-theme .hover\:bg-blue-50:hover { background-color: #efe2cf !important; }
        .nounou-profile-theme .bg-slate-100,
        .nounou-profile-theme .bg-slate-200 { background-color: #f3e8d9 !important; }
        .nounou-profile-theme .text-blue-600,
        .nounou-profile-theme .hover\:text-blue-600:hover { color: #8f6b43 !important; }
        .nounou-profile-theme .text-slate-900 { color: #2f281f !important; }
        .nounou-profile-theme .text-slate-700,
        .nounou-profile-theme .text-slate-600,
        .nounou-profile-theme .text-slate-500 { color: #6d5c49 !important; }
        .nounou-profile-theme .text-slate-400,
        .nounou-profile-theme .text-blue-300 { color: #9a8469 !important; }
        .nounou-profile-theme .border-slate-100,
        .nounou-profile-theme .border-slate-200,
        .nounou-profile-theme .border-blue-100,
        .nounou-profile-theme .border-blue-200 { border-color: #eadfce !important; }
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

<body class="nounou-profile-theme bg-[#f7f0e7] text-[#2f281f] min-h-screen">
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
                        N
                    </div>
                    <div>
                        <p id="sidebarName" class="text-xl font-black leading-none mb-1">Chargement...</p>
                        <p class="text-[#9a8469] text-sm font-semibold">Espace nounou</p>
                    </div>
                </div>

                <nav class="space-y-5">
                    <a href="{{ route('nounou.dashboard') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">dashboard</span>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('nounou.planning') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">calendar_month</span>
                        <span>Planning</span>
                    </a>
                    <a href="{{ route('nounou.messages') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">chat_bubble</span>
                        <span>Messagerie</span>
                    </a>
                    <a href="{{ route('nounou.profile') }}" class="flex items-center gap-4 bg-[#efe2cf] text-[#8f6b43] px-6 py-3.5 rounded-[26px] text-lg font-black shadow-sm">
                        <span class="material-symbols-rounded">badge</span>
                        <span>Mon profil</span>
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

        <div class="flex-1  min-w-0">
            <header class="bg-[#fffaf3]/90 backdrop-blur px-6 md:px-8 py-5 flex items-center justify-between border-b border-[#eadfce]">
                <div>
                    <h2 class="text-2xl font-black mb-1">Mon profil nounou</h2>
                    <p class="text-[#9a8469] text-base font-semibold">Mettez en valeur votre photo, vos compétences et vos langues.</p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('nounou.messages') }}" class="px-5 py-2.5 rounded-full border border-[#eadfce] bg-white text-[#8f6b43] font-bold hover:bg-[#efe2cf]">
                        Ouvrir la messagerie
                    </a>
                </div>
            </header>

            <main class="p-5 md:p-8">
                <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

                <section class="bg-white rounded-[32px] border border-[#eadfce] shadow-sm p-6 md:p-8 mb-6">
                    <div class="grid grid-cols-1 lg:grid-cols-[auto_1fr_auto] gap-6 items-center">
                        <div class="relative w-fit">
                            <input id="profilePhotoInput" type="file" accept="image/*" class="hidden">
                            <img
                                id="profilePhoto"
                                src="{{ asset('images/nany.jpeg') }}"
                                alt="Photo nounou"
                                class="w-28 h-28 md:w-32 md:h-32 rounded-[30px] object-cover border-4 border-[#efe2cf]"
                            >
                            <button id="editPhotoBtn" class="absolute -bottom-2 -right-2 w-10 h-10 rounded-2xl bg-[#8f6b43] text-white shadow-lg hover:bg-[#795936] flex items-center justify-center">
                                <span class="material-symbols-rounded !text-[18px]">edit</span>
                            </button>
                        </div>

                        <div>
                            <h2 id="profileName" class="text-3xl md:text-4xl font-black mb-1">Nounou</h2>
                            <p id="profileTitle" class="text-[#8f6b43] text-lg font-semibold mb-2">Nounou de confiance</p>
                            <p id="profileEmail" class="text-[#6d5c49] text-sm mb-5 break-all">email@example.com</p>

                            <div class="flex flex-wrap gap-5">
                                <div>
                                    <p id="profileExperience" class="text-2xl md:text-3xl font-black">-</p>
                                    <p class="text-[#9a8469] uppercase text-xs font-semibold">Expérience</p>
                                </div>

                                <div class="border-l border-[#eadfce] pl-5">
                                    <p id="profileRate" class="text-base md:text-lg font-black">-</p>
                                    <p class="text-[#9a8469] uppercase text-xs font-semibold">Tarif</p>
                                </div>

                                <div class="border-l border-[#eadfce] pl-5">
                                    <p id="profileStatus" class="text-base md:text-lg font-black text-green-600">Active</p>
                                    <p class="text-[#9a8469] uppercase text-xs font-semibold">Compte</p>
                                </div>
                            </div>
                        </div>

                        <div class="justify-self-start lg:justify-self-end">
                            <div class="rounded-3xl border border-[#eadfce] bg-[#f8efe4] px-5 py-4 text-center min-w-[170px]">
                                <p class="text-sm uppercase tracking-[0.18em] text-[#9a8469] font-black mb-2">Profil</p>
                                <button id="editStatsBtn" class="px-4 py-2.5 rounded-full bg-[#8f6b43] text-white font-bold hover:bg-[#795936]">
                                    Modifier
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_320px] gap-6">
                    <div class="space-y-6">
                        <section class="bg-white rounded-[30px] border border-[#eadfce] shadow-sm p-6">
                            <div class="flex items-center justify-between gap-4 mb-4">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-rounded text-[#8f6b43]">person</span>
                                    <h3 class="text-2xl font-black">À propos</h3>
                                </div>

                                <button id="editAboutBtn" class="text-[#8f6b43] font-bold text-sm hover:underline">
                                    Modifier
                                </button>
                            </div>

                            <p id="profileAbout" class="text-[#6d5c49] text-base leading-7 whitespace-pre-line">
                                Je suis une nounou attentive, organisée et bienveillante. J’aime accompagner les enfants dans leurs routines et proposer des activités calmes, éducatives et adaptées à leur âge.
                            </p>
                        </section>

                        <section class="bg-white rounded-[30px] border border-[#eadfce] shadow-sm p-6">
                            <div class="flex items-center justify-between gap-4 mb-5">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-rounded text-[#8f6b43]">workspace_premium</span>
                                    <h3 class="text-2xl font-black">Compétences & langues</h3>
                                </div>

                                <button id="editSkillsBtn" class="text-[#8f6b43] font-bold text-sm hover:underline">
                                    Modifier
                                </button>
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
                                    Mes créneaux sont à confirmer selon mon planning.
                                </p>
                            </div>
                        </section>

                        <section class="bg-white rounded-[30px] border border-[#eadfce] shadow-sm p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="material-symbols-rounded text-[#8f6b43]">tips_and_updates</span>
                                <h3 class="text-2xl font-black">Conseil</h3>
                            </div>
                            <p class="text-[#6d5c49] text-sm leading-7">
                                Une photo claire et quelques compétences bien choisies rendent votre profil plus professionnel et plus rassurant pour les parents.
                            </p>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div id="skillsModal" class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center px-4">
        <div class="bg-[#fffaf3] rounded-[28px] w-full max-w-2xl p-6 border border-[#eadfce]">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-2xl font-black">Modifier compétences & langues</h3>
                <button id="closeSkillsModalBtn" class="text-3xl text-[#9a8469] hover:text-[#4a3c2d]">×</button>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-[#7b6b58] mb-2 font-semibold">Présentation</label>
                    <textarea id="aboutTextarea" rows="4" class="w-full rounded-2xl border border-[#eadfce] bg-white px-4 py-3 outline-none focus:border-[#8f6b43]" placeholder="Présentez-vous en quelques lignes"></textarea>
                </div>

                <div>
                    <label class="block text-sm text-[#7b6b58] mb-2 font-semibold">Compétences</label>
                    <textarea id="skillsTextarea" rows="5" class="w-full rounded-2xl border border-[#eadfce] bg-white px-4 py-3 outline-none focus:border-[#8f6b43]" placeholder="Une compétence par ligne"></textarea>
                </div>

                <div>
                    <label class="block text-sm text-[#7b6b58] mb-2 font-semibold">Langues</label>
                    <textarea id="languagesTextarea" rows="4" class="w-full rounded-2xl border border-[#eadfce] bg-white px-4 py-3 outline-none focus:border-[#8f6b43]" placeholder="Exemple : Français - Courant"></textarea>
                </div>
            </div>

            <div class="flex gap-3 mt-5">
                <button id="cancelSkillsBtn" class="flex-1 border border-[#d8c7ae] rounded-2xl py-3 font-bold">
                    Annuler
                </button>
                <button id="saveSkillsBtn" class="flex-1 bg-[#8f6b43] text-white rounded-2xl py-3 font-bold">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>

    <div id="statsModal" class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center px-4">
        <div class="bg-[#fffaf3] rounded-[28px] w-full max-w-lg p-6 border border-[#eadfce]">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-2xl font-black">Modifier tarif & expérience</h3>
                <button id="closeStatsModalBtn" class="text-3xl text-[#9a8469] hover:text-[#4a3c2d]">×</button>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-[#7b6b58] mb-2 font-semibold">Années d'expérience</label>
                    <input id="experienceYearsInput" type="number" min="0" max="60" class="w-full rounded-2xl border border-[#eadfce] bg-white px-4 py-3 outline-none focus:border-[#8f6b43]" placeholder="Exemple : 5">
                </div>

                <div>
                    <label class="block text-sm text-[#7b6b58] mb-2 font-semibold">Tarif horaire (€)</label>
                    <input id="hourlyRateInput" type="number" min="0" step="0.01" class="w-full rounded-2xl border border-[#eadfce] bg-white px-4 py-3 outline-none focus:border-[#8f6b43]" placeholder="Exemple : 15">
                </div>
            </div>

            <div class="flex gap-3 mt-5">
                <button id="cancelStatsBtn" class="flex-1 border border-[#d8c7ae] rounded-2xl py-3 font-bold">
                    Annuler
                </button>
                <button id="saveStatsBtn" class="flex-1 bg-[#8f6b43] text-white rounded-2xl py-3 font-bold">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>

    <script>
        const sidebarAvatar = document.getElementById('sidebarAvatar');
        const sidebarName = document.getElementById('sidebarName');
        const logoutBtn = document.getElementById('logoutBtn');
        const messageBox = document.getElementById('messageBox');

        const profilePhoto = document.getElementById('profilePhoto');
        const profilePhotoInput = document.getElementById('profilePhotoInput');
        const editPhotoBtn = document.getElementById('editPhotoBtn');
        const editStatsBtn = document.getElementById('editStatsBtn');
        const profileName = document.getElementById('profileName');
        const profileTitle = document.getElementById('profileTitle');
        const profileEmail = document.getElementById('profileEmail');
        const profileExperience = document.getElementById('profileExperience');
        const profileRate = document.getElementById('profileRate');
        const profileStatus = document.getElementById('profileStatus');
        const profileAbout = document.getElementById('profileAbout');
        const skillsList = document.getElementById('skillsList');
        const languagesList = document.getElementById('languagesList');
        const availabilityGrid = document.getElementById('availabilityGrid');
        const availabilityNote = document.getElementById('availabilityNote');

        const editAboutBtn = document.getElementById('editAboutBtn');
        const editSkillsBtn = document.getElementById('editSkillsBtn');
        const skillsModal = document.getElementById('skillsModal');
        const closeSkillsModalBtn = document.getElementById('closeSkillsModalBtn');
        const cancelSkillsBtn = document.getElementById('cancelSkillsBtn');
        const saveSkillsBtn = document.getElementById('saveSkillsBtn');
        const aboutTextarea = document.getElementById('aboutTextarea');
        const skillsTextarea = document.getElementById('skillsTextarea');
        const languagesTextarea = document.getElementById('languagesTextarea');
        const statsModal = document.getElementById('statsModal');
        const closeStatsModalBtn = document.getElementById('closeStatsModalBtn');
        const cancelStatsBtn = document.getElementById('cancelStatsBtn');
        const saveStatsBtn = document.getElementById('saveStatsBtn');
        const experienceYearsInput = document.getElementById('experienceYearsInput');
        const hourlyRateInput = document.getElementById('hourlyRateInput');

        const defaultProfilePhoto = '{{ asset('images/nany.jpeg') }}';

        let currentUser = null;
        let profileData = null;

        document.addEventListener('DOMContentLoaded', function () {
            guardNannyAccess();
            loadProfile();
        });

        editPhotoBtn.addEventListener('click', function () {
            profilePhotoInput.click();
        });

        editStatsBtn.addEventListener('click', function () {
            openStatsModal();
        });

        profilePhotoInput.addEventListener('change', function () {
            updateProfilePhoto();
        });

        profilePhoto.addEventListener('error', function () {
            if (profilePhoto.src !== defaultProfilePhoto) {
                profilePhoto.src = defaultProfilePhoto;
            }
        });

        editAboutBtn.addEventListener('click', function () {
            openSkillsModal();
        });

        editSkillsBtn.addEventListener('click', function () {
            openSkillsModal();
        });

        closeSkillsModalBtn.addEventListener('click', function () {
            closeSkillsModal();
        });

        cancelSkillsBtn.addEventListener('click', function () {
            closeSkillsModal();
        });

        saveSkillsBtn.addEventListener('click', function () {
            saveSkillsAndLanguages();
        });

        closeStatsModalBtn.addEventListener('click', function () {
            closeStatsModal();
        });

        cancelStatsBtn.addEventListener('click', function () {
            closeStatsModal();
        });

        saveStatsBtn.addEventListener('click', function () {
            saveStats();
        });

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('access_token');
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            window.location.href = '/login';
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

        function guardNannyAccess() {
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

            if (user.role === 'parent') {
                window.location.href = '/parent/dashboard';
                return;
            }

            if (user.role !== 'nounou') {
                window.location.href = '/';
            }
        }
        // charge les informations complètes du profil de la nounou 
        async function loadProfile() {
            currentUser = await fetchCurrentUser();

            if (!currentUser) {
                showMessage('Impossible de charger votre profil.', 'error');
                return;
            }

            localStorage.setItem('user', JSON.stringify(currentUser));
            profileData = getStoredProfileData(currentUser);

            sidebarAvatar.textContent = getInitials(currentUser.name || 'N');
            sidebarName.textContent = currentUser.name || 'Espace nounou';

            profileName.textContent = currentUser.name || 'Profil nounou';
            profileTitle.textContent = 'Nounou de confiance';
            profileEmail.textContent = currentUser.email || '';
            profileExperience.textContent = currentUser.experience_years ? currentUser.experience_years + ' ans' : 'Non renseigné';
            profileRate.textContent = formatRate(currentUser.hourly_rate);
            profileStatus.textContent = currentUser.is_active === false ? 'Inactif' : 'Actif';
            profileAbout.textContent = profileData.about;
            availabilityNote.textContent = profileData.availabilityNote;
            profilePhoto.src = profileData.photo || currentUser.photo || defaultProfilePhoto;

            renderSkills(profileData.skills);
            renderLanguages(profileData.languages);
            renderAvailability(profileData.availability);
        }
        // user connecter 
        async function fetchCurrentUser() {
            const token = getToken();

            if (!token) {
                return getStoredUser();
            }

            try {
                const response = await fetch('/api/auth/me', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    return getStoredUser();
                }

                const data = await response.json();
                return data.user || getStoredUser();
            } catch (error) {
                return getStoredUser();
            }
        }
        // donner par default de nounou &
        function getStoredProfileData(user) {
            return {
                photo: user.photo || '',
                about: user.bio || 'Je suis une nounou attentive, organisée et bienveillante. J’aime accompagner les enfants dans leurs routines et proposer des activités calmes, éducatives et adaptées à leur âge.',
                skills: Array.isArray(user.skills) && user.skills.length > 0 ? user.skills : [
                    'Garde d’enfants',
                    'Organisation des routines',
                    'Activités éducatives',
                    'Communication avec les parents'
                ],
                languages: Array.isArray(user.languages) && user.languages.length > 0 ? user.languages : [
                    { name: 'Français', level: 'Courant' },
                    { name: 'Anglais', level: 'Intermédiaire' }
                ],
                availabilityNote: 'Mes créneaux sont à confirmer selon mon planning.',
                availability: {
                    matin: [1, 1, 1, 1, 1, 0, 0],
                    aprem: [1, 1, 1, 1, 1, 0, 0],
                    soiree: [0, 1, 0, 1, 1, 0, 0]
                }
            };
        }
        // envoie une nouvelle photo de profil 
        async function updateProfilePhoto() {
            const file = profilePhotoInput.files[0];

            if (!file) {
                return;
            }

            if (!file.type.startsWith('image/')) {
                showMessage('Veuillez choisir une image valide.', 'error');
                profilePhotoInput.value = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                showMessage('Veuillez choisir une image de moins de 2 Mo.', 'error');
                profilePhotoInput.value = '';
                return;
            }

            const formData = new FormData();
            formData.append('photo', file);

            await saveProfile(formData, 'Photo mise à jour avec succès.');
            profilePhotoInput.value = '';
        }
        // ouvre la fenêtre modale permettant de modifier la description 
        function openSkillsModal() {
            aboutTextarea.value = profileData.about || '';
            skillsTextarea.value = profileData.skills.join('\n');
            languagesTextarea.value = profileData.languages.map(function (language) {
                return language.level ? language.name + ' - ' + language.level : language.name;
            }).join('\n');

            skillsModal.classList.remove('hidden');
            skillsModal.classList.add('flex');
        }

        function closeSkillsModal() {
            skillsModal.classList.add('hidden');
            skillsModal.classList.remove('flex');
        }

        function openStatsModal() {
            experienceYearsInput.value = currentUser && currentUser.experience_years != null ? currentUser.experience_years : '';
            hourlyRateInput.value = currentUser && currentUser.hourly_rate != null ? Number(currentUser.hourly_rate) : '';
            statsModal.classList.remove('hidden');
            statsModal.classList.add('flex');
        }

        function closeStatsModal() {
            statsModal.classList.add('hidden');
            statsModal.classList.remove('flex');
        }
        // récupère les compétences, langues et description 
        async function saveSkillsAndLanguages() {
            const skills = skillsTextarea.value
                .split('\n')
                .map(function (item) { return item.trim(); })
                .filter(Boolean);

            const languages = languagesTextarea.value
                .split('\n')
                .map(function (line) { return line.trim(); })
                .filter(Boolean)
                .map(function (line) {
                    const parts = line.split(' - ');
                    return {
                        name: (parts[0] || '').trim(),
                        level: (parts[1] || '').trim()
                    };
                })
                .filter(function (item) { return item.name !== ''; });

            const payload = {
                bio: aboutTextarea.value.trim(),
                skills: skills.length > 0 ? skills : ['Compétence à renseigner'],
                languages: languages.length > 0 ? languages : [{ name: 'Français', level: 'Courant' }]
            };

            const saved = await saveProfile(payload, 'Profil mis à jour avec succès.');

            if (saved) {
                closeSkillsModal();
            }
        }

        async function saveStats() {
            const experienceValue = experienceYearsInput.value.trim();
            const rateValue = hourlyRateInput.value.trim();

            const payload = {
                experience_years: experienceValue === '' ? null : Number(experienceValue),
                hourly_rate: rateValue === '' ? null : Number(rateValue)
            };

            if (payload.experience_years !== null && (Number.isNaN(payload.experience_years) || payload.experience_years < 0 || payload.experience_years > 60)) {
                showMessage('Veuillez saisir une expérience valide.', 'error');
                return;
            }

            if (payload.hourly_rate !== null && (Number.isNaN(payload.hourly_rate) || payload.hourly_rate < 0)) {
                showMessage('Veuillez saisir un tarif valide.', 'error');
                return;
            }

            const saved = await saveProfile(payload, 'Tarif et expérience mis à jour avec succès.');

            if (saved) {
                closeStatsModal();
            }
        }

        async function saveProfile(payload, successMessage) {
            const token = getToken();

            if (!token) {
                showMessage('Session expirée. Reconnectez-vous.', 'error');
                return false;
            }

            try {
                const isFormData = payload instanceof FormData;
                const response = await fetch('/api/auth/profile', {
                    method: 'POST',
                    headers: isFormData ? {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    } : {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: isFormData ? payload : JSON.stringify(payload)
                });

                const data = await response.json().catch(function () { return {}; });

                if (!response.ok) {
                    throw new Error(data.message || 'Impossible d’enregistrer le profil.');
                }

                currentUser = data.user || currentUser;
                localStorage.setItem('user', JSON.stringify(currentUser));
                profileData = getStoredProfileData(currentUser);

                sidebarAvatar.textContent = getInitials(currentUser.name || 'N');
                sidebarName.textContent = currentUser.name || 'Espace nounou';
                profileName.textContent = currentUser.name || 'Profil nounou';
                profileEmail.textContent = currentUser.email || '';
                profileExperience.textContent = currentUser.experience_years ? currentUser.experience_years + ' ans' : 'Non renseigné';
                profileRate.textContent = formatRate(currentUser.hourly_rate);
                profileStatus.textContent = currentUser.is_active === false ? 'Inactif' : 'Actif';
                profileAbout.textContent = profileData.about;
                profilePhoto.src = profileData.photo || defaultProfilePhoto;
                renderSkills(profileData.skills);
                renderLanguages(profileData.languages);

                showMessage(successMessage, 'success');
                return true;
            } catch (error) {
                showMessage(error.message || 'Une erreur est survenue.', 'error');
                return false;
            }
        }

        function renderSkills(skills) {
            skillsList.innerHTML = '';

            skills.forEach(function (skill) {
                const item = document.createElement('div');
                item.className = 'rounded-2xl bg-[#f8efe4] border border-[#eadfce] px-4 py-3 text-sm font-semibold text-[#5d4c39]';
                item.innerHTML = '<span class="material-symbols-rounded !text-[16px] align-middle mr-2 text-[#8f6b43]">check_circle</span>' + escapeHtml(skill);
                skillsList.appendChild(item);
            });
        }

        function renderLanguages(languages) {
            languagesList.innerHTML = '';

            languages.forEach(function (language) {
                const item = document.createElement('div');
                item.className = 'rounded-full bg-[#efe2cf] text-[#8f6b43] px-3 py-2 text-sm font-semibold';
                item.innerHTML = `
                    ${escapeHtml(language.name)}
                    <span class="text-xs uppercase text-[#9a8469] ml-2">${escapeHtml(language.level || '')}</span>
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

        function formatRate(rate) {
            const value = Number(rate);

            if (Number.isNaN(value) || value <= 0) {
                return 'Non renseigné';
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

            return initials.substring(0, 2).toUpperCase() || 'N';
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
