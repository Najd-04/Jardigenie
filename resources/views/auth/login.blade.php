<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<!-- Navbar -->
<nav class="bg-transparent fixed w-full top-0 z-10 shadow-md transition-all duration-300 ease-in-out">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('images/logo.jpg') }}" alt="Jardigénie Logo" class="h-12">
            <span class="text-2xl font-semibold text-green-700 ml-2">Jardigénie</span>
        </a>

        <!-- Liens de navigation -->
        <div class="flex space-x-6">
            <a href="{{ route('home') }}" class="text-gray-800 hover:text-green-700">Accueil</a>
            <a href="{{ route('articles.create') }}" class="text-gray-800 hover:text-green-700">Ajouter un article</a>

            @auth
                <!-- Si l'utilisateur est connecté -->
                <a href="{{ route('profile.edit') }}" class="text-gray-800 hover:text-green-700">Profil</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-green-700">Se déconnecter</button>
                </form>
            @else
                <!-- Si l'utilisateur n'est pas connecté -->
                <a href="{{ route('login') }}" class="text-gray-800 hover:text-green-700">Connexion</a>
                <a href="{{ route('register') }}" class="text-gray-800 hover:text-green-700">Inscription</a>
            @endauth
        </div>
    </div>
</nav>
<!-- Conteneur principal -->
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
    <!-- Titre -->
    <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">
        {{ __('Login') }}
    </h2>

    <!-- Affichage du statut de la session -->
    @if (session('status'))
        <div class="mb-4 text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <!-- Formulaire -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Champ Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">
                {{ __('Email') }}
            </label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
            @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Mot de passe -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">
                {{ __('Password') }}
            </label>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
            @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Case à cocher "Se souvenir de moi" -->
        <div class="mb-4 flex items-center">
            <input
                id="remember_me"
                type="checkbox"
                name="remember"
                class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
            />
            <label for="remember_me" class="ml-2 text-sm text-gray-600">
                {{ __('Remember me') }}
            </label>
        </div>

        <!-- Liens et Bouton -->
        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button
                type="submit"
                class="ml-4 bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>
</body>
</html>
