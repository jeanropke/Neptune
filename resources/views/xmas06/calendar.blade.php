@extends('layouts.master', ['menuId' => '47'])

@section('title', 'Xmas Calendar')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td colspan="2" style="padding-bottom: 3px;"></td>
            </tr>
            <tr>
                <td style="width: 8px;"></td>
                <td align="left" valign="top" style="width: 430px; height: 400px;" class="habboPage-col">
                    <div class="maskbox xmas light">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>Rasta.Claus is back, mon!</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">

                            <p><img vspace="5" hspace="5" border="0" align="left" src="{{ cms_config('site.c_images.url') }}/album1784/Intro_209x160.gif" alt="">
                            </p>
                            <p><strong> Greetings and blessed love Habbos!</strong></p>
                            <p> It's me, <strong>
                                    <font color="red">Rasta.Claus</font>
                                </strong>, back for da <strong>Winter Holidays</strong> to bring you cheer and gifts. It's been almost a year since all of you elected me to be da
                                <strong>Winter Holidays Boss</strong>. I'm so happy to be your Holiday Representative that I've come prepared this year! Check out my <strong>Advent
                                    Calendar</strong> below for a full list of things I will be handing out <strong>FREE</strong> everyday until the holidays. In da meantime, just
                                take a look around at our Winter 2006 section and look at all da cool activities available to you.
                            </p>
                            <p>Look in da catalog for my <strong>EXCLUSIVE</strong> rare that is available from me, da awesome <span style="font-weight: bold;">Holiday
                                </span><strong>Smoke Machine! </strong>Aren't you glad you chose me over that green geek <strong>
                                    <font color="green">DJ-Bling</font>
                                </strong>? He really didn't seem like he knew what da holidays were all about. Now that I'm here, we'll have non-stop fun every day of this month!
                            </p>
                            <div align="center">

                                <div id="flashcontent">
                                    You need to have a Flash player installed on your computer before being
                                    able to edit your {{ cms_config('a') }} character. You can download
                                    the player from here: http://www.adobe.com/go/getflashplayer
                                </div>

                                <script type="text/javascript" language="JavaScript">
                                    var swfobj = new SWFObject("{{ cms_config('site.web.url') }}/flash/xmas06/main.swf?language=us&date={{ now() }}", "test_flash", "400", "400", "7");
                                    swfobj.addVariable("base", "{{ cms_config('site.web.url') }}/flash/xmas06");
                                    swfobj.addVariable("calendar_url", "{{ url('/') }}/api/xmas06/calendar");
                                    swfobj.addVariable("giftrequest_url", "{{ url('/') }}/api/xmas06/giftrequest");
                                    swfobj.addVariable("bypass_movies", "true");
                                    swfobj.addVariable("quality", "high");
                                    swfobj.addVariable("bgcolor", "#ffffff");

                                    swfobj.write("flashcontent");
                                </script>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="maskbox xmas darker">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>Activities</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">

                            <p>
                            </p>
                            <table width="100%" border="0" id="table2">
                                <tbody>
                                    <tr>
                                        <td valign="top" bgcolor="#9dd1e7" background="{{ cms_config('site.c_images.url') }}/album1782/stripes.gif" align="left"><img vspace="5"
                                                hspace="10" border="0" align="bottom" src="{{ cms_config('site.c_images.url') }}/SALAS/teatronavidad.png" alt=""></td>
                                        <td valign="top" bgcolor="#9dd1e7" background="{{ cms_config('site.c_images.url') }}/album1782/snow.gif" align="left">
                                            <b>Gold, Frankincense, and Myrrh: Friday 22nd at 5:00 PM</b>
                                            <br>
                                            Habbolosa and the Staffilokokos, together with the Linces, bring a masterpiece to the stage at the Theater.
                                            <br><a href="{{ url('/') }}/client?forwardId=1&amp;roomId=58" target="client"
                                                onclick="roomForward(this, '58', 'public', false); return false;">
                                                Go to the Room
                                            </a>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" bgcolor="#e6efef" background="{{ cms_config('site.c_images.url') }}/album1782/stripes.gif" align="left"><img
                                                vspace="5" hspace="10" border="0" src="{{ cms_config('site.c_images.url') }}/album1528/lido_icon.png" alt=""></td>
                                        <td valign="top" bgcolor="#e6efef" background="{{ cms_config('site.c_images.url') }}/album1782/snow.gif" align="left"><span
                                                style="font-weight: bold;">Rastancicos Karaoke: Thursday 21st at 5:00 PM</span>
                                            <br>
                                            Santa Rasta is feeling down. Come to Estarqui's Meeting Point to sing some cheerful Rastancicos for him.
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" bgcolor="#9dd1e7" background="{{ cms_config('site.c_images.url') }}/album1782/stripes.gif" align="left"> <img
                                                vspace="5" hspace="10" border="0" src="{{ cms_config('site.c_images.url') }}/album1528/bb_redicon.png" alt=""></td>
                                        <td valign="top" bgcolor="#9dd1e7" background="{{ cms_config('site.c_images.url') }}/album1782/snow.gif" align="left">
                                            <b>Jamaica Party: Friday 22nd at 5:00 PM</b>
                                            <br>In the rooms that we will add to the Jamaica Floor, the biggest beach party ever seen will take place.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p></p><span style="font-weight: bold;"></span>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td align="left" valign="top" style="width: 310px; height: 400px;" class="habboPage-col rightmost">

                    <div class="maskbox snow light">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>Because it won't snow</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body" flashstopped_p="true">
                            <div id="flashcontent_furni">
                                You need to have a Flash player installed on your computer before being
                                able to edit your {{ cms_config('a') }} character. You can download
                                the player from here: http://www.adobe.com/go/getflashplayer
                            </div>

                            <script type="text/javascript" language="JavaScript">
                                var swfobj = new SWFObject("{{ cms_config('site.c_images.url') }}/album1785/Rare_sand_292x192.swf", "test_flash", "292", "192", "7");
                                swfobj.addParam("allowScriptAccess", "sameDomain");
                                swfobj.addVariable("quality", "high");
                                swfobj.addVariable("bgcolor", "#ffffff");
                                swfobj.write("flashcontent_furni");
                            </script>

                            <p>Only for a short time in the catalog – the <span style='font-weight: bold;'>Island Dream</span>! <br></p>
                            <p></p>
                            <div id="purchase_1">
                                Island Dream costs 25 Credits. <a href="{{ url('/') }}/credits">Here</a> you can buy Habbo Credits.<br>
                                <span id="purchase_1_purchase"></span>
                                <x-purchase_button id="purchase_1" product="a0 sandrug" />
                            </div>
                            <br><span style="font-weight: bold;"></span><br>
                            <p></p>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="maskbox xmas darker">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>In the Catalogue!</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">

                            <br>
                            <script type="text/javascript">
                                var images = new Array('{{ cms_config('site.c_images.url') }}/album1783/Xmas_pack6_292x192.gif',
                                    '{{ cms_config('site.c_images.url') }}/album1783/Xmas_pack5_292x192.gif');
                                var captions = new Array('With the mistletoe, wishes come true!', 'Five Santa Ducks that keep you company!');
                                var curOffset = 1;
                                window.onload = function() {
                                    document.getElementById('randImage').src = images[0];
                                    document.getElementById('randCaption').innerHTML = captions[0];
                                    setInterval(
                                        function() {
                                            document.getElementById('randImage').src = images[curOffset];
                                            document.getElementById('randCaption').innerHTML = captions[curOffset];
                                            curOffset = (curOffset >= images.length - 1) ? 0 : curOffset + 1;
                                        }, 6000);
                                };
                            </script>

                            <img src="{{ cms_config('site.c_images.url') }}/album1783/Xmas_pack5_292x192.gif" id="randImage" border="0"><br>
                            <br><br>
                            <div id="randCaption">Five Santa Ducks that keep you company!</div>

                            <!--INSTRUCTIONS:

                                To change the images, edit the line starting 'var images'
                                To change the text that accompanies the images, edit the line starting 'var captions'. IMPORTANT: make sure you write the same
                                amount of text for each image, otherwise the page will resize every 6 seconds.
                                Make sure you include the "randCaption" text too - this is shown when users have disable javascript in their browsers

                                !-->
                            <br><a target="_self" href="{{ url('/') }}/xmas06/deals">Click to buy these useful Christmas items!</a><br><br><span
                                style="font-weight: bold;">&nbsp;</span>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom">
                            <div></div>
                        </div>
                    </div>

                    <div class="maskbox xmas darker">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>Send an E-card</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">

                            <a href="{{ url('/') }}/xmas06/ecard" target="_self"><img vspace="10" hspace="10" border="0" align="left"
                                    src="{{ cms_config('site.c_images.url') }}/album1777/Card_carrying.gif" alt=""></a>
                                    Share the Christmas spirit with your friends.
                                    Use an e-card to do so. After all, Christmas has become quite modern.
                                    Oh! And let them know that they can get lots of gifts from the Advent Calendar!<br><br style="font-weight: bold;">
                                    <a href="{{ url('/') }}/xmas06/ecard" target="_self">Send an E-card</a><br><span style="font-weight: bold;">
                                <br></span>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="maskbox xmas darker">
                        <div class="headline">
                            <div class="headline-inner">
                                <div class="headline-inner-inner">
                                    <h3>Santa's Secret!</h3>
                                </div>
                            </div>
                        </div>
                        <div class="body">

                            <br><img width="46" vspace="0" hspace="10" height="78" border="0" align="left"
                                src="{{ cms_config('site.c_images.url') }}/album175/scifirocket_red.gif" id="galleryImage"
                                alt="scifirocket red">We already know how Rasta Santa made it snow in Jamaica. With the Red Smoke! Get the new Rare item from the Catalog for 25 Credits. It will disappear soon.<br><br>
                            <div id="purchase_2">
                                The Red Smoke costs 25 Credits. To get more, please visit the <a href="{{ url('/') }}/credits">Credits pages</a>.<br>
                                <span id="purchase_2_purchase"></span>
                                <x-purchase_button id="purchase_2" product="a1 scifirocket" />
                            </div>
                            <br>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td style="width: 4px;"></td>
                <td valign="top" style="width: 176px;">

                    <div class="ad-scale ad160">

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
