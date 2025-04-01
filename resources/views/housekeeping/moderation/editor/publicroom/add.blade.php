@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Publicroom Editor')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'publicroom.edit'])
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
                    <form action="{{ route('housekeeping.editor.publicroom.add.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Edit publicroom</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Name of room</b>
                                        <div class="graytext">What's the name of the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="name" value="{{ old('name') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Description of room</b>
                                        <div class="graytext">What's the description of the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="description" value="{{ old('description') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Model of room</b>
                                        <div class="graytext">What's the model of the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="model" value="{{ old('model') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>CCTs of room</b>
                                        <div class="graytext">What's the ccts of the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="ccts" value="{{ old('ccts') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Visitors inside right now</b>
                                        <div class="graytext">How many visitors are inside right now (you're faking data).</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="number" name="visitors_now" value="{{ old('visitors_now') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Max visitors inside room</b>
                                        <div class="graytext">How many visitors may come inside the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="number" name="visitors_max" value="{{ old('visitors_max') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Hidden</b>
                                        <div class="graytext">Is this room hidden?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select style="color: black; font-family: Verdana" name="is_hidden">
                                            <option value="0" {{ old('is_hidden') == 0 ? 'selected="selected"' : '' }}>No</option>
                                            <option value="1" {{ old('is_hidden') == 1 ? 'selected="selected"' : '' }}>Yes</option>
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
                                                <option value="{{ $category->id }}" {{ $category->id == old('category') ? 'selected="selected"' : '' }}>{{ $category->name }}
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
