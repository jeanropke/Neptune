@extends('layouts.master', ['menuId' => '47'])

@section('title', 'Xmas Furni')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 202px;" class="habboPage-col">
                    <div class="v2box red light">
                        <div class="headline">
                            <h3>Joulutavarat</h3>
                        </div>
                        <div class="border">
                            <div></div>
                        </div>
                        <div class="body">

                            Näin ostat joulutavaraa tältä sivulta:<br><br>1. Selaa läpi sivun tavaravalikoimaa. <br><br>2. Kun löydät mieleisesi tavaran, klikkaa "Osta"-painiketta.
                            <br><br>3. Ostamasi tavara ilmestyy hahmosi isolle kämmenelle.<br><br>Joulutavarat myynnissä 22.12. klo 15 asti.<br><img vspace="9" hspace="9"
                                border="0" align="left"
                                src="{{ cms_config('site.c_images.url') }}/album1784/Xmas_defeat_Rasta.gif"
                                style="width: 68px; height: 112px;" alt=""><br><br><br><br><br><br><br><br><br><br><span style="font-weight: bold;"></span><br>
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
                                    <h3>Joulukuuset</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">

                            <p>
                            </p>
                            <table width="100%" border="0" id="table1">
                                <tbody>
                                    <tr>
                                        <td align="center"><a>
                                                <img width="60" height="136" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_19.gif" id="galleryImage20"
                                                    alt="x-19" title="x-19" name="photo_j20"></a></td>
                                        <td align="center"><a>
                                                <img width="60" height="136" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/Xmastree2.gif" id="galleryImage6"
                                                    alt="Xmastree2" title="Xmastree2" name="photo_j6"></a></td>
                                        <td align="center"><a>
                                                <img width="59" height="136" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_18.gif" id="galleryImage19"
                                                    alt="x-18" title="x-18" name="photo_j19"></a></td>
                                    </tr>
                                    <tr>
                                        <td>Joulukuusi 2<br></td>
                                        <td>Joulukuusi 3<br></td>
                                        <td>Joulukuusi 1<br></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="purchase_1">
                                                Joulukuusi 2 maksaa 10 Habbo-kolikkoa. <br>
                                                <span id="purchase_1_purchase"></span>
                                                <x-purchase_button id="purchase_1" product="A2 tree4" />
                                            </div>
                                            <br>
                                            <br>
                                        </td>
                                        <td>
                                            <div id="purchase_2">
                                                Joulukuusi 3 maksaa 10 Habbo-kolikkoa. <br>
                                                <span id="purchase_2_purchase"></span>
                                                <x-purchase_button id="purchase_2" product="A2 tree5" />
                                            </div>
                                        </td>
                                        <td>
                                            <div id="purchase_3">
                                                Joulukuusi 1 maksaa 10 Habbo-kolikkoa. <br>
                                                <span id="purchase_3_purchase"></span>
                                                <x-purchase_button id="purchase_3" product="a2 tree3" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p></p>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="maskbox snow light">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>Jouluruokaa</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">

                            <table width="100%" border="0" id="table1">
                                <tbody>
                                    <tr>
                                        <td align="center"><a>
                                                <img width="67" height="108" border="0" name="photo_j8" title="cake" alt="cake" id="galleryImage8"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/cake.gif"></a></td>
                                        <td align="center"><a>
                                                <img width="48" height="32" border="0" name="photo_j9" title="Turkey" alt="Turkey" id="galleryImage9"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/Turkey.gif"></a></td>
                                        <td align="center"><a>
                                                <img width="48" height="41" border="0" name="photo_j0" title="xmaspudding" alt="xmaspudding" id="galleryImage0"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/xmaspudding.gif"></a></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><br>Habbo-kakku</td>
                                        <td align="center"><br>Kalkkuna</td>
                                        <td align="center"> <br>Joulukakku<br></td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div id="purchase_4">
                                                Habbo-kakku maksaa 4 Habbo-kolikkoa. <br>
                                                <span id="purchase_4_purchase"></span>
                                                <x-purchase_button id="purchase_4" product="a2 habbocake" />
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_5">
                                                Jouluankka maksaa 2 Habbo-kolikkoa. <br>
                                                <span id="purchase_5_purchase"></span>
                                                <x-purchase_button id="purchase_5" product="a1 jouluank" />
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_6">
                                                Joulukakku maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_6_purchase"></span>
                                                <x-purchase_button id="purchase_6" product="A2 KAKKU" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table><br>
                            <table width="100%" border="0" id="table1">
                                <tbody>
                                    <tr>
                                        <td align="center"><a>
                                                <img width="40" height="45" border="0" name="photo_j12" title="Gingerbreadhouse" alt="Gingerbreadhouse"
                                                    id="galleryImage12"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/Gingerbreadhouse.gif"></a>
                                        </td>
                                        <td align="center"><a>
                                                <img width="47" height="46" border="0" name="photo_j4" title="ham" alt="ham" id="galleryImage4"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/ham.gif"></a></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center"><br>Piparkakkutalo</td>
                                        <td align="center"><br>Kinkku</td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div id="purchase_7">
                                                Piparkakkutalo maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_7_purchase"></span>
                                                <x-purchase_button id="purchase_7" product="a1 house" />
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_8">
                                                Kinkku maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_8_purchase"></span>
                                                <x-purchase_button id="purchase_8" product="A2 ham" />
                                            </div>
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
                    <div class="maskbox snow light">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>Joulukukat</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <table></table><br><br>
                            <table width="100%" border="0" id="table1">
                                <tbody>
                                    <tr>
                                        <td align="center"><a>
                                                <img width="23" height="65" border="0" name="photo_j17" title="x-14" alt="x-14" id="galleryImage17"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_14.gif"></a></td>
                                        <td align="center"><a>
                                                <img width="32" height="51" border="0" name="photo_j18" title="x-15" alt="x-15" id="galleryImage18"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_15.gif"></a></td>
                                    </tr>
                                    <tr>
                                        <td align="center">Punainen Hyasintti<br></td>
                                        <td align="center">Joulutähti</td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div id="purchase_9">
                                                Punainen Hyasintti maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_9_purchase"></span>
                                                <x-purchase_button id="purchase_9" product="A2 HYASINTTIP" />
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_10">
                                                Joulutähti maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_10_purchase"></span>
                                                <x-purchase_button id="purchase_10" product="A2 JOULUTAHTI" />
                                            </div>
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
                    <div class="maskbox snow light">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>Julisteet ja koristeet</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">

                            <table width="100%" border="0" id="table1">
                                <tbody>
                                    <tr>
                                        <td align="center"><a>
                                                <img width="48" height="98" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/reindeerposter.gif"
                                                    id="galleryImage2" alt="reindeerposter" title="reindeerposter" name="photo_j2"></a></td>
                                        <td align="center"><a>
                                                <img width="48" height="98" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_10.gif" id="galleryImage16"
                                                    alt="x-10" title="x-10" name="photo_j16"></a></td>
                                    </tr>
                                    <tr>
                                        <td align="center">Porot taivaalla<br></td>
                                        <td align="center">Talven ihmemaa<br></td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div id="purchase_11">
                                                Porot taivaalla maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_11_purchase"></span>
                                                <x-purchase_button id="purchase_11" product="poster 25" />
                                            </div>
                                            <br><br>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_12">
                                                Talven ihmemaa maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_12_purchase"></span>
                                                <x-purchase_button id="purchase_12" product="poster 22" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><a>
                                                <img width="52" height="89" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/santaposter.gif"
                                                    id="galleryImage3" alt="santaposter" title="santaposter" name="photo_j3"></a></td>
                                        <td align="center">
                                            <img src="{{ cms_config('site.c_images.url') }}/album1780/snowmanposter.gif">
                                        </td>
                                        <td align="center"><a>
                                                <img width="22" height="28" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/Xmasduck.gif"
                                                    id="galleryImage5" alt="Xmasduck" title="Xmasduck" name="photo_j5"></a></td>
                                    </tr>
                                    <tr>
                                        <td align="center">Joulupukki</td>
                                        <td align="center">Lumiukko</td>
                                        <td align="center">Jouluankka</td>

                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div id="purchase_13">
                                                Joulupukki maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_13_purchase"></span>
                                                <x-purchase_button id="purchase_13" product="poster 23" />
                                            </div>
                                            <br><br>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_14">
                                                Lumiukko maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_14_purchase"></span>
                                                <x-purchase_button id="purchase_14" product="poster 20" />
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_15">
                                                Jouluankka maksaa 2 Habbo-kolikkoa. <br>
                                                <span id="purchase_15_purchase"></span>
                                                <x-purchase_button id="purchase_15" product="a1 jouluank" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><a>
                                                <img width="62" height="44" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_27.gif" id="galleryImage24"
                                                    alt="x-27" title="x-27" name="photo_j24"></a></td>
                                        <td align="center"><a>
                                                <img width="34" height="30" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_28.gif" id="galleryImage25"
                                                    alt="x-28" title="x-28" name="photo_j25"></a></td>
                                        <td align="center"><a>
                                                <img width="18" height="53" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_29.gif" id="galleryImage26"
                                                    alt="x-29" title="x-29" name="photo_j26"></a></td>
                                    </tr>
                                    <tr>
                                        <td align="center">Koristeköynnös</td>
                                        <td align="center">Mistelinoksa</td>
                                        <td align="center">Joulusukka</td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div id="purchase_16">

                                                Koristeköynnös maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_16_purchase"></span>
                                                <x-purchase_button id="purchase_16" product="poster 27" />
                                            </div>
                                            <br><br>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_17">
                                                Mistelinoksa maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_17_purchase"></span>
                                                <x-purchase_button id="purchase_17" product="poster 30" />
                                            </div>
                                            <br><br>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_18">
                                                Joulusukka maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_18_purchase"></span>
                                                <x-purchase_button id="purchase_18" product="poster 26" />
                                            </div>
                                            <br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><a>
                                                <img width="50" height="62" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/Goldenstarlarge.gif"
                                                    id="galleryImage11" alt="Goldenstarlarge" title="Goldenstarlarge" name="photo_j11"></a></td>
                                        <td align="center"><a>
                                                <img width="28" height="40" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_2.gif" id="galleryImage14"
                                                    alt="x-2" title="x-2" name="photo_j14"></a></td>
                                        <td align="center"><a>
                                                <img width="51" height="51" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/goldentinsel.gif"
                                                    id="galleryImage13" alt="goldentinsel" title="goldentinsel" name="photo_j13"></a></td>
                                    </tr>
                                    <tr>
                                        <td align="center">Kultainen tähti<br></td>
                                        <td align="center">Kultainen pikkutähti<br></td>
                                        <td align="center">Koristenauha (kultainen)<br></td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div id="purchase_19">
                                                Kultainen tähti maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_19_purchase"></span>
                                                <x-purchase_button id="purchase_19" product="poster 48" />
                                            </div>
                                            <br><br>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_20">
                                                Kultainen pikkutähti maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_20_purchase"></span>
                                                <x-purchase_button id="purchase_20" product="poster 46" />
                                            </div>
                                            <br><br>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_21">
                                                Koristenauha maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_21_purchase"></span>
                                                <x-purchase_button id="purchase_21" product="poster 29" />
                                            </div>
                                            <br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><a>
                                                <img width="51" height="51" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album1780/goldentinsel.gif"
                                                    id="galleryImage1" alt="goldentinsel" title="goldentinsel" name="photo_j1"></a></td>
                                        <td align="center"><img
                                                src="{{ cms_config('site.c_images.url') }}/album1780/siverstar_big.gif"
                                                alt=""><br></td>
                                        <td align="center"><img
                                                src="{{ cms_config('site.c_images.url') }}/album1780/silverstar_small.gif"
                                                alt=""><br></td>
                                    </tr>
                                    <tr>
                                        <td align="center">Koristenauha (hopea)<br></td>
                                        <td align="center">Hopeinen tähti<br></td>
                                        <td align="center">Hopeinen pikkutähti<br></td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div id="purchase_22">
                                                Koristenauha maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_22_purchase"></span>
                                                <x-purchase_button id="purchase_22" product="poster 28" />
                                            </div>
                                            <br><br>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_23">
                                                Hopeinen tähti maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_23_purchase"></span>
                                                <x-purchase_button id="purchase_23" product="poster 49" />
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_24">
                                                Hopeinen pikkutähti maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_24_purchase"></span>
                                                <x-purchase_button id="purchase_24" product="poster 47" />
                                            </div>
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
                    <div class="maskbox snow light">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>Kynttilät </h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">

                            <table width="100%" border="0" id="table1">
                                <tbody>
                                    <tr>
                                        <td align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center">&nbsp;</td>

                                        <td align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center"><a>
                                                <img width="15" height="33" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_23.gif" id="galleryImage22"
                                                    alt="x-23" title="x-23" name="photo_j22"></a></td>
                                        <td align="center">
                                            <img src="{{ cms_config('site.c_images.url') }}/album1780/whitecandlesonaplate.gif">
                                        </td>
                                        <td align="center"><a>
                                                <img width="47" height="38" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_26.gif" id="galleryImage21"
                                                    alt="x-26" title="x-26" name="photo_j21"></a></td>
                                    </tr>
                                    <tr>
                                        <td align="center">Valkoinen kynttilä<br></td>
                                        <td align="center">Valkeat kynttilät<br></td>
                                        <td align="center">Punaiset kynttilät<br></td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div id="purchase_25">
                                                Punainen kynttilä maksaa 2 Habbo-kolikkoa. <br>
                                                <span id="purchase_25_purchase"></span>
                                                <x-purchase_button id="purchase_25" product="A1 KYNTTILA2" />
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_26">
                                                Valkeat kynttilät maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_26_purchase"></span>
                                                <x-purchase_button id="purchase_26" product="A2 KYNTTILAT1" />
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_27">
                                                Punaiset kynttilät maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_27_purchase"></span>
                                                <x-purchase_button id="purchase_27" product="A2 KYNTTILAT2" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <img  src="{{ cms_config('site.c_images.url') }}/album1780/menorah.gif">
                                        </td>
                                        <td align="center"><a>
                                                <img width="31" height="49" border="0"
                                                    src="{{ cms_config('site.c_images.url') }}/album81/x_22.gif" id="galleryImage23"
                                                    alt="x-22" title="x-22" name="photo_j23"></a></td>
                                        <td align="center"><img vspace="0" hspace="0" border="0" align="bottom"
                                                src="{{ cms_config('site.c_images.url') }}/album1780/Singleredcandle.gif"
                                                alt=""> </td>
                                    </tr>
                                    <tr>
                                        <td align="center">Kynttelikkö</td>
                                        <td align="center">Sähkökynttilät</td>
                                        <td align="center">Punainen kynttilä<br></td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div id="purchase_28">
                                                Kynttelikkö maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_28_purchase"></span>
                                                <x-purchase_button id="purchase_28" product="a2 menorah" />
                                            </div>
                                            <br><br>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_29">
                                                Sähkökynttilät maksaa 3 Habbo-kolikkoa. <br>
                                                <span id="purchase_29_purchase"></span>
                                                <x-purchase_button id="purchase_29" product="A2 KYNTTELI" />
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div id="purchase_30">
                                                Punainen kynttilä maksaa 2 Habbo-kolikkoa. <br>
                                                <span id="purchase_30_purchase"></span>
                                                <x-purchase_button id="purchase_30" product="A1 KYNTTILA2" />
                                            </div>
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
