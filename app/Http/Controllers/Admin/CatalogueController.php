<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue\CatalogueItem;
use App\Models\Catalogue\CataloguePage;
use App\Models\Crackable;
use App\Models\CraftingAltar;
use App\Models\CraftingIngredient;
use App\Models\CraftingRecipe;
use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;

class CatalogueController extends Controller
{
    public function index()
    {
        if (!Auth::user()->hasPermission('can_edit_catalog'))
            return view('admin.accessdenied');

        return view('admin.catalogue.index')->with([
            'catalogue' => CataloguePage::orderBy('id')->paginate(25)
        ]);
    }

    public function catalogPageEdit($id)
    {
        if (!Auth::user()->hasPermission('can_edit_catalog'))
            return view('admin.accessdenied');

        $page = CataloguePage::find($id);

        if (!$page)
            return redirect()->back();

        $layouts = [
            'default_3x3', 'badge_display', 'bots', 'club_buy', 'club_gift', 'collectibles',
            'default_3x3_color_grouping', 'frontpage', 'frontpage_featured', 'guilds', 'guild_furni',
            'guild_forum', 'info_duckets', 'info_loyalty', 'info_rentables', 'info_pets', 'loyalty_vip_buy',
            'marketplace', 'marketplace_own_items', 'recycler', 'recycler_info', 'recycler_prizes', 'recent_purchases',
            'roomads', 'room_bundle', 'single_bundle', 'sold_ltd_items', 'spaces', 'spaces_new', 'soundmachine',
            'trophies', 'pets', 'pets2', 'pets3', 'petcustomization', 'plasto', 'productpage1', 'vip_buy'
        ];

        return view('admin.catalogue.page.edit')->with([
            'page'      => $page,
            'furnis'    => CatalogueItem::where('page_id', $page->id)->count(),
            'layouts'   => $layouts
        ]);
    }

    public function catalogPageSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_catalog'))
            return view('admin.accessdenied');

        $request->validate([
            'caption' => 'required'
        ]);

        $page = CataloguePage::find($request->id);

        if (!$page) {
            //TODO: create a new page
            return redirect()->route('admin.catalogue');
        }

        $page->update($request->all());
        return redirect()->route('admin.catalogue');
    }

    public function catalogItems($id = null, Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $page = CataloguePage::find($id);
        if ($id == 'search') {
            $furnis = CatalogueItem::where('catalog_name', 'LIKE', '%' . $request->item_name . '%')->paginate(30);
            $furnis->appends(['item_name' => $request->item_name]);

        } else {
            if ($page)
                $furnis = CatalogueItem::where('page_id', $page->id)->paginate(30);
            else
                $furnis = CatalogueItem::paginate(30);
        }

        return view('admin.catalogue.page.items')->with([
            'page'      => $page,
            'furnis'    => $furnis
        ]);
    }

    public function catalogItemsEdit($id)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $item = CatalogueItem::find($id);

        if (!$item)
            return redirect()->back();

        return view('admin.catalogue.item.edit')->with([
            'item'  => $item
        ]);
    }

    public function catalogItemsSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $request->validate([
            'page_id' => 'required|numeric',
            'cost_credits' => 'required|numeric',
            'cost_points' => 'required|numeric',
            'points_type' => 'required|numeric',
            'amount' => 'required|numeric',
            'song_id' => 'required|numeric',
            'limited_stack' => 'required|numeric',
            'limited_sells' => 'required|numeric',
            'club_only' => 'required|numeric',
            'have_offer' => 'required|numeric',
            'offer_id' => 'required|numeric',
            'order_number' => 'required|numeric'
        ]);

        $item = CatalogueItem::find($request->id);
        if (!$item)
            return redirect()->back();

        $item->update($request->all());

        return redirect()->route('admin.catalogue.items', $request->page_id);
    }

    public function catalogFurniEdit($id)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $furni = Furniture::find($id);

        if (!$furni)
            return redirect()->back();

        return view('admin.catalogue.furni.edit')->with([
            'furni'  => $furni
        ]);
    }

    public function catalogFurniSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $request->validate([
            'sprite_id'                 => 'required|numeric',
            'width'                     => 'required|numeric',
            'length'                    => 'required|numeric',
            'allow_stack'               => 'required|numeric',
            'allow_walk'                => 'required|numeric',
            'allow_sit'                 => 'required|numeric',
            'allow_lay'                 => 'required|numeric',
            'allow_recycle'             => 'required|numeric',
            'allow_trade'               => 'required|numeric',
            'allow_marketplace_sell'    => 'required|numeric',
            'allow_gift'                => 'required|numeric',
            'allow_inventory_stack'     => 'required|numeric',
            'interaction_modes_count'   => 'required|numeric',
            'effect_id_male'            => 'required|numeric',
            'effect_id_female'          => 'required|numeric'
        ]);

        $item = Furniture::find($request->id);
        if (!$item)
            return redirect()->back();

        $item->update($request->all());

        return redirect()->route('admin.catalogue.furni.edit', $request->id);
    }

    public function clothing()
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        return view('admin.catalogue.furni.clothing')->with([
            'clothing' => DB::table('catalog_clothing')->get(),
            'furnis' => Furniture::where('interaction_type', 'clothing')->get()
        ]);
    }

    public function clothingFix()
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $clothingData = DB::table('catalog_clothing')->get();
        $furnis = Furniture::where('interaction_type', 'clothing')->select('item_name', 'customparams', 'name')->leftJoin('catalog_clothing', 'item_name', '=', 'name')->get();

        foreach ($furnis as $furni) {
            if ($furni->name == null) {
                DB::table('catalog_clothing')->insert([
                    'name' => $furni->item_name,
                    'setid' => $furni->customparams,
                ]);
            }
        }

        return redirect()->back()->with('message', 'Clothing furnis updated!');
    }

    public function missingFurni()
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        return view('admin.catalogue.furni.missing');
    }

    public function missingFurniChecker()
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $url = 'https://www.habbo.com/gamedata/furnidata_xml/60ee4a6063559330ac98bb908a79c596b4cd474b';
        //$url = 'http://127.0.0.1/gordon/gamedata/furni.xml';

        $handle = curl_init($url);
        curl_setopt_array(
            $handle,
            [
                CURLOPT_HTTPHEADER => ['Content-Type' => 'application/xml'],
                CURLOPT_USERAGENT => 'Mozilla/1.22 (compatible; MSIE 5.01; PalmOS 3.0) EudoraWeb 2',
                CURLOPT_RETURNTRANSFER => true,
            ]
        );
        $data = preg_replace('/[^\x{0009}\x{000a}\x{000d}\x{0020}-\x{D7FF}\x{E000}-\x{FFFD}]+/u', ' ', curl_exec($handle));
        $data = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $data);
        $data = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA | LIBXML_NOBLANKS | LIBXML_PARSEHUGE);
        $items = Furniture::select('item_name')->get();
        $furnis = [];
        foreach ($items as $item)
            array_push($furnis, $item->item_name);

        foreach ($data as $type) {
            foreach ($type as $furni) {
                $classname = $furni->attributes()->classname;
                //if (!in_array('bed_armas_two', $furnis))
                echo $classname . ' / ' . in_array('bed_armas_two', $furnis);
            }
        }
    }

    public function furniSearch(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        if (strlen($request->furni) <= 2)
            return 'Min 2 characters';

        $furnis = Furniture::where('public_name', 'LIKE', "%$request->furni%")->select('id', 'item_name', 'public_name')->get();

        return $furnis;
    }

    public function crafting()
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $altars = CraftingAltar::distinct()->get(['altar_id']);
        return view('admin.catalogue.crafting')->with('altars', $altars);
    }

    public function showRecipes($altarId)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $recipes = CraftingAltar::where('altar_id', $altarId)->get();

        return view('admin.catalogue.crafting.recipes')->with('recipes', $recipes);
    }

    public function showRecipe($recipeId)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $recipe = CraftingRecipe::find($recipeId);

        return view('admin.catalogue.crafting.recipes')->with('recipe', $recipe);
    }

    public function addCrafting($altarId)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $altar = CraftingAltar::where('altar_id', $altarId)->first();

        return view('admin.catalogue.crafting.add')->with('altar', $altar);
    }

    public function rewardSelect(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        return view('admin.catalogue.crafting.furni_select')->with('slot', $request->slot);
    }

    public function saveCrafting(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $reward = Furniture::find($request->result);


        $recipe = DB::table('crafting_recipes')->insertGetId([
            'product_name' => $reward->item_name,
            'reward'       => $reward->id,
            'enabled'      => '1',
            'achievement'  => '',
            'secret'       => '0',
            'limited'      => '0',
            'remaining'    => '0'
        ]);

        DB::table('crafting_altars_recipes')->insert([
            'altar_id' => $request->altar_id,
            'recipe_id' => $recipe
        ]);

        foreach ($request->post() as $value => $key) {
            if (strpos($value, 'ingredient_') === 0) {
                $slotId = explode('_', $value)[1];

                DB::table('crafting_recipes_ingredients')->insert([
                    'recipe_id' => $recipe,
                    'item_id' => $request['ingredient_' . $slotId],
                    'amount' => $request['amount_' . $slotId]
                ]);
            }
        }
    }

    public function crackables()
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $crackables = Crackable::orderBy('item_name')->get();
        return view('admin.catalogue.crackables')->with('crackables', $crackables);
    }

    public function crackablesAdd()
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        return view('admin.catalogue.crackables.add');
    }

    public function getCatalogByTabId(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_furni'))
            return view('admin.accessdenied');

        $tab = $request->tab;
        if (!$tab)
            return;

        return DB::table('catalog_pages')->where('parent_id', $tab)->orderBy('order_num')->paginate(20);
    }
}
