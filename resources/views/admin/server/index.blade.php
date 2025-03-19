@extends('layouts.admin.master', ['menu' => 'server'])

@section('title', 'General Configuration')

@section('content')

<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.server', ['submenu' => 'server'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <form action="{{ route('admin.server.save') }}" method="post" name="theAdminForm" id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">General Configuration</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Client Ip</b>
                                    <div class="graytext">This is the ip the game server will listen on.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="client_ip" value="{{ $settings['client.ip'] }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Client Port</b>
                                    <div class="graytext">This is the port the game server will listen on.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="client_port" value="{{ $settings['client.port'] }}"
                                        size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>MUS Ip</b>
                                    <div class="graytext">This is the ip the MUS socket will listen on.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="mus_ip" value="{{ $settings['mus.ip'] }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>MUS Port</b>
                                    <div class="graytext">This is the port the MUS socket will listen on.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="mus_port" value="{{ $settings['mus.port'] }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td align="left" class="tablesubheader" colspan="2">Special Options</td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Enable trading</b></td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="trading_enable" class="dropdown">
                                        <option value="1" @if($settings['hotel.trading']==1) selected="selected" @endif>
                                            Enabled</option>
                                        <option value="0" @if($settings['hotel.trading']==0) selected="selected" @endif>
                                            Disabled</option>
                                    </select>
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
