<?php

namespace App\Http\Controllers\Housekeeping\Furniture;

use App\Http\Controllers\Controller;
use App\Models\Catalogue\CataloguePage;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function catalogue(Request $request)
    {
        $pages = CataloguePage::where([['name', 'LIKE', "%{$request->name}%"]])->paginate(25);
        return view('housekeeping.furniture.catalogue.pages.listing')->with('pages', $pages);
    }

    public function catalogueEdit(Request $request)
    {

        if (!user()->hasPermission('can_edit_catalogue_pages'))
            return view('housekeeping.accessdenied');

        $page = CataloguePage::find($request->id);
        if (!$page)
            return redirect()->route('housekeeping.furniture.catalogue.pages')->with('message', 'Catalogue page not found!');

        return view('housekeeping.furniture.catalogue.pages.edit')->with('page', $page);
    }

    public function catalogueSave(Request $request)
    {

        if (!user()->hasPermission('can_edit_catalogue_pages'))
            return view('housekeeping.accessdenied');

        $page = CataloguePage::find($request->id);
        if (!$page)
            return redirect()->route('housekeeping.furniture.catalogue.pages')->with('message', 'Catalogue page not found!');

        $request->validate([
            'order_id'          => 'required|numeric',
            'min_role'          => 'required|numeric',
            'index_visible'     => 'required|in:0,1',
            'is_club_only'      => 'required|in:0,1',
            'name_index'        => 'required',
            'name'              => 'required',
            'layout'            => 'required'
        ]);

        $page->update([
            'order_id'          => $request->order_id,
            'min_role'          => $request->min_role,
            'index_visible'     => $request->index_visible,
            'is_club_only'      => $request->is_club_only,
            'name_index'        => $request->name_index,
            'link_list'         => $request->link_list ?? '',
            'name'              => $request->name,
            'layout'            => $request->layout,
            'image_headline'    => $request->image_headline ?? '',
            'body'              => $request->body ?? '',
            'label_pick'        => $request->label_pick ?? '',
            'label_extra_s'     => $request->label_extra_s ?? '',
            'label_extra_t'     => $request->label_extra_t ?? '',
        ]);

        create_staff_log('furniture.catalogue.pages.save', $request);

        return redirect()->route('housekeeping.furniture.catalogue.pages.edit', $page->id)->with('message', 'Catalogue page edited successful!');
    }

    public function catalogueAdd()
    {
        if (!user()->hasPermission('can_add_catalogue_pages'))
            return view('housekeeping.accessdenied');
        return view('housekeeping.furniture.catalogue.pages.add');
    }

    public function catalogueAddSave(Request $request)
    {
        if (!user()->hasPermission('can_add_catalogue_pages'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'order_id'          => 'required|numeric',
            'min_role'          => 'required|numeric',
            'index_visible'     => 'required|in:0,1',
            'is_club_only'      => 'required|in:0,1',
            'name_index'        => 'required',
            'name'              => 'required',
            'layout'            => 'required'
        ]);

        $latestPage = CataloguePage::select('id')->orderBy('id', 'DESC')->first();
        $pageId = $latestPage->id + 1;
        CataloguePage::create([
            'id'                => $pageId,
            'order_id'          => $request->order_id,
            'min_role'          => $request->min_role,
            'index_visible'     => $request->index_visible,
            'is_club_only'      => $request->is_club_only,
            'name_index'        => $request->name_index,
            'link_list'         => $request->link_list ?? '',
            'name'              => $request->name,
            'layout'            => $request->layout,
            'image_headline'    => $request->image_headline ?? '',
            'body'              => $request->body ?? '',
            'label_pick'        => $request->label_pick ?? '',
            'label_extra_s'     => $request->label_extra_s ?? '',
            'label_extra_t'     => $request->label_extra_t ?? '',
        ]);

        create_staff_log('furniture.catalogue.pages.add', $request);

        return redirect()->route('housekeeping.furniture.catalogue.pages.edit', $pageId)->with('message', 'Catalogue page added successful!');
    }

    public function catalogueDelete(Request $request)
    {
        if (!user()->hasPermission('can_delete_catalogue_pages'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $page = CataloguePage::find($request->id);

        if (!$page)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This catalogue page does not exist!']);

        $page->delete();

        create_staff_log('furniture.catalogue.pages.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Catalogue page deleted!']);
    }
}
