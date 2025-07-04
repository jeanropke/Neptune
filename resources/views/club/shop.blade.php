@extends('layouts.master', ['menuId' => '3'])

@section('title', cms_config('hotel.name.short') . ' Club Shop')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 202px;" class="habboPage-col">
                    @foreach (boxes('club.shop', 1) as $box)
                        @include('includes.boxes.' . $box->type, compact('box'))
                    @endforeach
                </td>
                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>Exclusive HC offer</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <p align="center">
                                    <img src="{{ url('/') }}/c_images/album1470/Blue_Solarium.gif" alt="">
                                </p>
                                <br><br>Available only to {{ cms_config('hotel.name.short') }} Club members - the Blue Solarium. <a target="_self"
                                    href="{{ url('/') }}/club/join">Join {{ cms_config('hotel.name.short') }} Club now</a> for your chance to buy it.<br>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="nobox">

                        <div class="nobox-content">

                            <div class="v2box brown darkest">
                                <div class="headline">
                                    <h3 style="text-transform: uppercase">JOIN {{ cms_config('hotel.name.short') }} CLUB!</h3>
                                </div>
                                <div class="border">
                                    <div></div>
                                </div>
                                <div class="body">

                                    <img src="{{ cms_config('site.web.url') }}/images/club/piccolo_happy.gif" alt="" align="left" style="margin:10px;">
                                    <img src="{{ cms_config('site.web.url') }}/images/club/hcclick_trnsprnt.gif" alt="" align="right">
                                    <p>{{ cms_config('hotel.name.short') }} Club is {{ cms_config('hotel.name.short') }} Hotel's exclusive club, and as a member of this club you get
                                        privileges that are not available to non-{{ cms_config('hotel.name.short') }} Club {{ cms_config('hotel.name.short') }}s. As a member you get
                                        priority access to the Hotel and Public Rooms, rare furni gifts, extra cool dances and so much more.</p>

                                    <div id="subscription-divider">
                                        <div>
                                            @if (!Auth::check())
                                                <div class="content-beige">
                                                    <div class="content-beige-body">
                                                        In order to join {{ cms_config('hotel.name.short') }} Club you need to <a href="{{ url('/') }}/login">log in</a> first.
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <div class="content-beige-bottom">
                                                    <div class="content-beige-bottom-body"></div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                                <div class="bottom">
                                    <div></div>
                                </div>
                            </div>


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
