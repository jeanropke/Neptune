@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Help Support')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'support.listing'])
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
                        <div class="tableheaderalt">
                            Help Queries
                        </div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="15%">Username</td>
                                <td class="tablesubheader" width="15%">Email</td>
                                <td class="tablesubheader" width="10%" align="center">Issue Type</td>
                                <td class="tablesubheader" width="25%">Message</td>
                                <td class="tablesubheader" width="7%">Picked by</td>
                                <td class="tablesubheader" width="7%">Status</td>
                                <td class="tablesubheader" width="10%" align="center">Created at</td>
                                <td class="tablesubheader" width="6%" align="center">View Report</td>
                            </tr>
                            @foreach ($tickets as $ticket)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                    <td class="tablerow1" align="center">
                                        {{ $ticket->id }}
                                    </td>
                                    <td class="tablerow2">
                                        {!! $ticket->username ?? '<i>Do not apply</i>' !!}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $ticket->email }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $ticket->issue }}
                                    </td>
                                    <td class="tablerow2">
                                        {!! bb_format($ticket->message) !!}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $ticket->picker?->username }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $ticket->status_label }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $ticket->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.moderation.support.view', $ticket->id) }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/edit.gif" alt="View Ticket">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $tickets->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
