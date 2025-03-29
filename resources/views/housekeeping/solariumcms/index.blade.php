@extends('layouts.admin.master', ['menu' => 'solariumcms'])

@section('title', 'SolariumCMS')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="100%" valign="top" id="rightblock">
            <div>
                <!-- RIGHT CONTENT BLOCK -->
                <div id="acp-update-wrapper">
                    <div class="homepage_pane_border" id="acp-update-normal">
                        <div class="homepage_section">SolariumCMS</div>
                        <div style="font-size:12px;padding:4px; text-align:left">
                            <p>
                            <div align="center">
                                <img src="{{ url('/') }}/web/admin/images/cms-logo.png" border="0" alt="SolariumCMS"><br />
                                v{{ config('app.version') }} <br />
                                <br />
                            </div>
                            <br /> SolariumCMS is web interface for Arcturus Emulator, a free, advanced and complete website and content management solution for Arcturus Emulator, published under the <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" target="_blank">Creative Commons Attribution-Noncommercial-No Derivative Works 3.0 Unported license</a>. Current development is handled by Jean.
                            <br />
                            <br />Should you be interested in contributing to SolariumCMS in any way whatsoever, please contact us.
                            <br />
                            <br /><b>If you paid for this, go get your money back.</b>
                            </p>
                            <p>
                                <strong>SolariumCMS Version:</strong> {{ config('app.version') }}<br />
                                <strong>SolariumCMS Build:</strong> {{ config('app.build') }}<br />
                                <strong>Arcturus Emulator Compatibility:</strong> Build for <a href="http://forum.ragezone.com/f353/arcturus-emulator-1-16-0-a-1102214/" target="_blank"> 1.16.0</a>
                            </p>
                            <p>
                                <strong><a href="{{ route('admin.solariumcms.credits') }}">Development Credits</a></strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / RIGHT CONTENT BLOCK -->
        </td>
    </tr>
</table>
@stop
