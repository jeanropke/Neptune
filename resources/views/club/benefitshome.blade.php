@extends('layouts.master', ['menuId' => '3'])

@section('title', cms_config('hotel.name.short') . ' Club: For Your '. cms_config('hotel.name.short') .' Home')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody><tr>
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 202px;" class="habboPage-col">
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your {{ cms_config('hotel.name.short') }}...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt=""> Extra clothes<br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt=""> Extra hair<br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt=""> Club badge<br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt=""> Extra dances<br><br><a target="_self" href="{{ url('/') }}/club/benefits/habbo">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your room...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt=""> Monthly free furni

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt=""> Extra Guest Rooms

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt=""> VIP Public Rooms

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt=""> Priority access<br><br><a href="{{ url('/') }}/club/benefits/room" target="_self">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your {{ cms_config('hotel.name.short') }} Home...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt="">
                            <span style="font-weight: bold;">New widget skins</span>

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt="">
                            <span style="font-weight: bold;">New Backgrounds</span>

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt="">
                            <span style="font-weight: bold;">No ads!</span><br><br>
                            <a href="{{ url('/') }}/club/benefits/home" target="_self">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>Extras!</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt="">
                            Huge Friends List
                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt="">
                            :chooser command
                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.web.url') }}/images/club/miniHCbadge.gif" alt="">
                            :furni command
                            <br><br>
                            <a href="{{ url('/') }}/club/benefits/extras" target="_self">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
            </td>
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="content-white-outer">
                    <div class="content-white">
                        <div class="content-white-body">

                            <div class="content-white-content">
                                <img src="{{ cms_config('site.web.url') }}/images/club/HC_subpage_home.gif" alt=""><br><br><br><br><span style="font-weight: bold;">New Widget Skins</span><br>Spruce up your Home with a comfy pillow skin for your widgets and notes, or maybe you'd like to be all futuristic!<br><br><span style="font-weight: bold;">New backgrounds</span><br>Very, very nice backgrounds for your {{ cms_config('hotel.name.short') }} Home: a pretty pink or a dark flower pattern.<br><br><span style="font-weight: bold;">No ads!</span><br>As a {{ cms_config('hotel.name.short') }} Club member, you get to use the full width of the page, with no nasty adverts!<br>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="content-white-bottom">
                        <div class="content-white-bottom-body"></div>
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
        </tbody></table>

@stop
