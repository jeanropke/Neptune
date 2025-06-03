@extends('layouts.master', ['menuId' => 'home_private', 'skipHeadline' => true])

@section('title', 'Home not found')

@section('content')

<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-home">
    <tbody>
        <tr>
            <td colspan="6" style="height: 4px;"></td>
        </tr>
        <tr>
            <td rowspan="2" style="width: 8px;">&nbsp;</td>
            <td valign="top" style="width: 740px;">

                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td valign="top" style="width: 202px;" class="habboPage-col">
                                <div class="v3box orange">
                                    <div class="v3box-top">
                                        <h3>Sabia?</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            <p>Você pode fazer com que sua Habbo Home seja vista apenas por você. Basta
                                                escolher a opção correspondente em seu perfil.</p>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
                            </td>
                            {{-- https://web.archive.org/web/20070715162302/http://www.habbo.com/home/--Charlotte  --}}
                            <td valign="top" style="width: 539px;" class="habboPage-col">
                                <div class="v3box red">
                                    <div class="v3box-top">
                                        <h3>Desculpe</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            <img vspace="0" hspace="0" border="0" align="right" src="https://web.archive.org/web/20061212014939im_/http://images.habbo.com.br/c_images/album1358/frank_stop_001.gif" alt="">
                                            <p><b>{{ $owner->username }}</b> tem a página marcada como privada.</p>
                                            <br><br>Desculpe.<br><br><a
                                                href="/web/20061212014939/http://www.habbo.com.br/hotel/"
                                                target="_self">Primeira vez por aqui?</a><br><br><a
                                                href="https://web.archive.org/web/20061212014939/http://www.habbo.nl/home"
                                                target="_self">Habbo Home principal</a><br>
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
            <td rowspan="2" valign="top" style=" margin-left: 4px; width: 176px;">
                <div id="ad_sidebar">
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
    </tbody>
</table>
<br style="clear: both;">
@stop
