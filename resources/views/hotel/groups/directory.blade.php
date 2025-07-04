@extends('layouts.master', [
    'menuId' => '26',
    'breadcrums' => [['url' => url('/hotel/groups'), 'title' => 'Groups']],
])

@section('title', 'Groups Directory')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 202px;" class="habboPage-col">
                    @foreach (boxes('hotel.groups.directory', 1) as $box)
                        @include('includes.boxes.' . $box->type, compact('box'))
                    @endforeach
                </td>
                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">
                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Groups with the Most Active Habbo Homes</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">
                                <ul class="groups-toplist toplist">
                                    @foreach ($active as $group)
                                        <li class="{{ round(($loop->index + 1) / 2) % 2 ? 'even' : 'odd' }}"
                                            style="background-image: url({{ cms_config('site.groupbadge.url') }}{{ $group->badge }}.gif)">
                                            <div class="toplist-item">
                                                <div class="group-index">{{ $loop->index + 1 }}.</div>
                                                <div class="group-link">
                                                    <a href="{{ url($group->url) }}"
                                                        @if ($group->state == 1) class="exclusive" title="Exclusive" @elseif($group->state == 2) class="closed" title="Private" @endif>
                                                        {{ $group->name }}
                                                    </a>
                                                </div>
                                                <p>Group created: <strong>{{ $group->created_at->format('M d, Y') }}</strong></p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul><br><br><a target="_self" href="{{ url('/') }}/hotel/groups/directory/active">See 50 Most Active groups here</a><br>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Groups with the Most Active Members</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">
                                <ul class="groups-toplist toplist">
                                    @foreach ($hotel as $group)
                                        <li class="{{ round(($loop->index + 1) / 2) % 2 ? 'even' : 'odd' }}"
                                            style="background-image: url({{ cms_config('site.groupbadge.url') }}{{ $group->badge }}.gif)">
                                            <div class="toplist-item">
                                                <div class="group-index">{{ $loop->index + 1 }}.</div>
                                                <div class="group-link">
                                                    <a href="{{ url($group->url) }}"
                                                        @if ($group->state == 1) class="exclusive" title="Exclusive" @elseif($group->state == 2) class="closed" title="Private" @endif>
                                                        {{ $group->name }}
                                                    </a>
                                                </div>
                                                <p>Group created: <strong>{{ $group->created_at->format('M d, Y') }}</strong></p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul><br><br><a target="_self" href="{{ url('/') }}/hotel/groups/directory/hotel">See 50 Most Active groups here</a><br>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Recently Created Groups</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">
                                <ul class="groups-toplist recentlist">
                                    @foreach ($recent as $group)
                                        <li class="{{ round(($loop->index + 1) / 2) % 2 ? 'even' : 'odd' }}"
                                            style="background-image: url({{ cms_config('site.groupbadge.url') }}{{ $group->badge }}.gif)">
                                            <div class="toplist-item">
                                                <div class="group-index">{{ $loop->index + 1 }}.</div>
                                                <div class="group-link">
                                                    <a href="{{ url($group->url) }}"
                                                        @if ($group->state == 1) class="exclusive" title="Exclusive" @elseif($group->state == 2) class="closed" title="Private" @endif>
                                                        {{ $group->name }}
                                                    </a>
                                                </div>
                                                <p>Group created: <strong>{{ $group->created_at->format('M d, Y') }}</strong></p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul><br><br><a href="{{ url('/') }}/hotel/groups/directory/recent" target="_self">See 50 Most Recent Groups here</a><br>
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
@stop
