@extends('layouts.master', ['menuId' => '0'])

@section('title', 'Advertise in ' . cms_config('hotel.name.short'))

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                    @foreach (boxes('footer_pages.advertise', 1) as $box)
                                        <div class="portlet-scale gold">
                                            <div class="portlet-scale-header">
                                                <h3>{{ $box->title }}</h3>
                                            </div>
                                            <div class="portlet-scale-body">
                                                <div class="portlet-scale-content">
                                                    {!! $box->content !!}
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="portlet-scale-bottom">
                                                <div class="portlet-scale-bottom-body"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">
                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Advertise in {{ cms_config('hotel.name.short') }}</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                <span style="font-weight: bold;">Fun and Friends around the World</span><br><br>{{ cms_config('hotel.name.short') }} Hotel is one of the largest teen online communities with 16 different hotels.
                                                It is a virtual world for young people, a massively multiplayer online game where teenagers create their own virtual character and interact with other characters in the hotel.
                                                {{ cms_config('hotel.name.short') }} Hotel provides the means for self-expression, creativity, fun and curiosity within a positive community.
                                                A place where young people can meet friends - and make new ones.
                                                <br><br>
                                                <br style="font-weight: bold;">
                                                <span style="font-weight: bold;">Living Community Makes the Game Fun</span>
                                                <br><br>
                                                The ongoing success of {{ cms_config('hotel.name.short') }} Hotel is based on easy usability and a living community.
                                                It is the community that creates a truly unique gaming environment.
                                                A great deal of the changing content is created by the users themselves; thus the content is always up-to-date and interesting.
                                                It is possible to play free of charge as only decorating the rooms and participating in some competitions is chargeable.
                                                In addition to a computer, all that is needed to check in to a {{ cms_config('hotel.name.short') }} Hotel is an Internet connection.
                                                On a monthly basis, users who choose chargeable services, spend on average a sum roughly equivalent to a movie ticket.
                                                <br><br>
                                                Contact us for more information using our <a href="{{url('/') }}/help/contact_us">Help Tool</a>.
                                                Please have the subject line read, "<b>ADVERTISING INQUIRY</b>".
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
                <td rowspan="2" style="width: 8px;"></td>
            </tr>
        </tbody>
    </table>
@stop
