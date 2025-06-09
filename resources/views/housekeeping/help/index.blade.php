@extends('layouts.housekeeping', ['menu' => 'help'])

@section('title', 'Help Center')

@section('content')

    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.help.include.menu', ['submenu' => 'help'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    <!-- RIGHT CONTENT BLOCK -->
                    <div id="acp-update-wrapper">
                        <div class="homepage_pane_border" id="acp-update-normal">
                            <div class="homepage_section">Help Centre - Main Page</div>
                            <div style="font-size:12px;padding:4px; text-align:left">
                                <p>
                                    Welcome to the <b>Help Centre</b>. On the following pages we will treat several subjects
                                    you might require help with. Most of the help topics are frequently asked questions or
                                    other topics we thought could be usefull whilst using and setting up {{ config('cms.name') }} and it's
                                    housekeeping.
                                    <br />
                                    <br />Should, however, the Help Centre not supply enough information and/or support, you
                                    can always ask your question on <a href="https://github.com/jeanropke/Neptune/issues" target="_blank">Nepture GitHub page</a> -- that's where the
                                    experts on this subject hang out
                                    ... as well as the idiots.
                                    <br />
                                    <br />What ever the reason your visit to this tab may be, I hope the Help Centre can
                                    help you out.
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
