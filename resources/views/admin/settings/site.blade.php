@extends('layouts.admin.master', ['menu' => 'settings', 'submenu' => 'site'])

@section('title', 'Hotel Settings')

@section('content')
    <div class="page_title">
        <img src="{{ url('/') }}/web/housekeeping/icons/site.png" class="pticon">
        <span class="page_name_shadow">Site Settings</span>
        <span class="page_name">Site Settings</span>
    </div>
    <div class="page_main">

        <table border="0" cellpadding="0" cellspacing="0" height="100%">
            <tbody>
                <tr height="100%">
                <td class="page_main_left">
                    <div class="left_date">{{ date('l F j, Y | g:iA') }}</div>
                    <div class="hr"></div>
                    <div class="text">
                        <p>Here is the place where you can modify settings that change the physical appearance of the site.</p>
                    </div>
                </td>
                <td class="page_main_right">
                    <div class="center">
                        @if (session()->has('message'))
                            <div class="clean-ok">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="settings">
                            <form name="settings" action="{{ url('/') }}/housekeeping/settings/site" method="POST" autocomplete="off">
                                @csrf
                                <b>Hotel Name (short):</b><br />
                                <label for="hotel.name.short">The name of your hotel used throughout the site.</label><br />
                                <input type="text" name="hotel.name.short" id="hotel.name.short" value="{{ cms_config('hotel.name.short') }}"></input><br /><br />

                                <b>Hotel Name (full):</b><br />
                                <label for="hotel.name.full">The name of your hotel used throughout the site.</label><br />
                                <input type="text" name="hotel.name.full" id="hotel.name.full" value="{{ cms_config('hotel.name.full') }}" title=""></input><br /><br />

                                <b>Avatar Image URL:</b><br />
                                <label for="site.avatarimage.url">The avatar image url of your hotel.</label><br />
                                <input type="text" name="site.avatarimage.url" id="site.avatarimage.url" value="{{ cms_config('site.avatarimage.url') }}" title=""></input><br /><br />

                                <b>Background:</b><br />
                                <label for="site.style.background">The background used throughout the site.</label><br />
                                <select name="site.style.background">
                                    @foreach ($backgrounds as $background)
                                    @php($background = '/' . str_replace('\\', '/', $background))
                                    <option value="{{ $background }}" {{ $background == cms_config('site.style.background') ? 'selected' : '' }}>{{ $background }}</option>
                                    @endforeach
                                </select><br /><br />

                                <b>Enter Button:</b><br />
                                <label for="site.style.enter">The button used throughout the site.</label><br />
                                <select name="site.style.enter">
                                    @foreach ($enter_btns as $enter)
                                    @php($enter = '/' . str_replace('\\', '/', $enter))
                                    <option value="{{ $enter }}" {{ $enter == cms_config('site.style.enter') ? 'selected' : '' }}>{{ $enter }}</option>
                                    @endforeach
                                </select><br /><br />

                                <b>Hotelview:</b><br />
                                <label for="site.style.hotelview">The hotelview used throughout the site.</label><br />
                                <select name="site.style.hotelview">
                                    @foreach ($hotelviews as $hotelview)
                                    @php($hotelview = '/' . str_replace('\\', '/', $hotelview))
                                    <option value="{{ $hotelview }}" {{ $hotelview == cms_config('site.style.hotelview') ? 'selected' : '' }}>{{ $hotelview }}</option>
                                    @endforeach
                                </select><br /><br />

                                <div class="button"><input type="submit" name="save" value="Save" /></div>
                            </form>
                        </div>
                    </div>
                </td>
                </tr>
            </tbody>
        </table>

    </div>
@stop
