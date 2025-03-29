<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\StaffLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function newsCompose()
    {
        if (!user()->hasPermission('can_create_site_news'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.news_compose')->with([
            'ts_images' => File::allFiles('web/images/top_story_images')
        ]);
    }

    public function newsComposeSave(Request $request)
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

        unset($request['_token']);
        StaffLog::createLog('site.news_compose', json_encode($request->post()));

        return redirect()->route('housekeeping.site.news_manage')->with('message', 'Article created!');
    }

    public function newsManage()
    {
        if (!user()->hasPermission('can_create_site_news'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.news_manage')->with([
            'articles'  => Article::where('is_deleted', user()->hasPermission('can_restore_site_news') ? '>=' : '=', '0')->orderBy('created_at', 'desc')->paginate(15)
        ]);
    }

    public function newsEdit(Request $request)
    {
        if (!user()->hasPermission('can_create_site_news'))
            return view('housekeeping.accessdenied');

        $article = Article::find($request->id);

        if (!$article)
            return redirect()->route('housekeeping.site.news_manage')->with('message', 'Article not found!');

        return view('housekeeping.site.news_edit')->with([
            'ts_images' => File::allFiles('web/images/top_story_images'),
            'article'   => $article
        ]);
    }

    public function newsEditSave(Request $request)
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
            return redirect()->route('housekeeping.site.news_manage')->with('message', 'Article not found!');


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

        unset($request['_token']);
        StaffLog::createLog('site.news_edit', json_encode($request->post()));

        return redirect()->route('housekeeping.site.news_edit', $article->id)->with('message', 'Article updated!');
    }

    public function newsDelete(Request $request)
    {
        if (!user()->hasPermission('can_create_site_news'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $article = Article::find($request->id);

        if (!$article)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This article does not exist!']);

        $article->update([
            'is_deleted'        => '1',
        ]);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Article deleted!']);
    }
}
