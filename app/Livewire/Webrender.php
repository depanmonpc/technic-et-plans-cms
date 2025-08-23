<?php

namespace App\Livewire;

use App\Models\GuestLayoutManagment;
use App\Models\Menu;
use App\Models\Post;
use Illuminate\Http\Request;
use Livewire\Component;

class Webrender extends Component
{
    protected $contents = [];
    public $articles = [];

    public function mount(Request $request)
    {
        // Charger les modules dynamiques liés au menu
        $this->contents = $this->getModules($request->path());

        // Si on est sur la home, charger les 3 derniers articles
        if ($request->is('/')) {
            $this->articles = Post::whereNotNull('published_at')
                ->orderByDesc('published_at')
                ->take(3)
                ->get();
        }
    }

    /**
     * Récupère les modules dynamiques liés au menu correspondant à l'URL.
     */
    protected function getModules($url): array
    {
        // Trouver le menu correspondant à l'URL
        $menu = Menu::where('url', $url)->first();

        // Si aucun menu trouvé → retourne un tableau vide
        if (!$menu) {
            return [];
        }

        // Récupération des modules actifs
        return GuestLayoutManagment::where('fk_menu_id', $menu->id)
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get()
            ->toArray();
    }

    /**
     * Rend la vue associée.
     */
    public function render()
    {
        // Si on est sur la home, on passera les articles, sinon tableau vide
        return view('livewire.webrender', [
            'contents' => $this->contents,
            'articles' => $this->articles,
        ]);
    }
}
