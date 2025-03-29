@extends('layouts.master', ['menuId' => '4', 'submenuId' => '19', 'headline' => true])

@section('title', 'Cameras')

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
                                    @include('credits.furniture.include.menu', ['page' => 'cameras'])
                                    @foreach (boxes('credits.furniture.camera', 1) as $box)
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
                                            <h3>Cameras</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <div style="margin-left: 120px;"><img
                                                        src="{{ url('/') }}/c_images/album209/Camera.png"
                                                        alt=""><br></div><br><br>The Habbo Camera is perfect for capturing your Habbo friends and memories in an
                                                instant.<br>Once you have taken your picture you can display your photos on the wall of your room for all to see!<br><br>A Camera costs
                                                10 Habbo Coins with two photos included.<br><br>When you have used up all of your film you'll need to buy more. Each roll of film costs
                                                6 Habbo Coins and contains 5 photos.<br><br><span style="font-weight: bold;">How to use the Camera (see below)</span><br><br>1. Click
                                                here to take a photo<br>2. Click to cancel the photo (don't worry, if you cancel then you won't lose a photo!)<br>3. Click to zoom in or
                                                out, for those close up pictures of your friends facial features<br>4. This shoes how many photos are left on the camera<br>5. Caption
                                                box: Write a message that will show up beneath the picture<br>6. Save the photo and keep it forever. Once you have saved your photo it
                                                will appear in your hand: you can trade your photos with your friends and stick them in your Guest Room.<br><br>
                                                <div style="margin-left: 80px;"><img vspace="0" hspace="0" border="0" align="left"
                                                        src="{{ url('/') }}/c_images/album209/Camera_Screen.png"
                                                        alt=""> <img vspace="0" hspace="0" border="0" align="right"
                                                        src="{{ url('/') }}/c_images/album209/film.png"
                                                        alt=""><br></div><br><br><br><br><img vspace="0" hspace="0" border="0" align="right"
                                                    src="{{ url('/') }}/c_images/album209/HW_photographer1.gif"
                                                    alt=""><br><br><br><br><br>
                                                <div class="clear"></div>
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
