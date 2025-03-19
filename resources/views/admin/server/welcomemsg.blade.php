@extends('layouts.admin.master', ['menu' => 'server'])

@section('title', 'Welcome Message Options')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.server', ['submenu' => 'welcomemsg'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <form action="{{ route('admin.server.welcomemsg.save') }}" method="post" name="theAdminForm"
                    id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Welcome Message Options</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Enable Welcome Message</b></td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="motd_enabled" class="dropdown">
                                        <option value="1" @if($settings['motd.enabled']==1) selected="selected" @endif>
                                            Enabled</option>
                                        <option value="0" @if($settings['motd.enabled']==0) selected="selected" @endif>
                                            Disabled</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Welcome Message</b>
                                    <div class="graytext">The actual message that will be shown to the user upon login,
                                        if enabled.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <textarea name="motd_message" cols="60" rows="5" wrap="soft" id="sub_desc"
                                        class="multitext">{{ $settings['motd.message'] }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Save Options" class="realbutton" accesskey="s">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br />
            </div>
            <!-- / RIGHT CONTENT BLOCK -->
        </td>
    </tr>
</table>
@stop
