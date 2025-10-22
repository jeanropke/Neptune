@extends('layouts.master', ['menuId' => 'profile'])

@section('title', 'Profile')

@section('content')

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="width: 6px;">&nbsp;</td>
        <td valign="top" style="width: 271px; padding-top: 3px;" class="habboPage-col">
            <div class="v3box green">
                <div class="v3box-top">
                    <h3>title</h3>
                </div>
                <div class="v3box-content">
                    <div class="v3box-body">
                        content
                        <div class="clear"></div>

                    </div>
                </div>
                <div class="v3box-bottom">
                    <div></div>
                </div>
            </div>
        </td>
        <td valign="top" style="width: 446px; padding-top: 3px;" class="habboPage-col rightmost">
            <div class="panel" id="panel1">
                <div class="processbox">
                    <div class="headline">
                        <div class="headline-content">
                            <div class="headline-wrapper">
                                <h2>{{ cms_config('hotel.name.short') }} PROFILE - {{ user()->username }} </h2>
                            </div>
                        </div>
                    </div>
                    <div class="content-top">
                        <div class="content">
                            <div id="process-errors">
                                @if($errors->any())
                                <div class="content-red">
                                    <div class="content-red-body" id="process-errors-content">
                                        {{ $errors->first() }}
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-red-bottom">
                                    <div class="content-red-bottom-body"></div>
                                </div>
                                @endif
                                @if(session('status'))
                                <div class="content-ok">
                                    <div class="content-ok-body" id="process-errors-content">
                                        {{ session('status') }}
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-ok-bottom">
                                    <div class="content-ok-bottom-body"></div>
                                </div>
                                @endif
                            </div>

                            <div id="profiletabs">
                                <ul>
                                    <li @if($page=='figure' )id="selected" @endif><a href="/profile">{{ strtoupper(cms_config('hotel.name.short')) }}</a>
                                    <li @if($page=='motto' )id="selected" @endif><a href="/profile/motto">MOTTO</a>
                                    <li @if($page=='email' )id="selected" @endif><a href="/profile/email">EMAIL</a>
                                    <li @if($page=='password' )id="selected" @endif><a href="/profile/password">PASSWORD</a>
                                    <li @if($page=='privacy' )id="selected" @endif><a class="last-tab" href="/profile/privacy">PRIVACY</a>
                                </ul>
                            </div>
                            <br clear="all" />
                            <div class="content-white-outer">
                                <div class="content-white">
                                    <div class="content-white-body">
                                        <div class="content-white-content">
                                            @yield('profile')
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-white-bottom">
                                    <div class="content-white-bottom-body">
                                    </div>

                                </div>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="content-bottom">
                        <div class="content-bottom-content"></div>
                    </div>
                </div>
            </div>
        </td>
        <td style="width: 3px;">&nbsp;</td>

        <td valign="top" style="padding-top: 3px;">
            <div class="profilebox">
                <div class="profilebox-header">
                    <h3>My info</h3>
                </div>
                <div class="profilebox-header-bottom">
                    <div></div>
                </div>
                <div class="profilebox-body">
                    <div class="profilebox-content">
                        <div class="profile-info">
                            <div class="name">{{ Auth::user()->username }}</div>

                            <img alt="offline" src="{{ cms_config('site.web.url') }}/images/myhabbo/profile/habbo_offline.gif" />
                            <div class="birthday text">
                                {{ cms_config('hotel.name.short') }} Created On:
                            </div>
                            <div class="birthday date">
                                {{ Carbon\Carbon::parse(Auth::user()->account_created)->format('d/m/Y') }}
                            </div>
                            <div class="badges">
                            </div>
                        </div>

                        <div class="figure">
                            <img
                                src="{{ cms_config('site.avatarimage.url') }}{{ Auth::user()->figure }}&action=std&frame=3&direction=4&head_direction=3&gesture=sml&img_format=gif" />
                        </div>
                        <div>
                            <div class="content-blue">
                                <div class="content-blue-body">
                                    {{ Auth::user()->motto }}
                                    <div class="clear"></div>

                                </div>
                            </div>
                            <div class="content-blue-bottom">
                                <div class="content-blue-bottom-body"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

            </div>
        </td>
        <td style="width: 6px;">&nbsp;</td>
    </tr>
</table>
@stop
