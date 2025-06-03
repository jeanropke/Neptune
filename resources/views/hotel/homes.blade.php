@extends('layouts.master', ['menuId' => '2'])

@section('title', cms_config('hotel.name.short') . ' Homes')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody><tr>
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 202px;" class="habboPage-col">
                @foreach(boxes('hotel.homes', 1) as $box)
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

                <div class="v3box blue">
                    <div class="v3box-top"><h3>{{ cms_config('hotel.name.short') }} Home Pages</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <table width="100%" border="0" id="table1">
                                <tbody><tr>
                                    <td valign="top"><img src="https://web.archive.org/web/20071012014336im_/http://images.habbohotel.com/c_images/album1357/inst_Introduction.gif" alt="The image “http://images.habbohotel.com/c_images/album1357/inst_Introduction.gif” cannot be displayed, because it contains errors."></td>
                                    <td valign="top"><b>Introduction</b><p>To get to your {{ cms_config('hotel.name.short') }} Home simply click the 'view my {{ cms_config('hotel.name.short') }} Home' link on your {{ cms_config('hotel.name.short') }} toolbar.</p>
                                        <p>Once you are viewing your {{ cms_config('hotel.name.short') }} Home click the edit button to
                                            start editing! Alternattively, if you are feeling guilty you can report
                                            yourself for inappropriate content.</p>
                                        <p>All the things on your Home page are movable, to move an element
                                            simply click on it when it edit mode and drag it about!</p></td>
                                </tr>
                                </tbody></table><p>
                            </p><table width="100%" border="0" id="table2">
                                <tbody><tr>
                                    <td valign="top">
                                        <img src="https://web.archive.org/web/20071012014336im_/http://images.habbohotel.com/c_images/album1357/inst_inventory_purchasing.gif" alt="The image “http://images.habbohotel.com/c_images/album1357/inst_inventory_purchasing.gif” cannot be displayed, because it contains errors."> </td>
                                    <td valign="top"><b>Your Inventory</b><p>Once in editing mode you can
                                            edit the layout of your Homepage. Clicking the Notes, Stickers, Widgets
                                            or Backgropunds button opens up your inventory. Your inventory is where
                                            you can find all the cool {{ cms_config('hotel.name.short') }} Homes stuff you already own.</p>
                                        <p>You get some free things to start, however extra stuff costs {{ cms_config('hotel.name.short') }}
                                            Credits.</p>
                                        <p><a href="/web/20071012014336/http://habbo.com/credits/" target="_self">Tell me about {{ cms_config('hotel.name.short') }} Credits</a></p></td>
                                </tr>
                                </tbody></table><p></p><p>
                            </p><table width="100%" border="0" id="table3">
                                <tbody><tr>
                                    <td valign="top"> <img src="https://web.archive.org/web/20071012014336im_/http://images.habbohotel.com/c_images/album1357/inst_Stickie_Notes.gif" alt="The image “http://images.habbohotel.com/c_images/album1357/inst_Stickie_Notes.gif” cannot be displayed, because it contains errors."></td>
                                    <td valign="top"><b>Using notes</b><p>To add a note to
                                            your page click the Notes button and a window will appear telling you
                                            how many notes you have left and give you a note to write on. Select
                                            from the drop down menu what type of note you want, and then write what
                                            you want to appear on it.</p>
                                        <p>Once you have finished writing on the note click preview, and if you
                                            are happy with what you have written click Add, alternately return to
                                            editing.</p>
                                        <p>To purchase more notes, or to cancel click the relevent button.</p>
                                        <p>You cannot edit Notes, once you delete it, that's it, they're
                                            gone!</p></td>

                                </tr>
                                </tbody></table><p></p><p>
                            </p><table width="100%" border="0" id="table4">
                                <tbody><tr>
                                    <td valign="top"> <img src="https://web.archive.org/web/20071012014336im_/http://images.habbohotel.com/c_images/album1357/inst_Stickers.gif" alt="The image “http://images.habbohotel.com/c_images/album1357/inst_Stickers.gif” cannot be displayed, because it contains errors."></td>
                                    <td valign="top"><b>Stickers</b><p>To add a Sticker to you {{ cms_config('hotel.name.short') }} Home
                                            open your Inventory. Click the Sticker you want to appear on page.
                                            Click place on page to have it appear on page. </p>
                                        <p>To buy more Stickers for your page: Open your Inventory then click
                                            'Get more stickers', then select the Sticker that you want to use and
                                            click on 'Purchase'.</p>
                                        <p>To edit your sticker click on the Spanner icon attached to it. You
                                            can either remove it from page- at which point it returns to your
                                            Inventory, or not.</p>
                                        <p>&nbsp;</p></td>
                                </tr>
                                </tbody></table><p></p><p>
                            </p><table width="100%" border="0" id="table5">
                                <tbody><tr>
                                    <td valign="top"><img src="https://web.archive.org/web/20071012014336im_/http://images.habbohotel.com/c_images/album1357/Habbo_Homes_Instructions_Using_Habbo_Homes_Widgets.gif" alt=""><br> </td>
                                    <td valign="top"><b>Widgets</b><p>Widgets are content boxes that give
                                            out some info about you to viewers. There are four widgets: Friends
                                            Widget (shows images of your {{ cms_config('hotel.name.short') }} buddies), Rooms (provides links to
                                            your {{ cms_config('hotel.name.short') }} rooms), High Scores (shows your scores in Battle Ball and
                                            Wobble Squabble), and {{ cms_config('hotel.name.short') }} Club (shows whether you are a member in
                                            {{ cms_config('hotel.name.short') }} Club or not).</p>
                                        <p>Click the Widgets button to be able to place them on your page. Once
                                            on your page click the spanner icon to be able to change the skin of the
                                            widget or remove it from your page and put it back in your Inventory.</p></td>
                                </tr>
                                </tbody></table><p></p><p>
                            </p><table width="100%" border="0" id="table6">
                                <tbody><tr>
                                    <td>
                                        <img src="https://web.archive.org/web/20071012014336im_/http://images.habbohotel.com/c_images/album1357/inst_backgrounds.gif" alt="The image “http://images.habbohotel.com/c_images/album1357/inst_backgrounds.gif” cannot be displayed, because it contains errors."> </td>
                                    <td><span style="font-weight: bold;">Backgrounds</span><p>To add a background click the Backgrounds button to
                                            open the inventory. Click the background you want to be displayed on
                                            your page. If you want a new background then click the 'Get more
                                            backgrounds' button to open the {{ cms_config('hotel.name.short') }} Home shop and find the background
                                            you want, click the Purchase button to purchase. Once purchased the
                                            background will enter into your Inventory.</p></td>
                                </tr>
                                </tbody></table><p></p><p><br></p>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
            </td>
            <td style="width: 4px;"></td>
            <td valign="top" style="width: 176px;">
                <div id="ad_sidebar">
                    @include('includes.ad160')
                </div>		</td>
        </tr>
        </tbody></table>
@stop
