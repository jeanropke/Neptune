@extends('layouts.admin.master', ['menu' => 'users'])

@section('title', 'User edit')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('layouts.admin.users', ['submenu' => 'edituser'])
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

                    @if($user)
                    <form action="{{ route('admin.users.edituser.save', $user->id) }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Edit User</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1"  width="10%"  valign="middle">
                                        <b>ID</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2"  width="40%"  valign="middle">
                                        <input type="text" size="30" value="{{ $user->id }}" disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="10%"  valign="middle">
                                        <b>Username</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2"  width="40%"  valign="middle">
                                        <input type="text" name="username" size="30" value="{{ $user->username }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="10%"  valign="middle">
                                        <b>Email</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2"  width="40%"  valign="middle">
                                        <input type="text" name="mail" size="30" value="{{ $user->mail }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="10%"  valign="middle">
                                        <b>Motto</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2"  width="40%"  valign="middle">
                                        <input type="text" name="motto" size="30" value="{{ $user->motto }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="10%"  valign="middle">
                                        <b>Look</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2"  width="40%"  valign="middle">
                                        <input type="text" name="look" size="30" value="{{ $user->look }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="10%"  valign="middle">
                                        <b>Gender</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2"  width="40%"  valign="middle">
                                        <input type="text" name="gender" size="30" value="{{ $user->gender }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="10%"  valign="middle">
                                        <b>Rank</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2"  width="40%"  valign="middle">
                                        <input type="text" name="rank" size="30" value="{{ $user->rank }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="10%"  valign="middle">
                                        <b>Credits</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2"  width="40%"  valign="middle">
                                        <input type="text" name="credits" size="30" value="{{ $user->credits }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="10%"  valign="middle">
                                        <b>IP Register</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2"  width="40%"  valign="middle">
                                        <input type="text" size="30" value="{{ $user->ip_register }}" disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="10%"  valign="middle">
                                        <b>IP Current</b>
                                        <div class="graytext">
                                            <a href="{{ route('admin.users.search.ip', $user->ip_current) }}">Look up for this IP</a>
                                        </div>
                                    </td>
                                    <td class="tablerow2"  width="40%"  valign="middle">
                                        <input type="text" size="30" value="{{ $user->ip_current }}" disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="10%"  valign="middle">
                                        <b>Machine ID</b>
                                        <div class="graytext">
                                            The current machine id of the user.
                                            <br>
                                            @if($user->machine_id)
                                            <a href="{{ route('admin.users.search.machine', $user->machine_id) }}">Look up for this machine id</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="tablerow2"  width="40%"  valign="middle">
                                        <input type="text" size="30" value="{{ $user->machine_id }}" disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Edit User" class="realbutton" accesskey="s">
                                    <input type="button" value="Open Client" class="realbutton" accesskey="s" onclick="{ var win = window.open('{{ $user->id }}/client', '_blank'); win.focus(); }">

                                    </td>

                                </tr>
                            </table>
                        </div>
                    </form>
                    @else
                        <form action="" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="tableborder">
                                <div class="tableheaderalt">Edit User</div>
                                <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Username</b>
                                            <div class="graytext">The name of the user you want to edit.</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="username" value="" size="30" class="textinput">
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
                    @endif
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>

@stop
