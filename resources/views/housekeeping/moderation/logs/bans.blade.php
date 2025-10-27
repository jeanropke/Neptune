@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Ban Listing')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'logs.bans'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    <!-- RIGHT CONTENT BLOCK -->
                    <p>Notice: Expired bans will be automaticly removed upon login of the previously banned user.</p>
                    <div class="tableborder">
                        <div class="tableheaderalt">Active Ban Listing</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="25%" align="center">Ban Type</td>
                                <td class="tablesubheader" width="25%" align="center">Value</td>
                                <td class="tablesubheader" width="30%">Reason</td>
                                <td class="tablesubheader" width="20%" align="center">Expires on</td>
                            </tr>
                            @forelse ($bans as $ban)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                    <td class="tablerow1" align="center">
                                        {{ $ban->ban_type }}
                                    <td class="tablerow1" align="center">
                                        {{ $ban->banned_value }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $ban->message }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ \Carbon\Carbon::createFromTimestamp($ban->banned_until, date_default_timezone_get())->format('d/m/Y H:i') }}
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="4" class="tablerow1"><strong>No bans.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $bans->links('includes.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
