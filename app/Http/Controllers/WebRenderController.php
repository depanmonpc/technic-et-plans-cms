<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestLayoutManagment;
use App\Models\Menu;
use App\Models\Post;

class WebRenderController extends Controller
{
    public $contents;

    public function __construct(Request $request)
    {
        $this->contents = $this->getModules($request->path());
    }

    /**
     * Récupère les modules dynamiques associés à une URL.
     */
    public function getModules($url)
    {
        $menu = Menu::where('url', $url)->first();
        if (!$menu) {
            return [];
        }

        $contents = GuestLayoutManagment::where('fk_menu_id', $menu->id)->get()->toArray();
        if ($contents) {
            $elements = [];
            foreach ($contents as $content) {
                if ($content['is_active'] != 0) {
                    $elements[$content['sort_order']] = $content;
                }
            }
            return $elements;
        }

        return [];
    }

    /**
     * Page dynamique par défaut.
     */
    public function index()
    {
        return view('livewire.webrender', [
            'contents' => $this->contents,
        ]);
    }

    /**
     * Liste des articles (page blog).
     */
    public function articles()
    {
        $articles = Post::whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->paginate(6);

        return view('articles.index', compact('articles'));
    }

    /**
     * Page d’un article individuel.
     */
    public function showArticle($slug)
    {
        $article = Post::where('slug', $slug)->firstOrFail();

        return view('articles.show', compact('article'));
    }
}
