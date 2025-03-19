@extends('layouts.master', ['menuId' => '2', 'submenuId' => 'hotel_welcome_started', 'headline' => true])

@section('title', 'Moving Around and Chatting')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
    <tbody>
        <tr>
            <td style="width: 8px;"></td>
            @include('includes.welcome', ['page'=> 'welcome_help'])
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>Help and Safety</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">
                            <p><img align="right" src="{{ url('/') }}/c_images/content/thumb_up.gif" alt="">If
                                you have a question about Hotel Hotel, or need some advice about
                                staying safe, then you're in the right place. </p>
                            <p>Check out all the
                                different places you can go for help:</p>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>The FAQs (Frequently Asked Questions)</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            If you have a question about Hotel Hotel or need some advice about staying safe, the best
                            thing to do is check out the <a target="_self" href="{{ url('/') }}/help/faqs">FAQs</a>. The
                            FAQs
                            are jam packed full
                            of helpful information and sorted into sections for easy navigation.<br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>{{ cms_config('hotel.name.short') }} X</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">
                            <a href="{{ url('/') }}/help/faq/faq_category/?id=28">
                                <img border="0" align="right" src="{{ url('/') }}/c_images/album344/HabboX_2.gif"
                                    alt=""></a>{{ cms_config('hotel.name.short') }} Xs (short for eXperts) meet and greet new users and introduce
                            them to the Hotel, answer questions and show them how things work. Xs will mainly hang about
                            in the Welcome Lounge, but
                            occasionally you will see them in other Public Spaces. Think of {{ cms_config('hotel.name.short') }}
                            Xs as gracious hosts and goodwill ambassadors - {{ cms_config('hotel.name.short') }}s who are
                            there to take care of our newest {{ cms_config('hotel.name.short') }} visitors.
                            <p>{{ cms_config('hotel.name.short') }} X have a special 'X' badge and they will always show it
                                when asked. Don't fall for impersonators, always ask to see their
                                badge.</p>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>Account Security</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">
                            <img align="right" src="{{ url('/') }}/c_images/album108/image_5.gif" alt="">We do
                            everything we can to make sure that {{ cms_config('hotel.name.full') }} is a safe place to
                            hang out, but you have to watch out for {{ cms_config('hotel.name.short') }}s who are out to trick you. These bad {{ cms_config('hotel.name.short') }}s
                            will try to steal your Furni, account or Credits, either by tricking you
                            into handing them or your password over.<p>

                                The more time you spend on {{ cms_config('hotel.name.short') }}, the more knowledge you will gain
                                about safety related issues. But, new tricks are thought of all the time, so make sure
                                you check out the <a target="_self" href="{{ url('/') }}/help/account_security">Account
                                    Security</a> pages to keep one step ahead.</p>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>Contact Us Via Email</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">
                            <p align="left">You can use the <a target="_blank" href="{{ url('/') }}/iot/go">{{ cms_config('hotel.name.short') }}
                                    Help Tool</a> to send an email to {{ cms_config('hotel.name.full') }},
                                but before you use the tool, please take a look at the <a target="_self"
                                    href="{{ url('/') }}/help/faqs">FAQs</a> to see
                                if your question is answered there.</p>
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
