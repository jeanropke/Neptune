<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function show($url)
    {
        $article = Article::where('url', $url)->first();
        if(!$article || $article->is_deleted == '1')
            return abort(404);

        $articles = Article::where([['is_deleted', '=', '0'], ['publish_date', '<', Carbon::now()]])->orderBy('created_at', 'desc')->take(10);
        if (Auth::check()) {
            if (user()->hasPermission('can_create_site_news')) {
                $articles = Article::where([['is_deleted', '=', '0']])->orderBy('created_at', 'desc')->take(10);
            }
        }

        return view('article')->with([
            'article'   => $article,
            'articles'  => $articles->get()
        ]);
    }

    public function articles()
    {
        $articles = Article::where([['is_deleted', '=', '0'], ['publish_date', '<', Carbon::now()]])->orderBy('created_at', 'desc')->take(100);
        if (Auth::check()) {
            if (user()->hasPermission('can_create_site_news')) {
                $articles = Article::where([['is_deleted', '=', '0']])->orderBy('created_at', 'desc')->take(100);
            }
        }

        return view('articles')->with([
            'articles'  => $articles->get()
        ]);
    }
}
