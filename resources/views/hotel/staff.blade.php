@extends('layouts.master', ['menuId' => '2'])

@section('title', 'Meet the Staff')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 311px;" class="habboPage-col">
                    @foreach (boxes('hotel.staff', 1) as $box)
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
                <td valign="top" style="width: 420px;" class="habboPage-col rightmost">

                    @foreach ($ranks as $rank)
                        <div class="v3box yellow">
                            <div class="v3box-top">
                                <h3>{{ cms_config('hotel.name.short') }} Hotel ~ {{ $rank->name }}</h3>
                            </div>
                            <div class="v3box-content">
                                <div class="v3box-body">
                                    <table width="100%" class="staffs">
                                        <tbody>
                                            @forelse($staffs->where('rank', $rank->id) as $staff)
                                                <tr class="{{ $loop->index % 2 ? 'even' : 'odd' }}">
                                                    <td class="style1">
                                                        <p style="height: 64px; overflow: hidden;"><b>
                                                                <img width="64" hspace="5" height="110" align="right" style="margin-top: -19px;"
                                                                    src="{{ cms_config('site.avatarimage.url') }}{{ $staff->figure }}&gesture=sml&direction=4&head_direction=4"
                                                                    alt="">{{ cms_config('hotel.name.short') }} name</b>: <a
                                                                href="{{ url('/') }}/home/{{ $staff->username }}" target="_blank">{{ $staff->username }}</a> ~ <img
                                                                src="{{ cms_config('site.web.url') }}/images/myhabbo/{{ $staff->online ? 'habbo_online_anim' : 'habbo_offline' }}.gif"><br>
                                                            <b>{{ cms_config('hotel.name.short') }} since</b>:
                                                            {{ $staff->created_at->format('F Y') }}<br>
                                                            <b>Motto</b>: {{ $staff->motto }}<br>
                                                            <b>Last online</b>:
                                                            {{ $staff->online ? 'Online now' : \Carbon\Carbon::createFromTimeStamp($staff->last_online)->diffForHumans() }}<br>
                                                        </p>
                                                        <div align="right"></div>
                                                    </td>

                                                </tr>
                                            @empty
                                                There is currently no {{ $rank->name }}
                                            @endforelse

                                        </tbody>
                                    </table>
                                    <div align="center" class="style1"></div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="v3box-bottom">
                                <div></div>
                            </div>
                        </div>
                    @endforeach

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
