<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::where('published', true)
            ->orderBy('reads', 'desc')
            ->orderBy('title', 'asc')
            ->limit(7)
            ->get();

        return view('home', [
            'articles' => $articles,
        ]);
    }
}
