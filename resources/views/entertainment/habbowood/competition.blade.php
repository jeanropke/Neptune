@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'Digital Movie Awards')

@section('content')
    @include('entertainment.habbowood.includes.menu')
    <div class="habbomovies-custom-bg">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
                <tr>
                    <td style="width: 8px;"></td>
                    <td valign="top" style="width: 202px;" class="habboPage-col">
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>BE A MOVIE STAR!</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    Welcome to the <span style="font-weight: bold;">Habbowood Digital Movie Awards,</span> the internet's coolest moviemaking competition!<br><br>
                                    <p class="style3" style="font-weight: bold;">
                                        <font color="red">THE PRIZES</font>
                                    </p>

                                    <p class="style3"><img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt=""> 1,000
                                        Habbo Credits!<br>
                                        <img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt=""> A trip
                                        to Hollywood!<br>
                                        <img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt="">
                                        Celebrity at Habbo!
                                    </p>
                                    <p class="style3" style="font-weight: bold;">
                                        <font color="red"><br>HOW TO PARTICIPATE</font>
                                    </p>
                                    <p class="style3"><img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt=""> Read the
                                        <a href="{{ url('/') }}/entertainment/habbowood/competition#RULES">rules!</a><br>
                                        <img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt=""> <a
                                            href="{{ url('/') }}/entertainment/habbowood">Shoot a movie!</a><br>
                                        <img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt=""> Check
                                        the <a href="{{ url('/') }}/entertainment/habbowood/competition#PRIZES">prizes!</a><br>
                                        <img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt=""> <a target="_blank"
                                            href="{{ url('/') }}/entertainment/habbowood/filmakers">Read</a> all
                                        about Habbo
                                    </p>
                                    <p align="center" class="style3"><img width="38" height="51" src="{{ cms_config('site.c_images.url') }}/album2627/clapperboard.gif"
                                            alt=""></p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>Daily Best Rated Movies</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    <div class="habbomovie-scrollable-component">
                                        @include('entertainment.habbowood.includes.topdaily')
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                    <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>HABBOWOOD DIGITAL MOVIE AWARDS</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    <script language="JavaScript" type="text/javascript" src="{{ url('/') }}/web/js/swfobject.js"></script>
                                    <div id="flashcontent" style="text-align:center" flashstopped_p="true"></div>
                                    <script>
                                        var swfobj = new SWFObject("{{ cms_config('site.c_images.url') }}/trailer/habbowood_trailer3.swf", "demo", "512", "318", "8");
                                        swfobj.addVariable("localization_url", "{{ url('/') }}/web/xml/habbowood_trailer.xml");
                                        swfobj.addVariable("trailer_end_url", "/entertainment/habbowood");
                                        swfobj.addParam("allowScriptAccess", "always");
                                        swfobj.addParam("menu", "false");
                                        swfobj.write("flashcontent");
                                    </script>

                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3><a name="RULES"></a>HOW TO PARTICIPATE</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">

                                    <p>
                                        Join the fray of wannabe movie stars with the <span style="font-weight: bold;">Habbowood Digital Movie Awards,</span>the largest moviemaking
                                        competition over the internet!
                                        Everyone can create a <span style="font-weight: bold;">free digital movie</span> and participate to the competition.
                                        That's how you do it:
                                    </p>
                                    <p>
                                        <img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt="">
                                        <span style="font-weight: bold;">Log in</span> with your {{ cms_config('hotel.name.short') }} (if you don't have a {{ cms_config('hotel.name.short') }} yet, <a href="{{ url('/') }}/account/login" target="_blank">create it here!</a>
                                        <br>
                                        <img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt="">
                                        <span style="font-weight: bold;">Shoot a movie</span> with the awesome <a href="{{ url('/') }}/entertainment/habbowood" target="_blank">Moviemaker</a>
                                        <br>
                                        <img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt="">
                                        Get your friends to <span style="font-weight: bold;">rate</span> your movie and push it to the Top Ten list!
                                    </p>
                                    <p>Every day at <span style="font-weight: bold;">3PM PDT</span> the {{ cms_config('hotel.name.short') }} Staff will select <span style="font-weight: bold;">one</span> movie from the Top Ten list.
                                        The movie will then be a Nominee for the final victory of the <span style="font-weight: bold;">Habbowood Award!</span>
                                    </p>
                                    <p>
                                        <span style="font-weight: bold;">How to promote your movie and win!</span>
                                        <br>
                                        <img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt="">
                                        Use the MovieMaker’s sharing tools to promote the movie online and get friends to log in (only logged in users can rate a movie) and push it to the top!
                                        <br>
                                        <img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt="">
                                        Promote it with your {{ cms_config('hotel.name.short') }} Hotel friends! Every day until September 14 there’s a <span style="font-weight: bold;">new chance </span>to make it to the Top Ten Nominees, so it’s never too late!
                                    </p>
                                    <p>Are you ready to be a star? <a href="{{ url('/') }}/entertainment/habbowood" target="_blank">Then shoot a movie and win!</a>
                                    </p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3><a name="PRIZES"></a>THE PRIZES</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">

                                    <p><img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt=""> <span
                                            style="font-weight: bold;">
                                            <font color="red">THE HABBOWOOD AWARD PRIZE</font>
                                        </span><br>
                                        With 10 Nominees selected, it’ll be time to choose the <span style="font-weight: bold;">winner of the Habbowood Award,</span> and who’s gonna
                                        do it but YOU? From Monday, September 14 until Friday, Sept 21 every {{ cms_config('hotel.name.short') }} will have a chance to vote the winner. Stay posted for the Staff’s
                                        instructions! The prize is astonishing: <span style="font-weight: bold;">1,000 {{ cms_config('hotel.name.short') }} Credits</span> in gold bars and celebrity status to be
                                        gained at the <span style="font-weight: bold;">Habbowood Gala,</span> the most glamorous online party ever!</p>
                                    <p><img width="15" height="15" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif" alt=""> <span
                                            style="font-weight: bold;">
                                            <font color="red">THE WORLD'S BEST DIRECTOR... GOES TO HOLLYWOOD!</font>
                                        </span><br>
                                        All over the world, the {{ cms_config('hotel.name.short') }} sites are selecting their top directors. Who’s the world’s best, then? A panel of expert professionals in the
                                        world of animation and moviemaking, as well as the creator of {{ cms_config('hotel.name.short') }} himself (the legendary Apparatus), will select the winner of the <span
                                            style="font-weight: bold;">World's Best Habbowood Movie.</span> The {{ cms_config('hotel.name.short') }} who directed the movie will win a <span
                                            style="font-weight: bold;">free trip</span> for 2 to the <span style="font-weight: bold;">real life</span> <span
                                            style="font-weight: bold;">Hollywood, California,</span> the birthplace of moviemaking!</p>
                                    <p>Read the Competitions' <a href="{{ url('/') }}/entertainment/habbowood/rules" target="_blank">Terms and Conditions</a></p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 4px;"></td>
                    <td valign="top" style="width: 176px;">
                        <div id="ad_sidebar">
                            @include('includes.partners')
                            @include('includes.ad160')
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <br style="clear: both;">
@stop
