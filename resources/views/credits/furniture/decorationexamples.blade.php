@extends('layouts.master', ['menuId' => '4', 'submenuId' => 'credits_furniture', 'headline' => true])

@section('title', 'Decoration Examples')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 208px; height: 400px;" class="habboPage-col">
                                    @include('credits.furniture.include.menu', ['page' => 'decoration_examples'])
                                    @foreach (boxes('credits.furniture.decoration_examples', 1) as $box)
                                        <div class="v3box {{ $box->color }}">
                                            <div class="v3box-top">
                                                <h3>{{ $box->title }}</h3>
                                            </div>
                                            <div class="v3box-content">
                                                <div class="v3box-body">
                                                    {!! $box->content !!}
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="v3box-bottom">
                                                <div></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">
                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Decoration Examples</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <img width="99" height="118" border="0" align="right" id="galleryImage"
                                                    src="{{ url('/') }}/web/images/credits/choice_newsie.gif" alt="">The possibilities are endless with
                                                {{ cms_config('hotel.name.short') }} Furni: You can make a rare room, a
                                                theme park, a monument, hundreds of different games, restaurants and so much more...<br><br>To
                                                start your creative juices a flowing below are some examples. For more examples of great
                                                rooms be sure to read our upcoming Room Reviews page!<br>

                                                <p></p>

                                                <p></p>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216">
                                                                <p align="left"><img width="186" height="126" border="0" id="galleryImage" alt="thumb kick"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_kick.gif">
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><b>Kick
                                                                        Warz</b><br>A pure {{ cms_config('hotel.name.short') }} favourite: Everyone in the room has rights and
                                                                    the winner is the user who survives until the bitter end! Hide behind trees,
                                                                    screens and bars and make sure you're the last user standing!<br></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216">
                                                                <p align="left"><img width="186" height="126" border="0" id="galleryImage" alt="thumb pacman"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_pacman.gif">
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><b>Pacman</b><br>A
                                                                    late {{ cms_config('hotel.name.short') }} classic: Developed in 2004 by a {{ cms_config('hotel.name.short') }} who
                                                                    was later banned
                                                                    for
                                                                    using his home phone without his parent's permission.<br>This room is a mini
                                                                    maze, with Alerts placed in each corner. The contender has to hit all the
                                                                    alerts one after another while dodging the ghosts who exist to hamper his
                                                                    way. If the player gets blocked in by all the ghosts he loses! Once a player
                                                                    hits all the alerts they progress to the next level where there are more
                                                                    ghosts to hamper him!</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216">
                                                                <p align="left"><img width="186" height="126" border="0" id="galleryImage" alt="thumb fridge"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_fridge.gif">
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><b>Fridge Races<br></b>A
                                                                    simple but classic game. The players start on one end of the room and on the
                                                                    opposite end are a group of Fridges. The Games master shouts out an object
                                                                    to be retrieved from the Fridge (carrot, blueberry juice etc) and the
                                                                    players have to rush to the Fridges and keep clicking until they get the
                                                                    right object, and then dash back to the seats!</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216">
                                                                <p align="left"><img width="186" height="126" border="0" align="left" id="galleryImage7"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_maze.gif" alt=""></p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"></p>

                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><b>Maze rooms</b>
                                                                </p>

                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;">There are two main
                                                                    types of Mazes on {{ cms_config('hotel.name.short') }}:<br>Room-mazes which are made up of a couple of
                                                                    rooms with Furni scattered all over them: What may look like a hideous mess
                                                                    is actually a well constructed trap of stacked furni, pesky pets and hidden
                                                                    chairs!<br>Lost mazes are made up of dozens and dozens of rooms all linked
                                                                    by teleporters. Usually each room looks exactly the same to and has the same
                                                                    name to confuse the weary {{ cms_config('hotel.name.short') }}. Remember: The more difficult the maze and
                                                                    the more rooms it contains, the greater the amount of {{ cms_config('hotel.name.short') }}s who can take
                                                                    part: Just be sure to set a time limit, or you could be waiting all night
                                                                    for a winner to emerge!<br></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216">
                                                                <p align="left"><img width="186" height="126" border="0" id="galleryImage" alt="thumb theatre"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_theatre.gif">
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><b>Theatres</b><br>Put
                                                                    on a performance of Shakespeare, Marlow or Beckett. Alternatively host a
                                                                    stand up comedy night! This room design (pictured) is perfect for an
                                                                    audience with the middle of the room working as a stage!<br></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216">
                                                                <p align="left"><img width="186" height="126" border="0" align="left" id="galleryImage"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_discussionroom.gif" alt=""></p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><br><b>Discussion
                                                                        rooms</b><br>The best discussion rooms are simple with close together
                                                                    seating so the users can hear one another. A debate room also requires a
                                                                    Speakers Corner or two for the speakers to address the crowd. Seating should
                                                                    be comfortable since the audience may be there for a long time; so a mini
                                                                    bar wouldn't go amiss.<br></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216">
                                                                <p align="left"><img width="186" height="126" border="0" align="left" id="galleryImage8"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_restaurant2.gif" alt=""></p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><strong>Restaurants<br></strong>A
                                                                    good restaurant needs many things: A restroom for users to relieve
                                                                    themselves, a wide variety of foods: Turkey, Pizza, cake. A well stocked
                                                                    mini bar or two and very posh seating. Flowers on the table give the room a
                                                                    touch of elegance and romance.<br></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216">
                                                                <p align="left"><img width="186" height="126" border="0" align="left" id="galleryImage9"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_helpcentre.gif" alt=""></p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><b>Helpdesks</b>
                                                                </p>

                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;">Want to help your
                                                                    fellow {{ cms_config('hotel.name.short') }}s? Well then set up a helpdesk and spend your day answering
                                                                    questions. It's almost as much fun as it sounds!</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216">
                                                                <p align="left"><img width="186" height="126" border="0" align="left" id="galleryImage10"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_greatwallofchina.gif" alt=""></p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;">
                                                                    <br><b>Monuments</b>
                                                                </p>

                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;">Show off your
                                                                    stacking skills and build a brilliant monument to make {{ cms_config('hotel.name.short') }}s gasp and
                                                                    scratch their chins in disbelief...</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p></p>

                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
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
