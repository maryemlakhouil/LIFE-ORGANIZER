<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Famille - Organisateur Familial</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f5f7fb] text-slate-900 min-h-screen flex flex-col">

    <!-- TOPBAR -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-[1200px] mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('parent.dashboard') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </div>
                <span class="text-xl font-bold">Organisateur Familial</span>
            </a>

            <div class="hidden md:flex items-center gap-3 text-sm font-semibold">
                <a href="{{ route('parent.dashboard') }}" class="rounded-full bg-slate-100 px-4 py-2 text-slate-600 hover:bg-blue-50 hover:text-blue-600">Dashboard</a>
                <a href="{{ route('parent.tasks') }}" class="rounded-full bg-slate-100 px-4 py-2 text-slate-600 hover:bg-blue-50 hover:text-blue-600">Tâches</a>
                <a href="{{ route('parent.messages') }}" class="rounded-full bg-slate-100 px-4 py-2 text-slate-600 hover:bg-blue-50 hover:text-blue-600">Messages</a>
                <a href="{{ route('parent.nanny-profile') }}" class="rounded-full bg-slate-100 px-4 py-2 text-slate-600 hover:bg-blue-50 hover:text-blue-600">Nounou</a>
            </div>
        </div>
    </header>

    <!-- CONTENT -->
    <main class="flex-1 max-w-[1200px] mx-auto w-full px-6 py-8">
        <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

        <div class="grid grid-cols-1 lg:grid-cols-[300px_minmax(0,1fr)] gap-8">

            <!-- LEFT COLUMN -->
            <div class="space-y-6">

                <!-- FAMILY CARD -->
                <section class="bg-white rounded-[32px] border border-slate-200 shadow-sm p-8 text-center">
                    <div class="relative w-fit mx-auto mb-6">
                        <img
                            id="familyPhoto"
                            src="{{ asset('images/family-default.jpg') }}"
                            alt="Famille"
                            class="w-52 h-52 rounded-full object-cover border-4 border-slate-100"
                        >

                        <button id="editPhotoBtn"
                            class="absolute bottom-2 right-2 w-12 h-12 rounded-full bg-blue-600 text-white shadow-lg hover:bg-blue-700">
                            ✎
                        </button>
                    </div>

                    <h1 id="familyName" class="text-4xl font-bold mb-3">Lakhouil Family</h1>

                    <p id="familyLocation" class="text-slate-500 text-xl flex items-center justify-center gap-2">
                        <span>📍</span>
                        <span>Safi, Maroc</span>
                    </p>
                </section>

                <!-- ACCOUNT SETTINGS -->
                <section class="bg-white rounded-[32px] border border-slate-200 shadow-sm p-6">
                    <div class="flex items-start gap-3 mb-6">
                        <span class="text-blue-600 text-2xl">⚙</span>
                        <h2 class="text-3xl font-bold leading-tight">Paramètres du compte</h2>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <p class="text-sm uppercase tracking-wide text-slate-400 font-semibold mb-2">Email</p>
                            <p id="parentEmail" class="text-2xl font-medium break-all">sophie.lefebvre@email.com</p>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-xl text-slate-700">Notifications App</span>
                            <button id="notificationsToggle"
                                class="w-14 h-8 rounded-full bg-blue-500 relative transition">
                                <span id="notificationsDot"
                                    class="absolute top-1 right-1 w-6 h-6 bg-white rounded-full shadow transition"></span>
                            </button>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-xl text-slate-700">Résumé Hebdomadaire</span>
                            <button id="weeklySummaryToggle"
                                class="w-14 h-8 rounded-full bg-slate-300 relative transition">
                                <span id="weeklySummaryDot"
                                    class="absolute top-1 left-1 w-6 h-6 bg-white rounded-full shadow transition"></span>
                            </button>
                        </div>

                        <button id="editAccessBtn"
                            class="w-full mt-3 rounded-full border-2 border-blue-600 text-blue-600 py-3 text-xl font-semibold hover:bg-blue-50">
                            Modifier mes accès
                        </button>
                    </div>
                </section>
            </div>

            <!-- RIGHT COLUMN -->
            <div class="space-y-6">

                <!-- ABOUT FAMILY -->
                <section class="bg-white rounded-[32px] border border-slate-200 shadow-sm p-6">
                    <div class="flex items-start justify-between gap-4 mb-5">
                        <div class="flex items-start gap-3">
                            <span class="text-blue-600 text-2xl">👨‍👩‍👧‍👦</span>
                            <h2 class="text-4xl font-bold">À propos de notre famille</h2>
                        </div>

                        <button id="editAboutBtn" class="text-blue-600 font-semibold text-xl hover:underline">
                            Modifier
                        </button>
                    </div>

                    <p id="familyAbout" class="text-slate-600 text-[30px] leading-[1.6]">
                        Une famille dynamique qui adore les sorties en plein air, les randonnées le week-end et les soirées jeux de société le vendredi soir. Nous privilégions une alimentation saine et essayons de réduire notre temps d’écran collectif.
                    </p>
                </section>

                <!-- CHILDREN -->
                <section>
                    <div class="flex items-center justify-between gap-4 mb-5">
                        <div class="flex items-center gap-3">
                            <span class="text-blue-600 text-2xl">☺</span>
                            <h2 class="text-4xl font-bold">Mes Enfants</h2>
                        </div>

                        <button id="addChildBtn"
                            class="px-6 py-3 rounded-full bg-blue-100 text-blue-600 text-xl font-semibold hover:bg-blue-200">
                            + Ajouter un enfant
                        </button>
                    </div>

                    <div id="childrenList" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="bg-white rounded-[28px] border border-slate-200 shadow-sm p-6 text-slate-400">
                            Chargement...
                        </div>
                    </div>
                </section>

                <!-- NEEDS + ROUTINES -->
                <section class="bg-white rounded-[32px] border border-slate-200 shadow-sm p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-blue-600 text-2xl">📋</span>
                        <h2 class="text-4xl font-bold">Besoins spécifiques & Routines</h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Allergies -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <span class="text-red-500 text-xl">⦿</span>
                                <h3 class="text-2xl font-bold text-red-500">Allergies</h3>
                            </div>

                            <div id="allergiesList" class="space-y-3">
                                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-4 text-slate-400">
                                    Aucune donnée
                                </div>
                            </div>
                        </div>

                        <!-- Routines -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <span class="text-blue-600 text-xl">◔</span>
                                <h3 class="text-2xl font-bold text-blue-600">Routines</h3>
                            </div>

                            <div id="routinesList" class="space-y-3">
                                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-4 text-slate-400">
                                    Aucune donnée
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <footer class="py-8 text-center text-slate-400 text-lg">
        © 2024 Organisateur Familial. Conçu avec soin pour votre famille.
    </footer>

    <!-- MODAL ABOUT -->
    <div id="aboutModal" class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center px-4">
        <div class="bg-white rounded-[28px] w-full max-w-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-3xl font-bold">Modifier la description</h3>
                <button id="closeAboutModalBtn" class="text-3xl text-slate-400 hover:text-slate-700">×</button>
            </div>

            <textarea id="aboutTextarea" rows="6"
                class="w-full rounded-2xl border border-slate-200 bg-[#f7f9fc] px-4 py-3 outline-none focus:border-blue-500"></textarea>

            <div class="flex gap-3 mt-5">
                <button id="cancelAboutBtn" class="flex-1 border border-slate-300 rounded-2xl py-3 font-semibold">
                    Annuler
                </button>
                <button id="saveAboutBtn" class="flex-1 bg-blue-600 text-white rounded-2xl py-3 font-semibold">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL CHILD -->
    <div id="childModal" class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center px-4">
        <div class="bg-white rounded-[28px] w-full max-w-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-3xl font-bold">Ajouter un enfant</h3>
                <button id="closeChildModalBtn" class="text-3xl text-slate-400 hover:text-slate-700">×</button>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-slate-500 mb-2">Nom</label>
                    <input id="childNameInput" type="text"
                        class="w-full rounded-2xl border border-slate-200 bg-[#f7f9fc] px-4 py-3 outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm text-slate-500 mb-2">Âge</label>
                    <input id="childAgeInput" type="number"
                        class="w-full rounded-2xl border border-slate-200 bg-[#f7f9fc] px-4 py-3 outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm text-slate-500 mb-2">Allergies / besoins</label>
                    <input id="childAllergiesInput" type="text" placeholder="Ex: Arachides"
                        class="w-full rounded-2xl border border-slate-200 bg-[#f7f9fc] px-4 py-3 outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm text-slate-500 mb-2">Routine</label>
                    <input id="childRoutineInput" type="text" placeholder="Ex: Lecture du soir à 19h30"
                        class="w-full rounded-2xl border border-slate-200 bg-[#f7f9fc] px-4 py-3 outline-none focus:border-blue-500">
                </div>
            </div>

            <div class="flex gap-3 mt-5">
                <button id="cancelChildBtn" class="flex-1 border border-slate-300 rounded-2xl py-3 font-semibold">
                    Annuler
                </button>
                <button id="saveChildBtn" class="flex-1 bg-blue-600 text-white rounded-2xl py-3 font-semibold">
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
        const notificationsToggle = document.getElementById('notificationsToggle');
        const notificationsDot = document.getElementById('notificationsDot');
        const weeklySummaryToggle = document.getElementById('weeklySummaryToggle');
        const weeklySummaryDot = document.getElementById('weeklySummaryDot');

        const editPhotoBtn = document.getElementById('editPhotoBtn');
        const editAccessBtn = document.getElementById('editAccessBtn');
        const editAboutBtn = document.getElementById('editAboutBtn');
        const addChildBtn = document.getElementById('addChildBtn');

        const aboutModal = document.getElementById('aboutModal');
        const closeAboutModalBtn = document.getElementById('closeAboutModalBtn');
        const cancelAboutBtn = document.getElementById('cancelAboutBtn');
        const saveAboutBtn = document.getElementById('saveAboutBtn');
        const aboutTextarea = document.getElementById('aboutTextarea');

        const childModal = document.getElementById('childModal');
        const closeChildModalBtn = document.getElementById('closeChildModalBtn');
        const cancelChildBtn = document.getElementById('cancelChildBtn');
        const saveChildBtn = document.getElementById('saveChildBtn');
        const childNameInput = document.getElementById('childNameInput');
        const childAgeInput = document.getElementById('childAgeInput');
        const childAllergiesInput = document.getElementById('childAllergiesInput');
        const childRoutineInput = document.getElementById('childRoutineInput');

        const messageBox = document.getElementById('messageBox');

        let currentUser = null;
        let currentFamily = null;
        let allChildren = [];

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
            showMessage('Modification photo sera branchée ensuite.', 'success');
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
            openModal(childModal);
        });

        closeChildModalBtn.addEventListener('click', function () {
            closeModal(childModal);
        });

        cancelChildBtn.addEventListener('click', function () {
            closeModal(childModal);
        });

        saveChildBtn.addEventListener('click', function () {
            createChild();
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
            return localStorage.getItem('access_token');
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
            }
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

            if (currentFamily.location) {
                familyLocation.innerHTML = '<span>📍</span><span>' + escapeHtml(currentFamily.location) + '</span>';
            }

            if (currentFamily.description) {
                familyAbout.textContent = currentFamily.description;
            }

            if (currentFamily.photo) {
                familyPhoto.src = '/storage/' + currentFamily.photo;
            }
        }

        function renderChildren() {
            childrenList.innerHTML = '';

            if (allChildren.length === 0) {
                childrenList.innerHTML = `
                    <div class="bg-white rounded-[28px] border border-slate-200 shadow-sm p-6 text-slate-400">
                        Aucun enfant enregistré.
                    </div>
                `;
                return;
            }

            allChildren.forEach(function (child) {
                const card = document.createElement('div');
                card.className = 'bg-white rounded-[28px] border border-slate-200 shadow-sm p-6 flex items-center justify-between';

                card.innerHTML = `
                    <div class="flex items-center gap-5">
                        <div class="w-16 h-16 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-3xl">
                            ☺
                        </div>

                        <div>
                            <p class="text-3xl font-bold">${escapeHtml(child.name || '')}</p>
                            <p class="text-slate-500 text-2xl mt-1">${child.age ? child.age + ' ans' : '-'}</p>
                        </div>
                    </div>

                    <button class="text-slate-400 text-3xl hover:text-blue-600">›</button>
                `;

                childrenList.appendChild(card);
            });
        }

        function renderNeedsAndRoutines() {
            allergiesList.innerHTML = '';
            routinesList.innerHTML = '';

            let hasAllergies = false;
            let hasRoutines = false;

            allChildren.forEach(function (child) {
                if (child.allergies && child.allergies.trim() !== '') {
                    hasAllergies = true;

                    const allergy = document.createElement('div');
                    allergy.className = 'rounded-2xl bg-red-50 border border-red-100 p-4';

                    allergy.innerHTML = `
                        <p class="text-red-500 text-xl font-medium">
                            ${escapeHtml(child.name)}: ${escapeHtml(child.allergies)}
                        </p>
                    `;

                    allergiesList.appendChild(allergy);
                }

                if (child.routine && child.routine.trim() !== '') {
                    hasRoutines = true;

                    const routine = document.createElement('div');
                    routine.className = 'rounded-2xl bg-[#f2f6fc] border border-slate-200 p-4 text-slate-700 text-xl';

                    routine.innerHTML = escapeHtml(child.routine);

                    routinesList.appendChild(routine);
                }
            });

            if (!hasAllergies) {
                allergiesList.innerHTML = `
                    <div class="rounded-2xl bg-slate-50 border border-slate-200 p-4 text-slate-400">
                        Aucune allergie renseignée.
                    </div>
                `;
            }

            if (!hasRoutines) {
                routinesList.innerHTML = `
                    <div class="rounded-2xl bg-slate-50 border border-slate-200 p-4 text-slate-400">
                        Aucune routine renseignée.
                    </div>
                `;
            }
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

        async function createChild() {
            if (!currentFamily) {
                showMessage('Aucune famille trouvée.', 'error');
                return;
            }

            try {
                const response = await fetch('/api/children', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        ...getAuthHeaders()
                    },
                    body: JSON.stringify({
                        family_id: currentFamily.id,
                        name: childNameInput.value.trim(),
                        age: childAgeInput.value ? parseInt(childAgeInput.value) : null,
                        allergies: childAllergiesInput.value.trim(),
                        routine: childRoutineInput.value.trim()
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage('Enfant ajouté avec succès.', 'success');
                    closeModal(childModal);

                    childNameInput.value = '';
                    childAgeInput.value = '';
                    childAllergiesInput.value = '';
                    childRoutineInput.value = '';

                    loadChildren();
                } else {
                    showMessage(readErrors(result), 'error');
                }
            } catch (error) {
                showMessage('Erreur serveur.', 'error');
            }
        }

        function toggleSwitch(wrapper, dot) {
            const isActive = wrapper.classList.contains('bg-blue-500');

            if (isActive) {
                wrapper.classList.remove('bg-blue-500');
                wrapper.classList.add('bg-slate-300');
                dot.classList.remove('right-1');
                dot.classList.add('left-1');
            } else {
                wrapper.classList.remove('bg-slate-300');
                wrapper.classList.add('bg-blue-500');
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
