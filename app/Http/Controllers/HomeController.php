<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // Récupère les 3 derniers articles publiés
        $articles = Post::whereNotNull('published_at')
            ->latest('published_at')
            ->take(3)
            ->get();

        // Passe les articles à la vue
        return view('home', compact('articles'));
    }
}
