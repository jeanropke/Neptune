@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Room Chat Logs')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'logs.chats'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    <!-- RIGHT CONTENT BLOCK -->
                    @if ($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    <form action="{{ route('housekeeping.logs.chats') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        <div class="tableborder">
                            <div class="tableheaderalt">Search Chat Logs</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Value</b>
                                        <div class="graytext">Search by room name, username or message</div>
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
                                            <option value="roomname">Room name</option>
                                            <option value="message">Message</option>
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
                    <br />
                    <div class="tableborder">
                        <div class="tableheaderalt">Latest Room Chat Logs</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="15%">User</td>
                                <td class="tablesubheader" width="15%">Room ID</td>
                                <td class="tablesubheader" width="10%" align="center">Chat Type</td>
                                <td class="tablesubheader" width="40%">Message</td>
                                <td class="tablesubheader" width="20%" align="center">Created at</td>
                            </tr>
                            @forelse ($chats as $chat)
                                <tr>
                                    <td class="tablerow1">
                                        {{ $chat->user->username }} (ID: {{ $chat->user_id }})
                                        <div class="desctext">
                                            <a href="{{ route('housekeeping.logs.chats') }}?type=user_id&value={{ $chat->user_id }}">More chat logs</a>
                                        </div>
                                    </td>
                                    <td class="tablerow1">
                                        {{ $chat->room_name }}
                                        <div class="desctext">
                                            <a href="{{ route('housekeeping.logs.chats') }}?type=room_id&value={{ $chat->room_id }}">More chat logs</a>
                                        </div>
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $chat->chat_type }}
                                    </td>
                                    <td class="tablerow1">
                                        {{ $chat->message }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $chat->timestamp_carbon->format('d/m/Y H:i:s') }}
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="5" class="tablerow1"><strong>No chats.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $chats->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
