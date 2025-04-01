@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Guestroom')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'guestroom.listing'])
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
                    <form action="{{ route('housekeeping.editor.guestroom.listing') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        <div class="tableborder">
                            <div class="tableheaderalt">Search Guestroom</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Value</b>
                                        <div class="graytext">Search by username or room name</div>
                                    </td>
                                    <td class="tablerow2" width="70%" valign="middle">
                                        <input type="text" name="value" value="" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Type</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="70%" valign="middle">
                                        <select name="type" class="textinput" style="margin-top: 5px;" size="1">
                                            <option value="owner">Username</option>
                                            <option value="roomname">Room name</option>
                                        </select>
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
                        <div class="tableheaderalt">Habbo guestrooms editor</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="6%" align="center">Room ID</td>
                                <td class="tablesubheader" width="10%" align="center">Owner</td>
                                <td class="tablesubheader" width="20%" align="center">Roomname</td>
                                <td class="tablesubheader" width="40%" align="center">Description</td>
                                <td class="tablesubheader" width="23%" align="center">Type</td>
                                <td class="tablesubheader" width="1%" align="center">Edit</td>
                            </tr>
                            @forelse ($rooms as $room)
                                <tr>
                                    <td class="tablerow1" align="center">
                                        {{ $room->id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $room->getOwner() }} <br />
                                        <i><a href="{{ route('housekeeping.editor.guestroom.listing') }}?type=owner&value={{ $room->getOwner() }}">See user rooms</a></i>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {!! $room->name ?? '<b><i>No room name</i></b>' !!}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {!! $room->description ?? '<b><i>No room description</i></b>' !!}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $room->getState() }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.editor.guestroom.edit', $room->id) }}"><img src=" {{ url('/') }}/web/housekeeping/images/edit.gif"
                                                alt="Edit guestroom"></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="tablerow1" align="center" colspan="6">
                                        No rooms found
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $rooms->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
