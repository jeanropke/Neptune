<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{

    public function show($url)
    {
        $article = Article::where('url', $url)->first();
        if($article == null || $article->is_deleted == '1')
            return abort(404);

        return view('article')->with([
            'article'   => $article,
            'articles'  => Article::where('is_deleted', '0')->orderBy('created_at', 'desc')->take(10)->get()
        ]);
    }

    public function articles()
    {
        return view('articles')->with([
            'articles'  => Article::where('is_deleted', '0')->orderBy('created_at', 'desc')->take(100)->get()
        ]);
    }
}
