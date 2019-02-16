<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articles(Request $request)
    {
        \Log::debug("Q=".\request()->input('q'));

        $articles = Article::where('published', true)
            ->when($request->filled('q'), function ($query) {
                $query->where('title', 'like', '%'.\request()->input('q').'%');
            })
            ->orderBy('reads', 'desc')
            ->orderBy('title', 'asc');

        \Log::debug("SQL=".$articles->toSql());

        return view('articles', [
            'articles' => $articles->paginate(),
        ]);
    }

    public function show(Request $request, $id, $slug)
    {
        $article = Article::findOrFail($id);

        return view('view_article', [
            'article' => $article,
        ]);
    }

    public function articleByCategory(Request $request, $id, $slug)
    {
        $category = Category::findOrFail($id);

        $articles = $category->articles()->paginate();

        return view('articles', [
            'articles' => $articles,
            'category' => $category,
        ]);
    }
}
