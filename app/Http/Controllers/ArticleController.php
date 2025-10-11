<?php

namespace App\Http\Controllers;

use App\Models\Neptune\Article;

class ArticleController extends Controller
{
    public function show(string $id)
    {
        $user = user();
        $article = Article::find($id);

        if ($article->is_published != '1' || (!$user || !$user->hasPermission('can_create_site_news')) && $article->is_future_published) {
            abort(404);
        }

        $articles = $this->getSidebarArticles($user, 10);

        return view('article', compact('article', 'articles'));
    }

    public function articles()
    {
        $articles = $this->getSidebarArticles(user(), 100);

        return view('articles', compact('articles'));
    }

    private function getSidebarArticles($user, int $limit)
    {
        $query = Article::where('is_published', '1')->orderByDesc('created_at');

        if ($user && $user->hasPermission('can_create_site_news')) {
            $query->orWhere('is_future_published', '1');
        }

        return $query->limit($limit)->get();
    }
}
