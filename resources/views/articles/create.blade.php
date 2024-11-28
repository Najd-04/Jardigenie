<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article</title>
    @vite(['resources/css/app.css']) <!-- Assure-toi que ton fichier CSS est bien importé -->
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="container mx-auto px-4 py-8">

    <h1 class="text-3xl font-semibold text-center text-green-700 mb-8">Ajouter un Article</h1>

    <!-- Formulaire d'ajout d'article -->
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg p-6 space-y-6">
        @csrf

        <!-- Champ Nom -->
        <div class="flex flex-col">
            <label for="nom" class="text-sm font-medium text-gray-700 mb-2">Nom de l'article</label>
            <input type="text" name="nom" id="nom" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Champ Prix -->
        <div class="flex flex-col">
            <label for="prix" class="text-sm font-medium text-gray-700 mb-2">Prix</label>
            <input type="text" name="prix" id="prix" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Champ Catégorie -->
        <div class="flex flex-col">
            <label for="categorie" class="text-sm font-medium text-gray-700 mb-2">Catégorie</label>
            <select name="categorie" id="categorie" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="Outils">Outils</option>
                <option value="Bacs">Bacs</option>
                <option value="Graines">Graines</option>
            </select>
        </div>

        <!-- Champ Description -->
        <div class="flex flex-col">
            <label for="description" class="text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="4" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
        </div>

        <!-- Champ Image -->
        <div class="flex flex-col">
            <label for="image" class="text-sm font-medium text-gray-700 mb-2">Image</label>
            <input type="file" name="image" id="image" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Bouton d'ajout -->
        <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Ajouter l'article</button>
    </form>

</div>

</body>
</html>
