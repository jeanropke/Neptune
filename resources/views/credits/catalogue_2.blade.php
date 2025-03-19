@extends('layouts.master', ['menuId' => '4', 'submenuId' => 'credits_furniture', 'headline' => true])

@section('title', 'Functional Furni')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
        <tr>
            <td style="width: 8px;"></td>
            @include('includes.furniture', ['page' => 'catalogue_2', 'menu' => 'credits'])
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="v3box yellow">
                    <div class="v3box-top"><h3>The {{ cms_config('hotel.name.short') }} Catalogue</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <strong>Functional Furni<br></strong>This section gives an overview of functional items that
                            can be used to make your room stand out!<br><br>

                            <p><strong>Trophies</strong><br><img width="44" height="108" border="0" align="right"
                                                                 src="{{ url('/') }}/web/images/credits/trophy_17.gif"
                                                                 id="galleryImage" alt="">Reward your {{ cms_config('hotel.name.short') }} friends, or
                                yourself with a fabulous glittering Trophy! There are several different types of
                                trophies to choose from: From the Ball, a symbol of solidarity and strengthened the
                                Championship {{ cms_config('hotel.name.short') }}, standing proud in victory to the Fish Trophy symbol of… well, fish
                                and the Hugging {{ cms_config('hotel.name.short') }}s, a symbol of friendship and companionship!<br></p>

                            <p><br><strong>Holodice</strong><br><img width="51" height="65" border="0" align="right"
                                                                     src="{{ url('/') }}/web/images/credits/holodice.gif"
                                                                     id="galleryImage" alt="">Holodice are great fun to
                                have in rooms, adding excitement and tension to any party! They can be used in an all
                                manner of weird and wild games, Bingo- users have to roll the same dice as the
                                Gamesmaster; Elephant Chess where the movement of the piece depends on the roll of the
                                dice; higher or lower where {{ cms_config('hotel.name.short') }}s have to guess whether the next dice roll will be
                                higher or lower than the previous.<br><br><strong>Hatches</strong><br><img width="49"
                                                                                                           height="55"
                                                                                                           border="0"
                                                                                                           align="right"
                                                                                                           src="{{ url('/') }}/web/images/credits/iced_item_8.gif"
                                                                                                           id="galleryImage"
                                                                                                           alt="">Hatches
                                are available in most brands of Furni: Lodge, Mode, Area and Iced. Hatches are perfect
                                for keeping users out of certain areas in your room; so that they don't sneak into your
                                Help Desk or interrupt a game halfway through. Double clicking on any hatch opens or
                                closes it.<br><br><strong>Alerts</strong><br><img width="49" height="55" border="0"
                                                                                  align="right"
                                                                                  src="{{ url('/') }}/web/images/credits/lert.gif"
                                                                                  id="galleryImage" alt="">
                                Best used in racing rooms: Who can reach the alert first? Or in Pac-man style games
                                where a user has to dodge all the other users out to catch her and hit all the alerts!
                                Click on the top of the Furni to make set off the alert!<br><br><strong>Rollers</strong><br><img
                                        width="64" height="40" border="0" align="right"
                                        src="{{ url('/') }}/web/images/credits/roller_aqua.gif" id="galleryImage"
                                        alt="">Move your imagination. This cool furni is more than suitable for business
                                and pleasure... {{ cms_config('hotel.name.short') }} rollers for games and queues. Rollers come in five different
                                colours in the catalogue, while extra colours can occasionally be found in the
                                catalogue.<br>Rollers are great obstacles in games, (especially if you put a pet on
                                them!)- place them next to a valuable porter and watch the players fall over themselves!<br><br><strong>Stickies</strong><br><img
                                        width="37" height="33" border="0" align="right"
                                        src="{{ url('/') }}/web/images/credits/Stickies.png" id="galleryImage" alt="">Leave
                                a message for a friend, or leave a clue. You get 20 stickies in a pack. Stickies are
                                great for game rooms to leave instructions on how to play, or in group rooms where you
                                can use them to give new recruits instructions or hide it behind a piece of Furni as a
                                secret clue in a maze... The possibilities really are endless
                                (seriously).<br><br><strong>Teleports</strong><br><img width="19" height="32" border="0"
                                                                                       align="right"
                                                                                       src="{{ url('/') }}/web/images/credits/explore_telesmall1.gif"
                                                                                       id="galleryImage" alt=""><img
                                        width="19" height="32" border="0" align="right"
                                        src="{{ url('/') }}/web/images/credits/explore_telesmall2.gif" id="galleryImage"
                                        alt=""><img width="19" height="32" border="0" align="right"
                                                    src="{{ url('/') }}/web/images/credits/explore_telesmall3.gif"
                                                    id="galleryImage" alt="">Beam yourself from one room to another with
                                our space age teleports. Buy a pair, put one in each room and you've got your own suite!
                                Teleports are sold in pairs (obviously!), so if you trade for them, check that you're
                                getting a linked pair.<br>Teleports are best used for maze rooms or race rooms, allowing
                                you to make a 12 room race track for example, or a maze of teleporters where only one
                                will lead to your escape...</p>

                            <p></p>

                            <p><br></p>

                            <p><br></p>

                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
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
        </tbody>
    </table>
@stop
