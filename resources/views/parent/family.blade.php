<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Famille - Organisateur Familial</title>
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
        .parent-family-theme .bg-white { background-color: #fffaf3 !important; }
        .parent-family-theme .bg-blue-600,
        .parent-family-theme .bg-blue-500 { background-color: #8f6b43 !important; }
        .parent-family-theme .hover\:bg-blue-700:hover { background-color: #795936 !important; }
        .parent-family-theme .bg-blue-100,
        .parent-family-theme .bg-blue-50,
        .parent-family-theme .hover\:bg-blue-50:hover { background-color: #efe2cf !important; }
        .parent-family-theme .bg-slate-100,
        .parent-family-theme .bg-slate-200 { background-color: #f3e8d9 !important; }
        .parent-family-theme .text-blue-600,
        .parent-family-theme .hover\:text-blue-600:hover { color: #8f6b43 !important; }
        .parent-family-theme .text-slate-900 { color: #2f281f !important; }
        .parent-family-theme .text-slate-700 { color: #5d4c39 !important; }
        .parent-family-theme .text-slate-600,
        .parent-family-theme .text-slate-500,
        .parent-family-theme .text-slate-400 { color: #9a8469 !important; }
        .parent-family-theme .border-slate-100,
        .parent-family-theme .border-slate-200 { border-color: #eadfce !important; }
    </style>
</head>

<body class="parent-family-theme bg-[#f7f0e7] text-[#2f281f] min-h-screen">

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
                        F
                    </div>
                    <div>
                        <p id="sidebarFamilyName" class="text-xl font-black leading-none mb-1">Chargement...</p>
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
                    <a href="{{ route('parent.family') }}" class="flex items-center gap-4 bg-[#efe2cf] text-[#8f6b43] px-6 py-3.5 rounded-[26px] text-lg font-black shadow-sm">
                        <span class="material-symbols-rounded">home</span>
                        <span>Profil famille</span>
                    </a>
                    <a href="{{ route('parent.nannies') }}" class="flex items-center gap-4 px-6 py-2.5 text-lg text-[#5d4c39] hover:text-[#8f6b43] hover:bg-[#efe2cf] rounded-[24px]">
                        <span class="material-symbols-rounded text-[#b08a5f]">person_search</span>
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
                    <h2 class="text-2xl font-black mb-1">Profil famille</h2>
                    <p class="text-[#9a8469] text-base font-semibold">Gérez les informations importantes de votre foyer.</p>
                </div>

                <div class="flex items-center gap-3">
                    <button class="w-10 h-10 rounded-2xl flex items-center justify-center text-[#6d5c49] hover:bg-[#efe2cf]">
                        <span class="material-symbols-rounded">notifications</span>
                    </button>
                    <a href="{{ route('parent.nannies') }}" class="px-5 py-2.5 rounded-full bg-[#8f6b43] text-white font-bold hover:bg-[#795936]">
                        Voir les nounous
                    </a>
                </div>
            </header>

            <main class="p-5 md:p-8">
        <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

        <div class="mb-7 rounded-[32px] bg-gradient-to-br from-[#fffaf3] via-[#f2e3cf] to-[#d9b98c] border border-[#eadfce] p-6 md:p-8 shadow-sm overflow-hidden relative">
            <div class="absolute -right-16 -top-16 w-48 h-48 rounded-full bg-white/25"></div>
            <div class="relative max-w-2xl">
                <p class="text-xs uppercase tracking-[0.22em] text-[#8f6b43] font-black mb-3">Espace famille</p>
                <h1 class="text-3xl md:text-4xl font-black leading-tight mb-3">Votre cocon familial, bien organisé.</h1>
                <p class="text-[#6d5c49] text-sm md:text-base leading-7">
                    Retrouvez les informations importantes de la famille, les enfants, les routines et les besoins à partager avec la nounou.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-[280px_minmax(0,1fr)] gap-6">

            <!-- LEFT COLUMN -->
            <div class="space-y-6">

                <!-- FAMILY CARD -->
                <section class="bg-[#fffaf3] rounded-[30px] border border-[#eadfce] shadow-sm p-6 text-center">
                    <input id="parentPhotoInput" type="file" accept="image/*" class="hidden">

                    <div class="relative w-fit mx-auto mb-5">
                        <img
                            id="familyPhoto" src="{{ asset('images/image1.jpeg') }}" alt="Photo du parent"
                            class="w-36 h-36 rounded-[34px] object-cover border-4 border-white shadow-md"
                        >

                        <button id="editPhotoBtn"
                            class="absolute -bottom-2 -right-2 w-10 h-10 rounded-2xl bg-[#8f6b43] text-white shadow-lg hover:bg-[#795936] flex items-center justify-center">
                            <span class="material-symbols-rounded !text-[18px]">edit</span>
                        </button>
                    </div>

                    <p class="text-xs uppercase tracking-[0.18em] text-[#b08a5f] font-black mb-2">Photo parent</p>
                    <h1 id="familyName" class="text-2xl font-black mb-2">Chargement...</h1>

                    <p id="familyLocation" class="text-[#7b6b58] text-sm flex items-center justify-center gap-2">
                        <span class="material-symbols-rounded !text-[18px] text-[#b08a5f]">location_on</span>
                        <span>Localisation indisponible</span>
                    </p>
                </section>

                <!-- ACCOUNT SETTINGS -->
                <section class="bg-[#fffaf3] rounded-[30px] border border-[#eadfce] shadow-sm p-5">
                    <div class="flex items-start gap-3 mb-5">
                        <span class="material-symbols-rounded text-[#8f6b43]">settings</span>
                        <h2 class="text-xl font-black leading-tight">Paramètres du compte</h2>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-[#b08a5f] font-black mb-2">Email</p>
                            <p id="parentEmail" class="text-sm font-semibold break-all text-[#4a3c2d]">Chargement...</p>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-[#5d4c39] font-semibold">Notifications App</span>
                            <button id="notificationsToggle"
                                class="w-12 h-7 rounded-full bg-[#8f6b43] relative transition">
                                <span id="notificationsDot"
                                    class="absolute top-1 right-1 w-5 h-5 bg-white rounded-full shadow transition"></span>
                            </button>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-[#5d4c39] font-semibold">Résumé Hebdomadaire</span>
                            <button id="weeklySummaryToggle"
                                class="w-12 h-7 rounded-full bg-[#d8c7ae] relative transition">
                                <span id="weeklySummaryDot"
                                    class="absolute top-1 left-1 w-5 h-5 bg-white rounded-full shadow transition"></span>
                            </button>
                        </div>

                        <button id="editAccessBtn"
                            class="w-full mt-3 rounded-full border border-[#8f6b43] text-[#8f6b43] py-3 text-sm font-bold hover:bg-[#efe2cf]">
                            Modifier mes accès
                        </button>
                    </div>
                </section>
            </div>

            <!-- RIGHT COLUMN -->
            <div class="space-y-6">

                <!-- ABOUT FAMILY -->
                <section class="bg-[#fffaf3] rounded-[30px] border border-[#eadfce] shadow-sm p-6">
                    <div class="flex items-start justify-between gap-4 mb-5">
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-rounded text-[#8f6b43]">family_restroom</span>
                            <h2 class="text-2xl font-black">À propos de notre famille</h2>
                        </div>

                        <button id="editAboutBtn" class="text-[#8f6b43] font-bold text-sm hover:underline">
                            Modifier
                        </button>
                    </div>

                    <p id="familyAbout" class="text-[#6d5c49] text-base leading-7">
                        Chargement de la description...
                    </p>
                </section>

                <!-- CHILDREN -->
                <section>
                    <div class="flex items-center justify-between gap-4 mb-5">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-rounded text-[#8f6b43]">child_care</span>
                            <h2 class="text-2xl font-black">Mes Enfants</h2>
                        </div>

                        <button id="addChildBtn"
                            class="px-5 py-3 rounded-full bg-[#8f6b43] text-white text-sm font-bold hover:bg-[#795936] shadow-sm">
                            + Ajouter un enfant
                        </button>
                    </div>

                    <div id="childrenList" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-[#fffaf3] rounded-[26px] border border-[#eadfce] shadow-sm p-5 text-[#9a8469]">
                            Chargement...
                        </div>
                    </div>
                </section>

                <!-- NEEDS + ROUTINES -->
                <section id="needsSection" class="hidden bg-[#fffaf3] rounded-[30px] border border-[#eadfce] shadow-sm p-6">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="material-symbols-rounded text-[#8f6b43]">checklist</span>
                        <h2 class="text-2xl font-black">Besoins spécifiques & Routines</h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Allergies -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <span class="material-symbols-rounded text-[#c46b5f]">health_and_safety</span>
                                <h3 class="text-lg font-black text-[#c46b5f]">Allergies</h3>
                            </div>

                            <div id="allergiesList" class="space-y-3">
                            </div>
                        </div>

                        <!-- Routines -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <span class="material-symbols-rounded text-[#8f6b43]">routine</span>
                                <h3 class="text-lg font-black text-[#8f6b43]">Routines</h3>
                            </div>

                            <div id="routinesList" class="space-y-3">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
                <footer class="py-6 text-center text-[#9a8469] text-sm">
                    © 2024 Organisateur Familial. Conçu avec soin pour votre famille.
                </footer>
            </main>
        </div>
    </div>

    <!-- MODAL ABOUT -->
    <div id="aboutModal" class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center px-4">
        <div class="bg-[#fffaf3] rounded-[28px] w-full max-w-2xl p-6 border border-[#eadfce]">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-2xl font-black">Modifier la description</h3>
                <button id="closeAboutModalBtn" class="text-3xl text-[#9a8469] hover:text-[#4a3c2d]">×</button>
            </div>

            <textarea id="aboutTextarea" rows="6"
                class="w-full rounded-2xl border border-[#eadfce] bg-white px-4 py-3 outline-none focus:border-[#8f6b43]"></textarea>

            <div class="flex gap-3 mt-5">
                <button id="cancelAboutBtn" class="flex-1 border border-[#d8c7ae] rounded-2xl py-3 font-bold">
                    Annuler
                </button>
                <button id="saveAboutBtn" class="flex-1 bg-[#8f6b43] text-white rounded-2xl py-3 font-bold">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL CHILD -->
    <div id="childModal" class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center px-4">
        <div class="bg-[#fffaf3] rounded-[28px] w-full max-w-xl p-6 border border-[#eadfce]">
            <div class="flex items-center justify-between mb-5">
                <h3 id="childModalTitle" class="text-2xl font-black">Ajouter un enfant</h3>
                <button id="closeChildModalBtn" class="text-3xl text-[#9a8469] hover:text-[#4a3c2d]">×</button>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-[#7b6b58] mb-2 font-semibold">Nom</label>
                    <input id="childNameInput" type="text"
                        class="w-full rounded-2xl border border-[#eadfce] bg-white px-4 py-3 outline-none focus:border-[#8f6b43]">
                </div>

                <div>
                    <label class="block text-sm text-[#7b6b58] mb-2 font-semibold">Âge</label>
                    <input id="childAgeInput" type="number"
                        class="w-full rounded-2xl border border-[#eadfce] bg-white px-4 py-3 outline-none focus:border-[#8f6b43]">
                </div>

                <div>
                    <label class="block text-sm text-[#7b6b58] mb-2 font-semibold">Allergies / besoins</label>
                    <input id="childAllergiesInput" type="text" placeholder="Ex: Arachides"
                        class="w-full rounded-2xl border border-[#eadfce] bg-white px-4 py-3 outline-none focus:border-[#8f6b43]">
                </div>

                <div>
                    <label class="block text-sm text-[#7b6b58] mb-2 font-semibold">Routine</label>
                    <input id="childRoutineInput" type="text" placeholder="Ex: Lecture du soir à 19h30"
                        class="w-full rounded-2xl border border-[#eadfce] bg-white px-4 py-3 outline-none focus:border-[#8f6b43]">
                </div>
            </div>

            <div class="flex gap-3 mt-5">
                <button id="cancelChildBtn" class="flex-1 border border-[#d8c7ae] rounded-2xl py-3 font-bold">
                    Annuler
                </button>
                <button id="saveChildBtn" class="flex-1 bg-[#8f6b43] text-white rounded-2xl py-3 font-bold">
                    Ajouter
                </button>
            </div>
        </div>
    </div>

    <script>
        const familyName = document.getElementById('familyName');
        const familyLocation = document.getElementById('familyLocation');
        const familyAbout = document.getElementById('familyAbout');
        const familyPhoto = document.getElementById('familyPhoto');
        const parentEmail = document.getElementById('parentEmail');

        const childrenList = document.getElementById('childrenList');
        const allergiesList = document.getElementById('allergiesList');
        const routinesList = document.getElementById('routinesList');
        const needsSection = document.getElementById('needsSection');
        const notificationsToggle = document.getElementById('notificationsToggle');
        const notificationsDot = document.getElementById('notificationsDot');
        const weeklySummaryToggle = document.getElementById('weeklySummaryToggle');
        const weeklySummaryDot = document.getElementById('weeklySummaryDot');

        const editPhotoBtn = document.getElementById('editPhotoBtn');
        const parentPhotoInput = document.getElementById('parentPhotoInput');
        const editAccessBtn = document.getElementById('editAccessBtn');
        const editAboutBtn = document.getElementById('editAboutBtn');
        const addChildBtn = document.getElementById('addChildBtn');

        const aboutModal = document.getElementById('aboutModal');
        const closeAboutModalBtn = document.getElementById('closeAboutModalBtn');
        const cancelAboutBtn = document.getElementById('cancelAboutBtn');
        const saveAboutBtn = document.getElementById('saveAboutBtn');
        const aboutTextarea = document.getElementById('aboutTextarea');

        const childModal = document.getElementById('childModal');
        const childModalTitle = document.getElementById('childModalTitle');
        const closeChildModalBtn = document.getElementById('closeChildModalBtn');
        const cancelChildBtn = document.getElementById('cancelChildBtn');
        const saveChildBtn = document.getElementById('saveChildBtn');
        const childNameInput = document.getElementById('childNameInput');
        const childAgeInput = document.getElementById('childAgeInput');
        const childAllergiesInput = document.getElementById('childAllergiesInput');
        const childRoutineInput = document.getElementById('childRoutineInput');
        const sidebarAvatar = document.getElementById('sidebarAvatar');
        const sidebarFamilyName = document.getElementById('sidebarFamilyName');
        const logoutBtn = document.getElementById('logoutBtn');

        const messageBox = document.getElementById('messageBox');
        const defaultParentPhoto = '{{ asset('images/image1.jpeg') }}';

        let currentUser = null;
        let currentFamily = null;
        let allChildren = [];
        let editingChildId = null;

        document.addEventListener('DOMContentLoaded', function () {
            checkAuth();
            loadUserInfo();
            loadFamily();
        });

        notificationsToggle.addEventListener('click', function () {
            toggleSwitch(notificationsToggle, notificationsDot);
        });

        weeklySummaryToggle.addEventListener('click', function () {
            toggleSwitch(weeklySummaryToggle, weeklySummaryDot);
        });

        editPhotoBtn.addEventListener('click', function () {
            parentPhotoInput.click();
        });

        parentPhotoInput.addEventListener('change', function () {
            previewParentPhoto();
        });

        familyPhoto.addEventListener('error', function () {
            if (familyPhoto.src !== defaultParentPhoto) {
                familyPhoto.src = defaultParentPhoto;
            }
        });

        editAccessBtn.addEventListener('click', function () {
            showMessage('Gestion des accès sera branchée ensuite.', 'success');
        });

        editAboutBtn.addEventListener('click', function () {
            aboutTextarea.value = familyAbout.textContent.trim();
            openModal(aboutModal);
        });

        closeAboutModalBtn.addEventListener('click', function () {
            closeModal(aboutModal);
        });

        cancelAboutBtn.addEventListener('click', function () {
            closeModal(aboutModal);
        });

        saveAboutBtn.addEventListener('click', function () {
            saveFamilyAbout();
        });

        addChildBtn.addEventListener('click', function () {
            resetChildForm();
            openModal(childModal);
        });

        closeChildModalBtn.addEventListener('click', function () {
            resetChildForm();
            closeModal(childModal);
        });

        cancelChildBtn.addEventListener('click', function () {
            resetChildForm();
            closeModal(childModal);
        });

        saveChildBtn.addEventListener('click', function () {
            saveChild();
        });

        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('access_token');
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            window.location.href = '/login';
        });

        function checkAuth() {
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

        function loadUserInfo() {
            currentUser = getStoredUser();

            if (currentUser) {
                parentEmail.textContent = currentUser.email || '';
                sidebarAvatar.textContent = getInitials(currentUser.name || 'F');
                sidebarFamilyName.textContent = currentUser.name || 'Ma famille';
            }

            loadSavedParentPhoto();
        }

        async function loadFamily() {
            try {
                const response = await fetch('/api/families', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    const families = result.data.data || result.data || [];

                    if (families.length > 0) {
                        currentFamily = families[0];
                        renderFamily();
                        loadChildren();
                    } else {
                        childrenList.innerHTML = `
                            <div class="bg-[#fffaf3] rounded-[26px] border border-[#eadfce] shadow-sm p-5 text-[#9a8469] text-sm">
                                Aucune famille trouvée pour ce compte.
                            </div>
                        `;
                    }
                }
            } catch (error) {
                showMessage('Impossible de charger les informations famille.', 'error');
            }
        }

        async function loadChildren() {
            if (!currentFamily) {
                return;
            }

            try {
                const response = await fetch('/api/families/' + currentFamily.id + '/children', {
                    method: 'GET',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    allChildren = result.data.data || result.data || [];
                    renderChildren();
                    renderNeedsAndRoutines();
                }
            } catch (error) {
                showMessage('Impossible de charger les enfants.', 'error');
            }
        }

        function renderFamily() {
            familyName.textContent = currentFamily.name || 'Ma famille';
            sidebarFamilyName.textContent = currentFamily.name || (currentUser?.name || 'Ma famille');

            if (currentFamily.location) {
                familyLocation.innerHTML = '<span class="material-symbols-rounded !text-[18px] text-[#b08a5f]">location_on</span><span>' + escapeHtml(currentFamily.location) + '</span>';
            } else {
                familyLocation.innerHTML = '<span class="material-symbols-rounded !text-[18px] text-[#b08a5f]">location_on</span><span>Localisation indisponible</span>';
            }

            if (currentFamily.description) {
                familyAbout.textContent = currentFamily.description;
            } else {
                familyAbout.textContent = 'Aucune description disponible pour le moment.';
            }

            loadSavedParentPhoto();
        }
        // afficher les infos de enfant dans les cartes 
        function renderChildren() {
            childrenList.innerHTML = '';

            if (allChildren.length === 0) {
                childrenList.innerHTML = `
                    <div class="bg-[#fffaf3] rounded-[26px] border border-[#eadfce] shadow-sm p-5 text-[#9a8469] text-sm">
                        Aucun enfant enregistré.
                    </div>
                `;
                return;
            }

            allChildren.forEach(function (child) {
                const card = document.createElement('div');
                card.className = 'bg-[#fffaf3] rounded-[26px] border border-[#eadfce] shadow-sm p-5 hover:-translate-y-0.5 hover:shadow-md transition';

                const childDetails = getChildDetails(child);
                const ageLabel = childDetails.age ? childDetails.age + ' ans' : 'Age non renseigné';
                const allergiesLabel = childDetails.allergies ? escapeHtml(childDetails.allergies) : 'Aucune allergie';
                const routineLabel = childDetails.routine ? escapeHtml(childDetails.routine) : 'Aucune routine';

                card.innerHTML = `
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-[20px] bg-[#efe2cf] text-[#8f6b43] flex items-center justify-center">
                                <span class="material-symbols-rounded">child_care</span>
                            </div>

                            <div>
                                <p class="text-xl font-black">${escapeHtml(child.name || '')}</p>
                                <p class="text-[#7b6b58] text-sm mt-1">${ageLabel}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <button class="child-edit-btn inline-flex items-center justify-center w-9 h-9 rounded-xl bg-[#efe2cf] text-[#8f6b43] hover:bg-[#e3d1b8]" data-child-id="${child.id}">
                                <span class="material-symbols-rounded !text-[18px]">edit</span>
                            </button>
                            <button class="child-delete-btn inline-flex items-center justify-center w-9 h-9 rounded-xl bg-[#fff1ed] text-[#b55348] hover:bg-[#fde3dd]" data-child-id="${child.id}">
                                <span class="material-symbols-rounded !text-[18px]">delete</span>
                            </button>
                        </div>
                    </div>

                    <div class="mt-5 grid gap-3">
                        <div class="rounded-2xl bg-[#f8efe4] border border-[#eadfce] px-4 py-3">
                            <p class="text-[11px] uppercase tracking-[0.18em] text-[#b08a5f] font-black mb-1">Âge</p>
                            <p class="text-sm font-semibold text-[#5d4c39]">${ageLabel}</p>
                        </div>
                        <div class="rounded-2xl bg-[#fff1ed] border border-[#f1c7bd] px-4 py-3">
                            <p class="text-[11px] uppercase tracking-[0.18em] text-[#c46b5f] font-black mb-1">Besoins</p>
                            <p class="text-sm font-semibold text-[#7b4b42]">${allergiesLabel}</p>
                        </div>
                        <div class="rounded-2xl bg-[#f8efe4] border border-[#eadfce] px-4 py-3">
                            <p class="text-[11px] uppercase tracking-[0.18em] text-[#8f6b43] font-black mb-1">Routine</p>
                            <p class="text-sm font-semibold text-[#5d4c39]">${routineLabel}</p>
                        </div>
                    </div>
                `;

                childrenList.appendChild(card);
            });

            childrenList.querySelectorAll('.child-edit-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    openEditChild(button.dataset.childId);
                });
            });

            childrenList.querySelectorAll('.child-delete-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    deleteChild(button.dataset.childId);
                });
            });
        }
        // afficher les routines 
        function renderNeedsAndRoutines() {
            allergiesList.innerHTML = '';
            routinesList.innerHTML = '';

            let hasAllergies = false;
            let hasRoutines = false;

            allChildren.forEach(function (child) {
                const childDetails = getChildDetails(child);

                if (childDetails.allergies) {
                    hasAllergies = true;

                    const allergy = document.createElement('div');
                    allergy.className = 'rounded-2xl bg-[#fff1ed] border border-[#f1c7bd] p-4';

                    allergy.innerHTML = `
                        <p class="text-[#b55348] text-sm font-bold">
                            ${escapeHtml(child.name)}: ${escapeHtml(childDetails.allergies)}
                        </p>
                    `;

                    allergiesList.appendChild(allergy);
                }

                if (childDetails.routine) {
                    hasRoutines = true;

                    const routine = document.createElement('div');
                    routine.className = 'rounded-2xl bg-[#f8efe4] border border-[#eadfce] p-4 text-[#5d4c39] text-sm';

                    routine.innerHTML = escapeHtml(childDetails.routine);

                    routinesList.appendChild(routine);
                }
            });

            if (hasAllergies || hasRoutines) {
                needsSection.classList.remove('hidden');
            } else {
                needsSection.classList.add('hidden');
            }
        }
        // enregister le photo du parent 
        function loadSavedParentPhoto() {
            const savedPhoto = localStorage.getItem(getParentPhotoStorageKey());
            familyPhoto.src = savedPhoto || defaultParentPhoto;
        }
        // prévisualiser la photo choisie par le parent (controler la taille d'image , type ,souvgarder sans local storage )
        function previewParentPhoto() {
            const file = parentPhotoInput.files[0];

            if (!file) {
                return;
            }

            if (!file.type.startsWith('image/')) {
                showMessage('Veuillez choisir une image valide.', 'error');
                parentPhotoInput.value = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                showMessage('Veuillez choisir une image de moins de 2 Mo pour cet aperçu.', 'error');
                parentPhotoInput.value = '';
                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                const imageData = event.target.result;

                familyPhoto.src = imageData;
                localStorage.setItem(getParentPhotoStorageKey(), imageData);
                showMessage('Photo ajoutée pour l’aperçu. L’enregistrement serveur sera branché ensuite.', 'success');
            };

            reader.readAsDataURL(file);
        }
        // générer une clé unique pour localStorage
        function getParentPhotoStorageKey() {
            const userId = currentUser && currentUser.id ? currentUser.id : 'guest';
            const familyId = currentFamily && currentFamily.id ? currentFamily.id : 'default';

            return 'parent_family_photo_' + userId + '_' + familyId;
        }

        async function saveFamilyAbout() {
            if (!currentFamily) {
                showMessage('Aucune famille trouvée.', 'error');
                return;
            }

            try {
                const response = await fetch('/api/families/' + currentFamily.id, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        ...getAuthHeaders()
                    },
                    body: JSON.stringify({
                        name: currentFamily.name,
                        location: currentFamily.location,
                        description: aboutTextarea.value.trim()
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    familyAbout.textContent = aboutTextarea.value.trim();
                    showMessage('Description mise à jour avec succès.', 'success');
                    closeModal(aboutModal);
                } else {
                    showMessage(readErrors(result), 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }

        async function saveChild() {
            if (editingChildId) {
                await updateChild(editingChildId);
                return;
            }

            await createChild();
        }

        async function createChild() {
            if (!currentFamily) {
                showMessage('Aucune famille trouvée.', 'error');
                return;
            }

            try {
                const ageValue = childAgeInput.value ? parseInt(childAgeInput.value, 10) : null;
                const birthDate = ageValue !== null && !Number.isNaN(ageValue)
                    ? convertAgeToBirthDate(ageValue)
                    : null;
                const notes = JSON.stringify({
                    allergies: childAllergiesInput.value.trim(),
                    routine: childRoutineInput.value.trim()
                });

                const response = await fetch('/api/children', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        ...getAuthHeaders()
                    },
                    body: JSON.stringify({
                        family_id: currentFamily.id,
                        name: childNameInput.value.trim(),
                        birth_date: birthDate,
                        notes: notes
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Enfant ajouté avec succès.', 'success');
                    closeModal(childModal);
                    resetChildForm();
                    loadChildren();
                } else {
                    showMessage(readErrors(result), 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }

        async function updateChild(childId) {
            const child = allChildren.find(function (item) {
                return String(item.id) === String(childId);
            });

            if (!child) {
                showMessage('Enfant introuvable.', 'error');
                return;
            }

            try {
                const ageValue = childAgeInput.value ? parseInt(childAgeInput.value, 10) : null;
                const birthDate = ageValue !== null && !Number.isNaN(ageValue)
                    ? convertAgeToBirthDate(ageValue)
                    : null;
                const notes = JSON.stringify({
                    allergies: childAllergiesInput.value.trim(),
                    routine: childRoutineInput.value.trim()
                });

                const response = await fetch('/api/children/' + childId, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        ...getAuthHeaders()
                    },
                    body: JSON.stringify({
                        name: childNameInput.value.trim(),
                        birth_date: birthDate,
                        notes: notes
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Enfant modifié avec succès.', 'success');
                    closeModal(childModal);
                    resetChildForm();
                    loadChildren();
                } else {
                    showMessage(readErrors(result), 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }

        async function deleteChild(childId) {
            const child = allChildren.find(function (item) {
                return String(item.id) === String(childId);
            });

            if (!child) {
                showMessage('Enfant introuvable.', 'error');
                return;
            }

            const confirmed = window.confirm('Supprimer ' + (child.name || 'cet enfant') + ' ?');

            if (!confirmed) {
                return;
            }

            try {
                const response = await fetch('/api/children/' + childId, {
                    method: 'DELETE',
                    headers: getAuthHeaders()
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Enfant supprimé avec succès.', 'success');
                    loadChildren();
                } else {
                    showMessage(readErrors(result), 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }
        // la couleur du fond gris et marron 
        function toggleSwitch(wrapper, dot) {
            const isActive = wrapper.classList.contains('bg-[#8f6b43]');

            if (isActive) {
                wrapper.classList.remove('bg-[#8f6b43]');
                wrapper.classList.add('bg-[#d8c7ae]');
                dot.classList.remove('right-1');
                dot.classList.add('left-1');
            } else {
                wrapper.classList.remove('bg-[#d8c7ae]');
                wrapper.classList.add('bg-[#8f6b43]');
                dot.classList.remove('left-1');
                dot.classList.add('right-1');
            }
        }

        function openModal(modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal(modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        // modifier un enfant
        function openEditChild(childId) {
            const child = allChildren.find(function (item) {
                return String(item.id) === String(childId);
            });

            if (!child) {
                showMessage('Enfant introuvable.', 'error');
                return;
            }

            const childDetails = getChildDetails(child);

            editingChildId = child.id;
            childModalTitle.textContent = 'Modifier un enfant';
            saveChildBtn.textContent = 'Enregistrer';
            childNameInput.value = child.name || '';
            childAgeInput.value = childDetails.age || '';
            childAllergiesInput.value = childDetails.allergies || '';
            childRoutineInput.value = childDetails.routine || '';

            openModal(childModal);
        }
        // Préparer le formulaire pour ajouter un nouvel enfant
        function resetChildForm() {
            editingChildId = null;
            childModalTitle.textContent = 'Ajouter un enfant';
            saveChildBtn.textContent = 'Ajouter';
            childNameInput.value = '';
            childAgeInput.value = '';
            childAllergiesInput.value = '';
            childRoutineInput.value = '';
        }
        // Transformer les données brutes de l’enfant en données prêtes pour formulaire
        function getChildDetails(child) {
            const parsedNotes = parseChildNotes(child.notes);

            return {
                age: calculateAge(child.birth_date),
                allergies: parsedNotes.allergies,
                routine: parsedNotes.routine
            };
        }
        // Lire le champ notes allergies 
        function parseChildNotes(notes) {
            if (!notes || typeof notes !== 'string') {
                return {
                    allergies: '',
                    routine: ''
                };
            }

            try {
                const parsed = JSON.parse(notes);

                return {
                    allergies: typeof parsed.allergies === 'string' ? parsed.allergies.trim() : '',
                    routine: typeof parsed.routine === 'string' ? parsed.routine.trim() : ''
                };
            } catch (error) {
                return {
                    allergies: '',
                    routine: notes.trim()
                };
            }
        }
        // Calculer l’âge réel à partir de date naissance 
        function calculateAge(birthDate) {
            if (!birthDate) {
                return null;
            }

            const date = new Date(birthDate);

            if (Number.isNaN(date.getTime())) {
                return null;
            }

            const today = new Date();
            let age = today.getFullYear() - date.getFullYear();
            const monthDiff = today.getMonth() - date.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < date.getDate())) {
                age--;
            }

            return age >= 0 ? age : null;
        }

        function convertAgeToBirthDate(age) {
            const today = new Date();
            const birthDate = new Date(today.getFullYear() - age, today.getMonth(), today.getDate());

            return birthDate.toISOString().split('T')[0];
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
