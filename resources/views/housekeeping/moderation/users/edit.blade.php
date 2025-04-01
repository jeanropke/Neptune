@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'User edit')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'users.edit'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if ($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    <form action="{{ route('housekeeping.users.edit.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Edit User</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>ID</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" size="30" value="{{ $user->id }}" disabled="disabled">
                                        <input name="id" type="text" size="30" value="{{ $user->id }}" hidden>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Username</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="username" size="30" value="{{ $user->username }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Email</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="email" size="30" value="{{ $user->email }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Console Motto</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="console.motto" size="30" value="{{ $user->console_motto }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Motto</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="motto" size="30" value="{{ $user->motto }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Look</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="figure" size="30" value="{{ $user->figure }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Gender</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="sex" size="30" value="{{ $user->sex }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Rank</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="rank" size="30" value="{{ $user->rank }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Credits</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="credits" size="30" value="{{ $user->credits }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Badges</b>
                                        <div class="graytext"><a href="{{ route('housekeeping.users.badges', $user->id) }}">See user badges</a></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        {{ $user->getBadges(true)->count() }} badges
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Rooms</b>
                                        <div class="graytext"><a href="{{ route('housekeeping.editor.guestroom.listing') }}?type=owner&value={{ $user->username }}">See user rooms</a></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        {{ $user->getRooms()->count() }} rooms
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Latest IP Address</b>
                                        <div class="graytext">
                                            <a href="{{ route('housekeeping.users.listing') }}?value={{ $user->getLatestIP() }}&type=ip">Look up for this IP</a> -
                                            <a href="{{ route('housekeeping.users.ips', $user->id) }}">All user IPs address</a>
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" size="30" value="{{ $user->getLatestIP() }}" disabled="disabled">
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
