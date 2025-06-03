@extends('layouts.housekeeping', ['menu' => 'catalogue'])

@section('title', 'Add Web Offer')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.furniture.include.menu', ['submenu' => 'furniture.weboffers.add'])
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
                    <form action="{{ route('housekeeping.furniture.weboffers.add') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Add Web Offer</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Sale Code</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="salecode" size="30" value="{{ old('salecode') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Name</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="name" size="30" value="{{ old('name') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Items</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle" id="furni-picker-table">
                                        <a href="{{ route('furnipicker.listing') }}" id="furni-picker">Pick</a>
                                        <div id="furni-picked">
                                        </div>
                                        <input name="item_ids" value="" type="text" hidden>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Price</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="number" name="price" size="30" value="{{ old('price') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Is Enabled</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <select name="enabled" class="dropdown">
                                            <option value="1" {{ old('enabled') ? 'selected="selected"' : '' }}>Yes</option>
                                            <option value="0" {{ old('enabled') ? '' : 'selected="selected"' }}>No</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Add Web Offer" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <script>
                        FurniPicker.initialise();
                    </script>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>

@stop
