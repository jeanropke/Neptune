@extends('layouts.master', ['menuId' => '2', 'submenuId' => 'hotel_welcome_started', 'headline' => true])

@section('title', 'How To Get Started')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
    <tbody>
        <tr>
            <td style="width: 8px;"></td>
            @include('includes.welcome', ['page'=> 'welcome_started'])
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>Getting Started</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <p>Before you can explore the Hotel, you'll need to 'check in'. The first time
                                you check in to {{ cms_config('hotel.name.full') }}, you have to register an account and create your
                                {{ cms_config('hotel.name.short') }}.<br>
                                <br>
                                Creating a {{ cms_config('hotel.name.short') }} account is simple and it will only take a few minutes - just
                                follow the instructions below:<br>
                                <br>
                                <img border="0" align="left" src="{{ url('/') }}/c_images/payment/1_hi.gif"
                                    alt=""><span style="font-weight: bold;">Installing Shockwave</span><br>
                                Before you can check in to {{ cms_config('hotel.name.full') }} for the first time, you need to download
                                and install Shockwave- it should only take a couple of minutes. If a 'security
                                warning' box appears when you are installing, just click 'yes'.</p>
                            <p><br><br>

                                <img border="0" align="left" src="{{ url('/') }}/c_images/payment/2_hi.gif"
                                    alt=""><span style="font-weight: bold;">Checking in for the first time<img
                                        width="105" height="106" border="0" align="right" id="galleryImage"
                                        src="{{ url('/') }}/c_images/album209/enterHH.png"
                                        alt=""></span><br style="font-weight: bold;">
                                Once Shockwave is installed you're ready to check in to {{ cms_config('hotel.name.full') }}. Click
                                <span style="font-weight: bold;">enter {{ cms_config('hotel.name.full') }} </span>and a new window will open.
                                When the Hotel loading bar reaches 100%,
                                you'll see the Hotel View page.<br>
                                <br>
                                <br><img border="0" align="left" src="{{ url('/') }}/c_images/payment/3_hi.gif"
                                    alt=""><span style="font-weight: bold;">
                                    Creating your {{ cms_config('hotel.name.short') }}</span><br>
                                The first time you check in to {{ cms_config('hotel.name.full') }}, you have to register an account and
                                create your {{ cms_config('hotel.name.short') }}. A log in window will appear as soon as the page has loaded.
                                Click on 'You can create one here' to open the registration window.<br>
                                <br>
                                <br>
                                The registration process is simple, just confirm that you're over 11 years old, pick a
                                name for your {{ cms_config('hotel.name.short') }}, decide whether you want to be a girl or a boy and choose
                                your clothes. When you've done all that... click next!<br><img width="194" vspace="0"
                                    hspace="0" height="118" border="0" align="right"
                                    src="{{ url('/') }}/c_images/album209/tour_create_habbo.gif" alt=""> </p>
                            <p>
                                Now the fun begins! You'll need to choose a name for your {{ cms_config('hotel.name.short') }}, decide whether
                                you want to be a girl or a boy and tell us what your mission is. Oh - and don't
                                forget to choose your clothes! You can change everything except your name later,
                                so don't take too long deciding.<br>
                            </p>
                            <p><br>
                                When you've entered your details click 'Next' and you'll be asked to confirm the
                                details you've entered are correct. Click 'next' is everything is correct, or
                                'back' if there is anything you want to change.<br>
                            </p>
                            <p><br>
                                <img width="194" vspace="0" hspace="0" height="267" border="0" align="right"
                                    src="{{ url('/') }}/c_images/album209/tour_habbo_id.gif" alt=""><br>
                                <br>
                                Congratulations, you are now a {{ cms_config('hotel.name.short') }}!<br>
                                <br><span style="font-weight: bold;">
                                    Please note:</span> during the registration process we ask for your date of birth
                                and
                                email address, but you don't need to worry. We won't tell anyone your personal details:
                                your email address is needed so that we can contact you should you
                                forget your password, or win a competition.<br>
                            </p>
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
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
    </tbody>
</table>
@stop
