@extends('layouts.master', ['menuId' => '4'])

@section('title', 'Collectibles')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
    <tbody>
        <tr>
            <td rowspan="2" style="width: 8px;"></td>
            <td valign="top" style="width: 740px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td align="left" valign="top" style="width: 450px; height: 400px;" class="habboPage-col">
                                <div class="v3box darkgrey collectable">
                                    <div class="v3box-top">
                                        <h3>Current Collectable</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body" id="collectible-current">
                                            @if ($collectable)
                                            <div id="collectible-current-content">
                                                @php($cata = $collectable->getCatalogueItem())

                                                <div id="collectibles-current-img"
                                                    style="background-image: url({{ cms_config('furni.large.url') }}/{{ $cata->getNormalizedName() }}.png)">
                                                </div>
                                                <h4>{{ $cata->name }}</h4>
                                                <p>{{ $cata->description }}</p>
                                                {{--<p class="last">1/3 of Totem</p>--}}
                                                <p id="collectibles-purchase">
                                                    @auth
                                                    <a href="#" class="colorlink orange last collectibles-purchase-current"><span>Purchase</span></a>
                                                    @endauth

                                                    <span class="collectibles-timeleft">Available Until: <span
                                                            id="collectibles-timeleft-value">{{ Carbon\CarbonInterval::seconds($time)->cascade()->format('%dd %hh %imin %ss') }}</span></span>
                                                </p>

                                                <div class="clear"></div>
                                            </div>

                                            <script type="text/javascript">
                                                Collectibles.init({{ $time }}, 'Confirm purchase');
                                            </script>
                                            @else
                                                No collectable
                                            @endif
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
                            </td>
                            <td align="left" valign="top" style="width: 280px; height: 400px;"
                                class="habboPage-col rightmost">

                                <div class="v3box red">
                                    <div class="v3box-top">
                                        <h3>What are Collectables?
                                        </h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body" id="collectibles-instructions">
                                            Collectables are special furniture sold only for a limited and set period of
                                            time. Experienced Habbos would know them as rares. They always cost the same
                                            - 100 Credits.
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="v3box red">
                                    <div class="v3box-top">
                                        <h3>Invest in Collectables</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            <p class="collectibles-value-intro">
                                                <img src="{{ url('/') }}/web/images/collectibles/ukplane.png" alt=""
                                                    width="79" height="47">
                                                Collect your way to the riches! Collectables not only make a great piece
                                                of
                                                Furni but also come with an amazing trade value. As collectables will
                                                never
                                                be sold again for quite a while (that's a promise), the value will keep
                                                increasing in time.</p>
                                            <img src="{{ url('/') }}/web/images/collectibles/chart.png" alt=""
                                                width="272" height="117">

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
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
    </tbody>
</table>
@stop
