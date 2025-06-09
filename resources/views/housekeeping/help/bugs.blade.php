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
                            <div class="homepage_section">Help Centre - Bugs</div>
                            <div style="font-size:12px;padding:4px; text-align:left">
                                <p>
                                    If you found a bug within {{ config('cms.name') }}, the first thing to do is to verify if it's actually an bug; is it not a mistake you could've made? Are you the
                                    only one expiriencing the problem?
                                    <br />
                                    <br /> Once you have verified that it is actually an bug you're dealing with, hop over to <a href="https://github.com/jeanropke/Neptune/issues"
                                        target="_blank">Neptune GitHub page</a>. First thing to do, is make sure that the bug has not yet been reported. If it is an known bug, there is no need to report it AGAIN.
                                    If you are sure that it's an geniune bug and that it has not been reported before, simply create a new issue clearly stating the bug.
                                    <br />
                                    <br /> Obviously the bug will be solved as soon as possible once we are aware of it. Also, thanks in advance, if you report an bug!
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
