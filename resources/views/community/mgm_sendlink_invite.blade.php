@extends('layouts.master', ['menuId' => '25'])

@section('title', 'Send link to your friend')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 202px;" class="habboPage-col">
                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>What to do in Habbo?</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <img width="48" height="119" border="0" align="right" alt="callie globe2" id="galleryImage"
                                    src="{{ cms_config('site.c_images.url') }}/common/callie_globe2.gif"><span style="font-weight: bold;"></span>In Habbo there are tons of ways to have
                                fun:<br>
                                <p>&nbsp;</p>
                                <table width="100%" border="0">
                                    <tbody>
                                        <tr>
                                            <td valign="top">
                                                <img width="15" hspace="4" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif"
                                                    id="galleryImage0" order="0" alt="golden star">
                                            </td>
                                            <td>Meet friends and make new ones</td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                <img width="15" hspace="4" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif"
                                                    id="galleryImage1" order="0" alt="golden star">
                                            </td>
                                            <td>Belong to different groups or even start your own</td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                <img width="15" hspace="4" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif"
                                                    id="galleryImage3" order="0" alt="golden star">
                                            </td>
                                            <td>Decorate your own Guest Rooms</td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                <img width="15" hspace="4" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif"
                                                    id="galleryImage4" order="0" alt="golden star">
                                            </td>
                                            <td>Have your personal home page</td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                <img width="15" hspace="4" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif"
                                                    id="galleryImage5" order="0" alt="golden star">
                                            </td>
                                            <td>Mix cool Traxations</td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                <img width="15" hspace="4" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif"
                                                    id="galleryImage6" order="0" alt="golden star">
                                            </td>
                                            <td>Play games</td>
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
                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>Sign in first, it's worth it...</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <img vspace="5" hspace="10" border="0" align="right" src="{{ cms_config('site.c_images.url') }}/album1356/Homepage_About_New_Site.gif"
                                    alt="">
                                <p>If you sign in first, you can send a link to the page and:</p>
                                <table width="100%" border="0">
                                    <tbody>
                                        <tr>
                                            <td><img hspace="4" src="{{ cms_config('site.c_images.url') }}/unsorted/golden_star.gif" alt=""></td>
                                            <td>Have your own <span style="font-weight: bold;">Habbo character</span> in the email
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img hspace="4" src="{{ cms_config('site.c_images.url') }}/unsorted/golden_star.gif" alt=""></td>
                                            <td>Your friend will receive an automatic <span style="font-weight: bold;">friend request from you</span><b>&nbsp;</b></td>
                                        </tr>
                                        <tr>
                                            <td><img hspace="4" src="{{ cms_config('site.c_images.url') }}/unsorted/golden_star.gif" alt=""></td>
                                            <td>You can add a<span style="font-weight: bold;"> personal message </span>to the email</td>
                                        </tr>
                                        <tr>
                                            <td><img hspace="4" src="{{ cms_config('site.c_images.url') }}/unsorted/golden_star.gif" alt=""></td>
                                            <td>When your friend registers, we will reward you with the new super cool Animated Diamond Sticker! <b>&nbsp;</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p><a class="colorlink orange"
                                        href="{{ url('/') }}account/login?page=/community/mgm_sendlink_invite?sendLink={{ request()->sendLink }}"><span>Login</span></a>
                                </p>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>Share the link to a Habbo Page</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <p><img width="61" vspace="5" hspace="10" height="86" border="0" align="right"
                                        src="{{ cms_config('site.c_images.url') }}/Habbowood-Habbo-Characters/shoutshout.gif" id="galleryImage" alt="shoutshout">If you want, you
                                    can send a link just to this page. However, you are not able to modify the message and
                                    your friend will not get a friend request from you.<br></p><br>I just want to share the page, not befriend with recipient.<br><br><a
                                    class="colorlink orange" href="{{ url('/') }}/community/mgm_sendlink?page={{ request()->sendLink }}"><span>Send link</span></a>

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
