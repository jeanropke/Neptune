@extends('layouts.master', ['menuId' => '5'])

@section('title', 'Contact Us')

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
                                @foreach(boxes('help.contact_us', 1) as $box)
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
                                        <h3>Contact Us</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            <p>Use the <a href="{{ url('/') }}/iot/go" target="_blank">Habbo Help Tool</a> to send us your questions and suggestions. Make sure you choose the correct category within the Help Tool - this makes it easier for us to assist you.</p>
                                            <p><br></p>
                                            <p>Please understand that we cannot return items that have been stolen from your account by another player. So, treat your password like you treat the keys to your house - don't give them to burglars!
                                                <img vspace="0" hspace="0" border="0" align="right" src="{{ url('/') }}/web/images/iot/help_main.gif" alt=""></p><br>
                                                <p>We aim to respond to emails within two working days (Monday to Friday). Emails are only answered within office hours (9.30am to 5.30pm PST).</p><br><br>
                                                <b><p>Hi Habbos!  Due to technical difficulties and overwhelming response, our response time will be delayed. Thank you for your patience!</p>
                                                <p>Habbo USA Player Support</p></b>

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
