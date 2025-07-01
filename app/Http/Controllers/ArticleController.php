<?php

namespace App\Http\Controllers;

use App\Models\Neptune\Article;

class ArticleController extends Controller
{
    public function show(string $url)
    {
        $user = user();
        $article = Article::where('url', $url)->firstOrFail();

        if ($article->is_deleted == '1' || (!$user || !$user->hasPermission('can_create_site_news')) && $article->publish_date_resolved > now()) {
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
        $query = Article::where('is_deleted', '0')->orderByDesc('created_at');

        if (!$user || !$user->hasPermission('can_create_site_news')) {
            $query->where('publish_date', '<', now());
        }

        return $query->limit($limit)->get();
    }
}
