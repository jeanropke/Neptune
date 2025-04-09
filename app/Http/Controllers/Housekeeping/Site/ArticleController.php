<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function articleCreate()
    {
        if (!user()->hasPermission('can_create_site_news'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.articles.create')->with([
            'ts_images' => array_map('basename', File::files('web/images/top_story_images')),
        ]);
    }

    public function articleCreateSave(Request $request)
    {
        if (!user()->hasPermission('can_create_site_news'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'title'             => 'required|max:255',
            'topstory'          => 'required|max:255',
            'short_text'        => 'required|max:255',
            'long_text'         => 'required'
        ]);

        $article = Article::create([
            'title'             => $request->title,
            'image'             => $request->topstory,
            'short_text'        => $request->short_text,
            'long_text'         => $request->long_text,
            'author_id'         => user()->id,
            'author_override'   => $request->author_override,
            'publish_date'      => Carbon::parse($request->publish_date)
        ]);

        $url = preg_replace("/[^\w\s]/", "", iconv("UTF-8", "ASCII//TRANSLIT", $request->title));
        $url = str_replace(" ", "_", $url);
        $url = strtolower($url);

        $article->update([
            'url' => $article->id . '_' . $url
        ]);

        create_staff_log('site.articles.create', $request);

        return redirect()->route('housekeeping.site.articles')->with('message', 'Article created!');
    }

    public function articles()
    {
        if (!user()->hasPermission('can_create_site_news'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.articles.listing')->with([
            'articles'  => Article::where('is_deleted', '0')->orderBy('created_at', 'desc')->paginate(15)
        ]);
    }

    public function articleEdit(Request $request)
    {
        if (!user()->hasPermission('can_create_site_news'))
            return view('housekeeping.accessdenied');

        $article = Article::find($request->id);

        if (!$article)
            return redirect()->route('housekeeping.site.article')->with('message', 'Article not found!');

        return view('housekeeping.site.articles.edit')->with([
            'ts_images' => array_map('basename', File::files('web/images/top_story_images')),
            'article'   => $article
        ]);
    }

    public function articleEditSave(Request $request)
    {
        if (!user()->hasPermission('can_create_site_news'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'title'             => 'required|max:255',
            'topstory'          => 'required|max:255',
            'short_text'        => 'required|max:255',
            'long_text'         => 'required'
        ]);

        $article = Article::find($request->id);

        if (!$article)
            return redirect()->route('housekeeping.site.article')->with('message', 'Article not found!');

        $url = preg_replace("/[^\w\s]/", "", iconv("UTF-8", "ASCII//TRANSLIT", $request->title));
        $url = str_replace(" ", "_", $url);
        $url = strtolower($url);

        $article->update([
            'title'             => $request->title,
            'image'             => $request->topstory,
            'short_text'        => $request->short_text,
            'long_text'         => $request->long_text,
            'author_id'         => user()->id,
            'author_override'   => $request->author_override,
            'publish_date'      => Carbon::parse($request->publish_date),
            'is_deleted'        => $request->deleted ?? '0',
            'url'               => $article->id . '_' . $url
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
