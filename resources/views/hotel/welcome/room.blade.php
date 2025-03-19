@extends('layouts.master', ['menuId' => '2', 'submenuId' => '10', 'headline' => true])

@section('title', 'Moving Around and Chatting')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
    <tbody>
        <tr>
            <td style="width: 8px;"></td>
            @include('includes.welcome', ['page'=> 'welcome_room'])
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>Your Own Room</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <img width="93" vspace="0" hspace="0" height="93" border="0" align="right"
                                alt="tour own room" id="galleryImage"
                                src="{{ url('/') }}/c_images/album209/tour_own_room.gif">
                            <p>Want your own room, but not sure how? Read on!<br><br><strong>Creating your own {{ cms_config('hotel.name.short') }}
                                    Room</strong><br>Guest rooms are free and you can get one by visiting one of the
                                Room-O-Matic kiosks. You can find these in the Hotel Navigator or in the Lobbies and
                                Cafés (they look like yellow arcade games). You get to choose the name, description and
                                shape of your room, and you can decide whether to lock it or let anyone come
                                in:<br><br><strong>Open</strong> - anyone can enter.<br><strong>Doorbell </strong>- a
                                pop-up appears when you are in that room asking if the person trying to load the room is
                                allowed in.<br><strong>Password</strong> - only people that know the password to your
                                room can enter.<br><br>When you click 'Done' in the Room-O-Matic window, you can click
                                the 'Go to your room' link and head straight to your new room.<br><br><strong>Decorating
                                    and furnishing your room</strong></p>
                            <p><strong></strong>You can find everything you need to customize your new {{ cms_config('hotel.name.short') }} room in the
                                Hotel <a target="_self"
                                    href="{{ url('/') }}/hotel/furniture/catalogue">Furni
                                    Catalogue</a>. There's a huge selection of items, from humble doormats, plants and
                                bathroom suites, to digital TVs, teleports and fully-stocked fridges. You can read more
                                about <a target="_self"
                                    href="{{ url('/') }}/hotel/furniture/catalogue">Furni</a>
                                here.<br><br>Before you can buy Furni you'll need to buy some <a target="_self"
                                    href="{{ url('/') }}/credits/">{{ cms_config('hotel.name.short') }} Credits</a>.
                                <br><br><img align="right" src="{{ url('/') }}/c_images/album238/catalogue2.gif"
                                    alt="">To open the Catalogue click on the Catalogue icon (see right). The Catalogue
                                is divided into lots of different section: {{ cms_config('hotel.name.short') }} Club, Spaces, Presents, Rollers, etc…
                                and you should have a good look at all the sections before you make a purchase. Once
                                you've bought something, you can't send it back!<br><br>If you have {{ cms_config('hotel.name.short') }} Credits and
                                want to buy an item from the Catalogue you should click on the item you want and click
                                'buy'. A pop-up will appear asking you to confirm you wish to buy the item; click 'OK'
                                to confirm. If you have enough {{ cms_config('hotel.name.short') }} Credits in your {{ cms_config('hotel.name.short') }} Purse the item will then
                                appear in your hand.<br><br><strong>Room rights</strong><br>Room Rights allow another
                                {{ cms_config('hotel.name.short') }} to move Furni in your room, open hatches, kick other Habbos and delete what it
                                says on your stickies. You should only give rights to Habbos you trust. Nasty Habbos
                                might move your Furni about, delete the writing on your Stickies and kick all your
                                friends, when you don't want them to. So, be careful who you
                                trust!<br><br><strong>Giving room rights</strong><br>Only the room owner can give out
                                room rights. When your {{ cms_config('hotel.name.short') }} character is in one of your own rooms, you can click on
                                another {{ cms_config('hotel.name.short') }} in the room and then on the 'give rights' button. If you click that button
                                the {{ cms_config('hotel.name.short') }} will have rights in your room, they will then be able to move Furni, open
                                hatches, kick other users and delete writing on Stickies. <br><br><strong>Removing room
                                    rights</strong><br>You can remove rights in two different ways:<br><br>1) If you are
                                in one of your own rooms you can click on any {{ cms_config('hotel.name.short') }} that has rights and under their name
                                on the bottom right hand side of the screen you will see the 'remove rights' button, if
                                you click on this it will remove their room rights.<br><img align="right"
                                    src="{{ url('/') }}/c_images/album103/habbo_8.gif" alt="">2) To remove rights
                                from everyone in the room you need to go to Hotel
                                Navigator and under 'Guest Rooms' select 'Own Rooms'. Click on the name of the room you
                                want to remove everyone's rights from and then at the bottom of the Navigator. Click on
                                modify. At the bottom of that page, select reset and follow the instructions from
                                there.<br><br></p>
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
