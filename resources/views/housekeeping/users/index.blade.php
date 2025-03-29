@extends('layouts.admin.master', ['menu' => 'users'])

@section('title', 'Users & Moderation')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('layouts.admin.users', ['submenu' => 'users'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    <!-- RIGHT CONTENT BLOCK -->
                    <div class="tableborder">
                        <div class="tableheaderalt">
                            Habbo User Listing
                        </div>
                        <div style="text-align: center; vertical-align: middle;">{!!
                            $users->links('layouts.admin.pagination') !!}</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="1%" align="center">ID</td>
                                <td class="tablesubheader" width="29%">Name</td>
                                <td class="tablesubheader" width="30%" align="center">E-Mail Address</td>
                                <td class="tablesubheader" width="20%" align="center">Last Login <i>(Last Online)</i></td>
                                <td class="tablesubheader" width="15%" align="center">Join date</td>
                                <td class="tablesubheader" width="10%" align="center">Edit</td>
                            </tr>
                            @foreach($users as $user)
                            <tr>
                                <td class="tablerow1" align="center">
                                    {{ $user->id }}
                                </td>
                                <td class="tablerow2"><strong>{{ $user->username }}</strong>
                                    <div class="desctext">
                                        {{ $user->ip_current }} [<a href="http://who.is/whois-ip/ip-address/{{ $user->ip_current }}/" target="_blank">WHOIS</a>]</div>
                                </td>
                                <td class="tablerow2" align="center">
                                    <a href="mailto:{{ $user->mail }}">{{ $user->mail }}</a>
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ \Carbon\Carbon::createFromTimeStamp($user->last_login)->diffForHumans() }}
                                    <i>({{ $user->isOnline() ? 'online now' : \Carbon\Carbon::createFromTimeStamp($user->last_online)->diffForHumans() }})</i>
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ \Carbon\Carbon::createFromTimeStamp($user->account_created) }}
                                </td>
                                <td class="tablerow2" align="center">
                                    <a href="{{ route('admin.users.edituser', $user->id) }}"><img src="{{ url('/') }}/web/admin/images/edit.gif" alt="Edit User Data"></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>

@stop
