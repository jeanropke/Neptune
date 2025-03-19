<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Box;
use App\Models\BoxPage;
use App\Models\CmsSetting;
use App\Models\StaffLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SiteController extends Controller
{
    public $availablePages = [
        'club.shop',
        'index',
        'include.furniture',
        'home.about',
        'hotel', 'hotel.groups', 'hotel.homes', 'hotel.pets', 'hotel.room', 'hotel.staff', 'hotel.welcome', 'hotel.navigator',
        'help.index',
        'community.index', 'community.fansites',
        'games.index'
    ];

    public function index()
    {
        if (!Auth::user()->hasPermission('can_edit_site_settings'))
            return view('admin.accessdenied');

        $settings = [
            'hotel.name.short'      => CmsSetting::getSetting('hotel.name.short'),
            'hotel.name.full'       => CmsSetting::getSetting('hotel.name.full'),
            'hotel.credits.start'   => CmsSetting::getSetting('hotel.credits.start'),
            'hotel.diamonds.start'  => CmsSetting::getSetting('hotel.diamonds.start'),
            'hotel.duckets.start'   => CmsSetting::getSetting('hotel.duckets.start'),
            'site.style.background' => CmsSetting::getSetting('site.style.background'),
            'site.style.enter'      => CmsSetting::getSetting('site.style.enter'),
            'site.style.hotelview'  => CmsSetting::getSetting('site.style.hotelview'),

            'site.ads.enabled'      => CmsSetting::getSetting('site.ads.enabled'),
            'site.ads.160'          => CmsSetting::getSetting('site.ads.160'),
            'site.ads.300'          => CmsSetting::getSetting('site.ads.300'),
            'site.ads.footer'       => CmsSetting::getSetting('site.ads.footer')
        ];

        return view('admin.site.index')->with([
            'settings'      => $settings,
            'backgrounds'   => File::allFiles('web/images/bg_patterns'),
            'enterbuttons'  => File::allFiles('web/images/enterbuttons'),
            'hotelviews'    => File::allFiles('web/images/hotelviews')
        ]);
    }

    public function siteSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_site_settings'))
            return view('admin.accessdenied');

        CmsSetting::where('key', 'hotel.name.short')->first()->update(['value' => $request->shortname]);
        CmsSetting::where('key', 'hotel.name.full')->first()->update(['value' => $request->sitename]);
        CmsSetting::where('key', 'hotel.credits.start')->first()->update(['value' => $request->credits]);
        CmsSetting::where('key', 'hotel.duckets.start')->first()->update(['value' => $request->duckets]);
        CmsSetting::where('key', 'hotel.diamonds.start')->first()->update(['value' => $request->diamonds]);
        CmsSetting::where('key', 'site.style.background')->first()->update(['value' => $request->background]);
        CmsSetting::where('key', 'site.style.enter')->first()->update(['value' => $request->enterbutton]);
        CmsSetting::where('key', 'site.style.hotelview')->first()->update(['value' => $request->hotelview]);

        unset($request['_token']);
        $message = Auth::user()->username . ' changed \'site\' values to ' . json_encode($request->post());
        StaffLog::createLog('site', $message);
        return redirect()->route('admin.site')->with('message',  'Site settings updated!');
    }

    public function siteAdsSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_site_settings'))
            return view('admin.accessdenied');


        CmsSetting::where('key', 'site.ads.enabled')->first()->update(['value' => $request->ads_enabled]);
        CmsSetting::where('key', 'site.ads.160')->first()->update(['value' => $request->ads_160.'']);
        CmsSetting::where('key', 'site.ads.300')->first()->update(['value' => $request->ads_300.'']);
        CmsSetting::where('key', 'site.ads.footer')->first()->update(['value' => $request->ads_footer.'']);

        unset($request['_token']);
        $message = Auth::user()->username . ' changed \'ads\' values to ' . json_encode($request->post());
        StaffLog::createLog('site', $message);
        return redirect()->route('admin.site')->with('message',  'Ads settings updated!');
    }

    public function maintenance()
    {
        if (!Auth::user()->hasPermission('can_edit_site_maintenance'))
            return view('admin.accessdenied');

        $settings = [
            'hotel.maintenance' => CmsSetting::getSetting('hotel.maintenance')
        ];

        return view('admin.site.maintenance')->with([
            'settings'  => $settings
        ]);
    }

    public function maintenanceSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_site_maintenance'))
            return view('admin.accessdenied');

        CmsSetting::where('key', 'hotel.maintenance')->first()->update(['value' => $request->hotel_maintenance]);

        unset($request['_token']);
        $message = Auth::user()->username . ' changed \'maintenance\' values to ' . json_encode($request->post());
        StaffLog::createLog('maintenance', $message);
        return redirect()->route('admin.site.maintenance')->with('message',  'Maintenance settings updated!');
    }

    public function loader()
    {
        if (!Auth::user()->hasPermission('can_edit_site_loader'))
            return view('admin.accessdenied');

        $settings = [
            'client.external.texts'             => CmsSetting::getSetting('client.external.texts'),
            'client.external.texts.override'    => CmsSetting::getSetting('client.external.texts.override'),
            'client.external.vars'              => CmsSetting::getSetting('client.external.vars'),
            'client.external.vars.override'     => CmsSetting::getSetting('client.external.vars.override'),
            'client.swf.file'                   => CmsSetting::getSetting('client.swf.file'),
            'client.swf.folder'                 => CmsSetting::getSetting('client.swf.folder'),
            'client.gamedata.prefix'            => CmsSetting::getSetting('client.gamedata.prefix'),
        ];

        return view('admin.site.loader')->with([
            'settings'  => $settings
        ]);
    }

    public function loaderSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_site_loader'))
            return view('admin.accessdenied');

        CmsSetting::where('key', 'client.external.texts')->first()->update(['value' => $request->texts]);
        CmsSetting::where('key', 'client.external.texts.override')->first()->update(['value' => $request->texts_override]);
        CmsSetting::where('key', 'client.external.vars')->first()->update(['value' => $request->vars]);
        CmsSetting::where('key', 'client.external.vars.override')->first()->update(['value' => $request->vars_override]);
        CmsSetting::where('key', 'client.swf.file')->first()->update(['value' => $request->swf_file]);
        CmsSetting::where('key', 'client.swf.folder')->first()->update(['value' => $request->swf_folder]);
        CmsSetting::where('key', 'client.gamedata.prefix')->first()->update(['value' => $request->gamedata_prefix]);

        unset($request['_token']);
        $message = Auth::user()->username . ' changed \'loader\' values to ' . json_encode($request->post());
        StaffLog::createLog('loader', $message);
        return redirect()->route('admin.site.loader')->with('message',  'Loader settings updated!');
    }

    public function newsCompose()
    {
        if (!Auth::user()->hasPermission('can_create_site_news'))
            return view('admin.accessdenied');

        return view('admin.site.news_compose')->with([
            'ts_images' => File::allFiles('web/images/top_story_images')
        ]);
    }

    public function newsComposeSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_create_site_news'))
            return view('admin.accessdenied');

        $request->validate([
            'title'         => 'required|max:55',
            'topstory'      => 'required|max:125',
            'short_story'   => 'required|max:255',
            'story'         => 'required',
            'author'        => 'required|max:55',
        ]);


        $article = Article::create([
            'title'      => $request->title,
            'image'      => $request->topstory,
            'short_text' => $request->short_story,
            'long_text'  => $request->story,
            'author'     => $request->author
        ]);


        $url = preg_replace("/[^\w\s]/", "", iconv("UTF-8", "ASCII//TRANSLIT", $request->title));
        $url = str_replace(" ", "_", $url);
        $url = strtolower($url);

        $article->update([
            'url'       => $article->id . '_' . $url
        ]);

        $message = Auth::user()->username . ' created an article called \'' . $request->title . '\'';
        StaffLog::createLog('article', $message);

        return redirect()->route('admin.site.news_compose')->with('message',  'Article created!');
    }

    public function newsManage($articleId = null)
    {
        if (!Auth::user()->hasPermission('can_edit_site_news'))
            return view('admin.accessdenied');


        return view('admin.site.news_manage')->with([
            'articles'  => Article::where('is_deleted', Auth::user()->hasPermission('can_restore_site_news') ? '>=' : '=', '0')->orderBy('created_at', 'desc')->paginate(15),
            'article'   => Article::find($articleId),
            'ts_images' => File::allFiles('web/images/top_story_images')
        ]);
    }

    public function newsManageSave(Request $request, $articleId)
    {
        if (!Auth::user()->hasPermission('can_edit_site_news'))
            return view('admin.accessdenied');

        $request->validate([
            'title'         => 'required|max:55',
            'topstory'      => 'required|max:125',
            'short_story'   => 'required|max:255',
            'story'         => 'required'
        ]);

        $article = Article::where('id', $articleId)->first();

        $url = preg_replace("/[^\w\s]/", "", iconv("UTF-8", "ASCII//TRANSLIT", $request->title));
        $url = str_replace(" ", "_", $url);
        $url = strtolower($url);

        $article->update([
            'title'         => $request->title,
            'image'         => $request->topstory,
            'short_text'    => $request->short_story,
            'long_text'     => $request->story,
            'url'           => $articleId . '_' . $url,
            'is_deleted'    => $request->deleted ?? 0
        ]);

        $message = Auth::user()->username . ' edited an article called \'' . $request->title . '\'';
        StaffLog::createLog('article', $message);

        return redirect()->route('admin.site.news_manage', $articleId)->with('message',  'Article edited!');
    }

    public function newsManageDelete($articleId)
    {
        if (!Auth::user()->hasPermission('can_delete_site_news'))
            return view('admin.accessdenied');

        $article = Article::find($articleId);
        $article->update(['is_deleted' => '1']);

        $message = Auth::user()->username . ' deleted an article called \'' . $article . '\'';
        StaffLog::createLog('article', $message);

        return redirect()->route('admin.site.news_manage', false)->with('message',  'Article deleted!');
    }

    public function boxCreate()
    {
        if (!Auth::user()->hasPermission('can_create_site_box'))
            return view('admin.accessdenied');

        return view('admin.site.box_create');
    }

    public function boxCreateSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_create_site_box'))
            return view('admin.accessdenied');

        $request->validate([
            'title'         => 'required|max:125',
            'content'         => 'required'
        ]);

        Box::create([
            'title'         => $request->title,
            'content'       => $request->content,
            'column'        => $request->column,
            'created_by'    => Auth::user()->id,
        ]);

        $message = Auth::user()->username . ' created a box with title \'' . $request->title . '\'';
        StaffLog::createLog('box', $message);

        return redirect()->route('admin.site.box_create')->with('message',  'Box created!');
    }

    public function boxDelete($boxId = null)
    {
        if (!Auth::user()->hasPermission('can_delete_site_box'))
            return view('admin.accessdenied');

        $box = Box::find($boxId);

        $message = Auth::user()->username . ' deleted a box ' . json_encode($box);
        $box->delete();

        StaffLog::createLog('box', $message);

        return redirect('/admin/site/box_edit')->with([
            'message'   => 'Box deleted!'
        ]);
    }

    public function boxEdit($boxId = null)
    {
        if (!Auth::user()->hasPermission('can_edit_site_box'))
            return view('admin.accessdenied');

        return view('admin.site.box_edit')->with([
            'boxes' => Box::paginate(15),
            'box'   => Box::where('id', $boxId)->first()
        ]);
    }

    public function boxEditSave(Request $request, $boxId)
    {
        if (!Auth::user()->hasPermission('can_edit_site_box'))
            return view('admin.accessdenied');

        $request->validate([
            'title'           => 'required|max:125',
            'content'         => 'required'
        ]);

        $box = Box::find($boxId);

        $box->update([
            'title'         => $request->title,
            'content'       => $request->content
        ]);

        $message = Auth::user()->username . ' edited a box with title \'' . $request->title . '\'';
        StaffLog::createLog('box', $message);

        return redirect()->route('admin.site.box_edit', $boxId)->with('message',  'Box edited!');
    }

    public function boxPages($boxId = null)
    {
        if (!Auth::user()->hasPermission('can_create_site_box'))
            return view('admin.accessdenied');

        return view('admin.site.box_pages')->with([
            'boxpages'  => BoxPage::paginate(15),
            'box'       => BoxPage::find($boxId),
            'boxes'     => Box::all(),
            'pages'     => $this->availablePages
        ]);
    }

    public function boxPagesNew()
    {
        if (!Auth::user()->hasPermission('can_create_site_box'))
            return view('admin.accessdenied');

        return view('admin.site.box_pages')->with([
            'boxpages'  => BoxPage::all(),
            'boxes'     => Box::all(),
            'box'       => 'new',
            'pages'     => $this->availablePages
        ]);
    }

    public function boxPagesCreate(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_site_box'))
            return view('admin.accessdenied');

        $boxpage = BoxPage::create([
            'box_id'   => $request->box_id,
            'page'     => $request->page,
            'column'   => $request->column,
            'color'    => $request->override_color
        ]);

        $message = Auth::user()->username . ' created a box page with id \'' . $boxpage->id . '\'';
        StaffLog::createLog('box_pages', $message);

        return redirect()->route('admin.site.box_pages', false)->with('message',  'Box Page created!');
    }

    public function boxPagesSave($boxId, Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_site_box'))
            return view('admin.accessdenied');

        $box = BoxPage::find($boxId);

        $box->update([
            'box_id'    => $request->box_id,
            'page'      => $request->page,
            'column'    => $request->column,
            'color'     => $request->override_color
        ]);

        $message = Auth::user()->username . ' edited a box page with id \'' . $request->box_id . '\'';
        StaffLog::createLog('box_pages', $message);

        return redirect()->route('admin.site.box_pages', $boxId)->with('message',  'Box Page edited!');
    }

    public function boxPageDelete($boxId)
    {
        if (!Auth::user()->hasPermission('can_delete_site_box'))
            return view('admin.accessdenied');

        $box = BoxPage::find($boxId);

        $message = Auth::user()->username . ' deleted a box page ' . json_encode($box);
        $box->delete();

        StaffLog::createLog('box', $message);

        return redirect('/admin/site/box_pages')->with([
            'message'   => 'Box page deleted!'
        ]);
    }
}
