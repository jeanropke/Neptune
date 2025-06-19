<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use App\Models\Fansite;
use Illuminate\Http\Request;

class FansiteController extends Controller
{
    public function fansites(Request $request)
    {
        if (!user()->hasPermission('can_edit_fansites'))
            return view('housekeeping.accessdenied');

        $fansites = Fansite::paginate(20);

        return view('housekeeping.site.fansites')->with([
            'fansites' => $fansites,
            'fansite'  => Fansite::find($request->id)
        ]);
    }


    public function fansitesSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_fansites'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'name'          => 'required',
            'url'           => 'required',
            'image'         => 'required',
            'description'   => 'required'
        ]);

        $fansite = Fansite::find($request->id);
        if ($fansite) {
            $fansite->update([
                'name'          => $request->name,
                'description'   => $request->description,
                'url'           => $request->url,
                'image'         => $request->image
            ]);
            create_staff_log('site.fansites.edit', $request);
            return redirect()->back()->with('message', 'Fansite updated!');
        }

        Fansite::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'url'           => $request->url,
            'image'         => $request->image,
            'created_by'    => user()->id
        ]);

        create_staff_log('site.fansites.create', $request);

        return redirect()->back()->with('message', 'Fansite added!');
    }

}
