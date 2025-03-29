@extends('layouts.admin.master', ['menu' => 'users'])

@section('title', 'Retrive IP Address')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('layouts.admin.users', ['submenu' => 'ip'])
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
                        <form action="" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="tableborder">
                                <div class="tableheaderalt">Retrive IP Address</div>
                                <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>IP</b>
                                            <div class="graytext"></div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="ip" value="" size="30" class="textinput">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="tablesubheader" colspan="2">
                                            <input type="submit" value="Edit User" class="realbutton" accesskey="s">
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
