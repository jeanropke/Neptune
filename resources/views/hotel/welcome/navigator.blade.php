@extends('layouts.master', ['menuId' => '2'])

@section('title', 'Moving Around and Chatting')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
    <tbody>
        <tr>
            <td style="width: 8px;"></td>
            @include('includes.welcome', ['page'=> 'welcome_navigator'])
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>using the navigator</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <img width="194" height="118" border="0" align="right"
                                src="{{ url('/') }}/c_images/album238/new_navimg.gif" id="galleryImage" alt="">
                            <p><strong>The Navigator</strong><br>Without the Navigator, you'd be stuck on Hotel View
                                forever! The Navigator gives you access to 100's of Public and Guest Rooms within the
                                Hotel. All of them, just a couple of clicks away! <br><br>The Hotels rooms are divided
                                into two categories: <br><br><strong>Public Spaces </strong>- Public Spaces are owned by
                                the Hotel and they are the first rooms you will see when the Navigator opens. There are
                                lots of Public Spaces to choose from; nightclubs, restaurants, cafes, swimming pools,
                                sun terraces, a cinema and so many more.<br><br><strong>Guest Rooms </strong>- Guest
                                Rooms are created by {{ cms_config('hotel.name.short') }}s just like you and anyone can make their own room for free.
                                If you want to make your own {{ cms_config('hotel.name.short') }} room, click HERE to find out how.<br><br><strong>How
                                    to visit a room</strong><br>To visit a room click on its name in the Navigator and
                                then click 'Go'.<br><br><strong>The Welcome Lounge</strong><br>If this is your first
                                visit to {{ cms_config('hotel.name.full') }}, why not check out the Welcome Lounge? It's a great place to meet
                                new friends. You might even spot one of the Hotels eXperts. <br><br><br><strong>Moving
                                    around a room</strong><br><img width="194" vspace="0" hspace="0" height="118"
                                    border="0" align="right" alt="tour walk" id="galleryImage"
                                    src="{{ url('/') }}/c_images/album209/tour_walk.gif">It's
                                easy to move inside a room - just click on a square to walk to it. If your feet need a
                                rest, click on or under beds and chairs to sit or lie down. To grab a drink from a
                                fridge or mini-bar, stand next to the item of Furni and double click it. And if you
                                fancy a boogie, click on your {{ cms_config('hotel.name.short') }} and then click the 'dance' button that appears on
                                the right hand side of the screen.<br></p>
                            <p><br><strong>Chatting to other Habbos</strong><br>If you want to say something, type in
                                the box at the bottom of the screen and hit the return key. Only the people near you
                                will hear - Habbos futher away will see dots in your speech bubble - so choose 'shout'
                                to let the whole room know your thoughts. If you want to whisper something secret to
                                another {{ cms_config('hotel.name.short') }}, choose 'whisper' and click on them before you hit return.<br><img
                                    width="194" hspace="0" height="189" border="0" align="right"
                                    src="{{ url('/') }}/c_images/album209/tour_speaking.gif" alt="tour speaking"
                                    id="galleryImage"><br><br>To wave, click on yourself and the
                                wave button will appear under your {{ cms_config('hotel.name.short') }} on the right-hand side of the screen. Click on
                                the button and your {{ cms_config('hotel.name.short') }} will wave to all your friends.<br><br><img width="190"
                                    height="79" border="0"
                                    src="{{ url('/') }}/c_images/tourimages/tour_waving.gif" alt=""></p>
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
