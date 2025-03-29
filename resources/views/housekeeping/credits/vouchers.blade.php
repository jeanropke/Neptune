@extends('layouts.admin.master', ['menu' => 'users'])

@section('title', 'Transactions Management')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.users', ['submenu' => 'vouchers'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if($errors->any())
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
                                    <div class="graytext">The voucher code the user must enter to recieve the credits.
                                    </div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="voucher" value="{{ $rnd_voucher }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><strong>Credits amount</strong>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="credits" value="0" size="5" class="textinput">

                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><strong>Points amount</strong>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="points" value="0" size="5" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><strong>Points type</strong>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="points_type">
                                        <option value="0">Duckets</option>
                                        <option value="1">Snowflakes</option>
                                        <option value="2">Hearts</option>
                                        <option value="3">MadCoins</option>
                                        <option value="4">Shells</option>
                                        <option value="5">Diamonds</option>
                                        <option value="100">Pumpkins</option>
                                        <option value="101">Horseshoes</option>
                                        <option value="102">Nuts</option>
                                        <option value="103">Stars</option>
                                        <option value="104">Clouds</option>
                                        <option value="105">Loyalty</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><strong>Catalog item ID</strong>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="catalog_id" value="0" size="5" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" name="submit" value="Create Voucher" class="realbutton"
                                        accesskey="s">
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
                            <td class="tablesubheader" width="20%" align="center">Redemption Code</td>
                            <td class="tablesubheader" width="20%" align="center">Credits</td>
                            <td class="tablesubheader" width="20%" align="center">Points</td>
                            <td class="tablesubheader" width="20%" align="center">Points type</td>
                            <td class="tablesubheader" width="20%" align="center">Catalog item</td>
                        </tr>
                        @if($vouchers->count() == 0)
                        <tr align="center">
                            <td colspan="5" class="tablerow1"><strong>No vouchers.</strong></td>
                        </tr>
                        @else
                        @foreach ($vouchers as $voucher)
                        <tr>
                            <td class="tablerow1" align="center">
                                {{ $voucher->code }}
                            </td>
                            <td class="tablerow2" align="center">
                                {{ $voucher->credits }}
                            </td>
                            <td class="tablerow2" align="center">
                                {{ $voucher->points }}
                            </td>
                            <td class="tablerow2" align="center">
                                {{ $voucher->points_type }}
                            </td>
                            <td class="tablerow2" align="center">
                                {{ $voucher->catalog_item_id }}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            <!-- / RIGHT CONTENT BLOCK -->
        </td>
    </tr>
</table>
@stop
