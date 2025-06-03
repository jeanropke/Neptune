@extends('layouts.master', ['menuId' => '2'])

@section('title', 'Pets')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
    <tbody>
        <tr>
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 202px;" class="habboPage-col">
                <div id="top-3rd-level"></div>
                <div id="content-3rd-level">
                    <ul id="third-level-navi">
                        <li class="active">
                            {{ cms_config('hotel.name.short') }} Pets
                        </li>
                        <li class="inactive">
                            <a href="{{ url('/') }}/hotel/pets/taking_care_of_your_pet">Taking
                                Care of Your Pet</a>
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
                        <h3>{{ cms_config('hotel.name.short') }} Pets</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <img vspace="0" hspace="7" border="0"
                                src="{{ url('/') }}/c_images/album1702/pets200.gif" alt=""><br><br>
                            <center><span style="font-style: italic;"><span style="font-weight: bold;"></span><br><span
                                        style="font-style: italic;"><br></span></span></center>
                            <p><img vspace="0" hspace="7" border="0" align="right"
                                    src="{{ url('/') }}/c_images/album129/Paws_forethought.gif" alt="">Every home
                                needs a pet and a {{ cms_config('hotel.name.short') }} home is no exception! For only 20 {{ cms_config('hotel.name.short') }}
                                Coins you can buy yourself a loveable <span style="font-weight: bold;">Cat, Dog or
                                    *CROCODILE* (NEW!)</span> from the Catalogue! Pets are a joy to have and to look
                                after, but they can also be hard work and sometimes require time and effort to make them
                                happy.</p>
                            <p><img vspace="0" hspace="8" border="0" align="left"
                                    src="{{ url('/') }}/c_images/album1702/croc300percent.gif" alt=""><span
                                    style="font-style: italic;"><span style="font-weight: bold;">Please
                                        Note:</span> You can only name your pet once, and you’re only allowed to put a
                                    pet down in one of your own rooms. You can own several pets but only <span
                                        style="font-weight: bold;">three </span>are allowed in the same room at the same
                                    time. Pets can't be traded.</span></p>
                            <p><strong>Pet’s Life <br></strong>Your <hspace="6" border="0" align="right"
                                    src="{{ url('/') }}/album923/news_icon_14b.gif" id="galleryImage"
                                    alt="right">
                                    pet's life starts the day it is bought, one day of
                                    real time is one year of your pet's life and your pet will become less active and
                                    more sleepy as it gets older. When you pick your pet up, or when there is no one in
                                    the room it will be passive but the moment you enter the room it will rush to greet
                                    you much like a real pet.</hspace="6">
                            </p>
                            <p><strong>Pet's Identity</strong><br>Each pet has its own unique personality, your pet’s
                                personality consists of its looks, breed and how its feeling. Click once on your pet and
                                you’ll be able to see what it looks like, its name and breed. Double-click on the pet,
                                you’ll get the well-being box that shows:</p>
                            <p><img width="194" hspace="6" height="87" border="0" align="left" id="galleryImage"
                                    src="{{ url('/') }}/c_images/album209/pet_info_pic2_UK.gif"
                                    alt=""><strong>Age</strong>: One day of real time is equal to one pet year
                                <br><strong>Hunger</strong>: If the pet is hungry or not <br><strong>Thirst</strong>: If
                                the pet is thirsty or not <br><strong>Happiness</strong>: How the pet is feeling
                                <br><strong>Nature</strong>: Unique for each pet.</p>
                            <p><strong>Other uses for pets</strong><br>Pets have a couple of other uses in games rooms.
                                Here are a few examples, but just remember if you use your pet in this way to make sure
                                they're happy! A miserable pet is no fun for anyone!</p>
                            <p style="font-weight: bold;"><img vspace="0" hspace="7" border="0" align="right"
                                    src="{{ url('/') }}/c_images/album129/matted_moggy.gif" alt="">Here are two
                                examples:</p>
                            <p><span style="font-weight: bold;">Pet Sumo</span>: Users chances in a game depends on
                                which pet leaves the small arena first! This game can take absolutely hours...
                                especially if the pet is old and sleepy!</p>
                            <p><span style="font-weight: bold;">Race Rooms:</span> Pets are great blockers! Place a pet
                                in front of a teleporter or in a narrow space and watch as they disrupt users and upset
                                their progress!<br></p>

                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>Adopting A Pet</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <span style="font-weight: bold;"><img vspace="0" hspace="8" border="0" align="right"
                                    src="{{ url('/') }}/c_images/album1702/gator_buynow.gif" alt="">Buying a pet
                                is EASY:</span> Open the Catalogue to the 'Pets' tab and choose
                            how you want your pet to look. Then name it and click 'BUY.' <p>There are different
                                selections of pet breeds available every time you visit the Catalogue, just reload the
                                Catalogue for new variations. <br></p>
                            <p>If you view the second page in the Pets section (info/tips), when you go back to choose a
                                pet - you'll return to a new selection. </p>
                            <p>The second Pets page gives you some tips all pet owners need to know. After you've bought
                                your pet <span style="font-weight: bold;">a small Basket will appear in your
                                    hand</span>. Put the basket down in your room to see your pet!<br></p>
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
