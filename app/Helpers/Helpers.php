<?php

use App\Models\BoxPage;
use App\Models\CmsSetting;
use App\Models\EmuSetting;
use Illuminate\Support\Facades\Auth;

function user()
{
    return Auth::user();
}

function cms_config($key)
{
    $setting = CmsSetting::where('key', $key)->first();
    if ($setting)
        return $setting->value;
    return "Value {$key} not found";
}

function emu_config($key)
{
    $setting = EmuSetting::where('setting', $key)->first();
    if ($setting)
        return $setting->value;
    return "Value {$key} not found";
}

function format_prices($credits, $points, $type)
{
    return trans('currency.credits.singular');
    $data = [];
    if ($credits > 0) {
        if ($credits == 1) {
            array_push($data, trans('currency.credits.singular', ['amount' => $credits]));
        } else {
            array_push($data, trans('currency.credits.plural', ['amount' => $credits]));
        }
    }

    if ($points > 0) {
        if ($points == 1) {
            array_push($data, trans("currency.points_{$type}.singular", ['amount' => $points]));
        } else {
            array_push($data, trans("currency.points_{$type}.plural", ['amount' => $points]));
        }
    }

    return json_encode($data);
}

function boxes($page, $column)
{
    $boxes = [];
    if(Auth::check())
        $boxes = BoxPage::where([['page', $page], ['column', $column], ['requirement', '!=', 'guest']])->join('cms_boxes', 'cms_boxes_pages.box_id', '=', 'cms_boxes.id')->get();
    else
        $boxes = BoxPage::where([['page', $page], ['column', $column], ['requirement', '!=', 'auth']])->join('cms_boxes', 'cms_boxes_pages.box_id', '=', 'cms_boxes.id')->get();

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
        '/\[br]/is'
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
        '<br />'
    );

    $str = htmlspecialchars($str, ENT_QUOTES);
    $str = preg_replace($simple_search, $simple_replace, $str);
    return $str;
}

function mus($key, $data = [])
{
    $command = build_mus($key, $data);
    $socket = @socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
    @socket_connect($socket, cms_config('connection.rcon.host'), cms_config('connection.rcon.port'));
    @socket_send($socket, $command, strlen($command), MSG_DONTROUTE);
    @socket_close($socket);
}

function build_mus($header, $parameters) {
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

function is_hotel_online() {
    $errNo = 0;
    $f = @fsockopen(cms_config('connection.rcon.host'), cms_config('connection.rcon.port'), $errNo, $errNo, 0.01);
    if(!$f) {
        return false;
    }
    else {
        fclose($f);
        return true;
    }


}
