<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - Family Organizer</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">

        <!-- Gouge SIDE De image  -->
        <div class="relative hidden lg:block">
            <img 
                src="{{ asset('images/image4.png') }}" 
                alt="image d'une nounou avec mon enfant"
                class="w-full h-full object-cover"
            >

            <div class="absolute inset-0 bg-black/25"></div>

            <div class="absolute top-7 left-8 flex items-center gap-2 text-white">
                <div class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center text-sm text-white font-bold">
                    FO
                </div>
                <span class="text-xl font-semibold">Family Organizer</span>
            </div>

            <div class="absolute left-12 bottom-20 text-white max-w-lg">
                <h1 class="text-4xl font-bold leading-tight mb-5">
                    Rejoignez notre communauté
                </h1>
                <p class="text-base leading-relaxed text-white/90">
                    Gérez votre vie de famille en toute sérénité avec nos outils premium.
                    Le lien qui unit les parents et les nounous de confiance.
                </p>

                <div class="flex gap-3 mt-7">
                    <div class="px-4 py-2 rounded-full border border-white/40 bg-white/10 backdrop-blur-sm text-sm text-white">
                        100% Sécurisé
                    </div>
                    <div class="px-4 py-2 rounded-full border border-white/40 bg-white/10 backdrop-blur-sm text-sm text-white">
                        10k+ Familles
                    </div>
                </div>
            </div>

            <div class="absolute bottom-6 left-12 text-white/80 text-sm">
                © 2024 Family Organizer. Tous droits réservés.
            </div>
        </div>

        <!-- SIDE droite de forme -->

        <div class="flex items-center justify-center px-6 py-8 bg-[#f7f9fc]">
            <div class="w-full max-w-lg">
                <div class="mb-6">
                    <h2 class="text-4xl font-bold text-slate-900 mb-2">Créer un compte</h2>
                    <p class="text-base text-slate-500">
                        Commencez votre voyage vers une organisation parfaite.
                    </p>
                </div>

                <!-- role switch -->

                <div class="bg-[#eaf0fb] rounded-full p-1 flex mb-6">

                    <button id="parentBtn" type="button"
                        class="w-1/2 py-2.5 rounded-full bg-white text-blue-600 font-semibold shadow-sm transition">
                        Parent
                    </button>

                    <button id="nounouBtn" type="button"
                        class="w-1/2 py-2.5 rounded-full text-slate-600 font-semibold transition">
                        Nounou
                    </button>
                </div>

                <form id="registerForm" class="space-y-4">

                    <input type="hidden" id="role" name="role" value="parent">

                    <div>
                        <label for="name" class="block text-sm text-slate-700 font-semibold mb-2">
                            Nom complet
                        </label>
                        <input type="text" id="name"  name="name" placeholder="Jean Dupont"
                            class="w-full rounded-2xl bg-[#eef2f7] border border-transparent px-5 py-3 outline-none focus:border-blue-500"
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-sm text-slate-700 font-semibold mb-2">
                            Adresse Email
                        </label>
                        <input type="email" id="email" name="email" placeholder="jean.dupont@email.com"
                            class="w-full rounded-2xl bg-[#eef2f7] border border-transparent px-5 py-3 outline-none focus:border-blue-500"
                        >
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label for="password" class="block text-sm text-slate-700 font-semibold mb-2">
                                Mot de passe
                            </label>
                            <input type="password" id="password" name="password" placeholder="**********"
                                class="w-full rounded-2xl bg-[#eef2f7] border border-transparent px-5 py-3 outline-none focus:border-blue-500"
                            >
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm text-slate-700 font-semibold mb-2">
                                Confirmation
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="********"
                                class="w-full rounded-2xl bg-[#eef2f7] border border-transparent px-5 py-3 outline-none focus:border-blue-500"
                            >
                        </div>

                    </div>

                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold text-lg py-3 rounded-2xl shadow-lg transition">
                        Créer mon compte →
                    </button>

                </form>

                <div class="flex items-center gap-4 my-6">
                    <div class="flex-1 h-px bg-slate-300"></div>
                    <span class="text-slate-400 font-semibold text-sm">Ou continuer avec </span>
                    <div class="flex-1 h-px bg-slate-300"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <button type="button" class="border rounded-2xl py-3 bg-white font-semibold text-slate-700">
                        Google
                    </button>
                    <button type="button" class="border rounded-2xl py-3 bg-white font-semibold text-slate-700">
                        Apple
                    </button>
                </div>

                <p class="text-center text-sm text-slate-500 mt-6">
                    Déjà inscrit ?
                    <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Se connecter</a>
                </p>

                <div id="messageBox" class="hidden mt-6 rounded-xl p-4 text-sm"></div>
            </div>
        </div>
    </div>

    <!-- Commancer la Partie js de Page Register -->

    <script>

        const parentBtn = document.getElementById('parentBtn');
        const nounouBtn = document.getElementById('nounouBtn');
        const roleInput = document.getElementById('role');
        const registerForm = document.getElementById('registerForm');
        const messageBox = document.getElementById('messageBox');

        parentBtn.addEventListener('click', function () {

            roleInput.value = 'parent';

            parentBtn.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
            parentBtn.classList.remove('text-slate-600');

            nounouBtn.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
            nounouBtn.classList.add('text-slate-600');
        });

        nounouBtn.addEventListener('click', function () {
            roleInput.value = 'nounou';

            nounouBtn.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
            nounouBtn.classList.remove('text-slate-600');

            parentBtn.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
            parentBtn.classList.add('text-slate-600');
        });

        
        registerForm.addEventListener('submit', async function (e) {

            e.preventDefault();

            // On cache l'ancienne erreur/succès

            messageBox.classList.add('hidden');
            messageBox.innerHTML = '';
            
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const passwordConfirmation = document.getElementById('password_confirmation').value.trim();
            const role = roleInput.value;

            if (name === '' || email === '' || password === '' || passwordConfirmation === '') {
                showMessage('Tous les champs sont obligatoires.', 'error');
                return;
            }

            if (password !== passwordConfirmation) {
                showMessage('Les mots de passe ne correspondent pas.', 'error');
                return;
            }

            // envoi les donnes au serveur de backend 

            try {
                const response = await fetch('/api/auth/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: passwordConfirmation,
                        role: role
                    })
                });

                const data = await response.json();

                if (response.ok) {
                    showMessage('Compte créé avec succès.', 'success');

                    if (data.access_token) {
                        localStorage.setItem('access_token', data.access_token);
                    }

                    if (data.user) {
                        localStorage.setItem('user', JSON.stringify(data.user));
                    }

                    if (data.user && data.user.role === 'parent') {
                        window.location.href = '/parent/dashboard';
                    } else if (data.user && data.user.role === 'nounou') {
                        window.location.href = '/nounou/dashboard';
                    } else if (data.user && data.user.role === 'admin') {
                        window.location.href = '/admin/dashboard';
                    } else {
                        window.location.href = '/';
                    }

                } else {
                    // email deja utilisé || mot de passe trop court || champ vide || erreur backend
                    if (data.errors) {
                        let errors = '';
                        for (const key in data.errors) {
                            //Prend le premier message de chaque champ.
                            errors += data.errors[key][0] + '<br>';
                        }
                        showMessage(errors, 'error');
                    } else {
                        showMessage(data.message || 'Une erreur est survenue.', 'error');
                    }
                }
            } catch (error) {
                showMessage('Impossible de se connecter au serveur.', 'error');
            }
        });
        // Affiche un message vert ou rouge

        function showMessage(message, type) {
            messageBox.classList.remove('hidden');

            if (type === 'success') {
                messageBox.className = 'mt-6 rounded-xl p-4 text-sm bg-green-100 text-green-700';
            } else {
                messageBox.className = 'mt-6 rounded-xl p-4 text-sm bg-red-100 text-red-700';
            }

            messageBox.innerHTML = message;
        }
    </script>
</body>
</html>
