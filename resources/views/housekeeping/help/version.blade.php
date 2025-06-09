@extends('layouts.housekeeping', ['menu' => 'help'])

@section('title', 'Help Center')

@section('content')

    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.help.include.menu', ['submenu' => 'help.bugs'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    <!-- RIGHT CONTENT BLOCK -->
                    <div id="acp-update-wrapper">
                        <div class="homepage_pane_border" id="acp-update-normal">
                            <div class="homepage_section">{{ config('cms.name') }} - Version</div>
                            <div style="font-size:12px;padding:4px; text-align:left">

                                <p>
                                    <strong>{{ config('cms.name') }} Version:</strong> {{ config('cms.version') }} {{ config('cms.stable') }} [{{ config('cms.title') }}]<br />
                                    <strong>{{ config('cms.name') }} Build Date:</strong> {{ config('cms.build') }} {{ config('cms.gmt') }}<br />
                                </p>
                                <p>
                                    <strong>
                                        <input type="submit" value="Check for Updates" class="realbutton" accesskey="s" id="version-checker">
                                    </strong>
                                </p>

                                <textarea id="log" rows="5" cols="100" class="textinput"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    VersionChecker.initialise();
                </script>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
