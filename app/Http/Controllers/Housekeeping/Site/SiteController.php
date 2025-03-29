<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Box;
use App\Models\BoxPage;
use App\Models\CmsSetting;
use App\Models\StaffLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        if (!user()->hasPermission('can_edit_site_settings'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.index')->with([
            'backgrounds'   => File::allFiles('web/images/bg_patterns'),
            'enterbuttons'  => File::allFiles('web/images/enterbuttons'),
            'hotelviews'    => File::allFiles('web/images/hotelviews')
        ]);
    }

    public function siteSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_site_settings'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'register_default_credits'  => 'required|numeric',
            'register_default_film'     => 'required|numeric',
            'register_default_tickets'  => 'required|numeric'
        ]);

        set_cms_config('hotel.name.full', $request->hotel_name_full);
        set_cms_config('hotel.name.short', $request->hotel_name_short);
        set_cms_config('register.default.console_motto', $request->register_default_console_motto);
        set_cms_config('register.default.credits', $request->register_default_credits);
        set_cms_config('register.default.film', $request->register_default_film);
        set_cms_config('register.default.motto', $request->register_default_motto);
        set_cms_config('register.default.tickets', $request->register_default_tickets);
        set_cms_config('site.style.enter', $request->site_style_enter);
        set_cms_config('site.style.background', $request->site_style_background);
        set_cms_config('site.style.hotelview', $request->site_style_hotelview);

        DB::statement("ALTER TABLE users ALTER COLUMN credits SET DEFAULT '{$request->register_default_credits}'");
        DB::statement("ALTER TABLE users ALTER COLUMN film SET DEFAULT '{$request->register_default_film}'");
        DB::statement("ALTER TABLE users ALTER COLUMN tickets SET DEFAULT '{$request->register_default_tickets}'");
        DB::statement("ALTER TABLE users ALTER COLUMN console_motto SET DEFAULT '{$request->register_default_console_motto}'");
        DB::statement("ALTER TABLE users ALTER COLUMN motto SET DEFAULT '{$request->register_default_motto}'");

        unset($request['_token']);
        StaffLog::createLog('site', json_encode($request->post()));
        return redirect()->route('housekeeping.site')->with('message', 'Site settings updated!');
    }

    public function maintenance()
    {
        if (!user()->hasPermission('can_edit_site_maintenance'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.maintenance');
    }

    public function maintenanceSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_site_maintenance'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'site_maintenance_enabled' => 'required|boolean'
        ]);

        set_cms_config('site.maintenance.enabled', $request->site_maintenance_enabled);

        unset($request['_token']);
        StaffLog::createLog('site.maintenance', json_encode($request->post()));
        return redirect()->route('housekeeping.site.maintenance')->with('message', 'Maintenance settings updated!');
    }

    public function loader()
    {
        if (!user()->hasPermission('can_edit_site_loader'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.loader');
    }

    public function loaderSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_site_loader'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'external_texts_txt'        => 'required',
            'external_variables_txt'    => 'required',
            'habbo_dcr_url'             => 'required'
        ]);

        set_cms_config('external.texts.txt', $request->external_texts_txt);
        set_cms_config('external.variables.txt', $request->external_variables_txt);
        set_cms_config('habbo.dcr.url', $request->habbo_dcr_url);

        unset($request['_token']);
        StaffLog::createLog('loader', json_encode($request->post()));
        return redirect()->route('housekeeping.site.loader')->with('message', 'Loader settings updated!');
    }

    public function boxCreate()
    {
        if (!user()->hasPermission('can_create_site_box'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.box_create');
    }

    public function boxCreateSave(Request $request)
    {
        if (!user()->hasPermission('can_create_site_box'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'title'         => 'required|max:125',
            'content'         => 'required'
        ]);

        Box::create([
            'title'         => $request->title,
            'content'       => $request->content,
            'column'        => $request->column,
            'created_by'    => user()->id,
        ]);

        $message = user()->username . ' created a box with title \'' . $request->title . '\'';
        StaffLog::createLog('box', $message);

        return redirect()->route('housekeeping.site.box_create')->with('message',  'Box created!');
    }

    public function boxDelete($boxId = null)
    {
        if (!user()->hasPermission('can_delete_site_box'))
            return view('housekeeping.accessdenied');

        $box = Box::find($boxId);

        $message = user()->username . ' deleted a box ' . json_encode($box);
        $box->delete();

        StaffLog::createLog('box', $message);

        return redirect('/admin/site/box_edit')->with([
            'message'   => 'Box deleted!'
        ]);
    }

    public function boxEdit($boxId = null)
    {
        if (!user()->hasPermission('can_edit_site_box'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.box_edit')->with([
            'boxes' => Box::paginate(15),
            'box'   => Box::where('id', $boxId)->first()
        ]);
    }

    public function boxEditSave(Request $request, $boxId)
    {
        if (!user()->hasPermission('can_edit_site_box'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'title'           => 'required|max:125',
            'content'         => 'required'
        ]);

        $box = Box::find($boxId);

        $box->update([
            'title'         => $request->title,
            'content'       => $request->content
        ]);

        $message = user()->username . ' edited a box with title \'' . $request->title . '\'';
        StaffLog::createLog('box', $message);

        return redirect()->route('housekeeping.site.box_edit', $boxId)->with('message',  'Box edited!');
    }

    public function boxPages($boxId = null)
    {
        if (!user()->hasPermission('can_create_site_box'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.box_pages')->with([
            'boxpages'  => BoxPage::paginate(15),
            'box'       => BoxPage::find($boxId),
            'boxes'     => Box::all(),
            'pages'     => $this->availablePages
        ]);
    }

    public function boxPagesNew()
    {
        if (!user()->hasPermission('can_create_site_box'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.box_pages')->with([
            'boxpages'  => BoxPage::all(),
            'boxes'     => Box::all(),
            'box'       => 'new',
            'pages'     => $this->availablePages
        ]);
    }

    public function boxPagesCreate(Request $request)
    {
        if (!user()->hasPermission('can_edit_site_box'))
            return view('housekeeping.accessdenied');

        $boxpage = BoxPage::create([
            'box_id'   => $request->box_id,
            'page'     => $request->page,
            'column'   => $request->column,
            'color'    => $request->override_color
        ]);

        $message = user()->username . ' created a box page with id \'' . $boxpage->id . '\'';
        StaffLog::createLog('box_pages', $message);

        return redirect()->route('housekeeping.site.box_pages', false)->with('message',  'Box Page created!');
    }

    public function boxPagesSave($boxId, Request $request)
    {
        if (!user()->hasPermission('can_edit_site_box'))
            return view('housekeeping.accessdenied');

        $box = BoxPage::find($boxId);

        $box->update([
            'box_id'    => $request->box_id,
            'page'      => $request->page,
            'column'    => $request->column,
            'color'     => $request->override_color
        ]);

        $message = user()->username . ' edited a box page with id \'' . $request->box_id . '\'';
        StaffLog::createLog('box_pages', $message);

        return redirect()->route('housekeeping.site.box_pages', $boxId)->with('message',  'Box Page edited!');
    }

    public function boxPageDelete($boxId)
    {
        if (!user()->hasPermission('can_delete_site_box'))
            return view('housekeeping.accessdenied');

        $box = BoxPage::find($boxId);

        $message = user()->username . ' deleted a box page ' . json_encode($box);
        $box->delete();

        StaffLog::createLog('box', $message);

        return redirect('/admin/site/box_pages')->with([
            'message'   => 'Box page deleted!'
        ]);
    }
}
