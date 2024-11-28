<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue dans votre Jardigénie</title>
    @vite(['resources/css/app.css']) <!-- Assurez-vous que votre fichier CSS est bien importé -->
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="container mx-auto px-4 py-8">

    <!-- Barre de recherche et ajout d'article -->
    <div class="mb-6 flex items-center justify-between">

        <!-- Logo -->
        <img src="{{ asset('images/logo.jpg') }}" alt="Jardigénie Logo" class="h-16">

        <h1 class="text-3xl font-semibold text-center text-green-700">Bienvenue dans votre Jardigénie</h1>

        <!-- Formulaire de recherche -->
        <form action="{{ url('/') }}" method="GET" class="flex items-center space-x-4">
            <select name="categorie" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Sélectionnez une catégorie</option>
                <option value="Outils" {{ request('categorie') == 'Outils' ? 'selected' : '' }}>Outils</option>
                <option value="Bacs" {{ request('categorie') == 'Bacs' ? 'selected' : '' }}>Bacs</option>
                <option value="Graines" {{ request('categorie') == 'Graines' ? 'selected' : '' }}>Graines</option>
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">OK</button>
        </form>

        <!-- Ajouter un article -->
        <a href="{{ route('articles.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Ajouter un article</a>
    </div>

    <!-- Affichage des articles -->
    <div class="space-y-6">
        @foreach ($articles as $article)
            <div class="flex items-center bg-white shadow-lg rounded-lg p-6 hover:bg-gray-100 transition duration-300">
                <!-- Image de l'article -->
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" class="w-24 h-24 object-cover rounded-md mr-6">

                <div class="flex-1">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $article->nom }}</h2>
                    <p class="text-sm text-gray-500">{{ $article->description }}</p>
                    <p class="text-sm text-gray-600 mt-2">Catégorie: <span class="font-medium">{{ $article->categorie }}</span></p>
                    <p class="text-lg text-gray-800 mt-2">Prix: <span class="font-semibold">{{ $article->prix }} €</span></p>
                </div>

                <div class="ml-6 space-x-4">
                    <!-- Modifier -->
                    <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-500 hover:text-blue-700">Modifier</a>

                    <!-- Supprimer -->
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>
