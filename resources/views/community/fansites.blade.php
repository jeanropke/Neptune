@extends('layouts.master', ['menuId' => '25'])

@section('title', 'Fansites')

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
                                    @foreach (boxes('community.fansites', 1) as $box)
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
                                <td valign="top" style="width: 539px; height: 400px;" class="habboPage-col rightmost">
                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>The Official Fansites of {{ cms_config('hotel.name.short') }}!</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                <p>Welcome to our <b>Official {{ cms_config('hotel.name.short') }} Fansites</b> list!</p>
                                                <p>
                                                    <img align="right" src="{{ url('/') }}/c_images/album209/official.gif" alt="">
                                                    Listed in no particular order, these
                                                    Fansites are the source to go for the dedicated {{ cms_config('hotel.name.short') }}.
                                                    Or even the new {{ cms_config('hotel.name.short') }} player.
                                                    You can find out anything you ever wanted to know about anything {{ cms_config('hotel.name.short') }} related
                                                    from these sites. Ranging from music to forums to everything in between!
                                                    Check them out!
                                                </p>
                                                <br>
                                                <hr width="100%">
                                                <table width="100%" cellpadding="2">
                                                    <tbody>
                                                        @foreach ($fansites as $fansite)
                                                            <tr>
                                                                <td width="140" valign="top" align="right">
                                                                    <a target="_blank" href="{{ $fansite->url }}">
                                                                        <img border="0" src="{{ $fansite->image }}" alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a target="_blank" href="{{ $fansite->url }}">
                                                                        {{ $fansite->name }}
                                                                    </a>
                                                                    <br>
                                                                    {{ $fansite->description }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
