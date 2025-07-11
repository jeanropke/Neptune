@extends('layouts.master', ['menuId' => 'account_activation'])
@section('title', 'Account Activation')
@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td colspan="5" style="height: 4px;"></td>
            </tr>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td colspan="2" style="padding-bottom: 3px;"></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" style="width: 430px; height: 400px;" class="habboPage-col">
                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Welcome to Habbo</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <img vspace="0" hspace="0" border="0" align="right"
                                                    src="{{ cms_config('site.c_images.url') }}/album236/News.gif" alt="">Welcome
                                                to Habbo
                                                Hotel!<br><br>If this is your first time here then please take a look around.
                                                Habbo Hotel is a virtual five star Hotel, where you can: walk and dance; eat,
                                                drink and chat in the cafes and restaurants; check out the cinema,, play <a target="_self"
                                                    href="{{ url('/') }}/games/battleball/">Battle Ball</a>
                                                or take a dip in the <a target="_self" href="{{ url('/') }}/games/dive/">Swimming
                                                    Pool</a>.
                                                <p>You can even create your own Room for free, with the Room-O-Matic. When
                                                    you've created a room, you can decorate it any way you like - there's something
                                                    for everyone in the
                                                    <a target="_self" href="{{ url('/') }}/hotel/furniture/">Furni
                                                        Catalogue</a>.
                                                </p>
                                                <p>If all that's not enough to keep you entertained, visit the
                                                    <a href="{{ url('/') }}/community">Community</a> section
                                                    to find out what else is happening this week in Habbo Hotel!
                                                </p>
                                                <p>Opposite are some links that you may find useful if you're new to us, but the best way to get to know Habbo is to <a
                                                        href="{{ url('/') }}/client" target="client" onclick="openOrFocusHabbo(this); return false;">Check
                                                        In</a> and experience it for yourself.<br><br style="font-weight: bold;"><span style="font-weight: bold;">Enjoy your stay here
                                                        at Habbo!</span><br></p>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                </td>
                                <td align="left" valign="top" style="width: 310px; height: 400px;" class="habboPage-col rightmost">
                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Verify Your Email Address</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                <div id="email_2" class="component">
                                                    <ul class="errors">
                                                        <li>Habbo name is required.</li>
                                                        <li>Verification id is required.</li>
                                                        <li>Action type definition is required.</li>
                                                        <li>Action type definition is required.</li>
                                                    </ul>
                                                </div><br><br><br><br>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Useful links</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                <img vspace="0" hspace="0" border="0" align="right"
                                                    src="{{ cms_config('site.c_images.url') }}/common/404_G.gif" alt="">
                                                <a target="_self" href="{{ url('/') }}/hotel/welcome_to_habbo_hotel/how_to_get_started">The Welcome
                                                    Guide</a><br><a href="{{ url('/') }}/help/" target="_self">Help &amp; Safety Section</a><br><a
                                                    href="{{ url('/') }}/footer_pages/terms_and_conditions" target="_self">Terms
                                                    &amp; Conditions</a><br><a href="{{ url('/') }}/help/habbo_way" target="_self">The Habbo Way</a><a href="#"><br></a><a
                                                    href="{{ url('/') }}//help/faqs?faq_1_categoryId=15">Information About Your Habbo
                                                    Account</a><br><a target="_self" href="{{ url('/') }}/help/parents_guide">Our
                                                    Parents Guide</a><br>
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
