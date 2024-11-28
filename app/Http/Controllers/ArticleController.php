<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
// Afficher la liste des articles

    public function index(Request $request)
    {
        $query = Article::query();

        // Filtrage par catégorie si la catégorie est spécifiée dans la requête
        if ($request->has('categorie') && $request->categorie != '') {
            $query->where('categorie', $request->categorie);
        }

        // Récupérer les articles filtrés
        $articles = $query->get();

        // Retourner la vue avec les articles filtrés
        return view('articles.index', compact('articles'));
    }


// Ajouter un article
public function create()
{
return view('articles.create');
}

// Enregistrer un nouvel article
public function store(Request $request)
{
$request->validate([
'nom' => 'required',
'prix' => 'required|numeric',
'categorie' => 'required',
'description' => 'required',
'image' => 'required|image',
]);

$article = new Article();
$article->nom = $request->nom;
$article->prix = $request->prix;
$article->categorie = $request->categorie;
$article->description = $request->description;
$article->image = $request->image->store('images', 'public');
$article->save();

return redirect()->route('articles.index');
}

// Modifier un article
public function edit($id)
{
$article = Article::findOrFail($id);
return view('articles.edit', compact('article'));
}

// Mettre à jour un article
public function update(Request $request, $id)
{
$request->validate([
'nom' => 'required',
'prix' => 'required|numeric',
'categorie' => 'required',
'description' => 'required',
'image' => 'nullable|image',
]);

$article = Article::findOrFail($id);
$article->nom = $request->nom;
$article->prix = $request->prix;
$article->categorie = $request->categorie;
$article->description = $request->description;

if ($request->hasFile('image')) {
$article->image = $request->image->store('images', 'public');
}

$article->save();

return redirect()->route('articles.index');
}

// Supprimer un article
public function destroy($id)
{
$article = Article::findOrFail($id);
$article->delete();

return redirect()->route('articles.index');
}
}
