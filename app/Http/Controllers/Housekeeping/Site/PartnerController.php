<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use App\Models\Neptune\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function partners(Request $request)
    {
        abort_unless_permission('can_edit_site_partners');

        $parters = Partner::paginate(15);

        return view('housekeeping.site.partners')->with([
            'partners'  => $parters,
            'partner'   => Partner::find($request->id)
        ]);
    }

    public function partnersSave(Request $request)
    {
        abort_unless_permission('can_edit_site_partners');

        $request->validate([
            'title'     => 'required',
            'url'       => 'required',
            'image'     => 'required',
            'enabled'   => 'in:0,1',
            'order_num' => 'required|numeric'
        ]);

        $partner = Partner::find($request->id);
        if ($partner) {
            $partner->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'url'           => $request->url,
                'image'         => $request->image,
                'enabled'       => $request->enabled,
                'order_num'     => $request->order_num
            ]);
            create_staff_log('site.partners.edit', $request);
            return redirect()->back()->with('message', 'Partner updated!');
        }

        Partner::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'url'           => $request->url,
            'image'         => $request->image,
            'enabled'       => $request->enabled,
            'order_num'     => $request->order_num,
            'created_by'    => user()->id
        ]);

        create_staff_log('site.partners.create', $request);

        return redirect()->back()->with('message', 'Partner created!');
    }

    public function partnersDelete(Request $request)
    {
        if (!user()->hasPermission('can_edit_site_partners'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $partner = Partner::find($request->id);

        if (!$partner)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This partner does not exist!']);

        $partner->delete();

        create_staff_log('site.partners.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Partner deleted!']);
    }
}
