<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Webrender;
use App\Http\Controllers\WebRenderController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| - Les routes spécifiques AVANT la catch-all.
| - Pas de doublons de noms / chemins.
| - La catch-all exclut explicitement les segments réservés.
*/

// === Accueil (Livewire) ===
Route::get('/', Webrender::class)->name('home');

// === Blog ===
Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [WebRenderController::class, 'articles'])->name('index');
    Route::get('/{slug}', [WebRenderController::class, 'showArticle'])->name('show');
});

// === Pages statiques ===
Route::view('/notre-savoir-faire', 'notre-savoir-faire')->name('notre-savoir-faire');
Route::view('/courtage-travaux', 'courtage-travaux')->name('courtage-travaux');
Route::view('/contact', 'contact')->name('contact');
Route::view('/mentions-legales', 'mentions-legales')->name('mentions-legales');
Route::view('/rgpd', 'rgpd')->name('rgpd');

// === Formulaire contact ===
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

/**
 * === CATCH-ALL (APRES TOUT LE RESTE) ===
 * Exclure explicitement les segments réservés :
 * - admin (ton back-office)
 * - filament (si tu utilises Filament)
 * - les pages statiques et le blog
 */
Route::get('/{dynamicUrl}', [WebRenderController::class, 'index'])
    ->where(
        'dynamicUrl',
        // n'importe quel segment qui NE COMMENCE PAS par ceux listés
        '^(?!(admin|filament|articles(?:/|$)|contact$|notre-savoir-faire$|courtage-travaux$|mentions-legales$|rgpd$)).+'
    )
    ->name('dynamic.page');
