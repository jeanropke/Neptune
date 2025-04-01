@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Users & Moderation')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.users.include.menu', ['submenu' => 'users.listing'])
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
                    <!-- RIGHT CONTENT BLOCK -->

                    <div class="tableborder">
                        <form action="{{ route('housekeeping.users.listing') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
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
                        </form>
                    </div>
                    <br />

                    <div class="tableborder">
                        <div class="tableheaderalt">
                            Habbo User Listing
                        </div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="1%" align="center">ID</td>
                                <td class="tablesubheader" width="29%">Name</td>
                                <td class="tablesubheader" width="30%" align="center">E-Mail Address</td>
                                <td class="tablesubheader" width="20%" align="center">Last Online</td>
                                <td class="tablesubheader" width="15%" align="center">Join date</td>
                                <td class="tablesubheader" width="10%" align="center">Edit</td>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="tablerow1" align="center">
                                        {{ $user->id }}
                                    </td>
                                    <td class="tablerow2"><strong>{{ $user->username }}</strong>
                                        <div class="desctext">
                                            {{ $user->getLatestIP() }} {{ $user->ip_created_at ? "({$user->ip_created_at})" : '' }} [<a
                                                href="http://who.is/whois-ip/ip-address/{{ $user->getLatestIP() }}/" target="_blank">WHOIS</a>]</div>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ \Carbon\Carbon::createFromTimeStamp($user->last_online)->diffForHumans() }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $user->created_at }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.users.edit', $user->id) }}"><img src="{{ url('/') }}/web/housekeeping/images/edit.gif"
                                                alt="Edit User Data"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $users->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>

@stop
