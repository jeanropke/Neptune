@extends('layouts.master', ['menuId' => '5'])

@section('title', 'Are you a Law Enforcement Official?')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-3col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;">&nbsp;</td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 741px;" class="habboPage-col rightmost">

                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Are you a Law Enforcement Official? Need to get in touch with us?</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <p><img hspace="8" align="right"
                                                        src="{{ url('/') }}/c_images/album1725/officer_1_1_revised.gif"
                                                        alt="">Habbo works closely and in <strong style="font-weight: normal;">full cooperation with police and law
                                                        enforcement</strong>. If you are a law enforcement authority or police officer investigating a possible crime or needing
                                                    assistance, please contact us by <a
                                                        href="https://web.archive.org/web/20071012040457/mailto:safety@sulake.com?subject=Confidential%20-%20Law%20Enforcement%20Inquiry&amp;body=Nature%20of%20your%20inquiry:%0A%0AWhich%20Habbo%20site:%0A%0AYour%20contact%20details,%20including%20phone%20number:%0A%0A%0A">clicking
                                                        this link.</a><strong></strong></p>
                                                <p>Police and law enforcement inquiries receive top priority within Sulake's Habbo sites. <strong style="font-weight: normal;">Email is
                                                        the fastest and most efficient way to contact us.</strong></p>
                                                <p>Please include the following in your email request:</p>
                                                <ul>
                                                    <li>Nature of your inquiry<br></li>
                                                    <li>To which Habbo site you are referring<br></li>
                                                    <li>Your contact details, including your phone number</li>
                                                </ul>
                                                <p>Someone from our Safety and Moderation team will respond to your inquiry as soon as possible.</p>
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
                <td rowspan="2" valign="top" style=" margin-left: 4px; width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
