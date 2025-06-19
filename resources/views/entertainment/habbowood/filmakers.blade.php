@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'Filmakers')

@section('content')
    @include('entertainment.habbowood.includes.menu')
    <div class="habbomovies-custom-bg">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
            <tbody>
                <tr>
                    <td style="width: 8px;"></td>
                    <td valign="top" style="width: 202px;" class="habboPage-col">
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>The Habbo world...</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">

                                    <img vspace="5" hspace="0" border="0" align="right" src="{{ cms_config('site.c_images.url') }}/album897/maverick_1.gif" alt="">
                                    <br>
                                    ...in a bunch of <b>links!</b>

                                    <p>Check out what makes life in Habbo so cool!<br><br>
                                        As a Habbo you can:</p>
                                    <br><br>
                                    <p>
                                        <img width="15" hspace="4" height="15" alt="golden star" order="0" id="galleryImage" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif">
                                        <a href="{{ url('/') }}/hotel" target="_self">Meet friends</a>
                                        <br>
                                        <img width="15" hspace="4" height="15" alt="golden star" order="0" id="galleryImage" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif">
                                        <a href="{{ url('/') }}/entertainment/habbowood/" target="_self">Shoot movies</a><br>
                                        <img width="15" hspace="4" height="15" alt="golden star" order="0" id="galleryImage" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif">
                                        <a href="{{ url('/') }}/credits/furniture/" target="_self">Decorate your room</a><br>
                                        <img width="15" hspace="4" height="15" alt="golden star" order="0" id="galleryImage" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif">
                                        <a href="{{ url('/') }}/hotel/pets/" target="_self">Play with pets</a><br>
                                        <img width="15" hspace="4" height="15" alt="golden star" order="0" id="galleryImage" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif">
                                        <a href="{{ url('/') }}/club/" target="_self">Be exclusive</a><br>
                                        <img width="15" hspace="4" height="15" alt="golden star" order="0" id="galleryImage" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif">
                                        <a href="{{ url('/') }}/home/" target="_self">Express yourself</a><br>
                                        <img width="15" hspace="4" height="15" alt="golden star" order="0" id="galleryImage" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif">
                                        <a href="{{ url('/') }}/hotel/trax/" target="_self">Make &amp; play music</a><br>
                                        <img width="15" hspace="4" height="15" alt="golden star" order="0" id="galleryImage" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif">
                                        <a href="{{ url('/') }}/games/" target="_self">Play games</a>
                                    </p>
                                    <p>
                                        <br>What R U waiting 4?<br>
                                        <a target="_new" href="{{ url('/') }}/hotel/">Create your {{ cms_config('hotel.name.short') }} now!</a>
                                    </p>
                                    <p><a href="{{ url('/') }}/entertainment/habbowood" target="_self">Back to Habbowood</a>
                                    </p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                    <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>Meet the people!</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    <p>
                                        Hi, movie fanatic! At this point you probably already shot a few Habbowood movies. Now it's time for the next step: entering <b>{{ cms_config('hotel.name.short') }} Hotel!</b>
                                    </p>
                                    <p></p>
                                    <p>
                                        {{ cms_config('hotel.name.short') }} Hotel is a unique and amazingly funny <b>online hangout.</b> The place is packed with <b>thousands of people,</b> all in the guise of {{ cms_config('hotel.name.short') }} characters.
                                        Making <b>friends,</b> building and decorating your own <b>virtual room,</b> partying hard with your buddies, creating your own <b>music</b> and <b>movies,</b> playing cool <b>multiplayer games,</b>
                                        and keeping track of your {{ cms_config('hotel.name.short') }} experiences through your {{ cms_config('hotel.name.short') }}'s personal <b>homepage.</b>
                                        This - and much more - is life in {{ cms_config('hotel.name.short') }}.
                                    </p>
                                    <p>What's left to say, then, except...</p>
                                    <p></p>
                                    <center>
                                        <a target="_new" href="{{ url('/') }}/hotel">
                                            Dive into {{ cms_config('hotel.name.short') }} Hotel right NOW &gt;&gt;
                                        </a>
                                    </center>
                                    <p>&nbsp;</p>
                                    <center>
                                        <a target="_new" href="{{ url('/') }}/hotel">
                                            <img width="318" height="169" border="0" src="{{ cms_config('site.c_images.url') }}/common/group_of_habbos_318.gif" id="galleryImage" alt="Group of habbos (318)">
                                        </a>
                                    </center>
                                    <p><br></p>
                                    <p>
                                        <a target="_self" href="{{ url('/') }}/entertainment/habbowood">
                                            Back to Habbowood
                                        </a>
                                        <br>
                                    </p>
                                    <p>
                                        <a target="_new" href="{{ url('/') }}/hotel/">
                                            Read more &gt;&gt;
                                        </a>
                                    </p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 4px;"></td>
                    <td valign="top" style="width: 176px;">
                        <div id="ad_sidebar">
                            @include('includes.partners')
                            @include('includes.ad160')
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br style="clear: both;">
@stop
