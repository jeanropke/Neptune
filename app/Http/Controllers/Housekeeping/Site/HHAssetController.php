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
        abort_unless_permission('can_manage_hh_assets');

        $assets = HomeAsset::where('class', 'LIKE', "%{$request->q}%")->orWhere('path', 'LIKE', "%{$request->q}%")->paginate(20);
        return view('housekeeping.site.hhassets.listing')->with('assets', $assets);
    }

    public function create()
    {
        abort_unless_permission('can_manage_hh_assets');

        return view('housekeeping.site.hhassets.create');
    }

    public function createSave(Request $request)
    {
        abort_unless_permission('can_manage_hh_assets');

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
        abort_unless_permission('can_manage_hh_assets');

        $asset = HomeAsset::find($request->id);
        if (!$asset)
            return redirect()->route('housekeeping.site.hh_assets.listing')->withErrors(['error' => 'Asset not found']);

        return view('housekeeping.site.hhassets.edit')->with('asset', $asset);
    }

    public function editSave(Request $request)
    {
        abort_unless_permission('can_manage_hh_assets');

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

    public function generate()
    {
        abort_unless_permission('can_manage_hh_assets');

        return view('housekeeping.site.hhassets.generate');
    }

    public function generatePost(Request $request)
    {
        abort_unless_permission('can_manage_hh_assets');

        $cimages = cms_config('site.c_images.url');
        $isFormatted = $request->formatted == 1;
        if ($request->type == 'b') {
            $content = null;
            $assets = HomeAsset::where('type', 'b')->get();
            foreach ($assets as $asset) {
                if ($isFormatted) {
                    $content .= "div.b_{$asset->class},div.b_{$asset->class}_pre {\n    background-image: url({$cimages}/backgrounds2/{$asset->path})\n}\n";
                } else {
                    $content .= "div.b_{$asset->class},div.b_{$asset->class}_pre{background-image:url({$cimages}/backgrounds2/{$asset->path})}";
                }
            }
            Storage::disk('public_root')->put('web/styles/myhabbo/backgrounds.css', $content);
        } else {
            $content = null;
            $assets = HomeAsset::where('type', 's')->get();
            foreach ($assets as $asset) {
                if ($isFormatted) {
                    $content .= "div.s_{$asset->class} {\n    width: {$asset->width}px;\n    height: {$asset->height}px;\n    background-image: url({$cimages}/stickers/{$asset->path})\n}\n";
                    $content .= "div.s_{$asset->class}_pre {\n    background: url({$cimages}/stickers/{$asset->path}) no-repeat 50% 50%\n}\n";
                } else {
                    $content .= "div.s_{$asset->class}{width:{$asset->width}px;height:{$asset->height}px;background-image: url({$cimages}/stickers/{$asset->path})}";
                    $content .= "div.s_{$asset->class}_pre{background:url({$cimages}/stickers/{$asset->path}) no-repeat 50% 50%}";
                }
            }
            Storage::disk('public_root')->put('web/styles/myhabbo/stickers.css', $content);
        }
        return $request->all();
    }
}
