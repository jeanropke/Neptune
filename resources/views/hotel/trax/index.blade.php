@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?']],
])
@section('title', 'Trax Machine')

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
                                    @include('hotel.trax.include.menu', ['page' => 'index'])
                                    @foreach (boxes('hotel.trax.index', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="v3box green">
                                        <div class="v3box-top">
                                            <h3>TRAXmachine is here!</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body" flashstopped_p="true">
                                                <object width="512" height="288" align="middle" id="trax"
                                                    codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0"
                                                    classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" flashstopped="true" flashstopped_p="true">
                                                    <param value="sameDomain" name="allowScriptAccess">
                                                    <param value="{{ url('/') }}/c_images/album2431/TraxVideo_US.swf" name="movie">
                                                    <param value="high" name="quality">
                                                    <param value="#ffffff" name="bgcolor">
                                                </object>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>Get Your FREE Blue Traxmachine and Starter Traxpack here!</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <p align="center"><img hspace="10" border="0" align="left" src="{{ url('/') }}/c_images/album1280/trax_pic1.gif"
                                                        alt=""><img hspace="10" border="0" align="right"
                                                        src="{{ url('/') }}/c_images/album1280/Trax_carrying_guy.gif" alt=""><strong><br>Want
                                                        a *FREE* BLUE TRAXMACHINE?</strong></p>
                                                <p align="center">All you have to do is <a href="https://web.archive.org/web/20071011200136/http://promo.habbohotel.com/trax/"
                                                        target="_blank"><strong>CLICK HERE</strong></a>, and enter your email address to take advantage of this <em>ROCKIN</em>'
                                                    <strong>limited time
                                                        offer!</strong>
                                                </p>
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
