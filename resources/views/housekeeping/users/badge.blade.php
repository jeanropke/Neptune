@extends('layouts.admin.master', ['menu' => 'users'])

@section('title', 'User Badge Management')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('layouts.admin.users', ['submenu' => 'badgetool'])
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
                            <div class="tableheaderalt">Badge Manager</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Username</strong>
                                        <div class="graytext">The username of who this action will apply to.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="username" value="" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Badgecode</strong>
                                        <div class="graytext">The bage code, eg. "ADM" or "XM8".</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="badge" value="" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" name="submit" value="Give badge" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />
                    <form action="{{ route('admin.users.remove.badge') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Take badge from user</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Username</strong>
                                        <div class="graytext">From who do you want to take off a badge?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="username" value="" size="30" maxlength="100" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Badge code</strong>
                                        <div class="graytext">What badge do you want to take off, fill in the badge code.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="code" value="" size="3" maxlength="10" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Remove" class="realbutton" accesskey="s">
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
