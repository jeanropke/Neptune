@extends('layouts.master', ['menuId' => '4', 'submenuId' => 'credits_furniture', 'headline' => true])

@section('title', 'Furni Catalog')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
        <tr>
            <td style="width: 8px;"></td>
            @include('includes.furniture', ['page' => 'catalogue', 'menu' => 'credits'])
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="v3box yellow">
                    <div class="v3box-top"><h3>The {{ cms_config('hotel.name.short') }} Catalogue</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <p>
                                {{ cms_config('hotel.name.short') }} Furni comes in all shapes and sizes, from wallpaper and toilets to Plasto chairs
                                and rollers.
                                <br>
                                These pages give a brief outline of the various types of {{ cms_config('hotel.name.short') }} Furni, as well as some
                                simple ideas on what you can do with it all!
                                <br><br>
                            </p>

                            <p></p>
                            <table width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td width="991"><strong>{{ cms_config('hotel.name.short') }} Rares<br>
                                        </strong>From time to time rares will be released into a catalogue. Rares are
                                        customarily released for a period of one - two weeks, after this they are rarely
                                        (hence the term) released again.<br></td>
                                    <td><img width="63" height="91" border="0" align="right" id="galleryImage"
                                             alt="Throne (63)"
                                             src="{{ url('/') }}/web/images/credits/hc_chair_2.gif">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td width="1068"><strong>Presents<br></strong>Show your {{ cms_config('hotel.name.short') }} friends just how much
                                        (or how little) you care about them with a gift from the catalogue! Any
                                        Catalogue item can be sent as a gift to any {{ cms_config('hotel.name.short') }}- all you need is their {{ cms_config('hotel.name.short') }}
                                        name!<br>Buying a gift for a friend is so easy even Einstein could do it! Buy an
                                        item from the catalogue and tick the 'buy as a gift' box. Tell us who the lucky
                                        {{ cms_config('hotel.name.short') }} is and we'll wrap it up and deliver it right to their hand!<br></td>
                                    <td><p style="margin-top: 0pt; margin-bottom: 0pt;"><img width="130" height="96"
                                                                                             border="0" align="right"
                                                                                             id="galleryImage"
                                                                                             alt="WF-11"
                                                                                             src="{{ url('/') }}/web/images/credits/WF_11.gif">
                                        </p></td>
                                </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td width="994"><strong>Wallpaper and Flooring</strong><br>Spruce up your room with
                                        some colourful wallpaper and wooden flooring. Alternatively choose darker
                                        colours and a grey gravel floor for your dungeon room. There are several
                                        different types of floors and wall patterns to choose from and you can see what
                                        colours and styles go together in the catalogue before you buy!<br>Please note
                                        however that once you have decorated your floor or wall, you cannot pick up the
                                        flooring and wallpaper- so be sure the colour you have chosen is just
                                        perfect!<br></td>
                                    <td><p style="margin-top: 0pt; margin-bottom: 0pt;"><img width="79" height="58"
                                                                                             border="0" align="right"
                                                                                             id="galleryImage"
                                                                                             alt="scam2"
                                                                                             src="{{ url('/') }}/web/images/credits/scam2.gif">
                                        </p></td>
                                </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td width="994"><strong>Accessories</strong><br>In the accessories section you will
                                        find a radical and random assortment of items. From stickies and pizza boxes to
                                        Holodice and spinning bottles. Scroll down to the bottom to find out more about
                                        some of the cool accessories you can use to transform your room!<br></td>
                                    <td><img width="51" height="65" border="0" align="right" id="galleryImage0"
                                             src="{{ url('/') }}/web/images/credits/holodice.gif"
                                             alt=""></td>
                                </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td width="996"><b>Gallery &amp; Flags</b><br>Adorn your walls with wondrous works
                                        of art, posters, plaques and wall hangings. The Gallery is bursting with items
                                        to suit all tastes, from kitsch to cool, traditional to modern.<br>In the
                                        gallery you can find all kinds of pictures to suit your mood and your room, from
                                        cityscapes to butterflies and ducks<br></td>
                                    <td><p align="center" style="margin-top: 0pt; margin-bottom: 0pt;"><img width="55"
                                                                                                            height="101"
                                                                                                            border="0"
                                                                                                            align="right"
                                                                                                            id="galleryImage1"
                                                                                                            src="{{ url('/') }}/web/images/credits/habbo_pictureframe_small.gif"
                                                                                                            alt=""></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td width="997"><strong>Rugs</strong><br>Rugs for all occasions, all non-slip and
                                        washable. They really tie the room together. There are three different shapes
                                        and sizes of rugs, available in several colours. This collection also includes a
                                        variety of doormats: Vital for any room unless you want someone to walk the mud
                                        into your home!<br>Best used to cover and avoid dirty stains, and as starting
                                        positions in races and events.<br></td>
                                    <td><p style="margin-top: 0pt; margin-bottom: 0pt;"><img width="57" height="31"
                                                                                             border="0" align="right"
                                                                                             id="galleryImage"
                                                                                             alt="doormat love"
                                                                                             src="{{ url('/') }}/web/images/credits/doormat_love.gif">
                                        </p></td>
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
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
        </tbody>
    </table>
@stop
