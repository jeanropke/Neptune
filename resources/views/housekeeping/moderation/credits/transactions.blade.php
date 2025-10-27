@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Transactions Management')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'transactions'])
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
                    <form action="" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        <div class="tableborder">
                            <div class="tableheaderalt">Transaction Logs</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Username</strong>
                                        <div class="graytext">The username of the user whom's transaction logs you want to view.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="username" value="" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Retrive logs" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />

                    <div class="tableborder">
                        <div class="tableheaderalt">Transaction Logs Listing</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="20%">Username</td>
                                <td class="tablesubheader" width="10%" align="center">Catalogue Item ID</td>
                                <td class="tablesubheader" width="10%" align="center">Amount</td>
                                <td class="tablesubheader" width="25%" align="center">Description</td>
                                <td class="tablesubheader" width="10%" align="center">Credits</td>
                                <td class="tablesubheader" width="10%" align="center">Visible</td>
                                <td class="tablesubheader" width="15%" align="center">Date</td>
                            </tr>
                            @forelse ($logs as $log)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                    <td class="tablerow1">
                                        <a href="{{ route('housekeeping.credits.transactions', ['username' => $log->user->username]) }}">{{ $log->user->username }}</a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $log->catalogue_id }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $log->amount }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $log->description }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $log->credit_cost }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $log->is_visible ? 'Yes' : 'No' }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $log->created_at->format('d/m/Y H:i:s') }}
                                    </td>
                                </tr>

                            @empty
                                <tr align="center">
                                    <td colspan="7" class="tablerow1"><strong>No transaction logs.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $logs->withQueryString()->links('includes.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
