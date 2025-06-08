@extends('layouts.master', ['menuId' => '0'])

@section('title', cms_config('hotel.name.short') . ' Homes')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 202px;" class="habboPage-col">
                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>How do I...?</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">
                                To find out how to use your Habbo Home and make it look shiny, fabby and aesthetically pleasing in a strange and forgivable way you need to read our
                                instructions.<br><br><a target="_self" href="{{ url('/') }}/hotel/homes">Habbo Homes Instructions</a><br>
                                <table width="100%" border="0" id="table1">
                                    <tbody>
                                        <tr>
                                            <td><br></td>
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
                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Looking for someone?</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <img vspace="3" hspace="3" border="0" align="left" src="{{ url('/') }}/c_images/myhabbo/stickers/nail2.gif" alt="">To find
                                your
                                friend's
                                Habbo Home, just add their Habbo name in the URL.<br><br>For example:<br><br><span style="font-weight: bold;">www.habbo.com/home/x</span><br>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Recently renovated</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">
                                <img vspace="5" hspace="5" border="0" align="right" src="{{ url('/') }}/c_images/album1356/Habbo_with_calendar_001.gif"
                                    alt="">These Habbo Homes have just been updated. Check them out now, now I say!<br><br>
                                <ul class="groups-toplist toplist toplist-avatars">
                                    @foreach ($latests as $home)
                                        <li class="{{ round(($loop->index+1)/2) % 2 ? 'even' : 'odd' }}"
                                            style="background-image: url({{ cms_config('site.avatarimage.url') }}{{ $home->getUser()->figure }}114400)">
                                            <div class="toplist-item">
                                                <div class="group-index">{{ $loop->index + 1 }}.</div>
                                                <div class="group-link">
                                                    <a href="{{ url('/') }}/home/{{ $home->getUser()->username }}">{{ $home->getUser()->username }}</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Habbo Credits</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <img vspace="5" hspace="5" border="0" align="right" src="{{ url('/') }}/web/images/common/habbo_purse_big_64.gif"
                                    alt="">Habbo
                                Credits: they are great. <br><br>You can buy new stickers and backgrounds for your Habbo Home with them!<br><br><a target="_self"
                                    href="{{ url('/') }}/credits">More about Habbo Credits</a><br>

                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                    <div class="nobox">

                        <div class="nobox-content">
                            <div align="center" flashstopped_p="true">
                                <object width="520" height="353" align="middle" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                                    codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" id="home_landingpage" flashstopped="true"
                                    flashstopped_p="true">
                                    <param name="allowScriptAccess" value="sameDomain">
                                    <param name="movie" value="{{ url('/') }}/c_images/album1740/home_landingpage.swf">
                                    <param name="quality" value="high">
                                    <param name="bgcolor" value="#47839d">
                                </object>
                            </div>
                        </div>
                    </div>
                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Getting (the party) started</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <table width="470">
                                    <tbody>
                                        <tr>
                                            <td width="130"><img src="{{ url('/') }}/c_images/album1740/step01.gif" alt=""></td>
                                            <td width="170"><img src="{{ url('/') }}/c_images/album1740/step02.gif" alt=""></td>
                                            <td width="170"><img src="{{ url('/') }}/c_images/album1740/step03.gif" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><a href="{{ url('/') }}/account/login">Log in</a> to Habbo through
                                                the toolbar.<br></td>
                                            <td valign="top">Click the 'view your Habbo Home page' link.<br></td>
                                            <td valign="top">Click the 'edit' button to edit your Habbo Home. <br></td>
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
                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Stick these on your Habbo Home!</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                These are just four of the many great stickers you can buy for your Habbo Home:<br><br>

                                <img vspace="10" hspace="10" border="0" src="{{ url('/') }}/c_images/myhabbo/stickers/sticker_heartbeat.gif" alt="">
                                <img vspace="10" hspace="10" border="0" src="{{ url('/') }}/c_images/myhabbo/stickers/sticker_bobbaskull.gif" alt="">
                                <img vspace="10" hspace="10" border="0" src="{{ url('/') }}/c_images/myhabbo/stickers/sticker_cactus_anim.gif" alt="">
                                <img vspace="10" hspace="10" border="0" src="{{ url('/') }}/c_images/myhabbo/stickers/sticker_moonpig.gif" alt="">
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
                        @include('includes.partners')
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
