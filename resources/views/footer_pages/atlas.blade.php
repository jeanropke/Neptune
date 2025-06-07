@extends('layouts.master', ['menuId' => '0'])

@section('title', 'Habbo Atlas')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                    @foreach (boxes('footer_pages.atlas', 1) as $box)
                                        <div class="portlet-scale gold">
                                            <div class="portlet-scale-header">
                                                <h3>{{ $box->title }}</h3>
                                            </div>
                                            <div class="portlet-scale-body">
                                                <div class="portlet-scale-content">
                                                    {!! $box->content !!}
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="portlet-scale-bottom">
                                                <div class="portlet-scale-bottom-body"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Habbo Atlas</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                <p align="center">
                                                    <img style="width: 620px; height: 429px;" src="{{ url('/') }}/c_images/album209/habboatlas2.gif" alt="">
                                                    <br><br><br>
                                                </p>
                                                <p align="center">
                                                    <br>
                                                </p>
                                                <p align="center">
                                                    <b>Americas</b>
                                                    <br>
                                                    <img vspace="0" hspace="0" border="0" align="bottom" src="{{ url('/') }}/c_images/navi_icons/tab_icon_02_hotel.gif"
                                                        alt="">
                                                    <a href="https://www.habbo.com.br/" target="_blank">Brasil</a> |
                                                    <a href="https://www.habbo.ca/" target="_blank">Canada</a> |
                                                    <a href="https://www.habbo.com.mx/">Estados Unidos Mexicanos</a> |
                                                    <a href="https://www.habbo.cl/">República de Chile</a> |
                                                    <a href="https://www.habbo.com.co/">República de Colombia</a> |
                                                    <a href="https://www.habbo.com.ve/">Venezuela</a> |
                                                    <a href="https://www.habbo.com/" target="_blank">United States of America</a>
                                                    <img src="{{ url('/') }}/c_images/navi_icons/tab_icon_02_hotel.gif" alt="">
                                                    <br>
                                                </p>
                                                <p align="center">
                                                    <br>
                                                    <b>Europe</b>
                                                    <br>
                                                    <img vspace="0" hspace="0" border="0" align="bottom" src="{{ url('/') }}/c_images/navi_icons/tab_icon_02_hotel.gif"
                                                        alt="">
                                                    <a href="https://www.habbo.be/">Koninkrijk België</a> |
                                                    <a href="https://www.habbo.dk/" target="_blank">Danmark</a> |
                                                    <a href="https://www.habbo.de/" target="_blank">Deutschland</a> |
                                                    <a href="https://www.habbohotel.es/" target="_blank">España</a> |
                                                    <a href="https://www.habbo.fr/">France</a> |
                                                    <a target="_blank" href="https://www.habbo.it/">Italia</a> |
                                                    <a href="https://www.habbohotel.nl/" target="_blank">Nederland</a> |
                                                    <a href="https://www.habbo.no/" target="_blank">Norge</a> |
                                                    <a href="https://www.habbo.pt/" target="_blank">Portugal</a> |
                                                    <a href="https://www.habbo.fi/" target="_blank">Suomi</a> |
                                                    <a href="https://www.habbo.se/" target="_blank">Sverige</a> |
                                                    <a href="https://www.habbo.ch/" target="_blank">Schweiz</a> |
                                                    <a href="https://www.habbohotel.co.uk/" target="_blank">United Kingdom</a> |
                                                    <a href="https://www.habbo.at/" target="_blank">Österreich</a>
                                                    <img src="{{ url('/') }}/c_images/navi_icons/tab_icon_02_hotel.gif" alt="">
                                                    <br><br><br>
                                                    <b>Asia Pacific</b>
                                                    <br>
                                                    <align>
                                                        <img vspace="0" hspace="0" border="0" align="bottom"
                                                            src="{{ url('/') }}/c_images/navi_icons/tab_icon_02_hotel.gif" alt="">
                                                        <a href="https://www.habbo.com.au/" target="_blank">Australia</a> |
                                                        <a href="https://www.habbo.cn/">China</a> |
                                                    </align>
                                                    <span class="unicodebig">
                                                        <a href="https://www.habbohotel.jp/" target="_blank">日本</a> |
                                                    </span>
                                                    <align>
                                                        <a href="https://www.habbo.com.sg/" target="_blank">Singapore</a>
                                                        <img src="{{ url('/') }}/c_images/navi_icons/tab_icon_02_hotel.gif" alt="">
                                                        <br>
                                                    </align>
                                                </p>


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

                <td rowspan="2" style="width: 8px;"></td>
            </tr>
        </tbody>
    </table>
@stop
