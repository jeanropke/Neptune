<?php

use App\Models\Catalogue\Item;
use App\Models\EmuSetting;
use App\Models\Neptune\BoxPage;
use App\Models\Neptune\Menu;
use App\Models\Neptune\Partner;
use App\Models\Neptune\Setting;
use App\Models\Staff\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

function abort_unless_permission(string $permission, $response = null)
{
    if (!user()->hasPermission($permission)) {
        if ($response) {
            response()->view($response)->send();
            exit;
        }
        abort(response()->view('housekeeping.accessdenied', [], 403));
    }
}

function user()
{
    return Auth::user();
}

function cms_config($key)
{
    $setting = Setting::where('key', $key)->first();
    if ($setting)
        return $setting->value;
    return "Value {$key} not found";
}

function set_cms_config($key, $value)
{
    $setting = Setting::where('key', $key)->first();
    if (!$setting) return;
    $setting->update(['value' => $value]);
}

function emu_config($key)
{
    $setting = EmuSetting::where('setting', $key)->first();
    if ($setting)
        return $setting->value;
    return "Value {$key} not found";
}

function set_emu_config($key, $value)
{
    $setting = EmuSetting::where('setting', $key)->first();
    if (!$setting) return;
    $setting->update(['value' => $value]);
}

function get_partners()
{
    return Partner::where('enabled', '1')->orderBy('order_num')->get();
}

function carbon_format($date, $format = 'd/m/Y')
{
    return Carbon::parse($date)->format($format);
}

function get_cata_item($sale)
{
    $cata =  Item::where('sale_code', $sale)->first();
    if ($cata)
        return $cata->name;
}

function boxes($page, $column)
{
    $boxes = [];
    if (Auth::check())
        $boxes = BoxPage::where([['page', $page], ['column', $column], ['requirement', '!=', 'guest']])->join('cms_boxes', 'cms_boxes_pages.box_id', '=', 'cms_boxes.id')->get();
    else
        $boxes = BoxPage::where([['page', $page], ['column', $column], ['requirement', '!=', 'auth']])->join('cms_boxes', 'cms_boxes_pages.box_id', '=', 'cms_boxes.id')->get();

    $search = array(
        '/%username%/',
        '/%url%/',
        '/%badges%/',
        '/%groupbadge%/',
        '/%c_images%/'
    );
    $replace = array(
        user() ? user()->username : '',
        url('/'),
        cms_config('site.badges.url'),
        cms_config('site.groupbadge.url'),
        cms_config('site.c_images.url')
    );

    foreach ($boxes as $box) {
        $box->content = Blade::render(preg_replace($search, $replace, $box->content));
    }

    return $boxes;
}

function bb_format($str)
{
    $simple_search = array(
        '/\[b\](.*?)\[\/b\]/is',
        '/\[i\](.*?)\[\/i\]/is',
        '/\[u\](.*?)\[\/u\]/is',
        '/\[s\](.*?)\[\/s\]/is',
        '/\[quote\](.*?)\[\/quote\]/is',
        '/\[link\=(.*?)\](.*?)\[\/link\]/is',
        '/\[url\=(.*?)\](.*?)\[\/url\]/is',
        '/\[color\=(.*?)\](.*?)\[\/color\]/is',
        '/\[size=small\](.*?)\[\/size\]/is',
        '/\[size=large\](.*?)\[\/size\]/is',
        '/\[code\](.*?)\[\/code\]/is',
        '/\[habbo\=(.*?)\](.*?)\[\/habbo\]/is',
        '/\[room\=(.*?)\](.*?)\[\/room\]/is',
        '/\[group\=(.*?)\](.*?)\[\/group\]/is',
        '/\[br]/is',
        '/\\n/is'
    );

    $simple_replace = array(
        '<strong>$1</strong>',
        '<em>$1</em>',
        '<u>$1</u>',
        '<s>$1</s>',
        "<div class='bbcode-quote'>$1</div>",
        "<a href='$1'>$2</a>",
        "<a href='$1'>$2</a>",
        "<font color='$1'>$2</font>",
        "<font size='1'>$1</font>",
        "<font size='3'>$1</font>",
        '<pre>$1</pre>',
        "<a href='" . url('/') . "/home/$1/id'>$2</a>",
        "<a onclick=\"roomForward(this, '$1', 'private'); return false;\" target=\"client\" href=\"" . url('/') . "/client?forwardId=2&roomId=$1\">$2</a>",
        "<a href='" . url('/') . "/group/$1/id'>$2</a>",
        '<br />',
        '<br />'
    );

    $str = htmlspecialchars($str, ENT_QUOTES);
    $str = preg_replace($simple_search, $simple_replace, $str);
    return $str;
}

function is_hotel_online()
{
    $errNo = 0;
    $f = @fsockopen(cms_config('connection.rcon.host'), cms_config('connection.rcon.port'), $errNo, $errNo, 0.01);
    if (!$f) {
        return false;
    } else {
        fclose($f);
        return true;
    }
}

function create_staff_log($page, $request)
{
    unset($request['_token']);
    $message = json_encode($request->post());
    Log::create([
        'user_id'       => user()->id,
        'page'          => $page,
        'message'       => $message,
        'ip_address'    => request()->ip()
    ]);
}

function cms_menu($parent = -1)
{
    return Menu::where([['parent_id', $parent], ['min_rank', '<=', Auth::check() ? user()->rank : 1]])->orderBy('order_num', 'ASC')->get();
}

function rcon($key, $data = [])
{
    $command = build_rcon($key, $data);
    $socket = @socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
    @socket_connect($socket, cms_config('connection.rcon.host'), cms_config('connection.rcon.port'));
    @socket_send($socket, $command, strlen($command), MSG_DONTROUTE);
    @socket_close($socket);
}

function build_rcon($header, $parameters)
{
    $message = "";
    $message .= pack('N', strlen($header));
    $message .= $header;
    $message .= pack('N', count($parameters));

    foreach ($parameters as $key => $value) {
        $message .= pack('N', strlen($key));
        $message .= $key;

        $message .= pack('N', strlen($value));
        $message .= $value;
    }

    $buffer = "";
    $buffer .= pack('N', strlen($message));
    $buffer .= $message;
    return $buffer;
}
