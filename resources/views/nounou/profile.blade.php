<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil Nounou - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f4f7fb] text-slate-900 min-h-screen">

    <header class="bg-white border-b border-slate-200">
        <div class="max-w-[1180px] mx-auto px-5 md:px-6 py-3 flex items-center justify-between">
            <a href="{{ route('nounou.dashboard') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </div>
                <span class="text-lg font-bold">Family Organizer</span>
            </a>

            <nav class="hidden md:flex items-center gap-6 text-sm">
                <a href="{{ route('nounou.dashboard') }}" class="text-slate-600 hover:text-blue-600">Tableau de bord</a>
                <a href="{{ route('nounou.planning') }}" class="text-slate-600 hover:text-blue-600">Planning</a>
                <a href="{{ route('nounou.messages') }}" class="text-slate-600 hover:text-blue-600">Messagerie</a>
                <a href="{{ route('nounou.profile') }}" class="text-blue-600 font-semibold border-b-2 border-blue-600 pb-1">Mon profil</a>
            </nav>
        </div>
    </header>

    <main class="max-w-[1180px] mx-auto px-5 md:px-6 py-6">
        <div id="messageBox" class="hidden mb-6 rounded-2xl p-4 text-sm"></div>

        <section class="bg-white rounded-[22px] border border-slate-200 shadow-sm p-5 md:p-6 mb-6">
            <div class="flex flex-col md:flex-row md:items-center gap-5">
                <div id="profileAvatar" class="w-24 h-24 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center text-3xl font-black">
                    N
                </div>

                <div class="flex-1">
                    <p class="text-sm uppercase tracking-widest text-blue-600 font-bold mb-2">Profil nounou</p>
                    <h1 id="profileName" class="text-2xl md:text-3xl font-black mb-2">Ma fiche professionnelle</h1>
                    <p id="profileEmail" class="text-sm text-slate-500 break-all">email@example.com</p>
                </div>

                <a href="{{ route('nounou.messages') }}" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700">
                    Ouvrir la messagerie
                </a>
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_320px] gap-6">
            <section class="bg-white rounded-[22px] border border-slate-200 shadow-sm p-5">
                <h2 class="text-xl font-black mb-4">Informations professionnelles</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="rounded-2xl bg-[#f8fafc] border border-slate-100 p-4">
                        <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-2">Titre</p>
                        <p class="text-sm font-semibold">Nounou à domicile</p>
                    </div>

                    <div class="rounded-2xl bg-[#f8fafc] border border-slate-100 p-4">
                        <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-2">Expérience</p>
                        <p class="text-sm font-semibold">Profil à compléter</p>
                    </div>

                    <div class="rounded-2xl bg-[#f8fafc] border border-slate-100 p-4">
                        <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-2">Disponibilité</p>
                        <p class="text-sm font-semibold">Selon planning</p>
                    </div>

                    <div class="rounded-2xl bg-[#f8fafc] border border-slate-100 p-4">
                        <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-2">Statut</p>
                        <p class="text-sm font-semibold text-green-600">Active</p>
                    </div>
                </div>

                <div class="mt-5">
                    <h3 class="text-lg font-black mb-3">À propos</h3>
                    <p class="text-sm leading-7 text-slate-600">
                        Cette page présente le profil visible côté nounou. Pour le moment, les informations sont simples afin de garder le projet clair. On pourra ensuite brancher la modification du profil et les disponibilités réelles.
                    </p>
                </div>
            </section>

            <aside class="space-y-6">
                <section class="bg-white rounded-[22px] border border-slate-200 shadow-sm p-5">
                    <h2 class="text-lg font-black mb-4">Raccourcis</h2>

                    <div class="space-y-3">
                        <a href="{{ route('nounou.dashboard') }}" class="block rounded-2xl bg-blue-50 px-4 py-3 text-sm font-semibold text-blue-600 hover:bg-blue-100">
                            Tableau de bord
                        </a>
                        <a href="{{ route('nounou.planning') }}" class="block rounded-2xl bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">
                            Voir mon planning
                        </a>
                        <a href="{{ route('nounou.messages') }}" class="block rounded-2xl bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">
                            Contacter les parents
                        </a>
                    </div>
                </section>
            </aside>
        </div>
    </main>

    <script>
        const profileAvatar = document.getElementById('profileAvatar');
        const profileName = document.getElementById('profileName');
        const profileEmail = document.getElementById('profileEmail');

        document.addEventListener('DOMContentLoaded', function () {
            guardNannyAccess();
            loadProfile();
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

        function loadProfile() {
            const user = getStoredUser();

            if (!user) return;

            profileName.textContent = user.name || 'Profil nounou';
            profileEmail.textContent = user.email || '';
            profileAvatar.textContent = getInitials(user.name || 'Nounou');
        }

        function getInitials(name) {
            const parts = name.trim().split(' ');
            let initials = '';

            for (let i = 0; i < parts.length; i++) {
                if (parts[i].length > 0) {
                    initials += parts[i][0];
                }
            }

            return initials.substring(0, 2).toUpperCase() || 'N';
        }
    </script>
</body>
</html>
