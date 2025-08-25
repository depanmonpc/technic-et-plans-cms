<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Webrender;
use App\Http\Controllers\WebRenderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Définition des routes principales du site.
|
| RÈGLES :
| - Les routes spécifiques AVANT la catch-all.
| - Pas de doublons de noms / chemins.
| - La catch-all exclut explicitement les chemins réservés.
*/

// === Accueil (Livewire) ===
Route::get('/', Webrender::class)->name('home');

// === Blog ===
Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [WebRenderController::class, 'articles'])->name('index');
    Route::get('/{slug}', [WebRenderController::class, 'showArticle'])->name('show');
});

// === Pages statiques (spécifiques) ===
Route::view('/notre-savoir-faire', 'notre-savoir-faire')->name('notre-savoir-faire');
Route::view('/courtage-travaux', 'courtage-travaux')->name('courtage-travaux');
Route::view('/contact', 'contact')->name('contact');

// === Catch-all pour pages dynamiques (APRÈS toutes les routes ci-dessus) ===
// Exclure explicitement les segments réservés (articles, contact, notre-savoir-faire, courtage-travaux, assets éventuels).
Route::get('/{dynamicUrl}', [WebRenderController::class, 'index'])
    ->where(
        'dynamicUrl',
        '^(?!articles(?:/|$)|contact$|notre-savoir-faire$|courtage-travaux$|mentions-legales$|rgpd$).+'
    )
    ->name('dynamic.page');

// Page contact
Route::get('/contact', fn () => view('contact'))->name('contact');

// Soumission formulaire
Route::post('/contact/send', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

//Page Mention legales et RGPD

Route::get('/mentions-legales', function () {
    return view('mentions-legales');
})->name('mentions-legales');

Route::get('/rgpd', function () {
    return view('rgpd');
})->name('rgpd');
