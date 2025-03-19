<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Hotel;
use App\Http\Controllers\Controller;
use App\Models\CmsSetting;
use App\Models\CmsTextOverride;
use App\Models\EmulatorSetting;
use App\Models\StaffLog;
use App\Models\WordFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServerController extends Controller
{
    public function index()
    {
        if (!Auth::user()->hasPermission('can_edit_server_settings'))
            return view('admin.accessdenied');

        $settings = [
            'client.ip'     => CmsSetting::where('key', 'client.emulator.ip')->first()->value,
            'client.port'   => CmsSetting::where('key', 'client.emulator.port')->first()->value,
            'mus.ip'        => CmsSetting::where('key', 'mus.emulator.ip')->first()->value,
            'mus.port'      => CmsSetting::where('key', 'mus.emulator.port')->first()->value,
            'hotel.trading' => EmulatorSetting::where('key', 'hotel.trading.enabled')->first()->value
        ];

        return view('admin.server.index')->with([
            'settings'  => $settings
        ]);
    }

    public function serverSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_server_settings'))
            return view('admin.accessdenied');

        CmsSetting::where('key', 'client.emulator.ip')->first()->update(['value' => $request->client_ip]);
        CmsSetting::where('key', 'client.emulator.port')->first()->update(['value' => $request->client_port]);
        CmsSetting::where('key', 'mus.emulator.ip')->first()->update(['value' => $request->mus_ip]);
        CmsSetting::where('key', 'mus.emulator.port')->first()->update(['value' => $request->mus_port]);
        EmulatorSetting::where('key', 'hotel.trading.enabled')->first()->update(['value' => $request->trading_enable]);

        unset($request['_token']);
        $message = Auth::user()->username . ' changed \'server\' values to ' . json_encode($request->post());
        StaffLog::createLog('server', $message);

        return redirect()->route('admin.server')->with('message',  'Server settings updated!');
    }

    public function serverStartup()
    {
        return view('admin.server.startup')->with('isOnline', Hotel::sendRconMessage('teststatus'));
    }

    public function serverStartupInit()
    {
        if (!Hotel::sendRconMessage('teststatus')) {
            $locale = 'en_US.UTF-8';
            setlocale(LC_ALL, $locale);
            putenv('LC_ALL=' . $locale);
            shell_exec('sh /var/www/habbo/_server/_start.sh');
        }

        return redirect()->route('admin.server.startup')->with('message',  'Server initializing. Please wait.');
    }

    public function wordfilter($word = null)
    {
        if (!Auth::user()->hasPermission('can_edit_server_wordfilter'))
            return view('admin.accessdenied');

        $settings = [
            'wordfilter.enabled'        => EmulatorSetting::getSetting('hotel.wordfilter.enabled'),
            'wordfilter.replacement'    => EmulatorSetting::getSetting('hotel.wordfilter.replacement')
        ];
        return view('admin.server.wordfilter')->with([
            'settings'  => $settings,
            'words'     => WordFilter::paginate(20),
            'word'      => WordFilter::find($word)
        ]);
    }

    public function wordfilterSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_server_wordfilter'))
            return view('admin.accessdenied');

        EmulatorSetting::where('key', 'hotel.wordfilter.enabled')->first()->update(['value' => $request->wordfilter_enable]);
        EmulatorSetting::where('key', 'hotel.wordfilter.replacement')->first()->update(['value' => $request->wordfilter_censor]);

        unset($request['_token']);
        $message = Auth::user()->username . ' changed \'wordfilter\' values to ' . json_encode($request->post());
        StaffLog::createLog('wordfilter', $message);

        return redirect()->route('admin.server.wordfilter')->with('message',  'Wordfilter settings updated!');
    }

    public function wordfilterEditSave($key, Request $request)
    {
        if (!Auth::user()->hasPermission('can_add_server_wordfilter'))
            return view('admin.accessdenied');

        $word = WordFilter::find($key);

        $word->update([
            'key'           => $request->key,
            'replacement'   => $request->replacement,
            'hide'          => $request->hide,
            'report'        => $request->report,
            'mute'          => $request->mute
        ]);

        unset($request['_token']);
        $message = Auth::user()->username . ' changed \'word\' values to ' . json_encode($request->post());
        StaffLog::createLog('wordfilter', $message);

        return redirect()->route('admin.server.wordfilter', $request->key)->with('message',  'Word updated!');
    }

    public function wordfilterDelete($word)
    {
        if (!Auth::user()->hasPermission('can_add_server_wordfilter'))
            return view('admin.accessdenied');

        WordFilter::find($word)->delete();

        $message = Auth::user()->username . ' deleted word \'' . $word . '\'';
        StaffLog::createLog('wordfilter', $message);

        return redirect()->route('admin.server.wordfilter', false)->with('message',  'Word deleted!');
    }

    public function wordfilterAdd()
    {
        if (!Auth::user()->hasPermission('can_add_server_wordfilter'))
            return view('admin.accessdenied');

        return view('admin.server.wordfilter_add');
    }

    public function wordfilterCreate(Request $request)
    {
        if (!Auth::user()->hasPermission('can_add_server_wordfilter'))
            return view('admin.accessdenied');


        $request->validate([
            'key'           => 'required|max:256',
            'replacement'   => 'required|max:16'
        ]);


        WordFilter::create([
            'key'           => $request->key,
            'replacement'   => $request->replacement,
            'hide'          => $request->hide,
            'report'        => $request->report,
            'mute'          => $request->mute
        ]);

        $message = Auth::user()->username . ' added word \'' . $request->key . '\'';
        StaffLog::createLog('wordfilter', $message);

        return redirect()->route('admin.server.wordfilter', false)->with('message',  'Word added!');
    }

    public function welcomemsg()
    {
        if (!Auth::user()->hasPermission('can_edit_server_welcomemsg'))
            return view('admin.accessdenied');

        $settings = [
            'motd.enabled'  => EmulatorSetting::getSetting('hotel.welcome.alert.enabled'),
            'motd.message'  => EmulatorSetting::getSetting('hotel.welcome.alert.message')
        ];
        return view('admin.server.welcomemsg')->with([
            'settings' => $settings
        ]);
    }

    public function welcomemsgSave(Request $request)
    {
        if (!Auth::user()->hasPermission('can_edit_server_welcomemsg'))
            return view('admin.accessdenied');

        EmulatorSetting::where('key', 'hotel.welcome.alert.enabled')->first()->update(['value' => $request->motd_enabled]);
        EmulatorSetting::where('key', 'hotel.welcome.alert.message')->first()->update(['value' => $request->motd_message]);

        unset($request['_token']);
        $message = Auth::user()->username . ' changed \'welcomemsg\' values to ' . json_encode($request->post());
        StaffLog::createLog('welcomemsg', $message);

        return redirect()->route('admin.server.welcomemsg')->with('message',  'Welcome message settings updated!');
    }

    public function furnidata()
    {
        if (!Auth::user()->hasPermission('can_generate_furnidata'))
            return view('admin.accessdenied');

        return view('admin.server.furnidata');
    }

    public function furnidataGenerate(Request $request)
    {
        if (!Auth::user()->hasPermission('can_generate_furnidata'))
            return view('admin.accessdenied');

        $onlyStaff = $request->furnidata_type == '1';

        $items = DB::table('items_base')
            ->rightJoin('catalog_items', 'items_base.id', '=', 'catalog_items.item_ids')
            ->join('catalog_pages', 'catalog_items.page_id', '=', 'catalog_pages.id')
            ->select(
                [
                    'items_base.id', 'item_name', 'width', 'length', 'color', 'public_name', 'description', 'customparams',
                    'specialtype', 'furniline', 'min_rank', 'allow_walk', 'allow_sit', 'allow_lay', 'type'
                ]
            )->get();


        $floorItems = [];
        $wallItems = [];
        foreach ($items as $item) {
            $offerId = ($item->min_rank > 1 && !$onlyStaff) ? -1 : $item->id;
            $buyOut = $offerId > 1 ?: 0;

            $item->description = str_replace(array("\r", "\n"), '', $item->description);

            if (!empty($item->color)) {
                $color = str_replace(',', '</color><color>', $item->color);
                $item->color = "<color>{$color}</color>";
            }
            if ($item->type == 's') {
                $floor = "<furnitype id=\"{$item->id}\" classname=\"{$item->item_name}\"><revision></revision><defaultdir>0</defaultdir><xdim>{$item->width}</xdim><ydim>{$item->length}</ydim><partcolors>{$item->color}</partcolors><name>{$item->public_name}</name><description>{$item->description}</description><adurl></adurl><offerid>{$offerId}</offerid><buyout>{$buyOut}</buyout><rentofferid>-1</rentofferid><rentbuyout>0</rentbuyout><bc>1</bc><excludeddynamic>0</excludeddynamic><customparams>{$item->customparams}</customparams><specialtype>{$item->specialtype}</specialtype><canstandon>{$item->allow_walk}</canstandon><cansiton>{$item->allow_sit}</cansiton><canlayon>{$item->allow_lay}</canlayon><furniline>{$item->furniline}</furniline></furnitype>";
                array_push($floorItems, $floor);
            } else if ($item->type == 'i') {
                $wall = "<furnitype id=\"{$item->id}\" classname=\"{$item->item_name}\"><revision></revision><name>{$item->public_name}</name><description>{$item->description}</description><adurl></adurl><offerid>{$offerId}</offerid><buyout>{$buyOut}</buyout><rentofferid>-1</rentofferid><rentbuyout>0</rentbuyout><bc>1</bc><excludeddynamic>0</excludeddynamic><specialtype>{$item->specialtype}</specialtype><furniline>{$item->furniline}</furniline></furnitype>";
                array_push($wallItems, $wall);
            }
        }
        $floorItems = implode('', $floorItems);
        $wallItems = implode('', $wallItems);

        $fullfile = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<furnidata>\n<roomitemtypes>{$floorItems}</roomitemtypes>\n<wallitemtypes>{$wallItems}</wallitemtypes>\n</furnidata>";

        if ($onlyStaff)
            Storage::disk('gordon')->put("gamedata/furnidata_staff.xml", $fullfile);
        else
            Storage::disk('gordon')->put("gamedata/furnidata.xml", $fullfile);

        $message = Auth::user()->username . ' generated furnidata';
        StaffLog::createLog('furnidata', $message);

        CmsSetting::find('client.cache.override')->increment('value');

        return redirect()->route('admin.server.furnidata')->with('message', 'Furnidata generated!');
    }

    public function productdata()
    {
        if (!Auth::user()->hasPermission('can_generate_furnidata'))
            return view('admin.accessdenied');

        return view('admin.server.productdata');
    }

    public function productdataGenerate()
    {
        if (!Auth::user()->hasPermission('can_generate_furnidata'))
            return view('admin.accessdenied');

        $items = DB::table('items_base')->select(['item_name', 'public_name', 'description'])->get();


        $fullfile = '';

        foreach ($items as $item) {
            $item->public_name = str_replace(array("\r", "\n"), '', $item->public_name);
            $item->description = str_replace(array("\r", "\n"), '', $item->description);
            $fullfile .= "[\"$item->item_name\",\"$item->public_name\",\"$item->description\"],";
        }
        $fullfile = substr($fullfile, 0, -1);

        Storage::disk('gordon')->put("gamedata/productdata.txt", $fullfile);

        $message = Auth::user()->username . ' generated productdata';
        StaffLog::createLog('productdata', $message);

        CmsSetting::find('client.cache.override')->increment('value');

        return redirect()->route('admin.server.productdata')->with('message', 'Productdata generated!');
    }

    public function textsOverride($id = null)
    {
        if (!Auth::user()->hasPermission('can_generate_texts'))
            return view('admin.accessdenied');

        return view('admin.server.texts')->with([
            'texts' => CmsTextOverride::paginate(20),
            'edit'  => CmsTextOverride::find($id)
        ]);
    }

    public function textsAdd(Request $request)
    {
        if (!Auth::user()->hasPermission('can_generate_texts'))
            return view('admin.accessdenied');

        $request->validate([
            'new_text_key'   => 'min:3|max:125|required',
            'new_text_value' => 'min:3|required',
        ]);


        CmsTextOverride::updateOrCreate(
            ['key'   => $request->new_text_key],
            ['value' => $request->new_text_value]
        );

        unset($request['_token']);
        $message = Auth::user()->username . ' added a new text value: ' . json_encode($request->post());
        StaffLog::createLog('textsAdd', $message);

        return redirect()->route('admin.server.texts')->with('message', 'Text added!');
    }

    public function textsDelete(Request $request)
    {
        if (!Auth::user()->hasPermission('can_generate_texts'))
            return view('admin.accessdenied');

        $text = CmsTextOverride::find($request->id);
        if (!$text)
            return redirect()->back()->with('message', 'Text not found!');

        unset($request['_token']);
        $message = Auth::user()->username . ' deleted a text value: ' . json_encode($text);
        StaffLog::createLog('textsDelete', $message);

        $text->delete();

        return redirect()->back()->with('message', 'Text deleted!');
    }

    public function textsGenerate(Request $request)
    {
        if (!Auth::user()->hasPermission('can_generate_texts'))
            return view('admin.accessdenied');

        $file = [];
        foreach (CmsTextOverride::get() as $item) {
            array_push($file, "{$item->key}={$item->value}\r\n");
        }

        $file = implode('', $file);
        Storage::disk('gordon')->put("gamedata/override/external_flash_override_texts.txt", $file);

        $message = Auth::user()->username . ' generated texts';
        StaffLog::createLog('textsGenerate', $message);

        CmsSetting::find('client.cache.override')->increment('value');

        return redirect()->back()->with('message', 'Texts generated!');
    }
}
