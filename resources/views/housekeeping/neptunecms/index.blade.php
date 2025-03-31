@extends('layouts.housekeeping', ['menu' => 'neptunecms'])

@section('title', config('cms.name'))

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="100%" valign="top" id="rightblock">
                <div>
                    <!-- RIGHT CONTENT BLOCK -->
                    <div id="acp-update-wrapper">
                        <div class="homepage_pane_border" id="acp-update-normal">
                            <div class="homepage_section">{{ config('cms.name') }}</div>
                            <div style="font-size:12px;padding:4px; text-align:left">
                                <p>
                                <div align="center">
                                    <img src="{{ url('/') }}/web/housekeeping/images/cms-logo.png" border="0" alt="{{ config('cms.name') }}"><br />
                                    v{{ config('cms.version') }} {{ config('cms.stable') }} <br />
                                    Codename '{{ config('cms.title') }}'<br />
                                    <br />
                                </div>
                                <br />
                                <br /> {{ config('cms.name') }} is web interface for <a href="https://github.com/Quackster/Kepler" target="_target">Kepler Emulator</a> or, to promote it a little: {{ config('cms.name') }} a free, advanced and
                                complete website and content management solution for <a href="https://github.com/Quackster/Kepler" target="_target">Kepler Emulator</a>, published under the <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/"
                                    target="_blank">Creative Commons Attribution-Noncommercial-No Derivative Works 3.0 Unported license</a>. Current development is handled by Jean
                                Ropke.
                                <br />
                                <br />Should you be interested in contributing to {{ config('cms.name') }} in any way whatsoever, please contact us.
                                <br />
                                <br /><b>If you paid for this, go get your money back.</b>
                                </p>
                                <p>
                                    <strong>{{ config('cms.name') }} Version:</strong> {{ config('cms.version') }} {{ config('cms.stable') }} [{{ config('cms.title') }}]<br />
                                    <strong>{{ config('cms.name') }} Build Date:</strong> {{ config('cms.build') }} {{ config('cms.gmt') }}<br />
                                </p>
                                <p>
                                    <strong><a href="{{ route('housekeeping.neptunecms.credits') }}">Development Credits</a></strong>
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
