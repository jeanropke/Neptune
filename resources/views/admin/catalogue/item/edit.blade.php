@extends('layouts.admin.master', ['menu' => 'catalogue'])

@section('title', 'Catalogue item editor')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.catalogue', ['submenu' => 'catalogue'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if($errors->any())
                <p><strong>{{ $errors->first() }}</strong></p>
                @endif

                <form action="{{ route('admin.catalogue.items.save') }}" method="post" name="theAdminForm"
                    id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Editing catalogue item - {{ $item->catalog_name }} ({{ $item->id }})
                        </div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>ID</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="id" value="{{ $item->id }}" size="30" class="textinput"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Page ID</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="page_id" value="{{ $item->page_id }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Item ID</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="item_ids" value="{{ $item->item_ids }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Catalog name</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="catalog_name" value="{{ $item->catalog_name }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>cost_credits</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="cost_credits" value="{{ $item->cost_credits }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>cost_points</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="cost_points" value="{{ $item->cost_points }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>points_type</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="points_type">
                                        <option value="0" @if($item->points_type == 0) selected @endif>Duckets</option>
                                        <option value="1" @if($item->points_type == 1) selected @endif>Flocos de Neve</option>
                                        <option value="2" @if($item->points_type == 2) selected @endif>Corações</option>
                                        <option value="3" @if($item->points_type == 3) selected @endif>Mad Money</option>
                                        <option value="4" @if($item->points_type == 4) selected @endif>Conchas</option>
                                        <option value="5" @if($item->points_type == 5) selected @endif>Diamantes</option>
                                        <option value="6" @if($item->points_type == 6) selected @endif>Pixels</option>
                                        <option value="100" @if($item->points_type == 100) selected @endif>Aboboras</option>
                                        <option value="101" @if($item->points_type == 101) selected @endif>Ferraduras</option>
                                        <option value="102" @if($item->points_type == 102) selected @endif>Nozes</option>
                                        <option value="103" @if($item->points_type == 103) selected @endif>Estrelas</option>
                                        <option value="104" @if($item->points_type == 104) selected @endif>Nuvens</option>
                                        <option value="105" @if($item->points_type == 105) selected @endif>Pontos Fidelidade</option>
                                        <option value="106" @if($item->points_type == 106) selected @endif>Ovos</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>amount</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="amount" value="{{ $item->amount }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>song_id</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="song_id" value="{{ $item->song_id }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>limited_stack</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="limited_stack" value="{{ $item->limited_stack }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>limited_sells</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="limited_sells" value="{{ $item->limited_sells }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>extradata</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="extradata" value="{{ $item->extradata }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>club_only</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="club_only">
                                        <option value="0" @if($item->club_only == 0) selected @endif>No</option>
                                        <option value="1" @if($item->club_only == 1) selected @endif>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>have_offer</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="have_offer">
                                        <option value="0" @if($item->have_offer == 0) selected @endif>No</option>
                                        <option value="1" @if($item->have_offer == 1) selected @endif>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>offer_id</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="offer_id" value="{{ $item->offer_id }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>order_number</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="order_number" value="{{ $item->order_number }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>

                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Update Catalogue Item" class="realbutton" accesskey="s">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </td>
    </tr>
</table>
@stop
