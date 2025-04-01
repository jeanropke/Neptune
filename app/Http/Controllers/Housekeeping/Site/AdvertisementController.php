<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function siteAds()
    {
        if (!user()->hasPermission('can_edit_site_ads'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.ads');
    }

    public function siteAdsSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_site_ads'))
            return view('housekeeping.accessdenied');

        set_cms_config('site.ads_160.enabled', $request->site_ads_160_enabled);
        set_cms_config('site.ads_160.content', $request->site_ads_160_content);
        set_cms_config('site.ads_300.enabled', $request->site_ads_300_enabled);
        set_cms_config('site.ads_300.content', $request->site_ads_300_content);
        set_cms_config('site.ads_footer.enabled', $request->site_ads_footer_enabled);
        set_cms_config('site.ads_footer.content', $request->site_ads_footer_content);

        create_staff_log('site.ads.save', $request);
        return redirect()->route('housekeeping.site.ads')->with('message', 'Settings updated!');
    }

    public function siteTrackingSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_site_ads'))
            return view('housekeeping.accessdenied');

        set_cms_config('site.tracking.enabled', $request->site_tracking_enabled);
        set_cms_config('site.tracking.content', $request->site_tracking_content);

        create_staff_log('site.tracking.save', $request);

        return redirect()->route('housekeeping.site.ads')->with('message', 'Settings updated!');
    }
}
