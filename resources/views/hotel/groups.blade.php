@extends('layouts.master', ['menuId' => '26'])

@section('title', 'Groups')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 202px;" class="habboPage-col">
                    @foreach (boxes('hotel.groups', 1) as $box)
                        @include('includes.boxes.' . $box->type, compact('box'))
                    @endforeach
                </td>
                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>{{ cms_config('hotel.name.short') }} Groups - it's what you make it!</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">
                                <p align="center"><img src="{{ url('/') }}/c_images/album2276/groups_header_image.gif" alt=""></p>
                                <p>Join a collective, form a gang, create a fan club, make new friends or just hang out with your old mates - {{ cms_config('hotel.name.short') }}
                                    Groups is what you make it! Joining a group is free and it's only 10 {{ cms_config('hotel.name.short') }} Credits to start your own.<br></p>
                                <p>
                                </p>
                                <x-purchase_group id="group_purchase_2" product="g0 group_product" />
                                <p></p>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>Most Active Groups</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <ul class="groups-toplist toplist">
                                    @foreach ($groups as $key => $group)
                                        <li class="{!! round(($key + 1) / 2) % 2 ? 'even' : 'odd' !!}" style="background-image: url({{ cms_config('site.groupbadge.url') }}{{ $group->badge }}.gif)">
                                            <div class="toplist-item">
                                                <div class="group-index">{{ $key + 1 }}.</div>
                                                <div class="group-link">
                                                    <a href="{{ url($group->url) }}"
                                                        class="@if ($group->state == 1) exclusive @elseif($group->state == 2) closed @endif"
                                                        title="@if ($group->state == 1) Exclusive @elseif($group->state == 2) Closed @endif">
                                                        {{ $group->name }}
                                                    </a>
                                                </div>
                                                <p>Group created: <strong>{{ $group->created_at->format('M d, Y') }}</strong></p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>Most Recent Groups</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <ul class="groups-toplist recentlist">
                                    @foreach ($latest as $group)
                                        <li class="{!! round(($loop->index + 1) / 2) % 2 ? 'even' : 'odd' !!}" style="background-image: url({{ cms_config('site.groupbadge.url') }}{{ $group->badge }}.gif)">
                                            <div class="toplist-item">
                                                <div class="group-index">{{ $loop->index + 1 }}.</div>
                                                <div class="group-link">
                                                    <a href="{{ url($group->url) }}"
                                                        class="@if ($group->state == 1) exclusive @elseif($group->state == 2) closed @endif"
                                                        title="@if ($group->state == 1) Exclusive @elseif($group->state == 2) Closed @endif">
                                                        {{ $group->name }}
                                                    </a>
                                                </div>
                                                <p>Group created: <strong>{{ $group->created_at->format('M d, Y') }}</strong></p>
                                            </div>
                                        </li>
                                    @endforeach
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
                <td valign="top" style="width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
