@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Alerts Listing')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'logs.alerts'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    <!-- RIGHT CONTENT BLOCK -->
                    <div class="tableborder">
                        <div class="tableheaderalt">Alerts Listing</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="10%" align="center">Action</td>
                                <td class="tablesubheader" width="10%" align="center">User ID</td>
                                <td class="tablesubheader" width="10%" align="center">Target ID</td>
                                <td class="tablesubheader" width="25%">Message</td>
                                <td class="tablesubheader" width="25%">Extra Notes</td>
                                <td class="tablesubheader" width="20%" align="center">Created at</td>
                            </tr>
                            @forelse ($alerts as $alert)
                                <tr>
                                    <td class="tablerow1" align="center">
                                        {{ $alert->action }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $alert->user_id }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $alert->target_id }}
                                    </td>
                                    <td class="tablerow1">
                                        {{ $alert->message }}
                                    </td>
                                    <td class="tablerow1">
                                        {{ $alert->extra_notes }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $alert->created_at }}
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="6" class="tablerow1"><strong>No alerts.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $alerts->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
