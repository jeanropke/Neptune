<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\BoxPage;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    private $availablePages = [
        'club.shop', 'community.fansites', 'community.index', 'credits.furniture.camera', 'credits.furniture.catalogue', 'credits.furniture.catalogue_1', 'credits.furniture.catalogue_2',
        'credits.furniture.catalogue_4', 'credits.furniture.decoration_examples', 'credits.furniture.ecotronfaq', 'credits.furniture.exchange', 'credits.furniture', 'credits.furniture.starterpacks',
        'credits.furniture.trading', 'footer_pages.advertise', 'footer_pages.atlas', 'footer_pages.privacy_policy', 'footer_pages.terms_and_conditions', 'footer_pages.terms_of_sale',
        'games.battleball.challenge', 'games.battleball.high_scores', 'games.battleball.how_to_play', 'games.battleball.index', 'games.dive', 'games.index', 'games.snowstorm.high_scores',
        'games.snowstorm.index', 'games.snowstorm.rules', 'games.wobblesquabble.high_scores', 'games.wobblesquabble.index', 'help.contact_us', 'help.hotel_way', 'help.index', 'hotel.groups.group_instructions',
        'hotel.groups', 'hotel.homes', 'hotel', 'hotel.navigator', 'hotel.pets', 'hotel.staff', 'hotel.trax.index', 'hotel.trax.masterclass.ambient', 'hotel.trax.masterclass.disco',
        'hotel.trax.masterclass.electronic', 'hotel.trax.masterclass.groove', 'hotel.trax.masterclass.habbo', 'hotel.trax.masterclass.hiphop', 'hotel.trax.masterclass', 'hotel.trax.masterclass.rock',
        'hotel.trax.masterclass.sfx', 'hotel.trax.store', 'hotel.welcome', 'index', 'entertainment.habbowood'
    ];

    public function boxCreate()
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.boxes.create');
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

        create_staff_log('site.boxes.create.save', $request);

        return redirect()->route('housekeeping.site.boxes.create')->with('message',  'Box created!');
    }

    public function boxManage()
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.boxes.listing')->with('boxes', Box::paginate(15));
    }

    public function boxDelete(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $box = Box::find($request->id);

        if (!$box)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This box does not exist!']);

        create_staff_log('site.boxes.delete', $request);
        $box->delete();

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Box deleted!']);
    }

    public function boxEdit(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        $box = Box::find($request->id);

        if (!$box)
            return redirect()->route('housekeeping.site.boxes')->with(['status' => 'error', 'message' => 'This box does not exist!']);

        return view('housekeeping.site.boxes.edit')->with([
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
            return redirect()->route('housekeeping.site.boxes')->with('message', 'Box not found!');

        $box->update([
            'title'         => $request->title,
            'content'       => $request->content,
            'requirement'   => $request->requirement
        ]);

        create_staff_log('site.boxes.edit.save', $request);

        return redirect()->route('housekeeping.site.boxes.edit', $request->id)->with('message', 'Box updated!');
    }

    public function boxPagesManage()
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.boxes.pages.listing')->with([
            'boxpages'  => BoxPage::paginate(15)
        ]);
    }

    public function boxPagesCreate()
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        sort($this->availablePages);

        return view('housekeeping.site.boxes.pages.create')->with([
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

        create_staff_log('site.boxes.pages.create.save', $request);

        return redirect()->route('housekeeping.site.boxes.pages')->with('message',  'Box Page created!');
    }

    public function boxPagesEdit(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.accessdenied');

        $box = BoxPage::find($request->id);

        if (!$box)
            return redirect()->route('housekeeping.site.boxes.pages')->with('message',  'Box Page not found!');

        sort($this->availablePages);

        return view('housekeeping.site.boxes.pages.edit')->with([
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

        create_staff_log('site.boxes.pages.save', $request);

        return redirect()->route('housekeeping.site.boxes.pages.edit', $box->id)->with('message',  'Box Page edited!');
    }

    public function boxPageDelete(Request $request)
    {
        if (!user()->hasPermission('can_manage_site_box'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $box = BoxPage::find($request->id);

        if (!$box)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This box page does not exist!']);

        create_staff_log('site.boxes.pages.delete', $request);
        $box->delete();

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Box page deleted!']);
    }
}
