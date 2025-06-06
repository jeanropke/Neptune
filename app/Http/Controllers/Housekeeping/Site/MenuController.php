<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use App\Models\CmsMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    public function menuCategoriesListing(Request $request)
    {
        $categories = CmsMenu::where([['parent_id', '=', '-1'], ['caption', 'LIKE', "%{$request->caption}%"]])->paginate(25);

        return view('housekeeping.site.menu.categories.listing')->with('categories', $categories);
    }

    public function menuCategoriesEdit(Request $request)
    {
        if (!user()->hasPermission('can_edit_website_menu'))
            return view('housekeeping.accessdenied');

        $category = CmsMenu::find($request->id);
        if (!$category)
            return redirect()->route('housekeeping.site.menu.categories.listing')->with('message',  'Category not found!');

        create_staff_log('site.menus.categories.edit', $request);

        return view('housekeeping.site.menu.categories.edit')->with([
            'category'  => $category,
            'icons'     => array_map(fn($file) => basename($file, '.gif'), File::files('web/images/navi_icons'))
        ]);
    }

    public function menuCategoriesSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_website_menu'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'caption'   => 'required',
            'icon'      => 'required',
            'order_num' => 'required|numeric',
            'min_rank'  => 'required|numeric'
        ]);

        $category = CmsMenu::find($request->id);
        if (!$category)
            return redirect()->route('housekeeping.site.menu.categories.listing')->with('message',  'Category not found!');

        create_staff_log('site.menus.categories.save', $request);

        $category->update([
            'caption'   => $request->caption,
            'url'       => $request->url ?? '',
            'icon'      => $request->icon,
            'order_num' => $request->order_num,
            'min_rank'  => $request->min_rank
        ]);

        return redirect()->route('housekeeping.site.menu.categories.edit', $category->id)->with('message',  'Category edited!');
    }

    public function menuCategoriesCreate()
    {
        if (!user()->hasPermission('can_edit_website_menu'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.menu.categories.create')->with('icons', array_map(fn($file) => basename($file, '.gif'), File::files('web/images/navi_icons')));
    }

    public function menuCategoriesCreateSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_website_menu'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'caption'   => 'required',
            'icon'      => 'required',
            'order_num' => 'required|numeric',
            'min_rank'  => 'required|numeric'
        ]);

        $menu = CmsMenu::create([
            'caption'   => $request->caption,
            'url'       => $request->url ?? '',
            'icon'      => $request->icon,
            'order_num' => $request->order_num,
            'min_rank'  => $request->min_rank
        ]);

        create_staff_log('site.menus.categories.save', $request);

        return redirect()->route('housekeeping.site.menu.categories.edit', $menu->id)->with('message',  'Category added!');
    }

    public function menuCategoriesDelete(Request $request)
    {
        if (!user()->hasPermission('can_edit_website_menu'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $category = CmsMenu::find($request->id);

        if (!$category)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This category does not exist!']);

        $category->delete();

        create_staff_log('site.menus.categories.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Category deleted!']);
    }

    // Subcategories
    public function menuSubcategoriesListing(Request $request)
    {
        if (isset($request->parent_id)) {
            $subcategories = CmsMenu::where([['parent_id', '=', $request->parent_id], ['caption', 'LIKE', "%{$request->caption}%"]])->paginate(25);
            return view('housekeeping.site.menu.subcategories.listing')->with('subcategories', $subcategories);
        }

        $subcategories = CmsMenu::where([['parent_id', '>', '0'], ['caption', 'LIKE', "%{$request->caption}%"]])->paginate(25);
        return view('housekeeping.site.menu.subcategories.listing')->with('subcategories', $subcategories);
    }


    public function menuSubcategoriesEdit(Request $request)
    {
        if (!user()->hasPermission('can_edit_website_menu'))
            return view('housekeeping.accessdenied');

        $subcategory = CmsMenu::find($request->id);
        if (!$subcategory && $subcategory->parent_id < 0)
            return redirect()->route('housekeeping.site.menu.categories.listing')->with('message',  'Sub category not found!');

        create_staff_log('site.menus.subcategories.edit', $request);

        return view('housekeeping.site.menu.subcategories.edit')->with([
            'categories'    => CmsMenu::where('parent_id', -1)->get(),
            'subcategory'   => $subcategory,
            'icons'         => array_map(fn($file) => basename($file, '.gif'), File::files('web/images/navi_icons'))
        ]);
    }

    public function menuSubcategoriesSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_website_menu'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'caption'   => 'required',
            'parent_id' => 'required|exists:cms_menu,id',
            'order_num' => 'required|numeric',
            'min_rank'  => 'required|numeric'
        ]);

        $subcategory = CmsMenu::find($request->id);
        if (!$subcategory && $subcategory->parent_id < 0)
            return redirect()->route('housekeeping.site.menu.subcategories.listing')->with('message',  'Sub category not found!');

        $subcategory->update([
            'caption'   => $request->caption,
            'url'       => $request->url ?? '',
            'parent_id' => $request->parent_id,
            'order_num' => $request->order_num,
            'min_rank'  => $request->min_rank
        ]);

        create_staff_log('site.menus.subcategories.save', $request);

        return redirect()->route('housekeeping.site.menu.subcategories.edit', $subcategory->id)->with('message',  'Sub category edited!');
    }

    public function menuSubcategoriesCreate()
    {
        if (!user()->hasPermission('can_edit_website_menu'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.site.menu.subcategories.create')->with('categories', CmsMenu::where('parent_id', -1)->get());
    }

    public function menuSubcategoriesCreateSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_website_menu'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'caption'   => 'required',
            'parent_id' => 'required|exists:cms_menu,id',
            'order_num' => 'required|numeric',
            'min_rank'  => 'required|numeric'
        ]);

        $subcategory = CmsMenu::create([
            'caption'   => $request->caption,
            'url'       => $request->url ?? '',
            'parent_id' => $request->parent_id,
            'order_num' => $request->order_num,
            'min_rank'  => $request->min_rank
        ]);

        create_staff_log('site.menus.subcategories.create', $request);

        return redirect()->route('housekeeping.site.menu.subcategories.edit', $subcategory->id)->with('message',  'Sub category added!');
    }

    public function menuSubcategoriesDelete(Request $request)
    {
        if (!user()->hasPermission('can_edit_website_menu'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $category = CmsMenu::find($request->id);

        if (!$category)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This sub category does not exist!']);

        $category->delete();

        create_staff_log('site.menus.subcategories.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Sub category deleted!']);
    }
}
