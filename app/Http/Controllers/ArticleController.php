<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articles(Request $request)
    {
        $articles = Article::where('published', true)
            ->orderBy('reads', 'desc')
            ->orderBy('title', 'asc')
            ->limit(7)
            ->get();

        return response()->json(ArticleResource::collection($articles));
    }

    public function show(Request $request, $id, $slug)
    {
        $article = Article::findOrFail($id);

        return view('view_article', [
            'article' => $article,
        ]);
    }
}
