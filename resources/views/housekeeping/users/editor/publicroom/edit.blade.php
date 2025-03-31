@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Publicroom Editor')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.users.include.menu', ['submenu' => 'publicroom.edit'])
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
                    <form action="{{ route('housekeeping.editor.publicroom.edit.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="number" name="id" value="{{ $room->id }}" hidden>
                        <div class="tableborder">
                            <div class="tableheaderalt">Edit publicroom</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Name of room</b>
                                        <div class="graytext">What's the name of the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="name" value="{{ $room->name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Description of room</b>
                                        <div class="graytext">What's the description of the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="description" value="{{ $room->description }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Visitors inside right now</b>
                                        <div class="graytext">How many visitors are inside right now (you're faking data).</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="visitors_now" value="{{ $room->visitors_now }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Max visitors inside room</b>
                                        <div class="graytext">How many visitors may come inside the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="visitors_max" value="{{ $room->visitors_max }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Hidden</b>
                                        <div class="graytext">Is this room hidden?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select style="color: black; font-family: Verdana" name="is_hidden">
                                            <option value="0" {{ $room->is_hidden == 0 ? 'selected="selected"' : '' }}>No</option>
                                            <option value="1" {{ $room->is_hidden == 1 ? 'selected="selected"' : '' }}>Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Category</b>
                                        <div class="graytext">What's the category of the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select style="color: black; font-family: Verdana" name="category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $room->category ? 'selected="selected"' : '' }}>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Save Options" class="realbutton" accesskey="s">
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
