@extends('layouts.master', ['menuId' => '27'])

@section('title', 'How To Play')

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
                                    @include('games.battleball.include.menu', ['page' => 'how_to_play'])

                                    @foreach (boxes('games.battleball.how_to_play', 1) as $box)
                                        <div class="portlet-scale gold">
                                            <div class="portlet-scale-header">
                                                <h3>{{ $box->title }}</h3>
                                            </div>
                                            <div class="portlet-scale-body">
                                                <div class="portlet-scale-content">
                                                    {!! $box->content !!}
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="portlet-scale-bottom">
                                                <div class="portlet-scale-bottom-body"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">
                                    <div class="portlet-scale gold">
                                        <div class="portlet-scale-header">
                                            <h3>How to play Battle Ball</h3>
                                        </div>
                                        <div class="portlet-scale-body">
                                            <div class="portlet-scale-content">

                                                <b><img width="70" height="101" border="0" align="right"
                                                        src="{{ url('/') }}/c_images/album372/player_red.gif"
                                                        alt=""><a name="2">The Battle Ball Lobby</a></b>
                                                <p></p>
                                                <p>The Battle Ball Lobby is just like every other Public Room, the main purpose of the Lobby, is to find buddies to play with. Every
                                                    Lobby shows also a Battle Ball User Interface (see below), permanently visible on the left side of the screen. If you are in the
                                                    Lobby for more than 10 Minutes without joining a game, your Habbo will be automatically kicked from the room to allow other players
                                                    to enter.</p>
                                                <p></p>
                                                <p></p>
                                                <p></p>
                                                <p><b><img width="19" height="23" border="0" align="left"
                                                            src="{{ url('/') }}/c_images/album372/ball_green.gif"
                                                            alt=""><a name="3"><img border="0" align="right"
                                                                src="{{ url('/') }}/c_images/album372/player_green.gif"
                                                                alt="">What Do I Need To Play?</a></b></p>
                                                <p>To play Battle Ball you'll need <b>2 Game Tickets</b> per game played, (won or lost). The tickets are the same ones that can also be
                                                    used to dive in the Lido or play Wobble Squabble. Tickets can be bought using the User Interface (see below) or by clicking the
                                                    vending machine in the Lobby, beside the serving maid. Tickets cost 2 Coins for 5, or 5 Coins for 17.</p>
                                                <p>If you don't have any Coins, click <b><a
                                                            href="{{ url('/') }}/credits/">HERE</a> </b>to find out how
                                                    to get some!</p>
                                                <p></p>
                                                <p><b><img width="19" height="23" border="0" align="left"
                                                            src="{{ url('/') }}/c_images/album372/ball_yellow.gif"
                                                            alt=""></b><img width="205" height="471" border="0" align="right"
                                                        src="{{ url('/') }}/c_images/faq-pages/battleball.gif"
                                                        alt=""><b><a name="4">The Battle Ball User Interface</a></b></p>
                                                <p><br>The Battle Ball user interface (See Right) allows users to:</p>
                                                <ul>
                                                    <li>Create A New Game</li>
                                                    <li>Join An Existing Created Game Which Has Not Yet Started</li>
                                                    <li>Watch An Ongoing Game As A Spectator</li>
                                                </ul>
                                                <p>Any player with a sufficient Skill Level can create a game in the Lobby, the game will appear as a rectangular slot in the interface.
                                                    When you create a game your Habbo will automatically join one selected team and the game will then becomes visible in the list as
                                                    "Waiting for Players" </p>
                                                <p><b>Note:</b> Games that are waiting for players are coloured green and show a “thumbs up” symbol.</p>
                                                <p>If you want to join a game you can click on any green slot in the list, detailed game info about that particular game will appear.
                                                    You can then join one of the teams in that game (unless they are full), or return to the main window and select another game.</p>
                                                <p>The game creator decides when to start the game. He/she can do this at any time as long as there are at least two players, each on a
                                                    different team. </p>
                                                <p><b>Note:</b> When a game starts, the relevant box in the game list turns red, shows a bouncing ball symbol and will not accept
                                                    players. Spectators can still watch ongoing games.</p>
                                                <p>When a game ends, it will be visible as an “ended game” in the Lobby game list, with grey colouring and a goal flag symbol. This way,
                                                    users who didn't play that game can still check the final results.</p>
                                                <p></p>
                                                <p></p>
                                                <p></p>
                                                <p></p>
                                                <p><img width="19" height="23" border="0" align="left"
                                                        src="{{ url('/') }}/c_images/album372/ball_blue.gif"
                                                        alt=""><b><a name="5"><img width="70" height="101" border="0" align="right"
                                                                src="{{ url('/') }}/c_images/album372/player_blue.gif"
                                                                alt="">The Battle Ball Arena</a></b></p>
                                                <p>The Battle Ball arena consists of a tiled floor, when a game is about to begin, players are moved automatically to the Battle Ball
                                                    Arena from the Battle Ball Lobby. Players will appear in fixed starting positions depending on their team colour. Different teams
                                                    begin the game from different sides of the Arena.</p>
                                                <p>Players are still able to talk in the room <b>BUT</b> most of the time, there won't be time for talking! Players who are watching the
                                                    game do not appear “physically” in the Arena. Their screen will become a "live television feed", broadcasted from the game arena.
                                                    They won’t be able to comment the game happenings.</p>
                                                <p></p>
                                                <p><b><img width="19" height="23" border="0" align="left"
                                                            src="{{ url('/') }}/c_images/album372/ball_red.gif"
                                                            alt=""><b><a name="6">Game Play</a></b></b></p>
                                                <p>When the Battle Ball Arena loads, a Start Counter will appear, counting down to the start of the game. You can leave the arena during
                                                    this count down and you will not be charged 2 tickets for that game. The tickets are only deducted from your Habbo account when the
                                                    game starts. </p>
                                                <p><b><img align="right"
                                                            src="{{ url('/') }}/c_images/album372/player_red.gif"
                                                            alt=""></b>The Game is played by bouncing on "kangaroo balls" around the game arena. Bouncing is controlled in the
                                                    same way as normal walking (i.e. click a floor tile and you’ll bounce there.) Players are able to bounce in all 8 directions, just
                                                    like normal walking.</p>
                                                <p><b>Note: </b>Moving in Battle Ball is slightly different. If there's someone/something blocking your way, you don't bypass the
                                                    obstacle automatically.</p>
                                                <p>The goal of the game is to colour the floor tiles with your team colour, by bouncing over them. Every “bounce” colours a tile one
                                                    level; every subsequent bounce makes the colouring “thicker”. When a tile is bounced over 4 times, it gets permanently locked and
                                                    cannot be coloured by any opponent anymore.</p>
                                                <p>If you colour the outline of a shape, for example a square, all the tiles inside that shape will get coloured by your team's colour.
                                                    By doing this, you’ll earn some bonus points for your team.</p>
                                                <p>You can also “steal” any opponents’ tile which has <b>NOT</b> been bounced over 4 times and permanently coloured. The stolen tile
                                                    will start the “colouring process” all over again, but with a different colour.</p>
                                                <p><b><img width="19" height="23" border="0" align="left"
                                                            src="{{ url('/') }}/c_images/album372/ball_green.gif"
                                                            alt=""></b><b><a name="7">Scoring System</a></b></p>
                                                <p>A game ends after 2 minutes or when every tile in the game arena is permanently coloured. A game-over screen will appear, displaying
                                                    all players scores from the current game, as well as the overall team score.<a name="7"><img border="0" align="right"
                                                            src="{{ url('/') }}/c_images/album372/player_green.gif"
                                                            alt=""></a></p>
                                                <ul>
                                                    <li><b>1st Bounce:</b> 2 Points For You </li>
                                                    <li><b>1st Bounce Steal:</b> 4 Points For You </li>
                                                    <li><b>2nd Bounce:</b> 6 Points For You <a name="7"></a></li>
                                                    <li><b>2nd Bounce Steal:</b> 8 Points For You <a name="7"></a></li>
                                                    <li><b>3rd Bounce:</b> 10 Points For You </li>
                                                    <li><b>3rd Bounce Steal:</b> 12 Points For You </li>
                                                    <li><b>4th Bounce:</b> Tile “locked” &amp; 14 Points To Everyone On Your Team</li>
                                                </ul>
                                                <p>The score will be balanced to level differences between games with 2, 3 or 4 teams. (i.e. scores from a 3-teams game will be
                                                    multiplied by 1,5 and scores from 4-teams game will be multiplied by 2).</p>
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
