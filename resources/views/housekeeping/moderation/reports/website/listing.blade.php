@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Website Reports')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'reports.website'])
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
                        <form action="{{ route('housekeeping.moderation.reports.website') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
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
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="15%">Reported by</td>
                                <td class="tablesubheader" width="10%" align="center">Type</td>
                                <td class="tablesubheader" width="30%">Message</td>
                                <td class="tablesubheader" width="7%">Picked by</td>
                                <td class="tablesubheader" width="7%">Status</td>
                                <td class="tablesubheader" width="10%" align="center">Created at</td>
                                <td class="tablesubheader" width="6%" align="center">View Report</td>
                            </tr>
                            @foreach ($reports as $report)
                                <tr>
                                    <td class="tablerow1" align="center">
                                        {{ $report->id }}
                                    </td>
                                    <td class="tablerow2">{{ $report->getUsername() }}

                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $report->type }}
                                    </td>
                                    <td class="tablerow2">
                                        {!! $report->getObjectMessage() !!}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $report->getPickedBy() }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $report->closed ? 'Closed' : 'Open' }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $report->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.moderation.reports.website.view', $report->id) }}"><img src="{{ url('/') }}/web/housekeeping/images/edit.gif"
                                                alt="View Report"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $reports->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>

@stop
