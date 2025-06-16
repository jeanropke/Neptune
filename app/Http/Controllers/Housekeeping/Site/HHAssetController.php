<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HHAssetController extends Controller
{
    public function listing(Request $request)
    {
        if (!user()->hasPermission('can_manage_hh_assets'))
            return view('housekeeping.accessdenied');

        switch ($request->type) {
            case 'b':
            case 's':
                $assets = HomeAsset::where('type', $request->type)->paginate(20);
                break;

            default:
                $assets = HomeAsset::paginate(20);
                break;
        }

        return view('housekeeping.site.hhassets.listing')->with('assets', $assets);
    }

    public function create()
    {
        if (!user()->hasPermission('can_manage_hh_assets'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.hhassets.create');
    }

    public function createSave(Request $request)
    {
        if (!user()->hasPermission('can_manage_hh_assets'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'class' => 'required|unique:cms_home_assets,class',
            'path'  => 'required|unique:cms_home_assets,path',
            'type'  => 'required|in:b,s'
        ]);

        if ($request->type == 's') {
            if (!Storage::disk('stickers')->exists($request->path)) {
                return redirect()->back()->withErrors(['error' => "File '$request->path' not found"]);
            }
        }

        $asset = HomeAsset::create([
            'class' => $request->class,
            'path'  => $request->path,
            'type'  => $request->type
        ]);

        return redirect()->route('housekeeping.site.hh_assets.edit', $asset->id)->with('message', 'Asset created!');
    }

    public function edit(Request $request)
    {
        if (!user()->hasPermission('can_manage_hh_assets'))
            return view('housekeeping.accessdenied');

        $asset = HomeAsset::find($request->id);
        if (!$asset)
            return redirect()->route('housekeeping.site.hh_assets.listing')->withErrors(['error' => 'Asset not found']);

        return view('housekeeping.site.hhassets.edit')->with('asset', $asset);
    }

    public function editSave(Request $request)
    {
        if (!user()->hasPermission('can_manage_hh_assets'))
            return view('housekeeping.accessdenied');

        $asset = HomeAsset::find($request->id);
        if (!$asset)
            return redirect()->route('housekeeping.site.hh_assets.listing')->withErrors(['error' => 'Asset not found']);

        $request->validate([
            'id'    => 'required|exists:cms_home_assets,id',
            'class' => 'required|unique:cms_home_assets,class,' . $request->id,
            'path'  => 'required|unique:cms_home_assets,path,' . $request->id,
            'type'  => 'required|in:b,s'
        ]);

        if ($request->type == 's') {
            if (!Storage::disk('stickers')->exists($request->path)) {
                return redirect()->back()->withErrors(['error' => "File '$request->path' not found"]);
            }
        }

        $asset->update([
            'class' => $request->class,
            'path'  => $request->path,
            'type'  => $request->type
        ]);

        return redirect()->route('housekeeping.site.hh_assets.edit', $asset->id)->with('message', 'Asset edited!');
    }


    public function delete(Request $request)
    {
        if (!user()->hasPermission('can_manage_hh_assets'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $asset = HomeAsset::find($request->id);

        if (!$asset)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This asset does not exist!']);

        create_staff_log('site.hh_assets.delete', $request);
        $asset->delete();

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Asset deleted!']);
    }

}
