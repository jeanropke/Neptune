@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Voucher History')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'vouchers_history'])
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
                    <form action="" method="get" name="theAdminForm" id="theAdminForm">
                        <div class="tableborder">
                            <div class="tableheaderalt">Search by username</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Username</strong>
                                        <div class="graytext">Enter the username you are looking for.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="username" value="{{ request()->username }}" size="30" class="textinput">
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
                        <div class="tableheaderalt">Existing vouchers</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="15%" align="center">Code</td>
                                <td class="tablesubheader" width="20%" align="center">Used By</td>
                                <td class="tablesubheader" width="10%" align="center">Credits</td>
                                <td class="tablesubheader" width="20%" align="center">Used Date</td>
                                <td class="tablesubheader" width="35%" align="center">Items</td>
                            </tr>
                            @forelse ($vouchers as $voucher)
                                <tr>
                                    <td class="tablerow1" align="center">
                                        {{ $voucher->voucher_code }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $voucher->getUser() }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $voucher->credits_redeemed }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $voucher->used_at }}
                                    </td>
                                    <td class="tablerow2" align="center" id="furni-picker-listing">
                                        @foreach ($voucher->getItems() as $item)
                                            <div class="slot" style="height: 56px; line-height: 9;">
                                                <div class="image" style="background-image: url({{ cms_config('furni.small.url') }}/{{ $item->sale_code }}_icon.png)"><b>x{{ $item->amount }}</b></div>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="6" class="tablerow1"><strong>No vouchers.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $vouchers->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
