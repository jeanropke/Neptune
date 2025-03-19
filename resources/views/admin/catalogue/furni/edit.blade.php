@extends('layouts.admin.master', ['menu' => 'catalogue'])

@section('title', 'Furni item editor')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.catalogue', ['submenu' => 'catalogue_furni'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if($errors->any())
                <p><strong>{{ $errors->first() }}</strong></p>
                @endif

                <form action="{{ route('admin.catalogue.furni.save') }}" method="post" name="theAdminForm"
                    id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Editing furni item - {{ $furni->item_name }} ({{ $furni->id }})
                        </div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>ID</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="id" value="{{ $furni->id }}" size="30" class="textinput"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Sprite ID</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="sprite_id" value="{{ $furni->sprite_id }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Public name</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="public_name" value="{{ $furni->public_name }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Description</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="description" value="{{ $furni->description }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Item name</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="item_name" value="{{ $furni->item_name }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Type</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="type" value="{{ $furni->type }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Width</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="width" value="{{ $furni->width }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Length</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="length" value="{{ $furni->length }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Stack height</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="stack_height" value="{{ $furni->stack_height }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Allow stack</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="allow_stack">
                                        <option value="0" @if($furni->allow_stack == 0) selected @endif>No</option>
                                        <option value="1" @if($furni->allow_stack == 1) selected @endif>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>allow_walk</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="allow_walk">
                                        <option value="0" @if($furni->allow_walk == 0) selected @endif>No</option>
                                        <option value="1" @if($furni->allow_walk == 1) selected @endif>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>allow_sit</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="allow_sit">
                                        <option value="0" @if($furni->allow_sit == 0) selected @endif>No</option>
                                        <option value="1" @if($furni->allow_sit == 1) selected @endif>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>allow_lay</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="allow_lay">
                                        <option value="0" @if($furni->allow_lay == 0) selected @endif>No</option>
                                        <option value="1" @if($furni->allow_lay == 1) selected @endif>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>allow_recycle</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="allow_recycle">
                                        <option value="0" @if($furni->allow_recycle == 0) selected @endif>No</option>
                                        <option value="1" @if($furni->allow_recycle == 1) selected @endif>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>allow_trade</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="allow_trade">
                                        <option value="0" @if($furni->allow_trade == 0) selected @endif>No</option>
                                        <option value="1" @if($furni->allow_trade == 1) selected @endif>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>allow_marketplace_sell</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="allow_marketplace_sell">
                                        <option value="0" @if($furni->allow_marketplace_sell == 0) selected @endif>No
                                        </option>
                                        <option value="1" @if($furni->allow_marketplace_sell == 1) selected @endif>Yes
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>allow_gift</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="allow_gift">
                                        <option value="0" @if($furni->allow_gift == 0) selected @endif>No</option>
                                        <option value="1" @if($furni->allow_gift == 1) selected @endif>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>allow_inventory_stack</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="allow_inventory_stack">
                                        <option value="0" @if($furni->allow_inventory_stack == 0) selected @endif>No
                                        </option>
                                        <option value="1" @if($furni->allow_inventory_stack == 1) selected @endif>Yes
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>interaction_type</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="interaction_type" value="{{ $furni->interaction_type }}"
                                        size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>interaction_modes_count</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="interaction_modes_count"
                                        value="{{ $furni->interaction_modes_count }}" size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>vending_ids</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="vending_ids" value="{{ $furni->vending_ids }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>effect_id_male</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="effect_id_male" value="{{ $furni->effect_id_male }}"
                                        size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>effect_id_female</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="effect_id_female" value="{{ $furni->effect_id_female }}"
                                        size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>clothing_on_walk</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="clothing_on_walk" value="{{ $furni->clothing_on_walk }}"
                                        size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>multiheight</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="multiheight" value="{{ $furni->multiheight }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>color</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="color" value="{{ $furni->color }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>customparams</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="customparams" value="{{ $furni->customparams }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>specialtype</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="specialtype" value="{{ $furni->specialtype }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>furniline</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="furniline" value="{{ $furni->furniline }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Update Furni Item" class="realbutton" accesskey="s">
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
