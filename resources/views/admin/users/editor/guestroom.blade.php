@extends('layouts.admin.master', ['menu' => 'users'])

@section('title', 'Edit guestroom')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('layouts.admin.users', ['submenu' => 'editor_guestroom'])
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

                    @if($room)
                    <form action="" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Edit guestroom</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Owner of room</b>
                                        <div class="graytext">Who's the owner of the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="owner" maxlength="20" value="{{ $room->owner_name }}">
                                    </td>
                                </tr>
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
                                    <td class="tablerow1" width="40%" valign="middle"><b>State</b>
                                        <div class="graytext">What's the state of the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select style="color: black; font-family: Verdana" name="state">
                                            <option value="open" @if($room->state == 'open') selected="selected" @endif>Open</option>
                                            <option value="locked" @if($room->state == 'locked') selected="selected" @endif>Closed (bell)</option>
                                            <option value="password" @if($room->state == 'password') selected="selected" @endif>Password protected</option>
                                            <option value="invisible" @if($room->state == 'invisible') selected="selected" @endif>Invisible</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Password of room</b>
                                        <div class="graytext">This only works if the room is password protected!</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="password" maxlength="20" value="{{ $room->password }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Visitors inside right now</b>
                                        <div class="graytext">How many visitors are inside right now (you're faking data).</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="visitors_now" value="{{ $room->users }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Max visitors inside room</b>
                                        <div class="graytext">How many visitors may come inside the room?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="visitors_max" value="{{ $room->users_max }}">
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
                    @else
                    <div class="tableborder">
                        <div class="tableheaderalt">Habbo guestrooms editor</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="1%" align="center">Room ID</td>
                                <td class="tablesubheader" width="14%" align="center">Owner</td>
                                <td class="tablesubheader" width="30%" align="center">Roomname</td>
                                <td class="tablesubheader" width="30%" align="center">Description</td>
                                <td class="tablesubheader" width="23%" align="center">Type</td>
                                <td class="tablesubheader" width="2%" align="center">Edit</td>
                            </tr>

                            @foreach($rooms as $room)
                            <tr>
                                <td class="tablerow1" align="center">
                                     {{ $room->id }}
                                </td>
                                <td class="tablerow2">
                                    {{ $room->owner_name }}
                                </td>
                                <td class="tablerow2" align="center">
                                    {!! $room->name ? $room->name : '<b><i>No room name</i></b>'  !!}
                                </td>
                                <td class="tablerow2" align="center">
                                    {!! $room->description ? $room->description : '<b><i>No room description</i></b>'  !!}
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ $room->state }}
                                </td>
                                <td class="tablerow2" align="center">
                                    <a href="{{ route('admin.users.editor.guestroom', $room->id) }}"><img src=" {{ url('/') }}/web/admin/images/edit.gif" alt="Edit guestroom"></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @endif
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
