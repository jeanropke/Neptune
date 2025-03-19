@extends('layouts.admin.master', ['menu' => 'site'])

@section('title', 'Site Configuration')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.site', ['submenu' => 'site'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <form action="{{ route('admin.site.save') }}" method="post" name="theAdminForm" id="theAdminForm"
                    autocomplete="off">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">SolariumCMS Configuration</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Sitename</b>
                                    <div class="graytext">This is the full name of your site, eg. 'Solarium Hotel'.
                                    </div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="sitename" value="{{ $settings['hotel.name.full'] }}"
                                        size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Shortname</b>
                                    <div class="graytext">This is the 'shortname' of your site, eg. 'Solarium'.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="shortname" value="{{ $settings['hotel.name.short'] }}"
                                        size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Start credits</b>
                                    <div class="graytext">How many credits do people get if they register on the site?
                                    </div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="credits" value="{{ $settings['hotel.credits.start'] }}"
                                        size="5" maxlength="5" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Start duckets</b>
                                    <div class="graytext">How many duckets do people get if they register on the site?
                                    </div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="duckets" value="{{ $settings['hotel.duckets.start'] }}"
                                        size="5" maxlength="5" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Start diamonds</b>
                                    <div class="graytext">How many diamonds do people get if they register on the site?
                                    </div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="diamonds" value="{{ $settings['hotel.diamonds.start'] }}"
                                        size="5" maxlength="5" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Site background</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="background">
                                        @foreach ($backgrounds as $item)
                                        <option value="{{ '/'.str_replace('\\', '/', $item) }}"
                                            @if('/'.str_replace('\\', '/' ,
                                            $item)==cms_config('site.style.background')) selected @endif>
                                            {{ '/'.str_replace('\\', '/', $item) }}</option>
                                        @endforeach
                                    </select>
                                    <p>
                                    <img id="background-preview"
                                        src="{{ url('/') }}/{{ cms_config('site.style.background') }}"
                                        style="max-width: 50%;">
                                        <p>

                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Enter button</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="enterbutton">
                                        @foreach ($enterbuttons as $item)
                                        <option value="{{ '/'.str_replace('\\', '/', $item) }}"
                                            @if('/'.str_replace('\\', '/' ,
                                            $item)==cms_config('site.style.enter')) selected @endif>
                                            {{ '/'.str_replace('\\', '/', $item) }}</option>
                                        @endforeach
                                    </select>
                                    <p>
                                        <img id="enterbutton-preview"
                                            src="{{ url('/') }}/{{ cms_config('site.style.enter') }}"
                                            style="max-width: 100%;">
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Hotel view</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="hotelview">
                                        @foreach ($hotelviews as $item)
                                        <option value="{{ '/'.str_replace('\\', '/', $item) }}"
                                            @if('/'.str_replace('\\', '/' ,
                                            $item)==cms_config('site.style.hotelview')) selected @endif>
                                            {{ '/'.str_replace('\\', '/', $item) }}</option>
                                        @endforeach
                                    </select>
                                    <p>
                                        <img id="hotelview-preview"
                                            src="{{ url('/') }}/{{ cms_config('site.style.hotelview') }}"
                                            style="max-width: 100%;">
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
                    $J('select[name=background]').change(e => {
                        $('background-preview').src = "{{ url('/') }}" + $J('select[name=background]').val();
                    });

                    $J('select[name=enterbutton]').change(e => {
                        $('enterbutton-preview').src = "{{ url('/') }}" + $J('select[name=enterbutton]').val();
                    });

                    $J('select[name=hotelview]').change(e => {
                        $('hotelview-preview').src = "{{ url('/') }}" + $J('select[name=hotelview]').val();
                    });
                </script>
                <br />
            </div>

            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <form action="{{ route('admin.site.ads.save') }}" method="post" name="theAdminForm" id="theAdminForm"
                    autocomplete="off">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Advertisements Configuration</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Ads enabled</b>
                                    <div class="graytext">Only supports Google Ads</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="ads_enabled" class="dropdown">
                                        <option value="1" @if($settings['site.ads.enabled']==1) selected="selected"
                                            @endif>Enabled</option>
                                        <option value="0" @if($settings['site.ads.enabled']==0) selected="selected"
                                            @endif>Disabled</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Ads 160</b>
                                    <div class="graytext">Ads on right side</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <textarea name="ads_160" rows="5" cols="50"
                                        class="textinput">{{ $settings['site.ads.160'] }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Ads 300</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <textarea name="ads_300" rows="5" cols="50"
                                        class="textinput">{{ $settings['site.ads.300'] }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Ads Footer</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <textarea name="ads_footer" rows="5" cols="50"
                                        class="textinput">{{ $settings['site.ads.footer'] }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Save Ads Configuration" class="realbutton"
                                        accesskey="s">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br />
            </div>
            <!-- / RIGHT CONTENT BLOCK -->
        </td>
    </tr>
</table>
@stop
