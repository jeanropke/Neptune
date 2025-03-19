@extends('layouts.master', ['menuId' => '2', 'submenuId' => 'pets_taking_care', 'headline' => true])

@section('title', 'Taking Care of Your Pet')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
    <tbody>
        <tr>
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 202px;" class="habboPage-col">
                <div id="top-3rd-level"></div>
                <div id="content-3rd-level">
                    <ul id="third-level-navi">
                        <li class="inactive">
                            <a href="{{ url('/') }}/hotel/pets">{{ cms_config('hotel.name.short') }} Pets</a>
                        </li>
                        <li class="active">
                            Taking Care of Your Pet
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div id="bottom-3rd-level"></div>
                @foreach(boxes('hotel.pets', 1) as $box)
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
                        <h3>Taking Care of Your Pet</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <img width="35" height="40" border="0" align="right" id="galleryImage"
                                src="{{ url('/') }}/c_images/album1774/croc16.png"
                                alt="">You'll need to take care of your pet to keep it happy and healthy. The Pet
                            Accessories section of the Catalogue offers different kinds of accessories that will help
                            satisfy all your pets needs. <br><br>It becomes hungry several times a day. Food can be
                            bought as single portions (one food item) or in an economy package of six portions (six food
                            items). The food will take your pet a while to eat. A healthy pet will need to eat just one
                            portion (one food item) per day. Put the food item in the room near your pet to feed it.
                            Goodies such as the Chocolate Mouse or Marzipan Man are not normal food but are a treat to
                            make your furry (or scaly) friend happy. <br><br>It will also become thirsty. Get a water
                            bowl and you’ll have an unlimited supply of water for your pet. Double-click<img hspace="0"
                                border="0" align="right"
                                src="{{ url('/') }}/c_images/album129/Cat_burglar_small.gif"
                                alt=""> on the bowl to re-fill it at any time. <br><br>Keep your pet playful and lively
                            by buying toys for it such as the rubber ball. Make sure you put the ball close to your
                            animal so they can get to it. <br><br><b>Don’t forget</b> – Check to see how your pet is
                            doing at any time by double-clicking the pet and viewing it's well-being box.
                            <br><br><strong>Examining Your Pet's Behaviour<br></strong>You can monitor the facial
                            expressions of your pet, the way it acts and it's woofs/meows etc via speech bubbles. These
                            are the ways your pet expresses its needs and moods – for example when you enter the room,
                            your pet will come to greet you waggling its tail happily.<br><br>When your pet is hungry or
                            thirsty, it searches for food or a water bowl. If it finds some, it will eat or drink it
                            until it's full. If there isn't any food in the room, it will come to your {{ cms_config('hotel.name.short') }}, begging
                            and trying to catch your attention. <br><br><img width="66" height="39" border="0"
                                align="right" id="galleryImage"
                                src="{{ url('/') }}/c_images/album02/pet_info_pic10.gif"
                                alt=""> Your pet will need a nap every now and then. It gets more tired when it's active
                            and running around. When it gets sleepy, it'll find its way to the basket, lie down and fall
                            asleep. If the basket is unreachable, your pet will find another place and have a kip.
                            Younger pets take a nap about every half an hour but an older one may need to sleep more
                            often. <br><br><strong>Voice Commands</strong><br>Apart from interacting using pet-related
                            accessories (food, ball etc), you can use simple voice commands to tell the pet what to do.
                            When you use these commands with your pet, you need to shout them and include the pet's name
                            in the sentence. <br><br>For example, 'Rover sit '. Your pet may do what it's told, but if
                            it doesn't don't be put of there obedience depends on there state of mind, mood and energy
                            levels. Younger pets may also take a little while to learn and follow commands.
                            <br><br><strong>Commands anyone can use are:</strong><br><img width="38" height="33"
                                border="0" align="right" id="galleryImage"
                                src="{{ url('/') }}/c_images/album129/Joe_cocker_spaniel_small.gif"
                                alt=""><br>Sit: Makes the pet sit down <br>Lie down: Gets the pet to lie down <br>Jump:
                            Makes the pet jump up<br>Speak: Gets the pet to bark/meow etc <br>Good: Boosts pet's ego and
                            makes them happy <br><br><strong>These commands can only be used by the pet owner:
                                <br></strong><br>Heel: Gets your pet to follow you <br>Come here: Makes your pet come to
                            you <br>Beg: The pet will beg for a reward from you <img hspace="0" border="0" align="right"
                                src="{{ url('/') }}/c_images/album129/pixie_poodle_small.gif"
                                alt=""><br>Go away: Your pet will move away from you <br>Bad: Tells your pet off
                            <br>Sleep: Makes your pet go back to it's basket for a nap <br>Play dead: Your pet will roll
                            onto it's back and 'play dead' for a few minutes<br><br>Each pet also recognizes and reacts
                            to its name when said. <br><br>

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
