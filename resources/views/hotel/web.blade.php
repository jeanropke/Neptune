@extends('layouts.master', ['menuId' => '2'])

@section('title', 'Web')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 202px;" class="habboPage-col">
                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>Welcome To Habbo</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <img vspace="5" hspace="5" border="0" src="{{ url('/') }}/web/images/hotel/Web_navigate_001.gif" alt="">

                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Things You Can Do On The Website</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <table width="100%" border="0" id="table1">
                                    <tbody>
                                        <tr>
                                            <td valign="top">
                                                <img src="{{ url('/') }}/web/images/hotel/Habbo_Welcome_Instructions_Web_Registering.gif">
                                            </td>
                                            <td valign="top"><b>Logging in<br></b>
                                                <p>To log into {{ cms_config('hotel.name.short') }} click the Sign In button under the My {{ cms_config('hotel.name.short') }}
                                                    dropdown menu. If this is your first time to {{ cms_config('hotel.name.short') }} (welcome!) click the
                                                    register button to enter into our baffling registration process.</p>
                                                <p>Once you have logged in you can change your profile, buy Furni from our site, see your <a href="{{ url('/') }}/home"
                                                        target="_self">{{ cms_config('hotel.name.short') }} Homes</a> page and more!<br></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>
                                </p>
                                <table width="100%" border="0" id="table2">
                                    <tbody>
                                        <tr>
                                            <td valign="top">
                                                <img src="{{ url('/') }}/web/images/hotel/Habbo_Welcome_Instructions_Toolbar_Profile.gif">
                                            </td>
                                            <td valign="top"><b>{{ cms_config('hotel.name.short') }} Profiles<br></b>
                                                <p>Once you have logged in you can edit your profile by clicking on
                                                    the 'Edity Your Settings' button. In your {{ cms_config('hotel.name.short') }} profile you can change
                                                    the clothes you wear while in the Hotel, your motto- te witty comment
                                                    you have added to your avatar, your email address
                                                    in case you registered under 'hitmail' or 'ghfdhdsiuh@hniudsjidsj.com and your password.</p>
                                                <p>
                                                    Detailed, and witty, instructions on how to change your password or
                                                    email address can be found under your profile also.</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p></p>
                                <p>&nbsp;</p>
                                <p></p>
                                <p>
                                </p>
                                <table width="100%" border="0" id="table4">
                                    <tbody>
                                        <tr>
                                            <td valign="top">
                                                <img src="{{ url('/') }}/web/images/hotel/Habbo_Welcome_Instructions_Toolbar_Purse.gif">
                                            </td>
                                            <td valign="top"><b>{{ cms_config('hotel.name.short') }} Purse<br></b>
                                                <p>Also on the {{ cms_config('hotel.name.short') }} Toolbar is the My Credits tab that allow you to see
                                                    how many {{ cms_config('hotel.name.short') }} Credits you have and link to the {{ cms_config('hotel.name.short') }} Credits page
                                                    and
                                                    to enter your voucher code for {{ cms_config('hotel.name.short') }} Credits.</p>
                                                <p>&nbsp;</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p></p>
                                <p>
                                </p>
                                <table width="100%" border="0" id="table5">
                                    <tbody>
                                        <tr>
                                            <td valign="top"><img src="{{ url('/') }}/web/images/hotel/Habbo_Welcome_Instructions_Navigator_Widget.gif" alt=""><br>
                                            </td>
                                            <td valign="top"><b>Direct Room Links<br></b>
                                                <p>With the new website you can
                                                    load {{ cms_config('hotel.name.full') }} rooms directly! Just click on a Hotel room link
                                                    (usually the room name, or saying something like 'Go to room' / 'go to
                                                    this room') and the room will load in the Hotel pop up.</p>
                                                <p>If you are not logged into the site the log in page will appear
                                                    first, and once you have logged in you will get thrown to the room
                                                    you selected.</p>
                                                <p>If you are logged in, but you don't have the Hotel window open then
                                                    the window will open for you automatically.</p>
                                                <p><a href="{{ url('/') }}/hotel/welcome_to_habbo_hotel/how_to_get_started" target="_self">More about
                                                        {{ cms_config('hotel.name.full') }}</a></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p></p>
                                <p>
                                </p>
                                <table width="100%" border="0" id="table6">
                                    <tbody>
                                        <tr>
                                            <td valign="top">
                                                <img src="{{ url('/') }}/web/images/hotel/Habbo_Welcome_Instructions_Web_Buying.gif">
                                            </td>
                                            <td valign="top"><span style="font-weight: 700;">Buying {{ cms_config('hotel.name.short') }} Furni from
                                                    website</span><span style="font-weight: bold;"><br></span>
                                                <p>Another
                                                    new feature is the ability to purchase Furni from the website. To
                                                    purchase from the website you need to first be logged in. When you see
                                                    the 'Buy now' button, and you want to purchase the item click the
                                                    button. And a little window will appear asking you to confirm that you
                                                    want to buy this. If you still want to buy the item click "purchase" and
                                                    the item will appear in your {{ cms_config('hotel.name.short') }} hand in the Hotel.</p>
                                                <p><a href="{{ url('/') }}/credits/furniture/" target="_self">More about {{ cms_config('hotel.name.short') }} Furni</a></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p></p>
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
