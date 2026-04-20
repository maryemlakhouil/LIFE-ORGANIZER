<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Nounou - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f5f7fb] text-slate-900 min-h-screen flex flex-col">

    <!-- TOPBAR -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-[1100px] mx-auto px-5 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-base">
                    ☺
                </div>
                <h1 class="text-2xl font-bold">Profil Nounou</h1>
            </div>

            <div class="hidden md:flex items-center gap-2 text-xs font-semibold">
                <a href="{{ route('parent.dashboard') }}" class="rounded-full bg-slate-100 px-3 py-2 text-slate-600 hover:bg-blue-50 hover:text-blue-600">Dashboard</a>
                <a href="{{ route('parent.family') }}" class="rounded-full bg-slate-100 px-3 py-2 text-slate-600 hover:bg-blue-50 hover:text-blue-600">Famille</a>
                <a href="{{ route('parent.messages') }}" class="rounded-full bg-slate-100 px-3 py-2 text-slate-600 hover:bg-blue-50 hover:text-blue-600">Messages</a>
                <button id="shareBtn" class="w-9 h-9 rounded-full bg-[#f3f6fb] hover:bg-slate-200 text-slate-600">
                    ⤴
                </button>
                <button id="favoriteBtn" class="w-9 h-9 rounded-full bg-[#f3f6fb] hover:bg-slate-200 text-slate-600">
                    ♡
                </button>
                <button id="contactBtn" class="px-5 py-2 rounded-full bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 shadow">
                    Contacter
                </button>
            </div>
        </div>
    </header>

    <!-- PAGE -->
    <main class="flex-1 max-w-[1100px] mx-auto w-full px-5 py-6">
        <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

        <!-- HERO CARD -->
        <section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 mb-6">
            <div class="grid grid-cols-1 lg:grid-cols-[auto_1fr_auto] gap-6 items-center">

                <div class="relative w-fit">
                    <img
                        id="nannyPhoto"
                        src="{{ asset('images/nany.jpeg') }}"
                        alt="Nounou"
                        class="w-28 h-28 md:w-32 md:h-32 rounded-full object-cover border-4 border-blue-50"
                    >
                    <span class="absolute bottom-2 right-2 w-5 h-5 rounded-full bg-green-500 border-4 border-white"></span>
                </div>

                <div>
                    <h2 id="nannyName" class="text-3xl md:text-4xl font-black mb-1">Marie L.</h2>
                    <p id="nannyTitle" class="text-blue-600 text-lg font-semibold mb-2">
                        Nounou certifiée à domicile
                    </p>
                    <p id="nannyLocation" class="text-slate-500 text-sm mb-5">
                        📍 Paris 15ème (75)
                    </p>

                    <div class="flex flex-wrap gap-5">
                        <div>
                            <p id="nannyExperience" class="text-2xl md:text-3xl font-black">8 ans</p>
                            <p class="text-slate-400 uppercase text-xs font-semibold">Expérience</p>
                        </div>

                        <div class="border-l border-slate-200 pl-5">
                            <p id="nannyRating" class="text-2xl md:text-3xl font-black">4.9 ⭐</p>
                            <p id="nannyReviewsCount" class="text-slate-400 uppercase text-xs font-semibold">24 avis parents</p>
                        </div>

                        <div class="border-l border-slate-200 pl-5">
                            <p id="nannyAge" class="text-2xl md:text-3xl font-black">29 ans</p>
                            <p class="text-slate-400 uppercase text-xs font-semibold">Âge</p>
                        </div>
                    </div>
                </div>

                <div class="justify-self-start lg:justify-self-end">
                    <div class="rounded-3xl border border-blue-200 bg-blue-50 px-5 py-4 text-center min-w-[125px]">
                        <p id="nannyRate" class="text-3xl font-black text-blue-600">14€/h</p>
                        <p class="text-slate-400 uppercase text-xs font-semibold">Tarif moyen</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CONTENT -->
        <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_300px] gap-6">

            <!-- LEFT -->
            <div class="space-y-6">

                <!-- ABOUT -->
                <section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-blue-600 text-xl">👤</span>
                        <h3 class="text-2xl font-bold">À propos de moi</h3>
                    </div>

                    <p id="nannyAbout" class="text-slate-600 text-base leading-7 whitespace-pre-line">
                        Bonjour ! Je m'appelle Marie et je suis passionnée par l’éveil des jeunes enfants depuis plus de 8 ans. Titulaire du CAP Petite Enfance, j'ai travaillé en crèche avant de me spécialiser dans la garde à domicile.

Mon approche est basée sur la bienveillance et la créativité. Je propose régulièrement des activités manuelles, de la lecture et des sorties au parc pour favoriser l'épanouissement de vos petits. Je suis douce, ponctuelle et je m'adapte facilement aux routines de chaque famille.
                    </p>
                </section>

                <!-- SKILLS -->
                <section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="text-blue-600 text-xl">🛡</span>
                        <h3 class="text-2xl font-bold">Compétences & Atouts</h3>
                    </div>

                    <div id="skillsList" class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6"></div>

                    <div>
                        <h4 class="text-lg font-bold mb-3">Langues parlées</h4>
                        <div id="languagesList" class="flex flex-wrap gap-3"></div>
                    </div>
                </section>

                <!-- REVIEWS -->
                <section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="text-blue-600 text-xl">✭</span>
                        <h3 class="text-2xl font-bold">Avis des parents</h3>
                    </div>

                    <div id="reviewsList" class="space-y-5"></div>

                    <button id="moreReviewsBtn"
                        class="w-full mt-5 rounded-full border-2 border-blue-200 text-blue-600 py-3 text-sm font-semibold hover:bg-blue-50">
                        Voir les autres avis
                    </button>
                </section>
            </div>

            <!-- RIGHT -->
            <div class="space-y-6">

                <!-- AVAILABILITY -->
                <section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-blue-600 text-xl">🗓</span>
                        <h3 class="text-2xl font-bold">Disponibilités</h3>
                    </div>

                    <div class="mb-5">
                        <div class="grid grid-cols-8 gap-2 text-center text-xs uppercase font-semibold text-slate-400 mb-3">
                            <div></div>
                            <div>L</div>
                            <div>M</div>
                            <div>M</div>
                            <div>J</div>
                            <div>V</div>
                            <div>S</div>
                            <div>D</div>
                        </div>

                        <div id="availabilityGrid" class="space-y-3"></div>
                    </div>

                    <div class="rounded-[22px] bg-[#f3f6fb] border border-blue-100 p-4 mb-5">
                        <p id="availabilityNote" class="text-slate-500 text-sm leading-6">
                            Généralement disponible en semaine de 8h à 18h. Babysitting ponctuel possible le week-end sur demande.
                        </p>
                    </div>

                    <button id="reserveBtn"
                        class="w-full bg-blue-600 text-white rounded-full py-3 text-base font-semibold hover:bg-blue-700 shadow">
                        ▷ Réserver Marie
                    </button>
                </section>

                <!-- ZONE -->
                <section class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="h-40 bg-[#eef3fb] flex items-center justify-center text-5xl text-slate-300">
                        📍
                    </div>

                    <div class="p-5">
                        <h4 class="text-lg font-bold mb-2">Zone d'intervention</h4>
                        <p id="zoneText" class="text-slate-500 text-sm">
                            Paris 15, 16, 7 et Boulogne-Billancourt
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <footer class="py-6 text-center text-slate-400 text-sm">
        © 2024 Family Organizer - La sécurité de vos enfants est notre priorité.
    </footer>

    <script>
        const nannyPhoto = document.getElementById('nannyPhoto');
        const nannyName = document.getElementById('nannyName');
        const nannyTitle = document.getElementById('nannyTitle');
        const nannyLocation = document.getElementById('nannyLocation');
        const nannyExperience = document.getElementById('nannyExperience');
        const nannyRating = document.getElementById('nannyRating');
        const nannyReviewsCount = document.getElementById('nannyReviewsCount');
        const nannyAge = document.getElementById('nannyAge');
        const nannyRate = document.getElementById('nannyRate');
        const nannyAbout = document.getElementById('nannyAbout');

        const skillsList = document.getElementById('skillsList');
        const languagesList = document.getElementById('languagesList');
        const reviewsList = document.getElementById('reviewsList');
        const availabilityGrid = document.getElementById('availabilityGrid');
        const availabilityNote = document.getElementById('availabilityNote');
        const zoneText = document.getElementById('zoneText');

        const shareBtn = document.getElementById('shareBtn');
        const favoriteBtn = document.getElementById('favoriteBtn');
        const contactBtn = document.getElementById('contactBtn');
        const reserveBtn = document.getElementById('reserveBtn');
        const moreReviewsBtn = document.getElementById('moreReviewsBtn');
        const messageBox = document.getElementById('messageBox');

        const defaultNannyPhoto = '{{ asset('images/nany.jpeg') }}';

        nannyPhoto.addEventListener('error', function () {
            if (nannyPhoto.src !== defaultNannyPhoto) {
                nannyPhoto.src = defaultNannyPhoto;
            }
        });

        const nannyData = {
            name: 'Marie L.',
            title: 'Nounou certifiée à domicile',
            location: 'Paris 15ème (75)',
            experience: '8 ans',
            rating: '4.9',
            reviewsCount: 24,
            age: '29 ans',
            rate: '14€/h',
            photo: defaultNannyPhoto,
            about: `Bonjour ! Je m'appelle Marie et je suis passionnée par l’éveil des jeunes enfants depuis plus de 8 ans. Titulaire du CAP Petite Enfance, j'ai travaillé en crèche avant de me spécialiser dans la garde à domicile.

Mon approche est basée sur la bienveillance et la créativité. Je propose régulièrement des activités manuelles, de la lecture et des sorties au parc pour favoriser l'épanouissement de vos petits. Je suis douce, ponctuelle et je m'adapte facilement aux routines de chaque famille.`,
            skills: [
                'Cuisine équilibrée',
                'Premiers secours (PSC1)',
                'Aide aux devoirs',
                'Activités créatives',
                'Permis B / Véhiculée',
                'Non-fumeuse'
            ],
            languages: [
                { name: 'Français', level: 'Maternel' },
                { name: 'Anglais', level: 'Avancé' },
                { name: 'Espagnol', level: 'Scolaire' }
            ],
            availability: {
                matin:    [1, 1, 1, 1, 1, 0, 0],
                aprem:    [1, 1, 1, 1, 1, 0, 0],
                soiree:   [0, 1, 0, 1, 1, 1, 0]
            },
            availabilityNote: 'Généralement disponible en semaine de 8h à 18h. Babysitting ponctuel possible le week-end sur demande.',
            zone: 'Paris 15, 16, 7 et Boulogne-Billancourt',
            reviews: [
                {
                    initials: 'JP',
                    name: 'Jean-Pierre D.',
                    time: 'Il y a 2 semaines',
                    text: "Marie s'est occupée de nos deux garçons (3 et 6 ans) pendant tout un semestre. Elle est fantastique ! Toujours à l'heure, pleine d'énergie et les enfants l'adorent."
                },
                {
                    initials: 'AL',
                    name: 'Anne L.',
                    time: 'Il y a 1 mois',
                    text: "Très sérieuse et appliquée. Elle a même aidé notre fille avec ses devoirs d'anglais. Nous recommandons vivement !"
                }
            ]
        };

        document.addEventListener('DOMContentLoaded', function () {
            guardParentAccess();
            renderNannyProfile();
        });

        shareBtn.addEventListener('click', function () {
            showMessage('Le partage du profil sera branché ensuite.', 'success');
        });

        favoriteBtn.addEventListener('click', function () {
            showMessage('Ajout aux favoris sera branché ensuite.', 'success');
        });

        contactBtn.addEventListener('click', function () {
            window.location.href = '{{ route('parent.messages') }}';
        });

        reserveBtn.addEventListener('click', function () {
            showMessage('La réservation sera branchée ensuite.', 'success');
        });

        moreReviewsBtn.addEventListener('click', function () {
            showMessage('La page complète des avis sera branchée ensuite.', 'success');
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

        function renderNannyProfile() {
            nannyPhoto.src = nannyData.photo;
            nannyName.textContent = nannyData.name;
            nannyTitle.textContent = nannyData.title;
            nannyLocation.innerHTML = '📍 ' + nannyData.location;
            nannyExperience.textContent = nannyData.experience;
            nannyRating.textContent = nannyData.rating + ' ⭐';
            nannyReviewsCount.textContent = nannyData.reviewsCount + ' avis parents';
            nannyAge.textContent = nannyData.age;
            nannyRate.textContent = nannyData.rate;
            nannyAbout.textContent = nannyData.about;
            availabilityNote.textContent = nannyData.availabilityNote;
            zoneText.textContent = nannyData.zone;

            renderSkills();
            renderLanguages();
            renderAvailability();
            renderReviews();
        }

        function renderSkills() {
            skillsList.innerHTML = '';

            nannyData.skills.forEach(function (skill) {
                const item = document.createElement('div');
                item.className = 'rounded-2xl bg-[#f7f9fc] border border-slate-100 px-4 py-3 text-sm';
                item.innerHTML = '✦ ' + escapeHtml(skill);
                skillsList.appendChild(item);
            });
        }

        function renderLanguages() {
            languagesList.innerHTML = '';

            nannyData.languages.forEach(function (lang) {
                const item = document.createElement('div');
                item.className = 'rounded-full bg-blue-50 text-blue-600 px-3 py-2 text-sm font-semibold';

                item.innerHTML = `
                    ${escapeHtml(lang.name)}
                    <span class="text-xs uppercase text-blue-300 ml-2">${escapeHtml(lang.level)}</span>
                `;

                languagesList.appendChild(item);
            });
        }

        function renderAvailability() {
            availabilityGrid.innerHTML = '';

            const rows = [
                { label: 'Matin', key: 'matin' },
                { label: 'Après-midi', key: 'aprem' },
                { label: 'Soirée', key: 'soiree' }
            ];

            rows.forEach(function (row) {
                const line = document.createElement('div');
                line.className = 'grid grid-cols-8 gap-2 items-center';

                let html = `<div class="text-sm font-medium">${row.label}</div>`;

                nannyData.availability[row.key].forEach(function (value, index) {
                    let color = 'bg-slate-100';

                    if (value === 1) {
                        if (row.key === 'matin') color = 'bg-green-500';
                        if (row.key === 'aprem') color = 'bg-blue-600';
                        if (row.key === 'soiree') color = 'bg-blue-300';
                    }

                    html += `<div class="h-8 rounded-xl ${color}"></div>`;
                });

                line.innerHTML = html;
                availabilityGrid.appendChild(line);
            });
        }

        function renderReviews() {
            reviewsList.innerHTML = '';

            nannyData.reviews.forEach(function (review) {
                const item = document.createElement('div');
                item.className = 'pb-6 border-b border-slate-200 last:border-b-0';

                item.innerHTML = `
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center text-sm font-bold">
                                ${escapeHtml(review.initials)}
                            </div>

                            <div>
                                <p class="text-lg font-bold">${escapeHtml(review.name)}</p>
                                <p class="text-sm text-slate-400">${escapeHtml(review.time)}</p>
                            </div>
                        </div>

                        <div class="text-yellow-400 text-lg">★★★★★</div>
                    </div>

                    <p class="text-slate-600 text-sm leading-6">
                        ${escapeHtml(review.text)}
                    </p>
                `;

                reviewsList.appendChild(item);
            });
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
