<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Events\ArticleCreated;
use App\Events\ArticleUpdated;
use cebe\markdown\Markdown;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::orderBy('id', 'desc')
            ->with(['category'])
            ->paginate();

        return view('admin.article.articles', [
            'articles' => $articles,
        ]);
    }

    public function newArticle(Request $request)
    {
        $article = new Article();

        return view('admin.article.article_form', [
            'article' => $article,
        ]);
    }

    public function createArticle(Request $request)
    {
        $article = Article::create([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'slug' => str_slug($request->input('title')),
            'content' => $request->input('content_html'),
            'content_md' => $request->input('content_md'),
            'data' => [],
            'published' => $request->input('published', false),
        ]);

        event(new ArticleCreated($article));

        return redirect()->route('admin::articles::all')->with('success', "Article created");
    }

    public function editArticle(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        return view('admin.article.article_form', [
            'article' => $article,
        ]);
    }

    public function updateArticle(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $parser = new Markdown();

        $article->title = $request->input('title');
        $article->slug = str_slug($request->input('title'));
        $article->content = $request->input('content');
        $article->content_md = $request->input('content_md');
        $article->content = $parser->parse($article->content_md);
        $article->published = $request->input('published', false);
        $article->save();

        event(new ArticleUpdated($article));

        return redirect()->route('admin::articles::edit', [$article])->with('success', __("Article saved"));
    }

    public function deleteArticle(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect()->route('admin::articles::all')->with('success', __('Article deleted'));
    }
}
