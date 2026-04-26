<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Organizer</title>
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
    </style>
</head>
<body class="bg-[#f7f0e7] text-[#2f281f]">

    <!-- NAVBAR -->
    <header class="bg-[#fffaf3]/95 border-b border-[#eadfce] sticky top-0 z-50 backdrop-blur">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="h-14 flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-2xl bg-[#efe2cf] flex items-center justify-center text-[#8f6b43]">
                        <span class="material-symbols-rounded !text-[18px]">groups</span>
                    </div>
                    <span class="text-sm font-black tracking-tight">Family Organizer</span>
                </a>

                <nav class="hidden md:flex items-center gap-8 text-[11px] font-semibold text-[#7d6b57]">
                    <a href="#hero" class="hover:text-[#8f6b43]">Accueil</a>
                    <a href="#features" class="hover:text-[#8f6b43]">Fonctionnalités</a>
                    <a href="#testimonials" class="hover:text-[#8f6b43]">Témoignages</a>
                </nav>

                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-full bg-[#8f6b43] text-white text-[11px] font-semibold hover:bg-[#795936] transition">
                        S'inscrire
                    </a>
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-full bg-[#efe2cf] text-[#8f6b43] text-[11px] font-semibold hover:bg-[#e7d6bf] transition">
                        Connexion
                    </a>
                </div>

                <button id="menuBtn" class="md:hidden text-[#6d5c49]">
                    <span class="material-symbols-rounded !text-[26px]">menu</span>
                </button>
            </div>
            <!-- Menu version mobile -->
            <div id="mobileMenu" class="hidden md:hidden pb-4">
                <div class="flex flex-col gap-3 text-[#6d5c49] font-medium">
                    <a href="#hero" class="py-2">Accueil</a>
                    <a href="#features" class="py-2">Fonctionnalités</a>
                    <a href="#testimonials" class="py-2">Témoignages</a>
                    <a href="{{ route('register') }}" class="py-2 text-[#8f6b43] font-semibold">S'inscrire</a>
                    <a href="{{ route('login') }}" class="py-2 text-[#8f6b43] font-semibold">Connexion</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Premier section Hero -->

    <section id="hero" class="py-14 md:py-16 bg-[#fffaf3]">
        <div class="max-w-6xl mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center rounded-full bg-[#efe2cf] text-[#8f6b43] text-[10px] font-bold px-3 py-1.5 mb-5 uppercase tracking-wider">
                    L'app préférée des familles
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-[56px] font-black leading-[0.94] tracking-tight mb-5">
                    Simplifiez la<br>gestion de votre<br>foyer
                </h1>

                <p class="text-[#6d5c49] text-sm md:text-base leading-7 max-w-md mb-7 font-medium">
                    L'application tout-en-un pour coordonner la vie de famille, gérer les nounous et rester serein au quotidien. Finis les oublis, vive la tranquillité.
                </p>

                <div class="flex flex-col sm:flex-row gap-3 mb-7">
                    <a href="{{ route('register') }}" class="px-6 py-3 rounded-full bg-[#8f6b43] text-white text-sm font-semibold text-center shadow-md hover:bg-[#795936] transition">
                        Commencer gratuitement
                    </a>
                    <a href="#features" class="px-6 py-3 rounded-full border border-[#eadfce] bg-white text-[#5d4c39] text-sm font-semibold text-center hover:bg-[#f8efe4] transition">
                        Voir la démo
                    </a>
                </div>

                <div class="flex items-center gap-3">
                    <div class="flex -space-x-2">
                        <div class="w-7 h-7 rounded-full bg-orange-200 border-2 border-white flex items-center justify-center text-[10px] font-bold">A</div>
                        <div class="w-7 h-7 rounded-full bg-blue-200 border-2 border-white flex items-center justify-center text-[10px] font-bold">M</div>
                        <div class="w-7 h-7 rounded-full bg-green-200 border-2 border-white flex items-center justify-center text-[10px] font-bold">S</div>
                    </div>
                    <p class="text-xs text-[#8b7761]">
                        <span class="font-semibold text-[#4c3f31]">+20,000 familles</span> nous font déjà confiance
                    </p>
                </div>
            </div>

            <div class="flex justify-center lg:justify-end">
                <img
                    src="{{ asset('images/image1.jpeg') }}"
                    alt="Famille heureuse"
                    class="w-full max-w-[470px] h-[320px] md:h-[380px] object-cover rounded-[22px] shadow-[0_18px_45px_rgba(143,107,67,0.18)]"
                >
            </div>
        </div>
    </section>

    <!-- Deuxieme section : Features-->

    <section id="features" class="py-16 bg-[#fffaf3]">
        <div class="max-w-5xl mx-auto px-4 md:px-6">
            <!-- Titre -->
            <div class="text-center mb-10">
                <p class="text-[#8f6b43] uppercase text-[10px] font-bold tracking-[0.28em] mb-3">
                    Fonctionnalités
                </p>
                <h2 class="text-3xl md:text-4xl font-black max-w-2xl mx-auto leading-tight">
                    Tout ce dont votre famille a besoin au même endroit
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Planification partagée-->
                <div class="bg-[#f8efe4] rounded-[20px] p-7 border border-[#eadfce]">
                    <div class="w-10 h-10 rounded-2xl bg-[#efe2cf] text-[#8f6b43] flex items-center justify-center mb-5">
                        <span class="material-symbols-rounded !text-[20px]">calendar_month</span>
                    </div>
                    <h3 class="text-base font-bold mb-3">Planification partagée</h3>
                    <p class="text-[#6d5c49] text-sm leading-6">
                        Un calendrier commun pour synchroniser les emplois du temps de toute la famille, de l'école et de la nounou en temps réel.
                    </p>
                </div>
                <!-- Messagerie sécurisée-->
                <div class="bg-[#f8efe4] rounded-[20px] p-7 border border-[#eadfce]">
                    <div class="w-10 h-10 rounded-2xl bg-[#efe2cf] text-[#8f6b43] flex items-center justify-center mb-5">
                        <span class="material-symbols-rounded !text-[20px]">chat_bubble</span>
                    </div>
                    <h3 class="text-base font-bold mb-3">Messagerie sécurisée</h3>
                    <p class="text-[#6d5c49] text-sm leading-6">
                        Communiquez instantanément avec vos proches et vos prestataires. Partagez photos et documents importants en toute sécurité.
                    </p>
                </div>
                <!-- Rapports d'activité -->
                <div class="bg-[#f8efe4] rounded-[20px] p-7 border border-[#eadfce]">
                    <div class="w-10 h-10 rounded-2xl bg-[#efe2cf] text-[#8f6b43] flex items-center justify-center mb-5">
                        <span class="material-symbols-rounded !text-[20px]">bar_chart</span>
                    </div>
                    <h3 class="text-base font-bold mb-3">Rapports d'activité</h3>
                    <p class="text-[#6d5c49] text-sm leading-6">
                        Suivez les repas, les siestes et les moments forts de la journée. Votre nounou peut noter chaque étape importante.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Troisieme section : Nounou -->
    <section class="py-16 bg-[#f3e8d9]">
        <div class="max-w-5xl mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Images  -->
            <div>
                <img
                    src="{{ asset('images/image2.jpeg') }}"
                    alt="Nounou"
                    class="w-full max-w-[430px] h-[320px] object-cover rounded-[22px] shadow-[0_18px_45px_rgba(86,67,44,0.14)]"
                >
            </div>

            <!-- Texte -->

            <div>
                <h2 class="text-3xl md:text-4xl font-black mb-5">
                    La meilleure alliée de votre nounou
                </h2>

                <p class="text-[#6d5c49] text-sm md:text-base leading-7 mb-6">
                    L'application est pensée pour être aussi simple que possible pour les intervenants extérieurs. Votre nounou peut :
                </p>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#efe2cf] text-[#8f6b43] mt-0.5 flex items-center justify-center">
                            <span class="material-symbols-rounded !text-[14px]">check</span>
                        </span>
                        <p class="text-sm text-[#4c3f31]">Pointer ses heures de présence facilement</p>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#efe2cf] text-[#8f6b43] mt-0.5 flex items-center justify-center">
                            <span class="material-symbols-rounded !text-[14px]">check</span>
                        </span>
                        <p class="text-sm text-[#4c3f31]">Consulter les allergies et les besoins spécifiques</p>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#efe2cf] text-[#8f6b43] mt-0.5 flex items-center justify-center">
                            <span class="material-symbols-rounded !text-[14px]">check</span>
                        </span>
                        <p class="text-sm text-[#4c3f31]">Envoyer des "Carnets de bord" quotidiens avec photos</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4 eme section : TESTIMONIALS Et feedback -->

    <section id="testimonials" class="py-16 bg-[#efe2cf]">
        <div class="max-w-5xl mx-auto px-4 md:px-6">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-black">Ce que disent nos familles</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-[#fffaf3] rounded-[20px] p-7 shadow-sm border border-[#eadfce]">
                    <div class="flex items-center gap-1 text-[#b78a3f] text-lg mb-4">
                        <span class="material-symbols-rounded !text-[18px]">star</span>
                        <span class="material-symbols-rounded !text-[18px]">star</span>
                        <span class="material-symbols-rounded !text-[18px]">star</span>
                        <span class="material-symbols-rounded !text-[18px]">star</span>
                        <span class="material-symbols-rounded !text-[18px]">star</span>
                    </div>
                    <p class="text-[#6d5c49] text-sm leading-7 mb-6">
                        "Enfin une application qui comprend les besoins des parents actifs ! La gestion de notre nounou est devenue tellement plus simple, on se sent enfin sereins même au travail."
                    </p>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-pink-200 flex items-center justify-center text-sm font-bold">M</div>
                        <div>
                            <p class="text-sm font-bold">Marie L.</p>
                            <p class="text-xs text-[#9a8469]">Maman de deux enfants</p>
                        </div>
                    </div>
                </div>

                <div class="bg-[#fffaf3] rounded-[20px] p-7 shadow-sm border border-[#eadfce]">
                    <div class="flex items-center gap-1 text-[#b78a3f] text-lg mb-4">
                        <span class="material-symbols-rounded !text-[18px]">star</span>
                        <span class="material-symbols-rounded !text-[18px]">star</span>
                        <span class="material-symbols-rounded !text-[18px]">star</span>
                        <span class="material-symbols-rounded !text-[18px]">star</span>
                        <span class="material-symbols-rounded !text-[18px]">star</span>
                    </div>
                    <p class="text-[#6d5c49] text-sm leading-7 mb-6">
                        "L'interface est intuitive et chaleureuse. Toute la famille l'utilise quotidiennement pour ne rien oublier. Les rapports de la nounou sont un vrai plus pour suivre la journée de bébé."
                    </p>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-slate-300 flex items-center justify-center text-sm font-bold">T</div>
                        <div>
                            <p class="text-sm font-bold">Thomas D.</p>
                            <p class="text-xs text-[#9a8469]">Papa solo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5 eme section : Pret a retrouver -->
     
    <section class="py-16 bg-[#fffaf3]">
        <div class="max-w-4xl mx-auto px-4 md:px-6">
            <div class="relative overflow-hidden bg-[#8f6b43] rounded-[24px] px-8 md:px-16 py-12 text-center text-white shadow-2xl">
                <div class="absolute -left-14 bottom-0 w-44 h-44 rounded-full bg-white/10"></div>
                <div class="absolute -right-14 top-0 w-44 h-44 rounded-full bg-white/10"></div>

                <div class="relative">
                    <h2 class="text-3xl md:text-4xl font-black max-w-3xl mx-auto leading-tight mb-5">
                        Prêt à retrouver votre sérénité familiale ?
                    </h2>

                    <p class="text-[#f5e8d6] text-sm md:text-base max-w-2xl mx-auto leading-7 mb-8">
                        Rejoignez les milliers de familles qui ont simplifié leur organisation quotidienne avec Family Organizer.
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center gap-3">
                        <a href="{{ route('register') }}" class="px-6 py-3 rounded-full bg-white text-[#8f6b43] text-sm font-bold hover:bg-[#f8efe4] transition">
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
    <footer class="relative z-10 block w-full bg-[#2f281f] text-white pt-16 pb-8">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-10 mb-10">

                <!-- Familiy organiser  -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-2xl bg-white/10 flex items-center justify-center">
                            <span class="material-symbols-rounded !text-[18px]">groups</span>
                        </div>
                        <span class="text-sm font-black">Family Organizer</span>
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
