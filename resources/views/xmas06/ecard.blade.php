@extends('layouts.master', ['menuId' => '47'])

@section('title', 'Xmas E-Card')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 741px;" class="habboPage-col rightmost">

                    <div class="nobox">

                        <div class="nobox-content">
                            <div align="center" flashstopped_p="true">
                                {{--<script language="javascript">
                                    var language = "en";
                                    var siteurl = document.URL;
                                    var cardparam = document.URL.split("?")[1];
                                    if (cardparam != null) siteurl = document.URL.split("?")[0];
                                    var embedString = '';
                                    embedString +=
                                        '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="https://web.archive.org/web/20070110034333/http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="732" height="473" title="habbo e-card">';
                                    embedString += '<param name="movie" value="https://web.archive.org/web/20070110034333/http://www.habbochristmas.com/06/ecard.swf?' + cardparam + '&lang=' + language +
                                        '&siteurl=' + siteurl + '">';
                                    embedString += '<param name="quality" value="high">';
                                    embedString += '<param name="base" value="https://web.archive.org/web/20070110034333/http://www.habbochristmas.com/06/">';
                                    embedString += '<embed src="https://web.archive.org/web/20070110034333/http://www.habbochristmas.com/06/ecard.swf?' + cardparam + '&lang=' + language + '&siteurl=' + siteurl +
                                        '" quality="high" pluginspage="https://web.archive.org/web/20070110034333/http://www.macromedia.com/go/getflashplayer" base="https://web.archive.org/web/20070110034333/http://www.habbochristmas.com/06/" type="application/x-shockwave-flash" width="732" height="473"></embed>';
                                    embedString += '</object>';
                                    document.write(embedString);
                                </script>--}}

                                <div id="flashcontent">
                                    You need to have a Flash player installed on your computer before being
                                    able to edit your {{ cms_config('a') }} character. You can download
                                    the player from here: http://www.adobe.com/go/getflashplayer
                                </div>

                                <script type="text/javascript" language="JavaScript">
                                    var swfobj = new SWFObject("{{ cms_config('site.web.url') }}/flash/xmas06/ecard.swf?lang=us", "dummyid40", "732", "473", "7");
                                    swfobj.addParam("site", "site");
                                    swfobj.addParam("movie", "{{ cms_config('site.web.url') }}/flash/xmas06/ecard.swf?undefined&amp;lang=us&amp;");
                                    swfobj.addVariable("base", "{{ cms_config('site.web.url') }}/flash/xmas06");
                                    swfobj.addVariable("base_url", "{{ url('/') }}");
                                    swfobj.addVariable("token", "{{ csrf_token() }}");
                                    swfobj.addVariable("quality", "high");
                                    swfobj.addVariable("bgcolor", "#ffffff");

                                    swfobj.write("flashcontent");
                                </script>
                            </div>
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
