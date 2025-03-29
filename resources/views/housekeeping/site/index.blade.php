@extends('layouts.housekeeping.master', ['menu' => 'site'])

@section('title', 'Site Configuration')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'site'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    @if ($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    <form action="{{ route('housekeeping.site.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">General Configuration</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Sitename</b>
                                        <div class="graytext">This is the full name of your site, eg. 'Habbo Hotel'.
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="hotel.name.full" value="{{ cms_config('hotel.name.full') }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Shortname</b>
                                        <div class="graytext">This is the 'shortname' of your site, eg. 'Habbo'.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="hotel.name.short" value="{{ cms_config('hotel.name.short') }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Start credits</b>
                                        <div class="graytext">How many credits do people get if they register on the site?
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="number" name="register.default.credits" value="{{ cms_config('register.default.credits') }}" size="5" maxlength="5"
                                            class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Start film</b>
                                        <div class="graytext">How many camera films do people get if they register on the site?
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="number" name="register.default.film" value="{{ cms_config('register.default.film') }}" size="5" maxlength="5" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Start tickets</b>
                                        <div class="graytext">How many game tickets do people get if they register on the site?
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="number" name="register.default.tickets" value="{{ cms_config('register.default.tickets') }}" size="5" maxlength="5" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Start motto</b>
                                        <div class="graytext">Which motto do people get if they register on the site?
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="register.default.motto" value="{{ cms_config('register.default.motto') }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Start console motto</b>
                                        <div class="graytext">Which console motto do people get if they register on the site?
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="register.default.console_motto" value="{{ cms_config('register.default.console_motto') }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Site background</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="site.style.background">
                                            @foreach ($backgrounds as $item)
                                                <option value="{{ '/' . str_replace('\\', '/', $item) }}" @if ('/' . str_replace('\\', '/', $item) == cms_config('site.style.background')) selected @endif>
                                                    {{ '/' . str_replace('\\', '/', $item) }}</option>
                                            @endforeach
                                        </select>
                                        <p>
                                            <img id="background-preview" src="{{ url('/') }}/{{ cms_config('site.style.background') }}" style="max-width: 50%;">
                                        <p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Enter button</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="site.style.enter">
                                            @foreach ($enterbuttons as $item)
                                                <option value="{{ '/' . str_replace('\\', '/', $item) }}" @if ('/' . str_replace('\\', '/', $item) == cms_config('site.style.enter')) selected @endif>
                                                    {{ '/' . str_replace('\\', '/', $item) }}</option>
                                            @endforeach
                                        </select>
                                        <p>
                                            <img id="enterbutton-preview" src="{{ url('/') }}/{{ cms_config('site.style.enter') }}" style="max-width: 100%;">
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Hotel view</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="site.style.hotelview">
                                            @foreach ($hotelviews as $item)
                                                <option value="{{ '/' . str_replace('\\', '/', $item) }}" @if ('/' . str_replace('\\', '/', $item) == cms_config('site.style.hotelview')) selected @endif>
                                                    {{ '/' . str_replace('\\', '/', $item) }}</option>
                                            @endforeach
                                        </select>
                                        <p>
                                            <img id="hotelview-preview" src="{{ url('/') }}/{{ cms_config('site.style.hotelview') }}" style="max-width: 100%;">
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Save Configuration" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <script>
                        $J('select[name=site\\.style\\.background]').change(e => {
                            $('background-preview').src = "{{ url('/') }}" + $J('select[name=site\\.style\\.background]').val();
                        });

                        $J('select[name=site\\.style\\.enter]').change(e => {
                            $('enterbutton-preview').src = "{{ url('/') }}" + $J('select[name=site\\.style\\.enter]').val();
                        });

                        $J('select[name=site\\.style\\.hotelview]').change(e => {
                            $('hotelview-preview').src = "{{ url('/') }}" + $J('select[name=site\\.style\\.hotelview]').val();
                        });
                    </script>
                    <br />
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
