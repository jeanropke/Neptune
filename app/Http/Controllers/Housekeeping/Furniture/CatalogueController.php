<?php

namespace App\Http\Controllers\Housekeeping\Furniture;

use App\Http\Controllers\Controller;
use App\Models\Catalogue\Item;
use App\Models\Catalogue\Package;
use App\Models\Catalogue\Page;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    //
    // Catalogue pages stuffs
    //
    public function catalogue(Request $request)
    {
        abort_unless_permission('can_edit_catalogue_pages');

        $pages = Page::with('items')->where([['name', 'LIKE', "%{$request->name}%"]])->paginate(25);
        return view('housekeeping.furniture.catalogue.pages.listing')->with('pages', $pages);
    }

    public function catalogueEdit(Request $request)
    {
        abort_unless_permission('can_edit_catalogue_pages');

        $page = Page::find($request->id);
        if (!$page)
            return redirect()->route('housekeeping.furniture.catalogue.pages')->with('message', 'Catalogue page not found!');

        return view('housekeeping.furniture.catalogue.pages.edit')->with('page', $page);
    }

    public function catalogueSave(Request $request)
    {
        abort_unless_permission('can_edit_catalogue_pages');

        $page = Page::find($request->id);
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
            'image_teasers'     => $request->image_teasers ?? '',
            'label_pick'        => $request->label_pick ?? '',
            'label_extra_s'     => $request->label_extra_s ?? '',
            'label_extra_t'     => $request->label_extra_t ?? '',
        ]);

        create_staff_log('furniture.catalogue.pages.save', $request);

        return redirect()->route('housekeeping.furniture.catalogue.pages.edit', $page->id)->with('message', 'Catalogue page edited!');
    }

    public function catalogueAdd()
    {
        abort_unless_permission('can_edit_catalogue_pages');

        return view('housekeeping.furniture.catalogue.pages.add');
    }

    public function catalogueAddSave(Request $request)
    {
        abort_unless_permission('can_edit_catalogue_pages');

        $request->validate([
            'order_id'          => 'required|numeric',
            'min_role'          => 'required|numeric',
            'index_visible'     => 'required|in:0,1',
            'is_club_only'      => 'required|in:0,1',
            'name_index'        => 'required',
            'name'              => 'required',
            'layout'            => 'required'
        ]);

        $latestPage = Page::select('id')->orderBy('id', 'DESC')->first();
        $pageId = $latestPage->id + 1;
        Page::create([
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
            'image_teasers'     => $request->image_teasers ?? '',
            'label_pick'        => $request->label_pick ?? '',
            'label_extra_s'     => $request->label_extra_s ?? '',
            'label_extra_t'     => $request->label_extra_t ?? '',
        ]);

        create_staff_log('furniture.catalogue.pages.add', $request);

        return redirect()->route('housekeeping.furniture.catalogue.pages.edit', $pageId)->with('message', 'Catalogue page added!');
    }

    public function catalogueDelete(Request $request)
    {
        if (!user()->hasPermission('can_delete_catalogue_pages'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $page = Page::find($request->id);

        if (!$page)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This catalogue page does not exist!']);

        $page->delete();

        create_staff_log('furniture.catalogue.pages.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Catalogue page deleted!']);
    }

    //
    // Catalogue Items stuffs
    //
    public function catalogueItems(Request $request)
    {
        abort_unless_permission('can_edit_catalogue_items');

        if ($request->page_id) {
            $items = Item::where('page_id', $request->page_id)->with('package')->paginate(25);
            return view('housekeeping.furniture.catalogue.items.listing')->with('items', $items);
        }

        $items = Item::where([['sale_code', 'LIKE', "%{$request->value}%"]])->orWhere([['package_name', 'LIKE', "%{$request->value}%"]])->orWhere([['name', 'LIKE', "%{$request->value}%"]])->with('package')->paginate(25);
        return view('housekeeping.furniture.catalogue.items.listing')->with('items', $items);
    }

    public function catalogueItemsEdit(Request $request)
    {
        abort_unless_permission('can_edit_catalogue_items');

        $item = Item::find($request->id);
        if (!$item)
            return redirect()->route('housekeeping.furniture.catalogue.items')->with('message', 'Catalogue item not found!');

        return view('housekeeping.furniture.catalogue.items.edit')->with('item', $item);
    }

    public function catalogueItemsSave(Request $request)
    {
        abort_unless_permission('can_edit_catalogue_items');

        $item = Item::find($request->id);
        if (!$item)
            return redirect()->route('housekeeping.furniture.catalogue.items')->with('message', 'Catalogue item not found!');

        $request->validate([
            'page_id'           => 'required',
            'order_id'          => 'required|numeric',
            'sale_code'         => 'required',
            'price'             => 'required|numeric',
            'is_hidden'         => 'required|in:0,1',
            'amount'            => 'required|numeric'
        ]);

        $item->update([
            'page_id'               => $request->page_id,
            'order_id'              => $request->order_id,
            'sale_code'             => $request->sale_code,
            'price'                 => $request->price,
            'is_hidden'             => $request->is_hidden,
            'amount'                => $request->amount,
            'definition_id'         => $request->definition_id ?? 0,
            'item_specialspriteid'  => $request->item_specialspriteid ?? 0,
            'name'                  => $request->name ?? '',
            'description'           => $request->description ?? '',
            'is_package'            => $request->is_package ?? '',
            'package_name'          => $request->package_name,
            'package_description'   => $request->package_description,
        ]);

        create_staff_log('furniture.catalogue.items.save', $request);

        return redirect()->route('housekeeping.furniture.catalogue.items.edit', $item->id)->with('message', 'Catalogue item edited!');
    }

    public function catalogueItemsAdd()
    {
        abort_unless_permission('can_edit_catalogue_items');

        return view('housekeeping.furniture.catalogue.items.add');
    }

    public function catalogueItemsAddSave(Request $request)
    {
        if (!user()->hasPermission('can_add_catalogue_items'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $request->validate([
            'page_id'               => 'required',
            'order_id'              => 'required|numeric',
            'sale_code'             => 'required',
            'price'                 => 'required|numeric',
            'is_hidden'             => 'required|in:0,1',
            'amount'                => 'required|numeric',
            'is_package'            => 'required|in:0,1',
        ]);

        $item = Item::create([
            'page_id'               => $request->page_id,
            'order_id'              => $request->order_id,
            'sale_code'             => $request->sale_code,
            'price'                 => $request->price,
            'is_hidden'             => $request->is_hidden,
            'amount'                => $request->amount,
            'definition_id'         => $request->definition_id ?? '0',
            'item_specialspriteid'  => $request->item_specialspriteid ?? '0',
            'name'                  => $request->name ?? '',
            'description'           => $request->description ?? '',
            'is_package'            => $request->is_package,
            'package_name'          => $request->package_name ?? '',
            'package_description'   => $request->package_description ?? '',
        ]);

        create_staff_log('furniture.catalogue.items.add', $request);

        return redirect()->route('housekeeping.furniture.catalogue.items.edit', $item->id)->with('message', 'Catalogue item added!');
    }

    public function catalogueItemsDelete(Request $request)
    {
        if (!user()->hasPermission('can_delete_catalogue_items'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $item = Item::find($request->id);

        if (!$item)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This catalogue item does not exist!']);

        $item->delete();

        create_staff_log('furniture.catalogue.items.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Catalogue item deleted!']);
    }

    //
    // Catalogue Package stuffs
    //
    public function cataloguePackages(Request $request)
    {
        abort_unless_permission('can_edit_catalogue_items');

        $packages = Package::where([['salecode', 'LIKE', "%{$request->value}%"]])->paginate(25);
        return view('housekeeping.furniture.catalogue.packages.listing')->with('packages', $packages);
    }

    public function cataloguePackagesEdit(Request $request)
    {
        abort_unless_permission('can_edit_catalogue_items');

        $package = Package::find($request->id);
        if (!$package)
            return redirect()->route('housekeeping.furniture.catalogue.packages')->with('message', 'Catalogue package not found!');

        return view('housekeeping.furniture.catalogue.packages.edit')->with('package', $package);
    }

    public function cataloguePackagesSave(Request $request)
    {
        abort_unless_permission('can_edit_catalogue_items');

        $package = Package::find($request->id);
        if (!$package)
            return redirect()->route('housekeeping.furniture.catalogue.packages')->with('message', 'Catalogue package not found!');

        $request->validate([
            'salecode'      => 'required',
            'definition_id' => 'required|numeric',
            'amount'        => 'required|numeric'
        ]);

        $package->update([
            'salecode'          => $request->salecode,
            'definition_id'     => $request->definition_id ?? 0,
            'special_sprite_id' => $request->special_sprite_id ?? 0,
            'amount'            => $request->amount
        ]);

        create_staff_log('furniture.catalogue.packages.save', $request);

        return redirect()->route('housekeeping.furniture.catalogue.packages.edit', $package->id)->with('message', 'Catalogue package edited!');
    }

    public function cataloguePackagesAdd()
    {
        abort_unless_permission('can_edit_catalogue_items');

        return view('housekeeping.furniture.catalogue.packages.add');
    }

    public function cataloguePackagesAddSave(Request $request)
    {
        if (!user()->hasPermission('can_add_catalogue_items'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $request->validate([
            'salecode'      => 'required',
            'definition_id' => 'required|numeric',
            'amount'        => 'required'
        ]);

        $package = Package::create([
            'salecode'          => $request->salecode,
            'definition_id'     => $request->definition_id ?? 0,
            'special_sprite_id' => $request->special_sprite_id ?? 0,
            'amount'            => $request->amount
        ]);

        create_staff_log('furniture.catalogue.package.add', $request);

        return redirect()->route('housekeeping.furniture.catalogue.packages.edit', $package->id)->with('message', 'Catalogue package added!');
    }

    public function cataloguePackagesDelete(Request $request)
    {
        if (!user()->hasPermission('can_delete_catalogue_items'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $package = Package::find($request->id);

        if (!$package)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This catalogue package does not exist!']);

        $package->delete();

        create_staff_log('furniture.catalogue.package.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Catalogue package deleted!']);
    }
}
