<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use App\Models\Neptune\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function articleCreate()
    {
        abort_unless_permission('can_create_site_news');

        return view('housekeeping.site.articles.create')->with([
            'ts_images' => array_map(fn($f) => pathinfo($f, PATHINFO_FILENAME), File::files('web/images/top_story_images'))
        ]);
    }

    public function articleCreateSave(Request $request)
    {
        abort_unless_permission('can_create_site_news');

        $request->validate([
            'title'             => 'required|max:255',
            'topstory'          => 'required|max:255',
            'short_text'        => 'required|max:255',
            'long_text'         => 'required'
        ]);

        $article = Article::create([
            'title'                 => $request->title,
            'author_id'             => user()->id,
            'author_override'       => $request->author_override ?? '',
            'short_story'           => $request->short_text,
            'full_story'            => $request->long_text,
            'topstory'              => $request->topstory,
            'topstory_override'     => $request->topstory_override ?? '',
            'article_image'         => $request->article_image ?? '',
            'is_published'          => $request->is_published ?? 0,
            'is_future_published'   => $request->is_future_published ?? 0,
            'created_at'            => now()
        ]);

        //$url = preg_replace("/[^\w\s]/", "", iconv("UTF-8", "ASCII//TRANSLIT", $request->title));
        //$url = str_replace(" ", "_", $url);
        //$url = strtolower($url);
        //$article->update([
        //    'url' => $article->id . '_' . $url
        //]);

        create_staff_log('site.articles.create', $request);

        return redirect()->route('housekeeping.site.articles')->with('message', 'Article created!');
    }

    public function articles()
    {
        abort_unless_permission('can_create_site_news');

        return view('housekeeping.site.articles.listing')->with([
            'articles'  => Article::where('is_published', '1')->orderBy('created_at', 'desc')->with('author')->paginate(15)
        ]);
    }

    public function articleEdit(Request $request)
    {
        abort_unless_permission('can_create_site_news');

        $article = Article::find($request->id);

        if (!$article)
            return redirect()->route('housekeeping.site.article')->with('message', 'Article not found!');

        return view('housekeeping.site.articles.edit')->with([
            'ts_images' => array_map(fn($f) => pathinfo($f, PATHINFO_FILENAME), File::files('web/images/top_story_images')),
            'article'   => $article
        ]);
    }

    public function articleEditSave(Request $request)
    {
        abort_unless_permission('can_create_site_news');

        $request->validate([
            'title'             => 'required|max:255',
            'topstory'          => 'required|max:255',
            'short_text'        => 'required|max:255',
            'long_text'         => 'required'
        ]);

        $article = Article::find($request->id);

        if (!$article)
            return redirect()->route('housekeeping.site.article')->with('message', 'Article not found!');

        //$url = preg_replace("/[^\w\s]/", "", iconv("UTF-8", "ASCII//TRANSLIT", $request->title));
        //$url = str_replace(" ", "_", $url);
        //$url = strtolower($url);

        $article->update([
            'title'                 => $request->title,
            'author_id'             => user()->id,
            'author_override'       => $request->author_override,
            'short_story'           => $request->short_text,
            'full_story'            => $request->long_text,
            'topstory'              => $request->topstory,
            'topstory_override'     => $request->topstory_override ?? '',
            'article_image'         => $request->article_image ?? '',
            'is_published'          => $request->is_published,
            'is_future_published'   => $request->is_future_published ?? 0,
            'created_at'            => now()
        ]);

        create_staff_log('site.articles.edit.save', $request);

        return redirect()->route('housekeeping.site.articles.edit', $article->id)->with('message', 'Article updated!');
    }

    public function articleDelete(Request $request)
    {
        if (!user()->hasPermission('can_create_site_news'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $article = Article::find($request->id);

        if (!$article)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This article does not exist!']);

        $article->update([
            'is_deleted' => '1',
        ]);

        create_staff_log('site.articles.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Article deleted!']);
    }

    public function articlesRestore()
    {
        if (!user()->hasPermission('can_restore_site_news'))
            return view('housekeeping.ajax.accessdenied_dialog');

        return view('housekeeping.site.articles.restore')->with([
            'articles'   => Article::where('is_deleted', '1')->orderBy('created_at', 'desc')->paginate(15)
        ]);
    }

    public function articleRestore(Request $request)
    {
        if (!user()->hasPermission('can_restore_site_news'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $article = Article::find($request->id);

        if (!$article)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This article does not exist!']);

        $article->update([
            'is_deleted' => '0',
        ]);

        create_staff_log('site.articles.restore', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Article restored!']);
    }
}
