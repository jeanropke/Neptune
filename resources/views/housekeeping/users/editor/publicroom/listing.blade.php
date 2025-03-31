@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Publicroom')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.users.include.menu', ['submenu' => 'publicroom.listing'])
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
                    <form action="{{ route('housekeeping.editor.publicroom.listing') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        <div class="tableborder">
                            <div class="tableheaderalt">Search Publicroom</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Value</b>
                                        <div class="graytext">Search by room name</div>
                                    </td>
                                    <td class="tablerow2" width="70%" valign="middle">
                                        <input type="text" name="value" value="" size="30" class="textinput">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />
                    <div class="tableborder">
                        <div class="tableheaderalt">Publicrooms editor
                            <div class="tableheaderalt-right">
                                <a href="{{ route('housekeeping.editor.publicroom.add') }}">Add new public room</a>
                            </div>
                        </div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="6%" align="center">Room ID</td>
                                <td class="tablesubheader" width="20%" align="center">Roomname</td>
                                <td class="tablesubheader" width="10%" align="center">Category</td>
                                <td class="tablesubheader" width="20%" align="center">CCTs</td>
                                <td class="tablesubheader" width="34%" align="center">Description</td>
                                <td class="tablesubheader" width="5%" align="center">Edit</td>
                                <td class="tablesubheader" width="5%" align="center">Delete</td>
                            </tr>
                            @forelse ($rooms as $room)
                                <tr>
                                    <td class="tablerow1" align="center">
                                        {{ $room->id }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {!! $room->name ?? '<b><i>No room name</i></b>' !!}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $room->category }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $room->ccts }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {!! $room->description ? $room->description : '<b><i>No room description</i></b>' !!}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.editor.publicroom.edit', $room->id) }}">
                                            <img src=" {{ url('/') }}/web/housekeeping/images/edit.gif" alt="Edit publicroom">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-publicroom" data-id="{{ $room->id }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="tablerow1" align="center" colspan="6">
                                        No publicrooms found
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                        <script>
                            PublicRoomManager.initialise();
                        </script>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $rooms->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
