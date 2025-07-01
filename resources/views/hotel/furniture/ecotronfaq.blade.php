@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?'], ['url' => url('/hotel/furniture'), 'title' => 'Furniture']]
])

@section('title', 'Ecotron - Furni Recycling')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 208px; height: 400px;" class="habboPage-col">
                                    @include('hotel.furniture.include.menu', ['page' => 'ecotronfaq'])
                                    @foreach (boxes('hotel.furniture.ecotronfaq', 1) as $box)
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

                                    <div class="content-white-outer">
                                        <div class="content-white">
                                            <div class="content-white-body">

                                                <div class="content-white-content">
                                                    <div align="center"><img
                                                            src="{{ url('/') }}/c_images/album2025/logo_275x56.gif"
                                                            alt=""></div>

                                                    <p>The Ecotron is the latest in Furni recycling systems. <img hspace="5" align="right"
                                                            src="{{ url('/') }}/c_images/album2025/rclr_garden.gif"
                                                            alt="">No longer will you have to delete your room, turn off

                                                        the computer or dump your unwanted Furni on a friend. Now you can throw it all

                                                        into the Ecotron and get some brand new Furni back!</p>

                                                    <p><b>HOW DOES IT WORK?</b><br>
                                                        Open the catalog and click and drop your unwanted Furni into the Ecotron - when you've

                                                        put enough in, the power bar will turn green. You can either accept the bounty

                                                        or continue to fill up the Ecotron for the next gift.</p>

                                                    <p><b>IMPORTANT POINTS</b><br><br>
                                                        <img hspace="5" align="left"
                                                            src="{{ url('/') }}/c_images/album2025/rclr_point.gif"
                                                            alt=""> You can only recycle Furni you've owned for over 2

                                                        weeks, 14 days. <br><br>

                                                        <img hspace="5" align="left"
                                                            src="{{ url('/') }}/c_images/album2025/rclr_point.gif"
                                                            alt=""> It takes just a half hour to recycle your Furni. <br><br>

                                                        <img hspace="5" align="left"
                                                            src="{{ url('/') }}/c_images/album2025/rclr_point.gif"
                                                            alt=""> Recycling continues while you are logged out.<br><br>

                                                        <img hspace="5" align="left"
                                                            src="{{ url('/') }}/c_images/album2025/rclr_point.gif"
                                                            alt=""> All Furni is treated equally - it's the number if items, not the value that counts. <br><br>

                                                        <img hspace="5" align="left"
                                                            src="{{ url('/') }}/c_images/album2025/rclr_point.gif"
                                                            alt=""> Once you have loaded your Furni into the Ecotron, you will wait 30 minutes. At the end of the 30 minutes,
                                                        you will be given a choice: to take the Ecotron Furni or to take your old Furni Back. If you have logged out, the offer to
                                                        accept your new Ecotron Furni will stay in your Catalog for 1 week. That means that you can log in anytime in the next week and
                                                        get your new Ecotron Furni from your Catalog. If you wait longer than a week, then the old recycled Furni will be returned to
                                                        your hand.
                                                    </p>


                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="content-white-bottom">
                                            <div class="content-white-bottom-body"></div>
                                        </div>
                                    </div>
                                    <div class="v3box orange">
                                        <div class="v3box-top">
                                            <h3>Non-Recyclables</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <img hspace="5" align="left"
                                                                    src="{{ url('/') }}/c_images/album2025/no_rclr_point.gif"
                                                                    alt=""> Pets <br><br>

                                                                <img hspace="5" align="left"
                                                                    src="{{ url('/') }}/c_images/album2025/no_rclr_point.gif"
                                                                    alt=""> Pet food and goodies <br><br>

                                                                <img hspace="5" align="left"
                                                                    src="{{ url('/') }}/c_images/album2025/no_rclr_point.gif"
                                                                    alt=""> Game Tickets <br><br>

                                                                <img hspace="5" align="left"
                                                                    src="{{ url('/') }}/c_images/album2025/no_rclr_point.gif"
                                                                    alt=""> Cameras and Camera Film <br><br>

                                                                <img hspace="5" align="left"
                                                                    src="{{ url('/') }}/c_images/album2025/no_rclr_point.gif"
                                                                    alt=""> Credit Furni <br><br>
                                                            </td>
                                                            <td>
                                                                <img hspace="5" align="left"
                                                                    src="{{ url('/') }}/c_images/album2025/no_rclr_point.gif"
                                                                    alt=""> Teleporters <br><br>

                                                                <img hspace="5" align="left"
                                                                    src="{{ url('/') }}/c_images/album2025/no_rclr_point.gif"
                                                                    alt=""> Unopened gifts <br><br>

                                                                <img hspace="5" align="left"
                                                                    src="{{ url('/') }}/c_images/album2025/no_rclr_point.gif"
                                                                    alt=""> Sticky notes <br><br>

                                                                <img hspace="5" align="left"
                                                                    src="{{ url('/') }}/c_images/album2025/no_rclr_point.gif"
                                                                    alt=""> Wallpaper and Flooring <br><br>

                                                                <img hspace="5" align="left"
                                                                    src="{{ url('/') }}/c_images/album2025/no_rclr_point.gif"
                                                                    alt=""> Traxmachines and Traxpacks <br><br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td rowspan="2" style="width: 4px;"></td>
                <td rowspan="2" valign="top" style="width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.partners')
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
