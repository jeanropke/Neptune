@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?'], ['url' => url('/hotel/furniture'), 'title' => 'Furniture']]
])

@section('title', 'Seasonals')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 208px; height: 400px;" class="habboPage-col">
                                    @include('hotel.furniture.include.menu', ['page' => 'catalogue_4'])
                                    @foreach (boxes('hotel.furniture.catalogue_4', 1) as $box)
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
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Seasonal Furni</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <p>From time to time we will be releasing special 'seasonal' Furni. This furni is released
                                                    only during Christmas, {{ cms_config('hotel.name.short') }}ween and Valentines day.</p><br><br>

                                                <p></p>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="978"><strong>Christmas Furni<br></strong>Celebrate the spirit of the
                                                                yuletide season with three different Christmas trees, gingerbread houses,
                                                                stockings for your walls and plenty of holly! This furni is the <br>Also watch
                                                                out for the post-Christmas furni!<br></td>
                                                            <td><img width="32" height="51" border="0" src="{{ cms_config('site.web.url') }}/images/credits/x_15.gif" alt="x-15"
                                                                    id="galleryImage"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="975"><strong>Valentines Furni<br></strong>Share the love with Cupid
                                                                statues, pink Love ducks, giant red hearts and special love sofas! This furni is
                                                                only released during Valentines.<br></td>
                                                            <td>
                                                                <p style="margin-top: 0pt; margin-bottom: 0pt;"><strong><img width="66" height="70" border="0" align="right"
                                                                            src="{{ cms_config('site.web.url') }}/images/credits/giant_heart.gif" id="galleryImage12" alt=""></strong>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="978"><strong>{{ cms_config('hotel.name.short') }}ween Furni<br></strong>Turn your room into a haunted
                                                                cave, or a vampires mansion with bat posters, wall chains, eerie Pumpkin Lamps,
                                                                dead ducks and more! This furni is only released during {{ cms_config('hotel.name.short') }}ween.<br></td>
                                                            <td>
                                                                <p style="margin-top: 0pt; margin-bottom: 0pt;"><strong><img width="37" height="65" border="0" align="right"
                                                                            src="{{ cms_config('site.web.url') }}/images/credits/flameSkull.gif" id="galleryImage13" alt=""></strong>
                                                                </p>
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
