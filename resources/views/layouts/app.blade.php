<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue dans votre Jardigénie</title>
    @vite(['resources/css/app.css']) <!-- Assurez-vous que votre fichier CSS est bien importé -->
    <script src="https://cdn.tailwindcss.com"></script> <!-- Import de Tailwind CSS -->
</head>
<body class="bg-gray-100 font-sans antialiased">

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

<!-- Contenu de la page -->
<div class="pt-20">
    @yield('content')
</div>

</body>
</html>
