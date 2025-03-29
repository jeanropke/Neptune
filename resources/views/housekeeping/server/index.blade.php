@extends('layouts.housekeeping.master', ['menu' => 'server'])

@section('title', 'General Configuration')

@section('content')

<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.housekeeping.server', ['submenu' => 'server'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                @if ($errors->any())
                    <p><strong>{{ $errors->first() }}</strong></p>
                @endif
                <form action="{{ route('housekeeping.server.save') }}" method="post" name="theAdminForm" id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">General Configuration</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Client Ip</b>
                                    <div class="graytext">This is the ip the game server will listen on.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="connection.info.host" value="{{ cms_config('connection.info.host') }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Client Port</b>
                                    <div class="graytext">This is the port the game server will listen on.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="connection.info.port" value="{{ cms_config('connection.info.port') }}"
                                        size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>RCon Ip</b>
                                    <div class="graytext">This is the ip the Remote Control socket will listen on.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="connection.rcon.host" value="{{ cms_config('connection.rcon.host') }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>RCon Port</b>
                                    <div class="graytext">This is the port the Remote Control socket will listen on.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="connection.rcon.port" value="{{ cms_config('connection.rcon.port') }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>MUS Ip</b>
                                    <div class="graytext">This is the ip the Multi User socket will listen on.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="connection.mus.host" value="{{ cms_config('connection.mus.host') }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>MUS Port</b>
                                    <div class="graytext">This is the port the Multi User socket will listen on.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="connection.mus.port" value="{{ cms_config('connection.mus.port') }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Save Configuration" class="realbutton" accesskey="s">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br />
            </div>
        </td>
    </tr>
</table>
@stop
