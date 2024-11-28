@extends('layouts.app') <!-- Utilisation du layout principal -->

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-center text-green-700 mb-6">Bienvenue dans votre Jardigénie</h1>

        <!-- Liste des articles -->
        <div class="space-y-6">
            @foreach ($articles as $article)
                <div class="flex items-center bg-white shadow-lg rounded-lg p-6 hover:bg-gray-100 transition duration-300">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" class="w-24 h-24 object-cover rounded-md mr-6">
                    <div class="flex-1">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $article->nom }}</h2>
                        <p class="text-sm text-gray-500">{{ $article->description }}</p>
                        <p class="text-sm text-gray-600 mt-2">Catégorie: <span class="font-medium">{{ $article->categorie }}</span></p>
                        <p class="text-lg text-gray-800 mt-2">Prix: <span class="font-semibold">{{ $article->prix }} €</span></p>
                    </div>

                    <div class="ml-6 space-x-4">
                        @auth
                            <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-500 hover:text-blue-700">Modifier</a>
                        @endauth

                        @auth
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                            </form>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
