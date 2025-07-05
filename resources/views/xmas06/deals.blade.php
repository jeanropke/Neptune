@extends('layouts.master', ['menuId' => '47'])

@section('title', 'Xmas Deals')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 202px;" class="habboPage-col">
                    <div class="maskbox snow light">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>Joulupaketit</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">

                            Löydät jouluiset tavarapakettimme myös Katalogin Tarjoukset -sivulta.<br><br>Koristenauhapaketit myynnissä 15.12. asti.<br><br>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                    <div class="maskbox snow light">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>Joulutavaraa pikkujouluihin!</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">



                            <table width="100%" border="0" id="table1">
                                <tbody>
                                    <tr>
                                        <td>
                                            <img vspace="0" hspace="0" border="0" src="{{ cms_config('site.c_images.url') }}/album1783/Xmas_pack3_292x192.gif"
                                                alt="">
                                        </td>
                                        <td>
                                            Koristenauha 1<p>Viisi hopeista Koristenauhaa kympillä<br></p>
                                            <div id="purchase_1">
                                                <span id="purchase_1_purchase"></span>
                                                <x-purchase_button id="purchase_1" product="Xmas_pack3" />
                                            </div>
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img vspace="0" hspace="0" border="0" src="{{ cms_config('site.c_images.url') }}/album1783/Xmas_pack4_292x192.gif"
                                                alt=""><br><br>
                                        </td>
                                        <td>Koristenauha 2<p>Viisi kultaista Koristenauhaa kympillä<br></p>
                                            <div id="purchase_2">
                                                <span id="purchase_2_purchase"></span>
                                                <x-purchase_button id="purchase_2" product="Xmas_pack4" />
                                            </div>
                                            <br><br>
                                            <p></p>
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
                <td style="width: 4px;"></td>
                <td valign="top" style="width: 176px;">
                    <div id="ad_sidebar">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
