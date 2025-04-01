@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Voucher Management')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'vouchers'])
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
                    <form action="" method="post" name="theAdminForm" id="theAdminForm">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Create Voucher</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Redemption Code</strong>
                                        <div class="graytext">The voucher code the user must enter to recieve the credits.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="voucher" value="" size="30" class="textinput"> <a href="#" id="random-code">Generate random
                                            code</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Credits amount</strong>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="number" name="credits" value="0" size="5" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Expiry date</strong>
                                        <div class="graytext">By default, expiry date is one week from now.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="datetime-local" name="expiry_date" class="textinput" value="{{ date('Y-m-d\TH:i', time() + 604800) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Single use</strong>
                                        <div class="graytext">Is this voucher single use?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="is_single_use">
                                            <option value="0">No</option>
                                            <option value="1" selected>Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Items</strong>
                                        <div class="graytext">Which items this voucher will give?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <a href="{{ route('furnipicker.listing') }}" id="furni-picker">Pick</a>
                                        <div id="furni-picked"></div>
                                        <input name="items" value="" type="text" hidden>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" name="submit" value="Create Voucher" class="realbutton" accesskey="s">
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
                                <td class="tablesubheader" width="15%" align="center">Redemption Code</td>
                                <td class="tablesubheader" width="10%" align="center">Credits</td>
                                <td class="tablesubheader" width="10%" align="center">Expiry Date</td>
                                <td class="tablesubheader" width="5%" align="center">Single Use</td>
                                <td class="tablesubheader" width="20%" align="center">Items</td>
                                <td class="tablesubheader" width="20%" align="center">Delete</td>
                            </tr>
                            @forelse ($vouchers as $voucher)
                                <tr>
                                    <td class="tablerow1" align="center">
                                        {{ $voucher->voucher_code }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $voucher->credits }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $voucher->expiry_date }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $voucher->is_single_use ? 'Yes' : 'No' }}
                                    </td>
                                    <td class="tablerow2" align="center" id="furni-picker-listing">
                                        @foreach ($voucher->getItems() as $item)
                                            <div class="slot" style="height: 56px; line-height: 9;">
                                                <div class="image" style="background-image: url({{ cms_config('furni.small.url') }}/{{ $item->getNormalizedName() }}_icon.png)"><b>x{{ $item->amount }}</b></div>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-voucher" data-voucher="{{ $voucher->voucher_code }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="6" class="tablerow1"><strong>No vouchers.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <script>
                        FurniPicker.initialise();
                        VoucherManager.initialise(12);
                    </script>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
