<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trouver une nounou - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f5f7fb] text-slate-900 min-h-screen flex flex-col">

    <!-- TOPBAR -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-[1320px] mx-auto px-6 py-4 flex items-center justify-between gap-6">
            <div class="flex items-center gap-10">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-blue-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold">Family Organizer</span>
                </a>

                <nav class="hidden lg:flex items-center gap-8 text-lg">
                    <a href="{{ route('parent.dashboard') }}" class="text-slate-600 hover:text-blue-600">Accueil</a>
                    <a href="{{ route('parent.nannies') }}" class="text-blue-600 font-semibold">Nounous</a>
                    <a href="{{ route('parent.calendar') }}" class="text-slate-600 hover:text-blue-600">Calendrier</a>
                    <a href="{{ route('parent.messages') }}" class="text-slate-600 hover:text-blue-600">Messages</a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <button class="w-11 h-11 rounded-full bg-[#f3f6fb] text-slate-500 hover:bg-slate-200">🔔</button>
                <div id="profileAvatarTop" class="w-11 h-11 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">
                    P
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-[1320px] mx-auto w-full px-6 py-8">
        <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

        <!-- HEADER -->
        <section class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-5 mb-8">
            <div>
                <h1 class="text-6xl font-black mb-3">Trouver une Nounou</h1>
                <p class="text-slate-500 text-2xl">
                    Découvrez les meilleures nounous vérifiées à proximité.
                </p>
            </div>

            <div class="self-start rounded-full border border-slate-200 bg-white px-6 py-3 text-xl text-slate-500">
                <span id="availableCount" class="text-blue-600 font-semibold">0</span> Nounous disponibles
            </div>
        </section>

        <!-- SEARCH + FILTERS -->
        <section class="flex flex-col xl:flex-row gap-4 mb-8">
            <div class="flex-1">
                <div class="relative">
                    <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 text-xl">🔎</span>
                    <input
                        id="searchInput"
                        type="text"
                        placeholder="Rechercher par nom, ville ou code postal..."
                        class="w-full rounded-[26px] border border-slate-200 bg-white pl-14 pr-5 py-4 text-xl outline-none focus:border-blue-500"
                    >
                </div>
            </div>

            <div class="flex flex-wrap gap-3">
                <select id="experienceFilter" class="rounded-full border border-slate-200 bg-white px-5 py-4 text-lg outline-none focus:border-blue-500">
                    <option value="">Expérience</option>
                    <option value="3">3 ans et +</option>
                    <option value="5">5 ans et +</option>
                    <option value="8">8 ans et +</option>
                </select>

                <select id="priceFilter" class="rounded-full border border-slate-200 bg-white px-5 py-4 text-lg outline-none focus:border-blue-500">
                    <option value="">Tarif max</option>
                    <option value="12">12€</option>
                    <option value="14">14€</option>
                    <option value="16">16€</option>
                    <option value="18">18€</option>
                </select>

                <select id="distanceFilter" class="rounded-full border border-slate-200 bg-white px-5 py-4 text-lg outline-none focus:border-blue-500">
                    <option value="">Distance</option>
                    <option value="2">2 km</option>
                    <option value="5">5 km</option>
                    <option value="10">10 km</option>
                </select>

                <select id="ratingFilter" class="rounded-full border border-slate-200 bg-white px-5 py-4 text-lg outline-none focus:border-blue-500">
                    <option value="">Notes</option>
                    <option value="4.5">4.5 et +</option>
                    <option value="4.8">4.8 et +</option>
                    <option value="5">5.0</option>
                </select>
            </div>
        </section>

        <!-- GRID -->
        <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-10" id="nanniesGrid">
            <div class="bg-white rounded-[28px] border border-slate-200 shadow-sm p-6 text-slate-400">
                Chargement...
            </div>
        </section>

        <!-- PAGINATION -->
        <section class="flex justify-center items-center gap-3 mb-8" id="paginationWrapper">
        </section>
    </main>

    <footer class="py-8 text-center text-slate-400 text-lg">
        © 2024 Family Organizer. Tous droits réservés.
    </footer>

    <script>
        const searchInput = document.getElementById('searchInput');
        const experienceFilter = document.getElementById('experienceFilter');
        const priceFilter = document.getElementById('priceFilter');
        const distanceFilter = document.getElementById('distanceFilter');
        const ratingFilter = document.getElementById('ratingFilter');

        const nanniesGrid = document.getElementById('nanniesGrid');
        const paginationWrapper = document.getElementById('paginationWrapper');
        const availableCount = document.getElementById('availableCount');
        const profileAvatarTop = document.getElementById('profileAvatarTop');
        const messageBox = document.getElementById('messageBox');

        let currentUser = null;
        let allNannies = [];
        let filteredNannies = [];
        let currentPage = 1;
        const perPage = 5;

        document.addEventListener('DOMContentLoaded', function () {
            loadUserInfo();
            seedNannies();
            applyFilters();
        });

        searchInput.addEventListener('input', applyFilters);
        experienceFilter.addEventListener('change', applyFilters);
        priceFilter.addEventListener('change', applyFilters);
        distanceFilter.addEventListener('change', applyFilters);
        ratingFilter.addEventListener('change', applyFilters);

        function loadUserInfo() {
            const user = localStorage.getItem('user');

            if (user) {
                currentUser = JSON.parse(user);
                profileAvatarTop.textContent = getInitials(currentUser.name || 'P');
            }
        }

        function seedNannies() {
            allNannies = [
                {
                    id: 1,
                    name: 'Sophie Martin',
                    city: 'Lyon, 3ème arrondissement',
                    price: 15,
                    experience: 8,
                    rating: 4.9,
                    distance: 3,
                    description: "Ancienne auxiliaire de puériculture, j'ai l'habitude de m'occuper des nouveau-nés et des jeunes enfants.",
                    tags: ['Vérifiée'],
                    badge: '8 ans d’exp.',
                    photo: '{{ asset('images/nannies/nanny-1.jpg') }}'
                },
                {
                    id: 2,
                    name: 'Léa Dubois',
                    city: 'Villeurbanne',
                    price: 12,
                    experience: 3,
                    rating: 4.8,
                    distance: 4,
                    description: "Dynamique et créative, je propose des activités d’éveil et de l’aide aux devoirs pour vos enfants.",
                    tags: ['Étudiante'],
                    badge: '3 ans d’exp.',
                    photo: '{{ asset('images/nannies/nanny-2.jpg') }}'
                },
                {
                    id: 3,
                    name: 'Thomas Bernard',
                    city: 'Lyon, 6ème arrondissement',
                    price: 18,
                    experience: 10,
                    rating: 5.0,
                    distance: 2,
                    description: "Spécialisé dans l’encadrement périscolaire et les activités sportives. Premier secours certifié.",
                    tags: ['Premium'],
                    badge: '10 ans d’exp.',
                    photo: '{{ asset('images/nannies/nanny-3.jpg') }}'
                },
                {
                    id: 4,
                    name: 'Clara Petit',
                    city: 'Tassin-la-Demi-Lune',
                    price: 14,
                    experience: 5,
                    rating: 4.7,
                    distance: 8,
                    description: "Disponible pour les sorties d’école et les mercredis après-midi. Jeux éducatifs et balades.",
                    tags: [],
                    badge: '5 ans d’exp.',
                    photo: '{{ asset('images/nannies/nanny-4.jpg') }}'
                },
                {
                    id: 5,
                    name: 'Camille Lefebvre',
                    city: 'Caluire-et-Cuire',
                    price: 16,
                    experience: 6,
                    rating: 4.9,
                    distance: 5,
                    description: "Bilingue Anglais-Français, je peux initier vos enfants à la langue de Shakespeare par le jeu.",
                    tags: ['Vérifiée'],
                    badge: '6 ans d’exp.',
                    photo: '{{ asset('images/nannies/nanny-5.jpg') }}'
                },
                {
                    id: 6,
                    name: 'Nina Moreau',
                    city: 'Oullins',
                    price: 13,
                    experience: 4,
                    rating: 4.6,
                    distance: 9,
                    description: "Patiente et organisée, je privilégie les routines rassurantes et les activités calmes.",
                    tags: ['Flexible'],
                    badge: '4 ans d’exp.',
                    photo: '{{ asset('images/nannies/nanny-6.jpg') }}'
                }
            ];
        }

        function applyFilters() {
            const search = searchInput.value.trim().toLowerCase();
            const minExperience = experienceFilter.value;
            const maxPrice = priceFilter.value;
            const maxDistance = distanceFilter.value;
            const minRating = ratingFilter.value;

            filteredNannies = allNannies.filter(function (nanny) {
                let okSearch = true;
                let okExperience = true;
                let okPrice = true;
                let okDistance = true;
                let okRating = true;

                if (search !== '') {
                    const haystack = (nanny.name + ' ' + nanny.city).toLowerCase();
                    okSearch = haystack.includes(search);
                }

                if (minExperience !== '') {
                    okExperience = nanny.experience >= parseInt(minExperience);
                }

                if (maxPrice !== '') {
                    okPrice = nanny.price <= parseInt(maxPrice);
                }

                if (maxDistance !== '') {
                    okDistance = nanny.distance <= parseInt(maxDistance);
                }

                if (minRating !== '') {
                    okRating = nanny.rating >= parseFloat(minRating);
                }

                return okSearch && okExperience && okPrice && okDistance && okRating;
            });

            currentPage = 1;
            availableCount.textContent = filteredNannies.length;
            renderNannies();
            renderPagination();
        }

        function renderNannies() {
            nanniesGrid.innerHTML = '';

            if (filteredNannies.length === 0) {
                nanniesGrid.innerHTML = `
                    <div class="xl:col-span-3 rounded-[28px] border-2 border-dashed border-slate-300 bg-white p-12 text-center">
                        <div class="text-6xl mb-4">🔎</div>
                        <h3 class="text-4xl font-bold mb-3">Aucun profil trouvé</h3>
                        <p class="text-slate-500 text-xl mb-6">
                            Élargissez vos critères de recherche pour voir plus de profils.
                        </p>
                        <button onclick="resetAllFilters()" class="px-6 py-3 rounded-full border border-blue-600 text-blue-600 font-semibold hover:bg-blue-50">
                            Ajuster les filtres
                        </button>
                    </div>
                `;
                return;
            }

            const start = (currentPage - 1) * perPage;
            const end = start + perPage;
            const pageItems = filteredNannies.slice(start, end);

            pageItems.forEach(function (nanny, index) {
                const card = document.createElement('div');
                card.className = 'bg-white rounded-[28px] border border-slate-200 shadow-sm overflow-hidden flex flex-col';

                const photoFallback = getInitials(nanny.name);

                card.innerHTML = `
                    <div class="relative h-48 bg-[#eef3fb] overflow-hidden">
                        <img
                            src="${nanny.photo}"
                            alt="${escapeHtml(nanny.name)}"
                            class="w-full h-full object-cover"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >
                        <div class="hidden w-full h-full items-center justify-center text-6xl font-black text-blue-600">
                            ${photoFallback}
                        </div>

                        <div class="absolute top-4 right-4 bg-white/95 rounded-full px-4 py-2 text-lg font-bold shadow-sm">
                            ⭐ ${nanny.rating}
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex items-start justify-between gap-4 mb-3">
                            <div>
                                <h3 class="text-2xl font-black">${escapeHtml(nanny.name)}</h3>
                                <p class="text-slate-500 text-lg">${escapeHtml(nanny.city)}</p>
                            </div>

                            <div class="text-right shrink-0">
                                <p class="text-3xl font-black text-blue-600">${nanny.price}€</p>
                                <p class="text-slate-400">/heure</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-bold uppercase">
                                ${escapeHtml(nanny.badge)}
                            </span>
                            ${renderTags(nanny.tags)}
                        </div>

                        <p class="text-slate-600 text-lg leading-8 flex-1">
                            ${escapeHtml(shortText(nanny.description, 95))}
                        </p>

                        <div class="mt-6">
                            <button onclick="openNannyProfile(${nanny.id})"
                                class="w-full rounded-full bg-blue-600 text-white py-4 text-xl font-semibold hover:bg-blue-700">
                                Voir le profil →
                            </button>
                        </div>
                    </div>
                `;

                nanniesGrid.appendChild(card);
            });

            if (pageItems.length < perPage) {
                const moreCard = document.createElement('div');
                moreCard.className = 'rounded-[28px] border-2 border-dashed border-slate-300 bg-white p-8 flex flex-col items-center justify-center text-center';

                moreCard.innerHTML = `
                    <div class="w-16 h-16 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-3xl mb-6">
                        ⌕
                    </div>
                    <h3 class="text-4xl font-black mb-4">Plus de résultats ?</h3>
                    <p class="text-slate-500 text-xl leading-8 mb-8">
                        Élargissez votre périmètre de recherche pour voir plus de profils.
                    </p>
                    <button onclick="resetAllFilters()"
                        class="px-6 py-3 rounded-full border-2 border-blue-600 text-blue-600 font-semibold hover:bg-blue-50">
                        Ajuster les filtres
                    </button>
                `;

                nanniesGrid.appendChild(moreCard);
            }
        }

        function renderTags(tags) {
            if (!tags || tags.length === 0) {
                return '';
            }

            let html = '';

            tags.forEach(function (tag) {
                html += `
                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold uppercase">
                        ${escapeHtml(tag)}
                    </span>
                `;
            });

            return html;
        }

        function renderPagination() {
            paginationWrapper.innerHTML = '';

            const totalPages = Math.ceil(filteredNannies.length / perPage);

            if (totalPages <= 1) {
                return;
            }

            const prevBtn = document.createElement('button');
            prevBtn.className = 'w-12 h-12 rounded-full border border-slate-200 bg-white text-slate-500 hover:bg-slate-50';
            prevBtn.innerHTML = '‹';
            prevBtn.disabled = currentPage === 1;
            if (currentPage === 1) {
                prevBtn.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                prevBtn.addEventListener('click', function () {
                    currentPage--;
                    renderNannies();
                    renderPagination();
                });
            }
            paginationWrapper.appendChild(prevBtn);

            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.className = 'w-12 h-12 rounded-full border text-lg font-semibold';

                if (i === currentPage) {
                    btn.className += ' bg-blue-600 text-white border-blue-600';
                } else {
                    btn.className += ' bg-white text-slate-500 border-slate-200 hover:bg-slate-50';
                }

                btn.textContent = i;
                btn.addEventListener('click', function () {
                    currentPage = i;
                    renderNannies();
                    renderPagination();
                });

                paginationWrapper.appendChild(btn);
            }

            const nextBtn = document.createElement('button');
            nextBtn.className = 'w-12 h-12 rounded-full border border-slate-200 bg-white text-slate-500 hover:bg-slate-50';
            nextBtn.innerHTML = '›';
            nextBtn.disabled = currentPage === totalPages;
            if (currentPage === totalPages) {
                nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                nextBtn.addEventListener('click', function () {
                    currentPage++;
                    renderNannies();
                    renderPagination();
                });
            }
            paginationWrapper.appendChild(nextBtn);
        }

        function openNannyProfile(nannyId) {
            localStorage.setItem('selectedNannyId', String(nannyId));
            window.location.href = '{{ route('parent.nanny-profile') }}';
        }

        function resetAllFilters() {
            searchInput.value = '';
            experienceFilter.value = '';
            priceFilter.value = '';
            distanceFilter.value = '';
            ratingFilter.value = '';
            applyFilters();
        }

        function shortText(text, maxLength) {
            if (!text) return '';
            if (text.length <= maxLength) return text;
            return text.substring(0, maxLength).trim() + '...';
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