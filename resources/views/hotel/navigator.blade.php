@extends('layouts.master', ['menuId' => '2'])

@section('title', 'Using the Navigator to Explore')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
    <tbody>
        <tr>
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 202px;" class="habboPage-col">
                @foreach(boxes('hotel.navigator', 1) as $box)
                <div class="v3box {{ $box->color }}">
                    <div class="v3box-top">
                        <h3>{{ $box->title }}</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">
                            {!! $box->content !!}
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
                @endforeach
            </td>
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">
                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>Finding a Room</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td> <img vspace="0" hspace="0" border="0"
                                                src="{{ url('/') }}/c_images/album1379/nav.gif" alt=""></td>
                                        <td>The Hotel navigator is how you get around the Hotel. It lists all
                                            the rooms in the Hotel, both the Public rooms and the Guest Rooms.<p>To
                                                go to a room click on it in the Hotel Navigator and then on 'go' and you
                                                will be whizzed off faster than you can say "Actually... this isn't that
                                                quick".</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img vspace="0" hspace="0" border="0" align="bottom"
                                                src="{{ url('/') }}/c_images/album1379/public.gif" alt=""><br>
                                        </td>
                                        <td>Public Rooms are open to everyone in the Hotel. They can house
                                            between 25 and 100 {{ cms_config('hotel.name.short') }}s at any one time. They are very big and a great
                                            place to chill out and meet new {{ cms_config('hotel.name.short') }}s.<p>Battle Ball, the Lido diving
                                                and Wobble Squabble are contained in the Public Room section.</p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td> <img vspace="0" hspace="0" border="0"
                                                src="{{ url('/') }}/c_images/album1379/private.gif" alt=""></td>
                                        <td>Guest Rooms are rooms made by other {{ cms_config('hotel.name.short') }}s. They can house 5 - 50
                                            {{ cms_config('hotel.name.short') }}s at one time depending on the room layout.<p>A {{ cms_config('hotel.name.short') }}s own room is
                                                an extension of their {{ cms_config('hotel.name.short') }} self, you can make a night club, a
                                                restaurant, a beauty salon or a really strange looking fire truck!</p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
            </td>
            <td style="width: 4px;"></td>
            <td valign="top" style="width: 176px;">
                <div id="ad_sidebar">
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
    </tbody>
</table>
@stop
