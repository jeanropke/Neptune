@extends('layouts.master', ['menuId' => '27'])

@section('title', 'Game Instructions')

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
                                    @include('games.snowstorm.include.menu', ['page' => 'rules'])

                                    @foreach (boxes('games.snowstorm.rules', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="v2box blue light">
                                        <div class="headline">
                                            <h3>Game Instructions</h3>
                                        </div>
                                        <div class="border">
                                            <div></div>
                                        </div>
                                        <div class="body">


                                            <center><img src="{{ url('/') }}/c_images/album1424/Snow_Storm_logo.gif" alt=""></center>
                                            <br>

                                            <table width="100%" border="0" id="table1">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img vspace="0" hspace="10" border="0" src="{{ url('/') }}/c_images/album1424/tutorial_1_001.gif"
                                                                alt=""><br><br>

                                                            <img vspace="0" hspace="10" border="0" src="{{ url('/') }}/c_images/album1424/tutorial_3_001.gif"
                                                                alt=""><br><br>

                                                            <img vspace="0" hspace="10" border="0" src="{{ url('/') }}/c_images/album1424/tutorial_0.gif"
                                                                alt="">
                                                            <p>

                                                                <img vspace="0" hspace="10" border="0"
                                                                    src="{{ url('/') }}/c_images/album1424/tutorial_5_animated_002.gif" alt=""><br><br>

                                                                <img vspace="0" hspace="10" border="0" src="{{ url('/') }}/c_images/album1424/tutorial_6_002.gif"
                                                                    alt="">
                                                            </p>
                                                        </td>
                                                        <td valign="top">



                                                            <b>1. How to start a game</b><br>
                                                            <br>
                                                            To start a game of SnowStorm you need to be in one of the game lounges.
                                                            Once you are in you need to purchase Game Tickets (click on the "Buy
                                                            Tickets" button to purchase). Click on the 'start game' button (the
                                                            button that says 'Start game' on the left hand game menu) to... start
                                                            the storm!<br>

                                                            <br>
                                                            One game costs 2 Game Tickets.
                                                            <br>
                                                            <br>
                                                            <b>2. Game Modes</b>
                                                            <br>
                                                            <br>
                                                            When creating your game you can select how many teams are playing:
                                                            2,3,4 or all against all.<br>
                                                            <br>Choose how long a game will carry on for: 2 minutes, 3
                                                            minutes or five minutes. Warning: 5 minute games should only be played
                                                            by really hardcore gamers. We mean it.
                                                            <br>
                                                            <br>

                                                            <b>3. How to play</b><br>
                                                            <br>
                                                            The aim of the game is simple: To reduce your opponents to pulp
                                                            by throwing snow balls at them.<br>
                                                            <br>
                                                            Each player has a small power meter that shows how much health they
                                                            have. Once the meter has run down (due to being smashed by snow balls)
                                                            the poor Habbo will collapse into the snow of defeat and have to wait a
                                                            few seconds before getting back up to reclaim his/her honour.

                                                            <b><br><br>4. Aiming</b><br>
                                                            <br>
                                                            To throw a snowball at another user just click on them.
                                                            To throw a snowball at an empty square (if your opponent is running
                                                            for cover) hold down the shift key and click the empty square.

                                                            <br>

                                                            <br>
                                                            To throw over walls and other tall obstacles simply hold down shift
                                                            and click for a longer period of time.

                                                            When you have run out of snow balls click the refill button to get on
                                                            your knees and start collecting snow- but be warned while refilling your
                                                            hand you will be vulnerable and an easy target!

                                                            <br>
                                                            <br>


                                                            <b>5. Levels</b><br>
                                                            <br>
                                                            There are five "battlefields" to choose from, each with its own unique
                                                            obstacles, traps and advantages from snowball machines, and bridges to
                                                            castles and trees!<br>

                                                            <br>

                                                            <b>6. Scoring</b><br>
                                                            <br>
                                                            Scoring in SnowStorm is as follows:<br><br>1 points for a hit against another player.<br>
                                                            5 points if your ball is the one that sends an opponent to an ice cold
                                                            end.<br>
                                                            <br>
                                                            Your score is recorded in the <a href="{{ url('/') }}/games/snowstorm/highscores">high score
                                                                board</a>; there
                                                            are several skills levels as well. Please bear in mind you can only play in lounges that are in your skill
                                                            level, or the 'free for all' games where players of all skills can
                                                            gather together.<br>

                                                            <br>
                                                            So get on your woolly hats, big boots and husky coats and get ready to
                                                            face the SnowStorm!
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="clear"></div>
                                        </div>
                                        <div class="bottom">
                                            <div></div>
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
