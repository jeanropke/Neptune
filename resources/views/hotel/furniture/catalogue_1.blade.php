@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?'], ['url' => url('/hotel/furniture'), 'title' => 'Furniture']]
])

@section('title', 'Furni Styles')

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
                                    @include('hotel.furniture.include.menu', ['page' => 'catalogue_1'])
                                    @foreach (boxes('hotel.furniture.catalogue_1', 1) as $box)
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
                                            <h3>The {{ cms_config('hotel.name.short') }} Catalogue</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <p align="left">{{ cms_config('hotel.name.short') }} Furni comes in all shapes and sizes, from wallpaper and toilets to Plasto chairs
                                                    and rollers.<br> </p>
                                                <p align="left">These pages give a brief outline of the various types of {{ cms_config('hotel.name.short') }} Furni, as well as some
                                                    simple ideas on what you can do with it all!</p><br><br>
                                                <p align="left"></p>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="1069">
                                                                <p align="left"><strong>Pura</strong><br>This collection of Furni breathes fresh, clean air and cool tranquillity into
                                                                    a room. This collection contains the Fridge where you can get delicious carrots and book cases, for the more
                                                                    studious {{ cms_config('hotel.name.short') }}.<br>This Furni is best used in libraries and guest suites for your
                                                                    visitors!</p>
                                                            </td>
                                                            <td>
                                                                <p align="left"> <img width="186" height="126" border="0" id="galleryImage" alt="thumb pura"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_pura.gif"></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="1068">
                                                                <p align="left"><b>Mode</b><br>Steely grey functionality combined with sleek designer upholstery. The
                                                                    {{ cms_config('hotel.name.short') }} who chooses this furniture is a cool urban cat - streetwise, sassy and so
                                                                    slightly untouchable. This collection contains the all important bar pieces, which you can use to cordon off areas
                                                                    of your room, Z-Shelves which are a must for the more adventurous creator who likes to stack and a sleek collection
                                                                    of chairs and beds.<br>This furni is best used in Help Centres and Group rooms, but the Z-Shelves are indispensable
                                                                    for stacking Furni and building grand monuments!<br> </p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"> <img width="186" height="126" border="0"
                                                                        id="galleryImage" alt="thumb mode" src="{{ url('/') }}/web/images/credits/thumb_mode.gif"></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="1068">
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><b>Lodge</b></p>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;">For that ski-lodge effect - especially good by an open
                                                                    fire (but not too close!) The Lodge Collection is for {{ cms_config('hotel.name.short') }}s who have a no-frills
                                                                    attitude to home furnishing and those who appreciate the beauty of wood. This collection includes a roaring
                                                                    fireplace to warm you up after a hard day as a lumberjack and the Lodge door- perfect for keeping out unwanted
                                                                    visitors.<br>This Furni, as the name suggests, is best used in Ski Lodges and Relaxation rooms, the sombre tones of
                                                                    the Furni calming away any of the days stress...<br> </p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"> <img width="186" height="126" border="0"
                                                                        id="galleryImage" alt="thumb lodge" src="{{ url('/') }}/web/images/credits/thumb_lodge.gif"></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="1065">
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><b>Plasto</b></p>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;">Feel that 1970s vibe and add some colour to your life.
                                                                    Choose colours to reflect your mood, your Feng Shui aspirations or just your favourite shades. Plasto comes in a
                                                                    great many colours- ideal for the colourful {{ cms_config('hotel.name.short') }} who loves to express themselves.
                                                                    This collection includes the as-comfortable-as-it-looks Pod Chair which you'll just sink into: Try not to fall
                                                                    in!<br>This Furni is best used in Party rooms, the crazy colours reflecting the mood of the occasion.</p>
                                                            </td>
                                                            <td>
                                                                <p align="left"><img width="186" height="126" border="0" id="galleryImage" alt="thumb plasto"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_plasto.gif"></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="1053">
                                                                <p align="left"><b>Area</b><br>Clean, chunky lines set this collection apart as a preserve of the down-to-earth
                                                                    {{ cms_config('hotel.name.short') }}. It's beautiful in its simplicity, and welcoming to everyone. This is the
                                                                    Furni for the more mature {{ cms_config('hotel.name.short') }}, and the collection contains an occasional table to
                                                                    rest your book or mug of cocoa and the dividers that are perfect for a garden plot.<br>This Furni is best used for
                                                                    gardens with the Hatches having a rustic charm, while the seats and bookcase work best in discussion rooms, where
                                                                    little is said but everything is considered.<br> </p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><img width="186" height="126" border="0"
                                                                        id="galleryImage" alt="thumb area" src="{{ url('/') }}/web/images/credits/thumb_area.gif"></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="1065">
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><b>Iced</b></p>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;">For the {{ cms_config('hotel.name.short') }} who needs
                                                                    no introduction. It's so chic, it says everything and nothing. It's a blank canvas to set the scene for imaginations
                                                                    to run wild. The award-winning Iced Collection includes Iced Bar and Iced Block, two indispensable items if you’re
                                                                    planning on making a maze or a games room: With it's soft, unassuming tones Iced goes with everything- even Plasto!
                                                                    This Furni is best used for chill out spaces, and Game rooms with the Iced block the perfect obstacle in a race!<br>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"> <img width="186" height="126" border="0"
                                                                        id="galleryImage" alt="thumb iced" src="{{ url('/') }}/web/images/credits/thumb_iced.gif"></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="1069">
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><b>Candy</b></p>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;">Candy combines the cool, clean lines of the Mode
                                                                    collection with a softer, more soothing style. It's urban sharpness with a hint of the feminine- but that doesn't
                                                                    mean this furni isn't for boys! This collection contains the Pink Bear Rug (an accident during design involving a
                                                                    glass of Cherry Cola), a perfect talking point.<br>This Furni is mostly used in Beauty Salons and Help Centres:
                                                                    Sitting on one of these chairs certainly makes the hassle of a manicure, pedicure and hair-wash less of a
                                                                    hassle!<br> </p>
                                                            </td>
                                                            <td>
                                                                <p align="left"> <img width="186" height="126" border="0" id="galleryImage" alt="thumb candy"
                                                                        src="{{ url('/') }}/web/images/credits/thumb_candy.gif"></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="1068">
                                                                <p align="left"><b>Bath</b><br>Have some fun with the cheerful bathroom collection. Give yourself and your guests
                                                                    somewhere to freshen up - vital if you want to avoid nasty smells. Might be an idea to put your loo in a corner
                                                                    though... This collection contains toilets: Essential for any restaurant and baths perfect for the hardworking
                                                                    {{ cms_config('hotel.name.short') }} to relax in with a mountain of bubbles.<br>This Furni is best used for rest
                                                                    rooms in restaurants and the non-slip tiles are perfect for saunas.</p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"> <img width="186" height="126" border="0"
                                                                        id="galleryImage" alt="thumb bathroom" src="{{ url('/') }}/web/images/credits/thumb_bathroom.gif"></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="1068">
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"><b>Plants</b></p>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;">Every room needs a plant! Not only do they bring a bit
                                                                    of the outside inside, they also enhance the air quality! And what better gift for a friend than a beautiful rose or
                                                                    elegant fruit tree... For the horticultural {{ cms_config('hotel.name.short') }} this collection contains Bonzai
                                                                    trees for the meditative {{ cms_config('hotel.name.short') }}, Roses for your beloved and giant sized Yukka trees
                                                                    for your forest!<br>This Furni can be used anywhere to give the room a more homely feeling, some of it's more
                                                                    practical uses however include being used as obstacles in Jungle themed game rooms.</p>
                                                            </td>
                                                            <td>
                                                                <p align="left" style="margin-top: 0pt; margin-bottom: 0pt;"> <img width="186" height="126" border="0"
                                                                        id="galleryImage" alt="thumb plants" src="{{ url('/') }}/web/images/credits/thumb_plants.gif"></p>
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
