<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// Route pour la page d'accueil, qui affiche la liste des articles
Route::get('/', [ArticleController::class, 'index'])->name('home');

// Route pour gérer les articles (CRUD)
Route::resource('articles', ArticleController::class);

