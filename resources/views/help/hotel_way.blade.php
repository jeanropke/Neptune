@extends('layouts.master', ['menuId' => '5', 'submenuId' => '22', 'headline' => true])

@section('title', 'The Habbo Way')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-3col">
    <tbody>
        <tr>
            <td rowspan="2" style="width: 8px;">&nbsp;</td>
            <td valign="top" style="width: 740px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td valign="top" style="width: 202px; padding-top: 3px;" class="habboPage-col">
                                @foreach(boxes('help.hotel_way', 1) as $box)
                                <div class="v3box {{ $box->color }}">
                                    <div class="v3box-top">
                                        <h3>{{ $box->title }}</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            {!! $box->content !!}
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
                                @endforeach
                            </td>
                            <td valign="top" style="width: 539px; padding-top: 3px;" class="habboPage-col rightmost">
                                <div class="v3box yellow">
                                    <div class="v3box-top">
                                        <h3>The Habbo Way</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            Here are the most important rules you must follow inside Habbo Hotel. Our <a
                                                target="_self"
                                                href="{{ url('/') }}/footer_pages/terms_and_conditions">Terms
                                                and Conditions</a> contains the full list of rules - please read those
                                            if you are unsure about how to act. If you break the Habbo Way or the <a
                                                target="_self"
                                                href="{{ url('/') }}/footer_pages/terms_and_conditions">Terms
                                                and Conditions</a>, you will be banned from Habbo Hotel.<p></p>
                                            <p><strong>You must not:</strong></p>
                                            <ul>
                                                <li>Ask for or give out passwords, email addresses or other personal
                                                    information</li><img width="41" height="78" align="right"
                                                    src="{{ url('/') }}/c_images/content/thumb_down.gif"
                                                    alt="">
                                                <li>Swear or use racist or offensive terms</li>
                                                <li>Use any programs to hack, script or edit Habbo Hotel in any way</li>
                                                <li>Trick other Habbos into giving you their passwords, Habbo Credits or
                                                    furniture</li>
                                                <li>Give away, trade or sell your Habbo account</li>
                                                <li>Trade credit voucher codes with other players<br>
                                                </li>
                                                <li>Describe sexual acts to other Habbos</li>
                                                <li>Pester people who don't want to talk to you</li>
                                                <li>Type your password anywhere except in the "Check in" box on
                                                    www.habbo.com</li>
                                                <li>Break the law or talk others into breaking it</li>
                                            </ul>
                                            <p>If you see anyone breaking the rules, please Call for Help so that a
                                                Moderator can take action.</p>
                                            <p><strong>You should:</strong></p>
                                            <ul>
                                                <li><img width="41" height="78" align="right"
                                                        src="{{ url('/') }}/c_images/content/thumb_up.gif"
                                                        alt="">Have fun!</li>
                                                <li>Hang out with your friends<br>
                                                </li>
                                                <li> Make new friends</li>
                                                <li>Respect other people's opinions and beliefs</li>
                                            </ul>

                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
                            </td>
                            <td style="width: 4px;"></td>
                            <td valign="top">
                                <div id="ad_sidebar">
                                    @include('includes.ad160')
                                </div>
                                <div style="width: 4px"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@stop
