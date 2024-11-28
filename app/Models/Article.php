<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Si tu veux spécifier les colonnes massivement assignables
    protected $fillable = ['nom', 'prix', 'categorie', 'description', 'image'];

    // Si tu veux spécifier le nom de la table, au cas où ce ne serait pas 'articles'
    // protected $table = 'articles';

    // Si tu veux définir des relations avec d'autres modèles, tu peux les ajouter ici
}
