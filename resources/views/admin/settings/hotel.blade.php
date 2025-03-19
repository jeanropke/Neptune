@extends('layouts.admin.master', ['menu' => 'settings', 'submenu' => 'hotel'])

@section('title', 'Hotel Settings')

@section('content')
    <div class="page_title">
        <img src="{{ url('/') }}/web/housekeeping/icons/hotel.png" class="pticon">
        <span class="page_name_shadow">Hotel Settings</span>
        <span class="page_name">Hotel Settings</span>
    </div>
    <div class="page_main">

        <table border="0" cellpadding="0" cellspacing="0" height="100%">
            <tbody>
                <tr height="100%">
                <td class="page_main_left">
                    <div class="left_date">{{ date('l F j, Y | g:iA') }}</div>
                    <div class="hr"></div>
                    <div class="text">
                        <p>Configure your hotel settings here.</p>
                    </div>
                </td>
                <td class="page_main_right">
                    <div class="center">
                        @if (session()->has('message'))
                            <div class="clean-ok">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="settings">
                            <form name="settings" action="{{ url('/') }}/housekeeping/settings/hotel" method="POST" autocomplete="off">
                                @csrf
                                <b>External Texts:</b><br />
                                <label for="external.texts.txt">The url of your external texts.</label><br />
                                <input type="text" name="external.texts.txt" id="external.texts.txt" value="{{ cms_config('external.texts.txt') }}"></input><br /><br />

                                <b>External Texts:</b><br />
                                <label for="external.vars.txt">The url of your external variables.</label><br />
                                <input type="text" name="external.vars.txt" id="external.vars.txt" value="{{ cms_config('external.variables.txt') }}" title=""></input><br /><br />

                                <b>DCR:</b><br />
                                <label for="habbo.dcr.url">The location of the client DCRs.</label><br />
                                <input type="text" name="habbo.dcr.url" id="habbo.dcr.url" value="{{ cms_config('habbo.dcr.url') }}" title=""></input><br /><br />

                                <b>IP:</b><br />
                                <label for="connection.info.host">The IP address of your hotel server.</label><br />
                                <input type="text" name="connection.info.host" id="connection.info.host" value="{{ cms_config('connection.info.host') }}" title=""></input><br /><br />

                                <b>Port:</b><br />
                                <label for="connection.info.port">The port number of your hotel server.</label><br />
                                <input type="text" name="connection.info.port" id="connection.info.port" value="{{ cms_config('connection.info.port') }}" title=""></input><br /><br />

                                <b>Mus IP:</b><br />
                                <label for="connection.mus.host">The IP address of your mus.</label><br />
                                <input type="text" name="connection.mus.host" id="connection.mus.host". value="{{ cms_config('connection.mus.host') }}" title=""></input><br /><br />

                                <b>Mus Port:</b><br />
                                <label for="connection.mus.port">The port of your mus.</label><br />
                                <input type="text" name="connection.mus.port" id="connection.mus.port". value="{{ cms_config('connection.mus.port') }}" title=""></input><br /><br />

                                <b>RCon IP:</b><br />
                                <label for="connection.rcon.host">The IP address of your remote control.</label><br />
                                <input type="text" name="connection.rcon.host" id="connection.rcon.host". value="{{ cms_config('connection.rcon.host') }}" title=""></input><br /><br />

                                <b>RCon Port:</b><br />
                                <label for="connection.rcon.port">The port of your remote control.</label><br />
                                <input type="text" name="connection.rcon.port" id="connection.rcon.port". value="{{ cms_config('connection.rcon.port') }}" title=""></input><br /><br />

                                <div class="button"><input type="submit" name="save" value="Save" /></div>
                            </form>
                        </div>
                    </div>
                </td>
                </tr>
            </tbody>
        </table>

    </div>
@stop
