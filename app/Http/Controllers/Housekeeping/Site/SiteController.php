<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SiteController extends Controller
{
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

        create_staff_log('site.general.save', $request);
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

        create_staff_log('site.maintenance.save', $request);
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

        create_staff_log('site.loader.save', $request);
        return redirect()->route('housekeeping.site.loader')->with('message', 'Loader settings updated!');
    }
}
