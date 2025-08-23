<?php

use App\Http\Controllers\WebRenderController;
use App\Livewire\Webrender;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Définition des routes principales du site.
|
*/

// --- Accueil (via Livewire) ---
Route::get('/', Webrender::class)->name('home');

// --- Liste des articles (page blog) ---
Route::get('/articles', [WebRenderController::class, 'articles'])
    ->name('articles.index');

// --- Affichage d'un article individuel ---
Route::get('/articles/{slug}', [WebRenderController::class, 'showArticle'])
    ->name('articles.show');

// --- Pages dynamiques (tout sauf /articles et ses sous-routes) ---
Route::get('/{dynamicUrl}', [WebRenderController::class, 'index'])
    ->where('dynamicUrl', '^(?!articles($|/)).*')
    ->name('dynamic.page');
