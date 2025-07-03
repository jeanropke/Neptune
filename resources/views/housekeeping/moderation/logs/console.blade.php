@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Console Logs')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'logs.console'])
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
                    <form action="{{ route('housekeeping.logs.console') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        <div class="tableborder">
                            <div class="tableheaderalt">Search Console Logs</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Value</b>
                                        <div class="graytext">Search by sender username or message</div>
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
                        <div class="tableheaderalt">Latest Console Chat Logs</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="10%">Receiver</td>
                                <td class="tablesubheader" width="10%">Sender</td>
                                <td class="tablesubheader" width="10%" align="center">Read</td>
                                <td class="tablesubheader" width="35%">Message</td>
                                <td class="tablesubheader" width="20%" align="center">Created at</td>
                                <td class="tablesubheader" width="15%" align="center">Conversation</td>
                            </tr>
                            @forelse ($messages as $message)
                                <tr>
                                    <td class="tablerow1" align="center">
                                        {{ $message->id }}
                                    </td>
                                    <td class="tablerow1">
                                        {{ $message->receiver->username }} (ID: {{ $message->receiver_id }})
                                        <div class="desctext">
                                            <a href="{{ route('housekeeping.logs.console') }}?type=sender_id&value={{ $message->receiver_id }}">Sender</a> |
                                            <a href="{{ route('housekeeping.logs.console') }}?type=receiver_id&value={{ $message->receiver_id }}">Receiver</a>
                                        </div>
                                    </td>
                                    <td class="tablerow1">
                                        {{ $message->sender->username }} (ID: {{ $message->sender_id }})
                                        <div class="desctext">
                                            <a href="{{ route('housekeeping.logs.console') }}?type=sender_id&value={{ $message->sender_id }}">Sender</a> |
                                            <a href="{{ route('housekeeping.logs.console') }}?type=receiver_id&value={{ $message->sender_id }}">Receiver</a>
                                        </div>
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $message->unread ? 'No' : 'Yes' }}
                                    </td>
                                    <td class="tablerow1">
                                        {{ $message->body }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $message->date_carbon->format('d/m/Y H:i:s') }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        <a href="{{ route('housekeeping.logs.console') }}?user_one={{ $message->sender_id }}&user_two={{ $message->receiver_id }}">Full conversation</a>
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="7" class="tablerow1"><strong>No console logs.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $messages->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
