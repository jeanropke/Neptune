@extends('layouts.housekeeping', ['menu' => 'catalogue'])

@section('title', 'Catalogue Item Editor')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.furniture.include.menu', ['submenu' => 'catalogue.edit'])
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
                    <form action="{{ route('housekeeping.furniture.catalogue.items.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <input name="id" type="text" size="30" value="{{ $item->id }}" hidden>
                        <div class="tableborder">
                            <div class="tableheaderalt">Catalogue Item Editor - {{ $item->getName() }}</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Page ID</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="number" name="page_id" size="30" value="{{ old('page_id') ?? $item->page_id }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Order ID</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="number" name="order_id" size="30" value="{{ old('order_id') ?? $item->order_id }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Sale Code</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="sale_code" size="30" value="{{ old('sale_code') ?? $item->sale_code }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Price</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="number" name="price" size="30" value="{{ old('price') ?? $item->price }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Is Hidden</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <select name="is_hidden" class="dropdown">
                                            <option value="1" {{ (old('is_hidden') ?? $item->is_hidden) ? 'selected="selected"' : '' }}>Yes</option>
                                            <option value="0" {{ (old('is_hidden') ?? $item->is_hidden) ? '' : 'selected="selected"' }}>No</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Amount</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="number" name="amount" size="30" value="{{ old('amount') ?? $item->amount }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Definition ID</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="number" name="definition_id" size="30" value="{{ old('definition_id') ?? $item->definition_id }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Item Special Sprite ID</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="number" name="item_specialspriteid" size="30" value="{{ old('item_specialspriteid') ?? $item->item_specialspriteid }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Name</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="name" size="30" value="{{ old('name') ?? $item->name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Description</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="description" size="30" value="{{ old('description') ?? $item->description }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Is Package</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <select name="is_package" class="dropdown">
                                            <option value="1" {{ (old('is_package') ?? $item->is_package) ? 'selected="selected"' : '' }}>Yes</option>
                                            <option value="0" {{ (old('is_package') ?? $item->is_package) ? '' : 'selected="selected"' }}>No</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Package Name</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="package_name" size="30" value="{{ old('package_name') ?? $item->package_name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Package Description</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="package_description" size="30" value="{{ old('package_description') ?? $item->package_description }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Save Catalogue Item" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>

@stop
