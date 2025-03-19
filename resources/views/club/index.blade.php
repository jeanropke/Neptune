@extends('layouts.master', ['menuId' => '3', 'submenuId' => '14', 'headline' => true])

@section('title', cms_config('hotel.name.short') . ' Club')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody><tr>
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 202px;" class="habboPage-col">
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your {{ cms_config('hotel.name.short') }}...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra clothes<br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra hair<br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Club badge<br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra dances<br><br><a target="_self" href="{{ url('/') }}/club/benefits/habbo">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your room...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Monthly free furni

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra Guest Rooms

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> VIP Public Rooms

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Priority access<br><br><a href="{{ url('/') }}/club/benefits/room" target="_self">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your {{ cms_config('hotel.name.short') }} Home...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> New widget skins

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> New Backgrounds

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> No ads!<br><br>
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

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">  Huge Friends List

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> :chooser command

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> :furni command<br><br><a href="{{ url('/') }}/club/benefits/extras" target="_self">Find out more &gt;&gt;</a><br>
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
                                <object width="521" height="320" align="middle" id="goth" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
                                    <param value="sameDomain" name="allowScriptAccess">
                                    <param value="{{ url('/') }}/web/images/club/HC_megashow1.swf" name="movie">
                                    <param value="low" name="quality">
                                    <param value="#ffffff" name="bgcolor">
                                    <embed width="521" height="320" align="middle" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" allowscriptaccess="sameDomain" name="Gothicpromo_292x250" bgcolor="#ffffff" quality="low" src="{{ url('/') }}/web/images/club/HC_megashow1.swf">
                                </object>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="content-white-bottom">
                        <div class="content-white-bottom-body"></div>
                    </div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3 style="text-transform: uppercase">JOIN {{ cms_config('hotel.name.short') }} CLUB!</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <img vspace="10" hspace="10" border="0" align="left" src="{{ url('/') }}/web/images/club/piccolo_happy.gif" alt="">
                            <br><br>
                            <span style="font-weight: bold;">Join {{ cms_config('hotel.name.short') }} Club, the VIP members-only club, and enjoy exclusive room layouts, furni, priority access, cool clothes and commands for just 30 Credits a month!</span>
                            <br><br><a href="{{ url('/') }}/club/join" target="_self">Join now &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
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
