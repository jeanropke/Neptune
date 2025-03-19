@extends('layouts.master', ['menuId' => '3', 'submenuId' => '15', 'headline' => true])

@section('title', 'Join or Extend Membership')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 202px;" class="habboPage-col">
                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>For your {{ cms_config('hotel.name.short') }}...</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra
                                clothes<br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra
                                hair<br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Club
                                badge<br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra
                                dances<br><br><a target="_self" href="{{ url('/') }}/club/benefits/habbo">Find out more
                                    &gt;&gt;</a><br>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>For your room...</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Monthly free
                                furni

                                <br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Extra Guest
                                Rooms

                                <br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> VIP Public
                                Rooms

                                <br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Priority
                                access<br><br><a href="{{ url('/') }}/club/benefits/room" target="_self">Find out more
                                    &gt;&gt;</a><br>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>For your {{ cms_config('hotel.name.short') }} Home...</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> New widget
                                skins

                                <br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> New
                                Backgrounds

                                <br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> No
                                ads!<br><br>
                                <a href="{{ url('/') }}/club/benefits/home" target="_self">Find out more
                                    &gt;&gt;</a><br>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>Extras!</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> Huge
                                Friends List

                                <br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> :chooser
                                command

                                <br><img vspace="0" hspace="0" border="0" align="absmiddle"
                                    src="{{ url('/') }}/web/images/club/miniHCbadge.gif" alt=""> :furni
                                command<br><br><a href="{{ url('/') }}/club/benefits/extras" target="_self">Find out
                                    more &gt;&gt;</a><br>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                    <div class="nobox">

                        <div class="nobox-content">

                            <div class="v2box brown darkest">
                                <div class="headline">
                                    <h3 style="text-transform: uppercase">JOIN {{ cms_config('hotel.name.short') }} CLUB!</h3>
                                </div>
                                <div class="border">
                                    <div></div>
                                </div>
                                <div class="body">

                                    <img src="{{ url('/') }}/web/images/club/piccolo_happy.gif" alt=""
                                        align="left" style="margin:10px;">
                                    <img src="{{ url('/') }}/web/images/credits/hc_badge.gif" alt=""
                                        align="right">
                                    <p>{{ cms_config('hotel.name.short') }} Club is {{ cms_config('hotel.name.full') }}'s exclusive club, and as a member
                                        of this club you get
                                        privileges that are not available to non-{{ cms_config('hotel.name.short') }} Club Habbos. As a
                                        member you get
                                        priority access to the Hotel and Public Rooms, rare furni gifts, extra cool dances
                                        and so much more.</p>

                                    <div id="subscription-divider">
                                        <div>

                                            <div class="content-beige">
                                                <div class="content-beige-body">
                                                    @if (!Auth::check())
                                                        In order to join {{ cms_config('hotel.name.short') }} Club you need to <a
                                                            href="{{ url('/') }}/login">log in</a> first.
                                                    @else
                                                        @if(user()->getSubscription()->neverSubscribed()) {{-- never been hc member --}}
                                                        <div id="subscription-meter-box2" style="left: 10px;">
                                                            <div id="pastmonthsVal">0</div>
                                                            <div style="float: right; width: 160px; margin-right: 10px;">
                                                                Você nunca
                                                                fez parte do {{ cms_config('hotel.name.short') }} Club, para entrar basta
                                                                comprar um periodo
                                                                abaixo. </div>
                                                            <div style="float: left; width: 60px; margin-top: 45px;"><b>
                                                                    <center><span class="lang-hcjoin-comingTitle">Periodos
                                                                            Decorridos</span></center>
                                                                </b></div>
                                                        </div>
                                                        @elseif(user()->getSubscription()->isExpired()) {{-- hc membership expired --}}
                                                        <div id="subscription-meter-box2" style="left: 10px;">
                                                            <div id="pastmonthsVal">{{ user()->getSubscription()->getPassedMonths() }}</div>
                                                            <div style="float: right; width: 160px; margin-right: 10px;">
                                                                Seu Periodo
                                                                de membro de {{ cms_config('hotel.name.short') }} Club venceu no dia
                                                                {{ date('d/m/y', user()->getSubscription()->expiresAt()) }}, aproveite e renove a
                                                                sua assinatura abaixo. </div>
                                                            <div style="float: left; width: 60px; margin-top: 45px;"><b>
                                                                    <center><span class="lang-hcjoin-comingTitle">Periodos
                                                                            Decorridos</span></center>
                                                                </b></div>
                                                        </div>
                                                        @elseif (!user()->getSubscription()->isExpired()) {{-- has hc membership --}}
                                                            @if (user()->getSubscription()->daysRemaining() > 31) {{-- has more than one month --}}
                                                            @php($days = user()->getSubscription()->daysRemaining() % 31)
                                                            <div id="subscription-meter-box">
                                                                <div id="pastmonthsVal">{{ user()->getSubscription()->getPassedMonths() }}</div>
                                                                <div id="clubdays"> <b>{{ $days }}</b> <span
                                                                        class="lang-hcjoin-remainingHeader">days
                                                                        remaining</span> </div>
                                                                <div id="comingmonthsVal">{{ user()->getSubscription()->monthsRemaining() }}</div>
                                                                <span><img
                                                                        src="{{ url('/') }}/web/images/club/club_subscription_arrow.png"
                                                                        style="margin-left: {{ (52 + (31 - $days) * 5) }}px;"></span>
                                                                <div style=" margin-top: 35px;">
                                                                    <div style="float: left; width: 60px">
                                                                        <center>Months passed</center>
                                                                    </div>
                                                                    <div style="float: right; width: 56px">
                                                                        <center>Months to go</center>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else {{-- has more than one month --}}
                                                            @php($days = user()->getSubscription()->daysRemaining() % 31)
                                                            <div id="subscription-meter-box3" style="left: 20px;">
                                                                <div id="habboclub-buy-details">
                                                                    <span><img
                                                                            src="{{ url('/') }}/web/images/club/club_subscription_arrow.png"
                                                                            style="margin-left: {{ (55 + (31 - $days) * 5) }}px;"></span>
                                                                    <div style=" margin-top: 35px;">
                                                                        <div style="float: left; width: 56px">
                                                                            <center><span
                                                                                    class="lang-hcjoin-comingTitle">Periodos
                                                                                    Decorridos</span></center>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="pastmonthsVal">{{ user()->getSubscription()->getPassedMonths() }}</div>
                                                                <div id="clubdays"> <b>{{ $days }}</b> <span
                                                                        class="lang-hcjoin-remainingHeader">days
                                                                        remaining</span> </div>
                                                            </div>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="content-beige-bottom">
                                                <div class="content-beige-bottom-body"></div>
                                            </div>


                                        </div>
                                    </div>
                                    @if (Auth::check())
                                        <div style="margin-top: 10px;">
                                            <table width="100%">
                                                <tbody>
                                                        <tr>
                                                            <td width="60%">
                                                                <span class="habboclub-buy-details">31 days = 25 Credits</span></td>
                                                            <td>
                                                                <a class="colorlink noarrow" onclick="openClubSubscribe(1)"><span>Buy 1 month</span></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="60%">
                                                                <span class="habboclub-buy-details">93 days = 60 Credits</span></td>
                                                            <td>
                                                                <a class="colorlink noarrow" onclick="openClubSubscribe(2)"><span>Buy 3 months</span></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="60%">
                                                                <span class="habboclub-buy-details">186 days = 105 Credits</span></td>
                                                            <td>
                                                                <a class="colorlink noarrow" onclick="openClubSubscribe(3)"><span>Buy 6 months</span></a>
                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <script>
                                            function openClubSubscribe(id) {
                                                var dialog = Dialog.createDialog("subscription_dialog", "{{ cms_config('hotel.name.short') }} Club", 9001, 0, -1000,
                                                closeSubscription);
                                                Dialog.appendDialogBody(dialog,
                                                    "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_habbos.gif\" alt=\"\" /></p><div style=\"clear\"></div>",
                                                    true);
                                                    Dialog.moveDialogToCenter(dialog);
                                                    Overlay.show();
                                                Dialog.makeDialogDraggable(dialog);
                                                new Ajax.Request("{{ url('/') }}/habboclub/habboclub_subscribe", {
                                                    method: "post",
                                                    parameters: {
                                                        optionNumber: encodeURIComponent(id)
                                                    },
                                                    onComplete: function(req, json) {
                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                    }
                                                });
                                            };
                                        </script>
                                    @endif
                                    <div class="clear"></div>
                                </div>
                                <div class="bottom">
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width: 4px;"></td>
                <td valign="top" style="width: 176px;">
                    <div id="ad_sidebar">
                        <div class="ad-scale ad160">
                            @include('includes.ad160')
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
