<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#f3f3f5] min-h-screen flex items-center justify-center px-4 py-8">

    <div class="w-full max-w-5xl bg-white rounded-[28px] shadow-[0_20px_60px_rgba(0,0,0,0.12)] overflow-hidden grid grid-cols-1 lg:grid-cols-2">

        <!-- LEFT SIDE -->
        <div class="p-8 md:p-12 lg:p-16 flex flex-col justify-center">

            <!-- Logo -->
            <div class="flex items-center gap-3 mb-12">
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                    <svg class="w-7 h-7 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zm-8 0c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.95 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-slate-900">Family Organizer</h1>
            </div>

            <!-- TITLE -->
            <div class="mb-10">
                <h2 class="text-5xl font-bold text-slate-900 mb-3">Bon retour !</h2>
                <p class="text-slate-500 text-xl">
                    Gérez votre quotidien familial en toute simplicité.
                </p>
            </div>

            <!-- Formulaire -->

            <form id="loginForm" class="space-y-6">

                <!-- EMAIL -->
                <div>
                    <label for="email" class="block text-slate-700 font-semibold mb-3">
                        Adresse e-mail
                    </label>

                    <div class="relative">
                        <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25H4.5a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5H4.5A2.25 2.25 0 0 0 2.25 6.75m19.5 0-8.689 5.792a2.25 2.25 0 0 1-2.122 0L2.25 6.75"/>
                            </svg>
                        </span>

                        <input
                            type="email" id="email" name="email" placeholder="nom@exemple.com"
                            class="w-full rounded-3xl border border-slate-200 bg-[#f7f8fb] pl-14 pr-5 py-4 text-lg outline-none focus:border-blue-500"
                        >
                    </div>
                </div>

                <!-- PASSWORD -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <label for="password" class="block text-slate-700 font-semibold">
                            Mot de passe
                        </label>

                        <a href="#" class="text-blue-600 hover:underline font-medium">
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <div class="relative">
                        <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V7.875a4.5 4.5 0 1 0-9 0V10.5m12 0h.75A2.25 2.25 0 0 1 22.5 12.75v6A2.25 2.25 0 0 1 20.25 21h-16.5A2.25 2.25 0 0 1 1.5 18.75v-6A2.25 2.25 0 0 1 3.75 10.5h15.75Z"/>
                            </svg>
                        </span>

                        <input
                            type="password" id="password" name="password" placeholder="••••••••"
                            class="w-full rounded-3xl border border-slate-200 bg-[#f7f8fb] pl-14 pr-14 py-4 text-lg outline-none focus:border-blue-500"
                        >

                        <button
                            type="button" id="togglePassword"
                            class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600"
                        >
                            <svg id="eyeOpen" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12 18 19.5 12 19.5 2.25 12 2.25 12Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>

                            <svg id="eyeClosed" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.584 10.587a2 2 0 1 0 2.828 2.828"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.88 4.24A10.95 10.95 0 0 1 12 4c6 0 9.75 8 9.75 8a17.403 17.403 0 0 1-3.305 4.592M6.61 6.61C4.13 8.244 2.25 12 2.25 12s3.75 8 9.75 8c1.81 0 3.4-.49 4.79-1.24"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- REMEMBER -->
                <div class="flex items-center gap-3">
                    <input
                        type="checkbox" id="remember" name="remember"
                        class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                    >
                    <label for="remember" class="text-slate-600 text-lg">
                        Se souvenir de moi
                    </label>
                </div>

                <!-- MESSAGE BOX Pour Les erreurs -->
                <div id="messageBox" class="hidden rounded-xl p-4 text-sm"></div>

                <!-- bUttom se connecter -->

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold text-2xl py-4 rounded-3xl shadow-lg transition">
                    Se connecter
                </button>
            </form>

            <!-- FOOTER -->
            <p class="text-center text-slate-500 mt-12 text-xl">
                Pas encore inscrit ?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">
                    Créer un compte
                </a>
            </p>
        </div>

        <!-- RIGHT SIDE Pour Image -->

        <div class="relative min-h-[500px] hidden lg:block">

            <img src="{{ asset('images/image3.jpeg') }}" alt="Family Organizer" class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/5"></div>

            <!-- les TexTe Fou9 image -->
            <div class="absolute inset-0 flex flex-col justify-end px-12 pb-12 text-black">

                <div class="inline-flex items-center gap-2 self-start bg-white/70 backdrop-blur-sm px-5 py-2 rounded-full text-sm font-semibold tracking-wide mb-6">
                    <span class="w-4 h-4 rounded-full border border-black flex items-center justify-center text-[10px]">✦</span>
                    SOLUTION N°1 POUR LES FAMILLES
                </div>

                <h3 class="text-5xl font-bold leading-tight max-w-md mb-4">
                    Organisez le bonheur<br>de votre foyer.
                </h3>

                <p class="text-2xl max-w-md leading-relaxed mb-8">
                    Planifiez les repas, gérez les activités et communiquez sereinement avec votre entourage.
                </p>

                <div class="flex items-center gap-4">
                    <div class="flex -space-x-3">
                        <div class="w-12 h-12 rounded-full border-2 border-white bg-[url('https://i.pravatar.cc/100?img=11')] bg-cover bg-center"></div>
                        <div class="w-12 h-12 rounded-full border-2 border-white bg-[url('https://i.pravatar.cc/100?img=12')] bg-cover bg-center"></div>
                        <div class="w-12 h-12 rounded-full border-2 border-white bg-[url('https://i.pravatar.cc/100?img=13')] bg-cover bg-center"></div>
                        <div class="w-12 h-12 rounded-full border-2 border-white bg-blue-600 text-white text-sm font-bold flex items-center justify-center">
                            +12k
                        </div>
                    </div>

                    <span class="text-lg">
                        Rejoignez plus de 12 000 familles
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- la partie js de la page login -->

    <script>
        
        const loginForm = document.getElementById('loginForm');
        const messageBox = document.getElementById('messageBox');
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        // icon de password oeil
        togglePassword.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        });

        loginForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            messageBox.classList.add('hidden');
            messageBox.innerHTML = '';

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            // true or false pour cheked
            const remember = document.getElementById('remember').checked;

            if (email === '' || password === '') {
                showMessage('Veuillez remplir tous les champs.', 'error');
                return;
            }

            try {
                const response = await fetch('/api/auth/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password,
                        remember: remember
                    })
                });

                const data = await response.json();

                if (response.ok) {
                    showMessage('Connexion réussie.', 'success');

                    if (data.access_token) {
                        localStorage.setItem('access_token', data.access_token);
                    }

                    if (data.user) {
                        localStorage.setItem('user', JSON.stringify(data.user));

                        // Redirection simple selon le rôle
                        if (data.user.role === 'admin') {
                            window.location.href = '/admin/dashboard';
                        } else {
                            window.location.href = '/';
                        }
                    } else {
                        window.location.href = '/';
                    }

                } else {
                    if (data.errors) {
                        let errors = '';
                        for (const key in data.errors) {
                            errors += data.errors[key][0] + '<br>';
                        }
                        showMessage(errors, 'error');
                    } else {
                        showMessage(data.message || 'Identifiants invalides.', 'error');
                    }
                }
            } catch (error) {
                showMessage('Impossible de se connecter au serveur.', 'error');
            }
        });

        function showMessage(message, type) {
            messageBox.classList.remove('hidden');

            if (type === 'success') {
                messageBox.className = 'rounded-xl p-4 text-sm bg-green-100 text-green-700';
            } else {
                messageBox.className = 'rounded-xl p-4 text-sm bg-red-100 text-red-700';
            }

            messageBox.innerHTML = message;
        }
    </script>
</body>
</html>
