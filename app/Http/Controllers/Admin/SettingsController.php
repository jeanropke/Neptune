<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function hotel()
    {
        if (!user()->hasPermission('can_settings_hotel'))
            return view('admin.unauthorized');

        return view('admin.settings.hotel');
    }

    public function hotelSave(Request $request)
    {
        if (!user()->hasPermission('can_settings_hotel'))
            return view('admin.unauthorized');

        CmsSetting::where('key', 'external.texts.txt')->first()->update(['value' => $request->external_texts_txt]);
        CmsSetting::where('key', 'external.variables.txt')->first()->update(['value' => $request->external_vars_txt]);
        CmsSetting::where('key', 'habbo.dcr.url')->first()->update(['value' => $request->habbo_dcr_url]);
        CmsSetting::where('key', 'connection.info.host')->first()->update(['value' => $request->connection_info_host]);
        CmsSetting::where('key', 'connection.info.port')->first()->update(['value' => $request->connection_info_port]);
        CmsSetting::where('key', 'connection.mus.host')->first()->update(['value' => $request->connection_mus_host]);
        CmsSetting::where('key', 'connection.mus.port')->first()->update(['value' => $request->connection_mus_port]);
        CmsSetting::where('key', 'connection.rcon.host')->first()->update(['value' => $request->connection_rcon_host]);
        CmsSetting::where('key', 'connection.rcon.port')->first()->update(['value' => $request->connection_rcon_port]);

        return redirect()->back()->with('message',  'Settings saved!');
    }

    public function site()
    {
        if (!user()->hasPermission('can_settings_site'))
            return view('admin.unauthorized');

        return view('admin.settings.site')->with([
            'backgrounds'   => File::allFiles('web/images/bg_patterns'),
            'enter_btns'    => File::allFiles('web/images/enterbuttons'),
            'hotelviews'    => File::allFiles('web/images/hotelviews')
        ]);
    }

    public function siteSave(Request $request)
    {
        if (!user()->hasPermission('can_settings_site'))
            return view('admin.unauthorized');

        CmsSetting::where('key', 'hotel.name.short')->first()->update(['value' => $request->hotel_name_short]);
        CmsSetting::where('key', 'hotel.name.full')->first()->update(['value' => $request->hotel_name_full]);
        CmsSetting::where('key', 'site.avatarimage.url')->first()->update(['value' => $request->site_avatarimage_url]);
        CmsSetting::where('key', 'site.style.background')->first()->update(['value' => $request->site_style_background]);
        CmsSetting::where('key', 'site.style.enter')->first()->update(['value' => $request->site_style_enter]);
        CmsSetting::where('key', 'site.style.hotelview')->first()->update(['value' => $request->site_style_hotelview]);

        return redirect()->back()->with('message',  'Settings saved!');
    }
}
