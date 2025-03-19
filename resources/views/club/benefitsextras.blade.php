@extends('layouts.master', ['menuId' => '3', 'submenuId' => 'club_benefits', 'headline' => true])

@section('title', cms_config('hotel.name.short') . ' Club: Extras')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody><tr>
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 202px;" class="habboPage-col">
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your {{ cms_config('hotel.name.short') }}...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra clothes<br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra hair<br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Club badge<br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra dances<br><br><a target="_self" href="{{ url('/') }}/club/benefits/habbo">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your room...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Monthly free furni

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra Guest Rooms

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> VIP Public Rooms

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Priority access<br><br><a href="{{ url('/') }}/club/benefits/room" target="_self">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>For your {{ cms_config('hotel.name.short') }} Home...</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> New widget skins

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> New Backgrounds

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> No ads!<br><br>
                            <a href="{{ url('/') }}/club/benefits/home" target="_self">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>Extras!</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            <span style="font-weight: bold;">Huge Friends List</span>
                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            <span style="font-weight: bold;">:chooser command</span>
                            <br><img vspace="0" hspace="0" border="0" align="absmiddle" src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt="">
                            <span style="font-weight: bold;">:furni command</span>
                            <br><br>
                            <a href="{{ url('/') }}/club/benefits/extras" target="_self">Find out more &gt;&gt;</a><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
            </td>
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="content-white-outer">
                    <div class="content-white">
                        <div class="content-white-body">

                            <div class="content-white-content">
                                <img src="{{ url('/') }}/web/images/club/HC_subpage_actions.gif" alt=""><br><br><br><span style="font-weight: bold;">:chooser
</span><br>Type this in when in any room to see who else is there. Great for SnowStorm and seeing who else is in a Guest Room.<br><br><span style="font-weight: bold;">Huge Friends List</span><br>500 people!



                                That's a lot of buddies. More than you can poke with a medium sized stick, or a big-sized small stick.<br><br><span style="font-weight: bold;">:furni command
</span><br>Type it in and see a list of Furni in the room. Including Hidden Stickie Notes and other such stuff.<br>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="content-white-bottom">
                        <div class="content-white-bottom-body"></div>
                    </div>
                </div>
            </td>
            <td style="width: 4px;"></td>
            <td valign="top" style="width: 176px;">
                <div id="ad_sidebar">
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
        </tbody></table>

@stop
