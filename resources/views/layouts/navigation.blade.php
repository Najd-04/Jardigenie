<!-- resources/views/layouts/navigation.blade.php -->

<nav class="bg-green-600 text-white px-4 py-2 flex justify-between items-center">
    <div>
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-xl font-bold">Jardigénie</a>
    </div>

    <div class="space-x-4">
        <!-- Liens de navigation conditionnels -->
        @auth
            <!-- Si l'utilisateur est authentifié -->
            <a href="{{ route('profile.edit') }}" class="hover:text-gray-300">Profil</a>
            <a href="{{ route('logout') }}" class="hover:text-gray-300"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        @endauth

        @guest
            <!-- Si l'utilisateur est un invité -->
            <a href="{{ route('login') }}" class="hover:text-gray-300">Connexion</a>
            <a href="{{ route('register') }}" class="hover:text-gray-300">Inscription</a>
        @endguest
    </div>
</nav>
