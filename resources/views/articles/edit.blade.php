<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Article</title>
    <!-- Lien vers Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<div class="container mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
    <h1 class="text-3xl font-semibold text-center text-gray-700 mb-6">Modifier un Article</h1>

    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nom de l'article -->
        <div class="mb-4">
            <label for="nom" class="block text-lg text-gray-700 mb-2">Nom de l'article</label>
            <input type="text" name="nom" id="nom" value="{{ $article->nom }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Prix -->
        <div class="mb-4">
            <label for="prix" class="block text-lg text-gray-700 mb-2">Prix</label>
            <input type="text" name="prix" id="prix" value="{{ $article->prix }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Catégorie -->
        <div class="mb-4">
            <label for="categorie" class="block text-lg text-gray-700 mb-2">Catégorie</label>
            <select name="categorie" id="categorie" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Outils" {{ $article->categorie == 'Outils' ? 'selected' : '' }}>Outils</option>
                <option value="Bacs" {{ $article->categorie == 'Bacs' ? 'selected' : '' }}>Bacs</option>
                <option value="Graines" {{ $article->categorie == 'Graines' ? 'selected' : '' }}>Graines</option>
            </select>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-lg text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" required
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $article->description }}</textarea>
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label for="image" class="block text-lg text-gray-700 mb-2">Image</label>
            <input type="file" name="image" id="image"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Button Submit -->
        <div class="mb-4 text-center">
            <button type="submit"
                    class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Mettre à jour
            </button>
        </div>
    </form>
</div>

</body>
</html>
