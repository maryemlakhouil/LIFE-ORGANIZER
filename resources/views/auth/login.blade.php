<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Family Organizer</title>
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

<body class="bg-[#f7f0e7] min-h-screen flex items-center justify-center px-4 py-6 text-[#2f281f]">

    <div class="w-full max-w-4xl bg-[#fffaf3] rounded-[28px] shadow-[0_18px_50px_rgba(86,67,44,0.10)] border border-[#eadfce] overflow-hidden grid grid-cols-1 lg:grid-cols-2">

        <!-- LEFT SIDE -->
        <div class="p-7 md:p-9 lg:p-11 flex flex-col justify-center">

            <!-- Logo -->
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 rounded-2xl bg-[#efe2cf] flex items-center justify-center text-[#8f6b43]">
                    <span class="material-symbols-rounded !text-[20px]">groups</span>
                </div>
                <h1 class="text-2xl font-black tracking-tight">Family Organizer</h1>
            </div>

            <!-- TITLE -->
            <div class="mb-7">
                <h2 class="text-4xl font-black mb-2">Bon retour !</h2>
                <p class="text-base text-[#6d5c49]">
                    Gérez votre quotidien familial en toute simplicité.
                </p>
            </div>

            <!-- Formulaire -->

            <form id="loginForm" class="space-y-5">

                <!-- EMAIL -->
                <div>
                    <label for="email" class="block text-sm text-[#5d4c39] font-semibold mb-2">
                        Adresse e-mail
                    </label>

                    <div class="relative">
                        <span class="absolute left-5 top-1/2 -translate-y-1/2 text-[#9a8469]">
                            <span class="material-symbols-rounded !text-[22px]">mail</span>
                        </span>

                        <input
                            type="email" id="email" name="email" placeholder="nom@exemple.com"
                            class="w-full rounded-2xl border border-[#eadfce] bg-[#f8efe4] pl-14 pr-5 py-3 text-base outline-none focus:border-[#8f6b43]"
                        >
                    </div>
                </div>

                <!-- PASSWORD -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <label for="password" class="block text-sm text-[#5d4c39] font-semibold">
                            Mot de passe
                        </label>

                        <a href="#" class="text-sm text-[#8f6b43] hover:underline font-medium">
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <div class="relative">
                        <span class="absolute left-5 top-1/2 -translate-y-1/2 text-[#9a8469]">
                            <span class="material-symbols-rounded !text-[22px]">lock</span>
                        </span>

                        <input
                            type="password" id="password" name="password" placeholder="••••••••"
                            class="w-full rounded-2xl border border-[#eadfce] bg-[#f8efe4] pl-14 pr-14 py-3 text-base outline-none focus:border-[#8f6b43]"
                        >

                        <button
                            type="button" id="togglePassword"
                            class="absolute right-5 top-1/2 -translate-y-1/2 text-[#9a8469] hover:text-[#6d5c49]">
                            <span id="eyeOpen" class="material-symbols-rounded !text-[22px]">visibility</span>
                            <span id="eyeClosed" class="material-symbols-rounded !text-[22px] hidden">visibility_off</span>
                        </button>
                    </div>
                </div>

                <!-- REMEMBER -->
                <div class="flex items-center gap-3">
                    <input
                        type="checkbox" id="remember" name="remember"
                        class="w-5 h-5 rounded border-[#d6c6b0] text-[#8f6b43] focus:ring-[#8f6b43]"
                    >
                    <label for="remember" class="text-sm text-[#6d5c49]">
                        Se souvenir de moi
                    </label>
                </div>

                <!-- MESSAGE BOX Pour Les erreurs -->
                <div id="messageBox" class="hidden rounded-xl p-4 text-sm"></div>

                <!-- bUttom se connecter -->

                <button
                    type="submit"
                    class="w-full bg-[#8f6b43] hover:bg-[#795936] text-white font-semibold text-lg py-3 rounded-2xl shadow-lg transition">
                    Se connecter
                </button>
            </form>

            <!-- FOOTER -->
            <p class="text-center text-[#7d6b57] mt-8 text-base">
                Pas encore inscrit ?
                <a href="{{ route('register') }}" class="text-[#8f6b43] hover:underline font-medium">
                    Créer un compte
                </a>
            </p>
        </div>

        <!-- RIGHT SIDE Pour Image -->

        <div class="relative min-h-[460px] hidden lg:block">

            <img src="{{ asset('images/image3.jpeg') }}" alt="Family Organizer" class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-[#2f281f]/15"></div>

            <!-- les TexTe Fou9 image -->
            <div class="absolute inset-0 flex flex-col justify-end px-10 pb-10 text-black">

                <div class="inline-flex items-center gap-2 self-start bg-white/70 backdrop-blur-sm px-4 py-2 rounded-full text-xs font-semibold tracking-wide mb-5">
                    <span class="material-symbols-rounded !text-[16px]">auto_awesome</span>
                    SOLUTION N°1 POUR LES FAMILLES
                </div>

                <h3 class="text-4xl font-bold leading-tight max-w-md mb-3">
                    Organisez le bonheur<br>de votre foyer.
                </h3>

                <p class="text-lg max-w-md leading-relaxed mb-7">
                    Planifiez les repas, gérez les activités et communiquez sereinement avec votre entourage.
                </p>

                <div class="flex items-center gap-4">
                    <div class="flex -space-x-3">
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-[url('https://i.pravatar.cc/100?img=11')] bg-cover bg-center"></div>
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-[url('https://i.pravatar.cc/100?img=12')] bg-cover bg-center"></div>
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-[url('https://i.pravatar.cc/100?img=13')] bg-cover bg-center"></div>
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-[#8f6b43] text-white text-xs font-bold flex items-center justify-center">
                            +12k
                        </div>
                    </div>

                    <span class="text-sm">
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
                        } else if (data.user.role === 'parent') {
                            window.location.href = '/parent/dashboard';
                        } else if (data.user.role === 'nounou') {
                            window.location.href = '/nounou/dashboard';
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
