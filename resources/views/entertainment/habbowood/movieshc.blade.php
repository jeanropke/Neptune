@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'Movies HC')

@section('content')
    @include('entertainment.habbowood.includes.menu')
    <div class="habbomovies-custom-bg">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
            <tbody>
                <tr>
                    <td style="width: 8px;"></td>
                    <td valign="top" style="width: 202px;" class="habboPage-col">
                        <div class="v3box yellow">
                            <div class="v3box-top">
                                <h3>{{ cms_config('hotel.name.short') }} Club Benefits</h3>
                            </div>
                            <div class="v3box-content">
                                <div class="v3box-body">
                                    <span style="font-weight: bold;">{{ cms_config('hotel.name.short') }} Club</span> membership means:
                                    <br><br>
                                    <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.c_images.url') }}/album1423/miniHCbadge.gif" alt="">
                                    Extra Clothes &amp; Hair
                                    <br>
                                    <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.c_images.url') }}/album1423/miniHCbadge.gif" alt="">
                                    Extra Dances
                                    <img width="33" vspace="2" hspace="4" height="95" border="0" align="right" src="{{ cms_config('site.c_images.url') }}/album850/HW_queen.gif" id="galleryImage" alt="HW queen">
                                    <br>
                                    <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.c_images.url') }}/album1423/miniHCbadge.gif" alt="">
                                    Club Badge
                                    <br>
                                    <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.c_images.url') }}/album1423/miniHCbadge.gif" alt="">
                                    Monthly Free Furni
                                    <br>
                                    <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.c_images.url') }}/album1423/miniHCbadge.gif" alt="">
                                    Extra Rooms
                                    <br>
                                    <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.c_images.url') }}/album1423/miniHCbadge.gif" alt="">
                                    Priority Access
                                    <br>
                                    <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.c_images.url') }}/album1423/miniHCbadge.gif" alt="">
                                    New Widget Skins
                                    <br>
                                    <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.c_images.url') }}/album1423/miniHCbadge.gif" alt="">
                                    New Backgrounds
                                    <br>
                                    <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.c_images.url') }}/album1423/miniHCbadge.gif" alt="">
                                    Huge Friends List
                                    <br>
                                    <img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ cms_config('site.c_images.url') }}/album1423/miniHCbadge.gif" alt="">
                                    Special Commands
                                    <br>
                                    <br><a target="_self" href="{{ url('/') }}/club/">Find out more &gt;&gt;</a>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="v3box-bottom">
                                <div></div>
                            </div>
                        </div>
                    </td>
                    <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                        <div class="v3box yellow">
                            <div class="v3box-top">
                                <h3>Boost your moviemaking with {{ cms_config('hotel.name.short') }} Club!</h3>
                            </div>
                            <div class="v3box-content">
                                <div class="v3box-body">
                                    <img width="37" hspace="4" height="43" border="0" align="left" src="{{ cms_config('site.c_images.url') }}/album2051/clapperboard_hc.gif" id="galleryImage" alt="clapperboard hc">
                                    <br>
                                    Still striving to reach your ultimate moviemaking potential?
                                    <br>
                                    <span style="font-weight: bold;">{{ cms_config('hotel.name.short') }} Club</span> is the answer, thanks to its <b>exclusive Habbowood extras!</b>
                                    <br>
                                    <br>
                                    <p><b>HC-Only Exclusive Scenes</b><br></p>
                                    <p>
                                        The Habbowood MovieMaker offers 6 movie scenes open to all, but also <b> 4 exclusive scenes</b> reserved for {{ cms_config('hotel.name.short') }} Club membership holders.
                                        This means that the HC-only scenes can be accessed and used for moviemaking purposes by <b>{{ cms_config('hotel.name.short') }} Club members</b> only.
                                    </p>
                                    <table border="0">
                                        <tbody>
                                            <tr>
                                                <th align="center">
                                                    <a target="_new" href="{{ cms_config('site.c_images.url') }}/album2415/Car.gif">
                                                        <img width="25" height="19" border="0" src="{{ cms_config('site.c_images.url') }}/album2201/tab_icon_09_hc.gif" id="galleryImage" alt="tab icon 09 hc">
                                                    </a>
                                                </th>
                                                <th align="center">
                                                    <a target="_new" href="{{ cms_config('site.c_images.url') }}/album2415/Factory.gif">
                                                        <img width="25" height="19" border="0" src="{{ cms_config('site.c_images.url') }}/album2201/tab_icon_09_hc.gif" id="galleryImage" alt="tab icon 09 hc">
                                                    </a>
                                                </th>
                                                <th align="center">
                                                    <a target="_new" href="{{ cms_config('site.c_images.url') }}/album2415/Fight.gif">
                                                        <img width="25" height="19" border="0" src="{{ cms_config('site.c_images.url') }}/album2201/tab_icon_09_hc.gif" id="galleryImage" alt="tab icon 09 hc">
                                                    </a>
                                                </th>
                                                <th align="center">
                                                    <a target="_new" href="{{ cms_config('site.c_images.url') }}/album2415/Prison.gif">
                                                        <img width="25" height="19" border="0" src="{{ cms_config('site.c_images.url') }}/album2201/tab_icon_09_hc.gif" id="galleryImage" alt="tab icon 09 hc">
                                                    </a>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th align="center">
                                                    <a target="_new" href="{{ cms_config('site.c_images.url') }}/album2415/Car.gif">
                                                        <img width="74" height="56" border="0" src="{{ cms_config('site.c_images.url') }}/album2296/button_car.png" id="galleryImage" alt="button car">
                                                    </a>
                                                </th>
                                                <th align="center">
                                                    <a target="_new" href="{{ cms_config('site.c_images.url') }}/album2415/Factory.gif">
                                                        <img width="74" height="56" border="0" src="{{ cms_config('site.c_images.url') }}/album2296/button_factory.png" id="galleryImage" alt="button factory">
                                                    </a>
                                                </th>
                                                <th align="center">
                                                    <a target="_new" href="{{ cms_config('site.c_images.url') }}/album2415/Fight.gif">
                                                        <img width="74" height="56" border="0" src="{{ cms_config('site.c_images.url') }}/album2296/button_boxing.png" id="galleryImage" alt="button boxing">
                                                    </a>
                                                </th>
                                                <th align="center">
                                                    <a target="_new" href="{{ cms_config('site.c_images.url') }}/album2415/Prison.gif">
                                                        <img width="74" height="56" border="0" src="{{ cms_config('site.c_images.url') }}/album2296/button_jail.png" id="galleryImage" alt="button jail">
                                                    </a>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>
                                        <br><span style="font-weight: bold;">More scenes for {{ cms_config('hotel.name.short') }} Club members!</span><br>
                                    </p>
                                    <p>
                                        Also, note that, while non-members are limited to 5 scenes per movie, HC membership holders are able to create movies with up to <span style="font-weight: bold;">7 scenes!</span>
                                        <br>
                                    </p>
                                    <p>
                                        <a target="_self" href="{{ url('/') }}/club">Join {{ cms_config('hotel.name.short') }} Club now &gt;&gt;</a>
                                    </p>
                                    Back to <a href="{{ url('/') }}/entertainment/habbowood" target="_self">Habbowood Main</a><br>
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
    </div>
    <br style="clear: both;">
@stop
