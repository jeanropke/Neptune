<?php

namespace App\Http\Controllers\Housekeeping\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServerGeneralController extends Controller
{
    public function index()
    {
        if (!user()->hasPermission('can_edit_server_settings'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.server.index');
    }

    public function serverSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_server_settings'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'connection_info_host'  => 'required',
            'connection_info_port'  => 'required',
            'connection_mus_host'  => 'required',
            'connection_mus_port'  => 'required',
            'connection_rcon_host'  => 'required',
            'connection_rcon_port'  => 'required'
        ]);

        set_cms_config('connection.info.host', $request->connection_info_host);
        set_cms_config('connection.info.port', $request->connection_info_port);
        set_cms_config('connection.mus.host', $request->connection_mus_host);
        set_cms_config('connection.mus.port', $request->connection_mus_port);
        set_cms_config('connection.rcon.host', $request->connection_rcon_host);
        set_cms_config('connection.rcon.port', $request->connection_rcon_port);

        ucreate_staff_log('server.general.save', $request);

        return redirect()->route('housekeeping.server')->with('message',  'Server settings updated!');
    }
/*
    public function serverStartup()
    {
        return view('housekeeping.server.startup')->with('isOnline', Hotel::sendRconMessage('teststatus'));
    }

    public function serverStartupInit()
    {
        if (!Hotel::sendRconMessage('teststatus')) {
            $locale = 'en_US.UTF-8';
            setlocale(LC_ALL, $locale);
            putenv('LC_ALL=' . $locale);
            shell_exec('sh /var/www/habbo/_server/_start.sh');
        }

        return redirect()->route('housekeeping.server.startup')->with('message',  'Server initializing. Please wait.');
    }

    public function wordfilter($word = null)
    {
        if (!user()->hasPermission('can_edit_server_wordfilter'))
            return view('housekeeping.accessdenied');

        $settings = [
            'wordfilter.enabled'        => EmulatorSetting::getSetting('hotel.wordfilter.enabled'),
            'wordfilter.replacement'    => EmulatorSetting::getSetting('hotel.wordfilter.replacement')
        ];
        return view('housekeeping.server.wordfilter')->with([
            'settings'  => $settings,
            'words'     => WordFilter::paginate(20),
            'word'      => WordFilter::find($word)
        ]);
    }

    public function wordfilterSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_server_wordfilter'))
            return view('housekeeping.accessdenied');

        EmulatorSetting::where('key', 'hotel.wordfilter.enabled')->first()->update(['value' => $request->wordfilter_enable]);
        EmulatorSetting::where('key', 'hotel.wordfilter.replacement')->first()->update(['value' => $request->wordfilter_censor]);

        unset($request['_token']);
        $message = user()->username . ' changed \'wordfilter\' values to ' . json_encode($request->post());
        StaffLog::createLog('wordfilter', $message);

        return redirect()->route('housekeeping.server.wordfilter')->with('message',  'Wordfilter settings updated!');
    }

    public function wordfilterEditSave($key, Request $request)
    {
        if (!user()->hasPermission('can_add_server_wordfilter'))
            return view('housekeeping.accessdenied');

        $word = WordFilter::find($key);

        $word->update([
            'key'           => $request->key,
            'replacement'   => $request->replacement,
            'hide'          => $request->hide,
            'report'        => $request->report,
            'mute'          => $request->mute
        ]);

        unset($request['_token']);
        $message = user()->username . ' changed \'word\' values to ' . json_encode($request->post());
        StaffLog::createLog('wordfilter', $message);

        return redirect()->route('housekeeping.server.wordfilter', $request->key)->with('message',  'Word updated!');
    }

    public function wordfilterDelete($word)
    {
        if (!user()->hasPermission('can_add_server_wordfilter'))
            return view('housekeeping.accessdenied');

        WordFilter::find($word)->delete();

        $message = user()->username . ' deleted word \'' . $word . '\'';
        StaffLog::createLog('wordfilter', $message);

        return redirect()->route('housekeeping.server.wordfilter', false)->with('message',  'Word deleted!');
    }

    public function wordfilterAdd()
    {
        if (!user()->hasPermission('can_add_server_wordfilter'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.server.wordfilter_add');
    }

    public function wordfilterCreate(Request $request)
    {
        if (!user()->hasPermission('can_add_server_wordfilter'))
            return view('housekeeping.accessdenied');


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

        $message = user()->username . ' added word \'' . $request->key . '\'';
        StaffLog::createLog('wordfilter', $message);

        return redirect()->route('housekeeping.server.wordfilter', false)->with('message',  'Word added!');
    }
*/
    public function welcomemsg()
    {
        if (!user()->hasPermission('can_edit_server_welcomemsg'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.server.welcomemsg');
    }

    public function welcomemsgSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_server_welcomemsg'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'welcome_message_enabled' => 'required|boolean'
        ]);

        set_emu_config('welcome.message.enabled', $request->welcome_message_enabled ? 'true' : 'false');
        set_emu_config('welcome.message.content', $request->welcome_message_content ?? '');

        ucreate_staff_log('server.welcomemsg.save', $request);

        return redirect()->route('housekeeping.server.welcomemsg')->with('message',  'Welcome message settings updated!');
    }
}
