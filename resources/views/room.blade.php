@extends('layouts.master', ['menuId' => 'article'])

@section('title', $room->name)

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        <tr> {{ $room }}
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 241px; padding-top: 3px;" class="habboPage-col">
                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>Details</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">
                            <div class="archive-sidebar">
                                <ul>
                                    <li><b>Score:</b> {{ $room->score }}</li>
                                    <li><b>Users max:</b> {{ $room->users_max }}</li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
            </td>
            <td valign="top" style="width: 500px; padding-top: 3px;" class="habboPage-col rightmost">
                <div class="v3box yellow" id="room">
                    <div class="v3box-top">
                        <h3>Room</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">
                            <table>
                                <tr>
                                    <td>
                                        <div class="thumbnail">
                                            <div class="img"
                                                style="background: url({{ url('/') }}/ugc/thumbnails/{{ $room->id }}.png)">
                                            </div>
                                        </div>
                                    </td>
                                    <td style="display: block;margin-left: 10px;" class="archive-sidebar">
                                        <ul>
                                            <li><b>Name:</b> {{ $room->name }}</li>
                                            <li><b>Description:</b> {{ $room->description }}</li>
                                            <li><b>Owner:</b> <a href="{{ route('home.user.username', $room->owner_name) }}">{{ $room->owner_name }}</a></li>
                                        </ul>
                                    <div class="promo-button"><a href="{{ url('/') }}/client?roomId={{ $room->id }}">Enter</a></div>
                                    </td>

                                </tr>
                            </table>

                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
            </td>
            <td style="width: 4px;"></td>
            <td valign="top">
                <div id="ad_sidebar">
                    @include('includes.ad160')
                </div>
                <div style="width: 4px"></div>
            </td>
        </tr>
    </tbody>
</table>
<br style="clear: both;">
@stop
