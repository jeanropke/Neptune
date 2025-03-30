@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Search User')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.users.include.menu', ['submenu' => 'users.search'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                        <form action="{{ route('housekeeping.users.search.post') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="tableborder">
                                <div class="tableheaderalt">Search User</div>
                                <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                    <tr>
                                        <td class="tablerow1" width="30%" valign="middle"><b>Value</b>
                                            <div class="graytext">Search by username or IP address</div>
                                        </td>
                                        <td class="tablerow2" width="70%" valign="middle">
                                            <input type="text" name="value" value="" size="30" class="textinput">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="30%" valign="middle"><b>Type</b>
                                            <div class="graytext"></div>
                                        </td>
                                        <td class="tablerow2" width="70%" valign="middle">
                                            <select name="type" class="textinput" style="margin-top: 5px;" size="1">
                                                <option value="username">Username</option>
                                                <option value="ip">IP</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="tablesubheader" colspan="2">
                                            <input type="submit" value="Search" class="realbutton" accesskey="s">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                </div>
            <!-- / RIGHT CONTENT BLOCK -->
        </td>
    </tr>
</table>
@stop
