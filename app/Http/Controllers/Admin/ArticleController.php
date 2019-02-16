<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Events\ArticleCreated;
use App\Events\ArticleUpdated;
use cebe\markdown\Markdown;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

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
        $categories = Category::get();

        return view('admin.article.article_form', [
            'article' => $article,
            'categories' => $categories,
        ]);
    }

    public function createArticle(Request $request)
    {
        $parser = new Markdown();

        $article = Article::create([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'slug' => Str::slug(($request->input('title'))),
            'content_md' => $request->input('content_md'),
            'content' => $parser->parse($request->input('content_md')),
            'data' => [],
            'published' => $request->input('action', 'publish') == 'publish',
            'featured' => $request->input('featured', false),
            'category_id' => $request->input('category_id', 0),
        ]);

        event(new ArticleCreated($article));

        return redirect()->route('admin::articles::all')->with('success', "Article created");
    }

    public function editArticle(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $categories = $categories = Category::get();

        return view('admin.article.article_form', [
            'article' => $article,
            'categories' => $categories,
        ]);
    }

    public function updateArticle(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $parser = new Markdown();

        $article->title = $request->input('title');
        $article->slug = Str::slug(($request->input('title')));
        $article->content = $request->input('content');
        $article->content_md = $request->input('content_md');
        $article->content = $parser->parse($article->content_md);
        $article->published = $request->input('action', 'publish') == 'publish';
        $article->featured = $request->input('featured', false);
        $article->category_id = $request->input('category_id', 0);
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
