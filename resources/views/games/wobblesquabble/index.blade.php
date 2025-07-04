@extends('layouts.master', ['menuId' => '27'])

@section('title', 'Wobble Squabble')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                    @include('games.wobblesquabble.include.menu', ['page' => 'index'])
                                    @foreach (boxes('games.wobblesquabble.index', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="portlet-scale gold">
                                        <div class="portlet-scale-header">
                                            <h3>Wobble Squabble</h3>
                                        </div>
                                        <div class="portlet-scale-body">
                                            <div class="portlet-scale-content">

                                                <img width="452" height="130" border="0"
                                                    src="{{ url('/') }}/c_images/album209/ws_title.gif" alt="ws title"
                                                    id="galleryImage">
                                                <p></p>
                                                <p>Wobble Squabble is a frantic two player game all about balance! You have to slap and nudge your opponent till they fall off the
                                                    inflatables and land in the pool: Be careful though, nudge and slap too much and you may lose your balance and fall in
                                                    yourself!<br><br>The Wobble Squabble inflatables can be found in either of the Rooftop Rumble or Rooftop Rumble rooms.<br><img
                                                        width="194" height="130" border="0" align="right"
                                                        src="{{ url('/') }}/c_images/WobbleSquabbleMaterial/194x130_WobbleSquabble_1.gif"
                                                        alt=""><br>The aim of the game is to balance on the inflatables and make your opponent fall into the water by pushing
                                                    them. You can move towards or away from them - you win by staying on the inflatables. The winner carries on playing against
                                                    opponents until he/she falls in the water. <br><br><img width="22" hspace="10" height="47" border="0" align="left"
                                                        src="{{ url('/') }}/c_images/album76/rares_trophy_3.gif"
                                                        alt="">Each month the player that comes top of the High Scores table will get their name published in the Newsie and win
                                                    themselves a small Gold Trophy. So what are you waiting for? Get moving, slapping &amp; nudging your way to an excellent prize!</p>
                                                <p><strong>How to Squabble</strong><br><br><img width="51" height="42" border="0" align="left"
                                                        src="{{ url('/') }}/c_images/payment/1_hi.gif" alt=""><img
                                                        width="53" height="60" border="0" align="right"
                                                        src="{{ url('/') }}/c_images/content/tour5_content_1.gif"
                                                        alt="">Buying Tickets <br>To play Wobble Squabble, you need a ticket. The tickets are the same ones that can also be
                                                    used to dive in the Lidos. You can obtain tickets by clicking on the inflatables, or by clicking on the ticket machine beside the
                                                    pool (see picture to the right). Tickets cost 2 Credits for 5.<br><br><img width="51" height="42" border="0"
                                                        align="left" src="{{ url('/') }}/c_images/payment/2_hi.gif"
                                                        alt="">The Queue System<br>When you have a ticket, you can get into the pool, swim over and climb on the inflatables to
                                                    queue for your turn. The game starts when two players are ready.<br><br><img width="51" height="42" border="0"
                                                        align="left" src="{{ url('/') }}/c_images/payment/3_hi.gif"
                                                        alt="">Moving, Slapping &amp; Nudging<br>When the game starts, you see a window (see the picture below). On the right is
                                                    a balance meter. When the hand points straight up (like in the picture), you're perfectly balanced. When it points to the right, you
                                                    need to balance to the left, and vice versa. If the hand drops too far either side you have lost your balance: You fall into the
                                                    water and lose. <br><br><strong>Tips &amp; Information<br></strong>1. If you are wobbling all over the place, you can get your
                                                    balance back once during the game using the 'stabilise' button (space bar). <br>2. Moving away from your opponent during a game will
                                                    allow you time to balance. <br>3. If you're both really good, the game will end when the time runs out (after 90 seconds). If
                                                    neither player has fallen off by then, the one who has been pushed the most will fall off and lose. <br>4. After you have played a
                                                    few games you can check your position on the High Scores Page <br><br></p>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="portlet-scale-bottom">
                                            <div class="portlet-scale-bottom-body"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>

                <td rowspan="2" style="width: 4px;"></td>

                <td rowspan="2" valign="top" style="width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.partners')
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
