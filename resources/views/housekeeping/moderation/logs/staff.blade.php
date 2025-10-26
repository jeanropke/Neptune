@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Staff Logs')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'logs.staff'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    <!-- RIGHT CONTENT BLOCK -->
                    <div class="tableborder">
                        <div class="tableheaderalt">
                            {{ cms_config('hotel.name.short') }} Staff Logs</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="15%" align="center">Staff</td>
                                <td class="tablesubheader" width="25%">Page</td>
                                <td class="tablesubheader" width="25%">Message/Details (Click to see more details)</td>
                                <td class="tablesubheader" width="20%" align="center">Date</td>
                            </tr>
                            @forelse ($logs as $log)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                    <td class="tablerow2" align="center">
                                        {{ $log->user->username }} (ID: {{ $log->user_id }})
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $log->page }}
                                    </td>
                                    <td class="tablerow2 message-details" data-id="{{ $log->id }}">
                                        {{ Str::limit($log->message, 150, '...') }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $log->created_at->format('d/m/Y H:i:s') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="tablerow1" align="center" colspan="4">
                                        <strong>No logs.</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                        <script>
                            LogManager.initialise();
                        </script>
                    </div>

                    <div style="text-align: center; vertical-align: middle;">{!! $logs->links('layouts.housekeeping.pagination') !!}</div>

                    @if(cms_config('clear.staff_logs.user_id') == user()->id)
                        <div align="center">(<a href="#" id="clear-logs"><b>Clear Logs</b></a>)</div>

                        <script>
                            GenericManager.initialise('#clear-logs', '<p>Are you sure you want to clear all staff logs?</p>', '{{ route('housekeeping.logs.staff.clear') }}');
                        </script>
                    @endif
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
