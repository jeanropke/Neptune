<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\BoxPage;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    private $availablePages = [
        'club.shop',
        'index',
        'include.furniture',
        'home.about',
        'hotel',
        'hotel.groups',
        'hotel.homes',
        'hotel.pets',
        'hotel.room',
        'hotel.staff',
        'hotel.welcome',
        'hotel.navigator',
        'help.index',
        'community.index',
        'community.fansites',
        'games.index'
    ];

    public function boxCreate()
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.box.create');
    }

    public function boxCreateSave(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'title'         => 'required|max:125',
            'content'       => 'required',
            'requirement'   => 'required|in:guest,auth,both'
        ]);

        Box::create([
            'title'         => $request->title,
            'content'       => $request->content,
            'requirement'   => $request->requirement,
            'created_by'    => user()->id
        ]);

        create_staff_log('site.box.create.save', $request);

        return redirect()->route('housekeeping.site.box.create')->with('message',  'Box created!');
    }

    public function boxManage()
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.box.manage')->with('boxes', Box::paginate(15));
    }

    public function boxDelete(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $box = Box::find($request->id);

        if (!$box)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This box does not exist!']);

        create_staff_log('site.box.delete', $request);
        $box->delete();

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Box deleted!']);
    }

    public function boxEdit(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        $box = Box::find($request->id);

        if (!$box)
            return redirect()->route('housekeeping.site.box_manage')->with(['status' => 'error', 'message' => 'This box does not exist!']);

        return view('housekeeping.site.box.edit')->with([
            'box'   => $box
        ]);
    }

    public function boxEditSave(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'id'            => 'required',
            'title'         => 'required|string|min:1|max:125',
            'content'       => 'required',
            'requirement'   => 'required|in:guest,auth,both'
        ]);

        $box = Box::find($request->id);

        if (!$box)
            return redirect()->route('housekeeping.site.box_manage')->with('message', 'Box not found!');

        $box->update([
            'title'         => $request->title,
            'content'       => $request->content,
            'requirement'   => $request->requirement
        ]);

        create_staff_log('site.box.edit.save', $request);

        return redirect()->route('housekeeping.site.box.edit', $request->id)->with('message', 'Box updated!');
    }

    public function boxPagesManage()
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.box.pages.manage')->with([
            'boxpages'  => BoxPage::paginate(15)
        ]);
    }

    public function boxPagesCreate()
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.box.pages.create')->with([
            'boxes'     => Box::all(),
            'pages'     => $this->availablePages
        ]);
    }

    public function boxPagesCreateSave(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        BoxPage::create([
            'box_id'   => $request->box_id,
            'page'     => $request->page,
            'column'   => $request->column,
            'color'    => $request->override_color
        ]);

        create_staff_log('site.box.pages.create.save', $request);

        return redirect()->route('housekeeping.site.box.pages.manage')->with('message',  'Box Page created!');
    }

    public function boxPagesEdit(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        $box = BoxPage::find($request->id);

        if (!$box)
            return redirect()->route('housekeeping.site.box.pages.manage')->with('message',  'Box Page not found!');

        return view('housekeeping.site.box.pages.edit')->with([
            'boxes'     => Box::all(),
            'pages'     => $this->availablePages,
            'box'       => $box
        ]);
    }

    public function boxPagesSave(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');


        $box = BoxPage::find($request->id);

        if (!$box)
            return redirect()->route('housekeeping.site.box.pages.manage')->with('message',  'Box Page not found!');

        $box->update([
            'box_id'    => $request->box_id,
            'page'      => $request->page,
            'column'    => $request->column,
            'color'     => $request->override_color
        ]);

        create_staff_log('site.box.pages.save', $request);

        return redirect()->route('housekeeping.site.box.pages.edit', $box->id)->with('message',  'Box Page edited!');
    }

    public function boxPageDelete(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $box = BoxPage::find($request->id);

        if (!$box)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This box page does not exist!']);

        create_staff_log('site.box.pages.delete', $request);
        $box->delete();

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Box page deleted!']);
    }
}
