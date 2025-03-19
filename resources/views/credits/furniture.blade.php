@extends('layouts.master', ['menuId' => '4', 'submenuId' => '19', 'headline' => true])

@section('title', cms_config('hotel.name.short') .' Furni')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
        <tr>
            <td style="width: 8px;"></td>
            @include('includes.furniture', ['page' => 'furniture', 'menu' => 'credits', 'boxes' => \App\Models\BoxPage::getBoxes('include.furniture')])
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="v3box yellow">
                    <div class="v3box-top"><h3>What is {{ cms_config('hotel.name.short') }} Furni?</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <img width="99" height="118" border="0" align="right" id="galleryImage" src="{{ url('/') }}/web/images/credits/choice_newsie.gif" alt="">{{ cms_config('hotel.name.short') }} Furni is furniture that you put in your Guest Room to spruce it up a bit. There are loads of different types and brands of {{ cms_config('hotel.name.short') }} Furni, from television sets and teleporters that you can zip about in to fridges where you can grab a carrot and hatches to keep people out of your special areas.<br><br>This page answers some frequent questions about {{ cms_config('hotel.name.short') }} Furni, and some not so frequent questions.<br><br><strong>How do I buy {{ cms_config('hotel.name.short') }} Furni?</strong><br>The buy Furni you need {{ cms_config('hotel.name.short') }} Coins. Click on the Buy Credits tab to find out more. Once you have {{ cms_config('hotel.name.short') }} Coins you need to log into the Hotel. Once in click on the {{ cms_config('hotel.name.short') }} Catalogue on the tool bar (pictured). Click on any page in the Catalog to see the different types of Furni and start thinking of what you're going to make!<br><br><strong>What If I have bought something I don't like?<br></strong>Sadly, Furni is not refundable. However you can trade your Furni with other users: Click on the Trade Rooms category on the navigator to find hundreds of different trade rooms!<br><br><strong>I have a great idea for a piece of Furni, who do I email?<br></strong>If you have a great idea for {{ cms_config('hotel.name.short') }} Furni that you think will revolutionize the site you can email us via the {{ cms_config('hotel.name.short') }} Help Tool: Just select 'Idea' on the drop down menu and tell us!<br>If we end up using your idea we will give you 50 {{ cms_config('hotel.name.short') }} Credits and a Gold Trophy!<br><br><strong>How much will it cost to have my own piece of personalised Furni?</strong><br>Sorry, but we don't accept requests from users: Building Furni takes our team a long time and a lot of money and we are unable to do it.<br><br><strong>How do I get ___? I can't find it in the catalog anywhere!<br></strong>Quite often you will see Furni in another Habbo's room which isn't in the catalogue. This is because the Furni is either a Rare, a Prize or a Seasonal piece of {{ cms_config('hotel.name.short') }} Furni.<br>Rares are released sporadically, often only for a week or less and cost 25 {{ cms_config('hotel.name.short') }} Credits, Prizes are given to users who take part in Official {{ cms_config('hotel.name.short') }} competitions and Seasonal Furni is released only during Easter, {{ cms_config('hotel.name.short') }}ween, Valentines and Christmas.<br><br>
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
                </div>
            </td>
        </tr>
        </tbody>
    </table>
@stop
