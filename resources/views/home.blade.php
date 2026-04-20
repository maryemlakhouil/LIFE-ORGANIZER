<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f6f8fc] text-slate-900">

    <!-- NAVBAR -->
    <header class="bg-white/95 border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="h-14 flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-bold">Family Organizer</span>
                </a>

                <nav class="hidden md:flex items-center gap-8 text-[11px] font-semibold text-slate-500">
                    <a href="#hero" class="hover:text-blue-600">Accueil</a>
                    <a href="#features" class="hover:text-blue-600">Fonctionnalités</a>
                    <a href="#testimonials" class="hover:text-blue-600">Témoignages</a>
                </nav>

                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-full bg-blue-600 text-white text-[11px] font-semibold hover:bg-blue-700 transition">
                        S'inscrire
                    </a>
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-[11px] font-semibold hover:bg-blue-100 transition">
                        Connexion
                    </a>
                </div>

                <button id="menuBtn" class="md:hidden text-2xl text-slate-700">
                    ☰
                </button>
            </div>
            <!-- Menu version mobile -->
            <div id="mobileMenu" class="hidden md:hidden pb-4">
                <div class="flex flex-col gap-3 text-slate-600 font-medium">
                    <a href="#hero" class="py-2">Accueil</a>
                    <a href="#features" class="py-2">Fonctionnalités</a>
                    <a href="#testimonials" class="py-2">Témoignages</a>
                    <a href="{{ route('register') }}" class="py-2 text-blue-600 font-semibold">S'inscrire</a>
                    <a href="{{ route('login') }}" class="py-2 text-blue-600 font-semibold">Connexion</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Premier section Hero -->

    <section id="hero" class="py-14 md:py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center rounded-full bg-blue-50 text-blue-600 text-[10px] font-bold px-3 py-1.5 mb-5 uppercase tracking-wider">
                    L'app préférée des familles
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-[56px] font-black leading-[0.94] tracking-tight mb-5">
                    Simplifiez la<br>gestion de votre<br>foyer
                </h1>

                <p class="text-slate-500 text-sm md:text-base leading-7 max-w-md mb-7">
                    L'application tout-en-un pour coordonner la vie de famille, gérer les nounous et rester serein au quotidien. Finis les oublis, vive la tranquillité.
                </p>

                <div class="flex flex-col sm:flex-row gap-3 mb-7">
                    <a href="{{ route('register') }}" class="px-6 py-3 rounded-full bg-blue-600 text-white text-sm font-semibold text-center shadow-md hover:bg-blue-700 transition">
                        Commencer gratuitement
                    </a>
                    <a href="#features" class="px-6 py-3 rounded-full border border-blue-100 bg-white text-slate-700 text-sm font-semibold text-center hover:bg-blue-50 transition">
                        Voir la démo
                    </a>
                </div>

                <div class="flex items-center gap-3">
                    <div class="flex -space-x-2">
                        <div class="w-7 h-7 rounded-full bg-orange-200 border-2 border-white flex items-center justify-center text-[10px] font-bold">A</div>
                        <div class="w-7 h-7 rounded-full bg-blue-200 border-2 border-white flex items-center justify-center text-[10px] font-bold">M</div>
                        <div class="w-7 h-7 rounded-full bg-green-200 border-2 border-white flex items-center justify-center text-[10px] font-bold">S</div>
                    </div>
                    <p class="text-xs text-slate-500">
                        <span class="font-semibold text-slate-700">+20,000 familles</span> nous font déjà confiance
                    </p>
                </div>
            </div>

            <div class="flex justify-center lg:justify-end">
                <img
                    src="{{ asset('images/image1.jpeg') }}"
                    alt="Famille heureuse"
                    class="w-full max-w-[470px] h-[320px] md:h-[380px] object-cover rounded-sm shadow-[0_18px_45px_rgba(37,99,235,0.16)]"
                >
            </div>
        </div>
    </section>

    <!-- Deuxieme section : Features-->

    <section id="features" class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 md:px-6">
            <!-- Titre -->
            <div class="text-center mb-10">
                <p class="text-blue-600 uppercase text-[10px] font-bold tracking-[0.28em] mb-3">
                    Fonctionnalités
                </p>
                <h2 class="text-3xl md:text-4xl font-black max-w-2xl mx-auto leading-tight">
                    Tout ce dont votre famille a besoin au même endroit
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Planification partagée-->
                <div class="bg-[#f7f9fc] rounded-[14px] p-7 border border-slate-100">
                    <div class="w-9 h-9 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14H3V6a2 2 0 0 1 2-2Z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-3">Planification partagée</h3>
                    <p class="text-slate-500 text-sm leading-6">
                        Un calendrier commun pour synchroniser les emplois du temps de toute la famille, de l'école et de la nounou en temps réel.
                    </p>
                </div>
                <!-- Messagerie sécurisée-->
                <div class="bg-[#f7f9fc] rounded-[14px] p-7 border border-slate-100">
                    <div class="w-9 h-9 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-3">Messagerie sécurisée</h3>
                    <p class="text-slate-500 text-sm leading-6">
                        Communiquez instantanément avec vos proches et vos prestataires. Partagez photos et documents importants en toute sécurité.
                    </p>
                </div>
                <!-- Rapports d'activité -->
                <div class="bg-[#f7f9fc] rounded-[14px] p-7 border border-slate-100">
                    <div class="w-9 h-9 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 19V5M8 19v-7M12 19V9M16 19v-4M20 19V7"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-3">Rapports d'activité</h3>
                    <p class="text-slate-500 text-sm leading-6">
                        Suivez les repas, les siestes et les moments forts de la journée. Votre nounou peut noter chaque étape importante.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Troisieme section : Nounou -->
    <section class="py-16 bg-[#f7f9fc]">
        <div class="max-w-5xl mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Images  -->
            <div>
                <img
                    src="{{ asset('images/image2.jpeg') }}"
                    alt="Nounou"
                    class="w-full max-w-[430px] h-[320px] object-cover rounded-sm shadow-[0_18px_45px_rgba(15,23,42,0.14)]"
                >
            </div>

            <!-- Texte -->

            <div>
                <h2 class="text-3xl md:text-4xl font-black mb-5">
                    La meilleure alliée de votre nounou
                </h2>

                <p class="text-slate-500 text-sm md:text-base leading-7 mb-6">
                    L'application est pensée pour être aussi simple que possible pour les intervenants extérieurs. Votre nounou peut :
                </p>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <span class="w-5 h-5 rounded-full bg-blue-100 text-blue-600 mt-0.5 flex items-center justify-center text-xs">✓</span>
                        <p class="text-sm text-slate-700">Pointer ses heures de présence facilement</p>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="w-5 h-5 rounded-full bg-blue-100 text-blue-600 mt-0.5 flex items-center justify-center text-xs">✓</span>
                        <p class="text-sm text-slate-700">Consulter les allergies et les besoins spécifiques</p>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="w-5 h-5 rounded-full bg-blue-100 text-blue-600 mt-0.5 flex items-center justify-center text-xs">✓</span>
                        <p class="text-sm text-slate-700">Envoyer des "Carnets de bord" quotidiens avec photos</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4 eme section : TESTIMONIALS Et feedback -->

    <section id="testimonials" class="py-16 bg-[#eef3fb]">
        <div class="max-w-5xl mx-auto px-4 md:px-6">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-black">Ce que disent nos familles</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-[14px] p-7 shadow-sm">
                    <div class="text-blue-600 text-lg mb-4">★★★★★</div>
                    <p class="text-slate-600 text-sm leading-7 mb-6">
                        "Enfin une application qui comprend les besoins des parents actifs ! La gestion de notre nounou est devenue tellement plus simple, on se sent enfin sereins même au travail."
                    </p>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-pink-200 flex items-center justify-center text-sm font-bold">M</div>
                        <div>
                            <p class="text-sm font-bold">Marie L.</p>
                            <p class="text-xs text-slate-400">Maman de deux enfants</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[14px] p-7 shadow-sm">
                    <div class="text-blue-600 text-lg mb-4">★★★★★</div>
                    <p class="text-slate-600 text-sm leading-7 mb-6">
                        "L'interface est intuitive et chaleureuse. Toute la famille l'utilise quotidiennement pour ne rien oublier. Les rapports de la nounou sont un vrai plus pour suivre la journée de bébé."
                    </p>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-slate-300 flex items-center justify-center text-sm font-bold">T</div>
                        <div>
                            <p class="text-sm font-bold">Thomas D.</p>
                            <p class="text-xs text-slate-400">Papa solo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5 eme section : Pret a retrouver -->
     
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 md:px-6">
            <div class="relative overflow-hidden bg-blue-600 rounded-[18px] px-8 md:px-16 py-12 text-center text-white shadow-2xl">
                <div class="absolute -left-14 bottom-0 w-44 h-44 rounded-full bg-white/10"></div>
                <div class="absolute -right-14 top-0 w-44 h-44 rounded-full bg-white/10"></div>

                <div class="relative">
                    <h2 class="text-3xl md:text-4xl font-black max-w-3xl mx-auto leading-tight mb-5">
                        Prêt à retrouver votre sérénité familiale ?
                    </h2>

                    <p class="text-blue-100 text-sm md:text-base max-w-2xl mx-auto leading-7 mb-8">
                        Rejoignez les milliers de familles qui ont simplifié leur organisation quotidienne avec Family Organizer.
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center gap-3">
                        <a href="{{ route('register') }}" class="px-6 py-3 rounded-full bg-white text-blue-600 text-sm font-bold hover:bg-blue-50 transition">
                            S'inscrire gratuitement
                        </a>
                        <a href="{{ route('login') }}" class="px-6 py-3 rounded-full border border-white/50 text-white text-sm font-bold hover:bg-white/10 transition">
                            Parler à un conseiller
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="relative z-10 block w-full bg-[#07142f] text-white pt-16 pb-8">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-10 mb-10">

                <!-- Familiy organiser  -->
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-7 h-7 rounded-full bg-white/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-bold">Family Organizer</span>
                    </div>

                    <p class="text-xs text-slate-300 leading-6">
                        L'application qui prend soin de votre organisation pour que vous puissiez prendre soin de vos proches.
                    </p>
                </div>

                <!-- Produit  -->

                <div>
                    <h4 class="font-bold text-sm mb-4">Produit</h4>
                    <div class="space-y-2 text-xs text-slate-300">
                        <a href="#features" class="block hover:text-white">Fonctionnalités</a>
                        <a href="#" class="block hover:text-white">Tarifs</a>
                        <a href="#" class="block hover:text-white">Applications mobiles</a>
                    </div>
                </div>
                 <!-- aide-->
                <div>
                    <h4 class="font-bold text-sm mb-4">Aide</h4>
                    <div class="space-y-2 text-xs text-slate-300">
                        <a href="#" class="block hover:text-white">Centre d'aide</a>
                        <a href="#" class="block hover:text-white">Contactez-nous</a>
                        <a href="#" class="block hover:text-white">Blog</a>
                    </div>
                </div>

                <!-- Legal-->
                <div>
                    <h4 class="font-bold text-sm mb-4">Légal</h4>
                    <div class="space-y-2 text-xs text-slate-300">
                        <a href="#" class="block hover:text-white">Confidentialité</a>
                        <a href="#" class="block hover:text-white">CGU</a>
                        <a href="#" class="block hover:text-white">Cookies</a>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/10 pt-6 text-center text-slate-400 text-xs">
                © 2024 Family Organizer. Tous droits réservés.
            </div>
        </div>
    </footer>
    
    <!-- La Partie js -->
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        menuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
