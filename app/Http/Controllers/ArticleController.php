<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function viewArticle(Request $request, $id, $slug)
    {
        $article = Article::findOrFail($id);

        return view('view_article', [
            'article' => $article,
        ]);
    }
}
