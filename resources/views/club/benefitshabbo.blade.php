@extends('layouts.master', ['menuId' => '3'])

@section('title', cms_config('hotel.name.short') . ' Club: For Your Room')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody><tr>
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 202px;" class="habboPage-col">
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your {{ cms_config('hotel.name.short') }}...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br>
                            <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            <span style="font-weight: bold;">Extra clothes</span>
                            <br>
                            <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            <span style="font-weight: bold;">Extra hair</span>
                            <br>
                            <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            <span style="font-weight: bold;">Club badge</span>
                            <br>
                            <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            <span style="font-weight: bold;">Extra dances</span>
                            <br><br><a target="_self" href="{{ url('/') }}/club/benefits/habbo">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your room...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            Monthly free furni
                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            Extra Guest Rooms
                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            VIP Public Rooms
                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            Priority access
                            <br><br><a href="{{ url('/') }}/club/benefits/room" target="_self">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your {{ cms_config('hotel.name.short') }} Home...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            New widget skins

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            New Backgrounds

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            No ads!<br><br>
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

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            Huge Friends List
                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            :chooser command
                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
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
                                <img src="{{ url('/') }}/web/images/club/HC_subpage_habbo.gif" alt=""><br><br><span style="font-weight: bold;">Extra Clothes</span><br>Fashionable outfits for your {{ cms_config('hotel.name.short') }}.<br><br><span style="font-weight: bold;">Different hair</span><br>Existing hair styles in different colours, and all new styles to get you noticed in the Hotel!<br><br><span style="font-weight: bold;">Club badge</span><br>A nice shiny badge to show that you're a member of the coolest club in all of {{ cms_config('hotel.name.short') }}.<br><br><span style="font-weight: bold;">New dances</span><br>Party in style with these dances, you'll tear up the dance floor!
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
