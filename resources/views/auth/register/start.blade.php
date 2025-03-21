@extends('layouts.login')
@section('title', 'Register!')
@section('content')
    <div id="process-wrapper">
        <div id="process-header">
            <div id="process-header-body">
                <div id="process-header-content">
                    <div id="habbologo"><a href="{{ url('/') }}"></a></div>
                    <div id="steps">
                        <img src="{{ url('/') }}/web/images/process/step1_on.gif" alt="1" width="30" height="26" />
                        <img src="{{ url('/') }}/web/images/process/step_right_on.gif" alt="" width="20" height="26" />
                        <img src="{{ url('/') }}/web/images/process/step2.gif" alt="2" width="30" height="26" />
                        <img src="{{ url('/') }}/web/images/process/step_right.gif" alt="" width="20" height="26" />
                        <img src="{{ url('/') }}/web/images/process/step3.gif" alt="3" width="30" height="26" />
                        <img src="{{ url('/') }}/web/images/process/step_right.gif" alt="" width="20" height="26" />
                        <img src="{{ url('/') }}/web/images/process/step4.gif" alt="4" width="30" height="26" />
                        <img src="{{ url('/') }}/web/images/process/step_right.gif" alt="" width="20" height="26" />
                        <img src="{{ url('/') }}/web/images/process/step5.gif" alt="5" width="30" height="26" /> </div>
                </div>
            </div>
        </div>
        <div id="outer">
            <div id="outer-content">
                <div class="processbox">
                    <div class="headline">
                        <div class="headline-content">
                            <div class="headline-wrapper">
                                <h2>Register <a href="{{ url('/') }}" class="exit">Cancel</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="content-top">
                        <div class="content">
                            <div class="content-column1">
                                <div class="bubble">
                                    <div class="bubble-body">
                                        <p>Now the fun begins! Choose what you want to look like in Habbo!</p>
                                        <p>You can change it at any time.</p>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="bubble-bottom">
                                    <div class="bubble-bottom-body"> <img src="{{ url('/') }}/web/images/register/bubble_tail_left.gif" alt="" width="22" height="31" /> </div>
                                </div>
                                <div class="frank"><img src="{{ url('/') }}/web/images/register/register7.gif" alt="" width="245" height="181" /></div>
                            </div>
                            <div class="content-column2">
                                <div id="process-errors">
                                    <div class="content-red">
                                        <div class="content-red-body" id="process-errors-content">
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="content-red-bottom">
                                        <div class="content-red-bottom-body"></div>
                                    </div>
                                </div>
                                <div class="content-white-outer">
                                    <div class="content-white">
                                        <div class="content-white-body">
                                            <div class="content-white-content">
                                                <div id="flashcontent">
                                                    <center>
                                                        <p>You can install and download Adobe Flash Player here: <a href="http://get.adobe.com/flashplayer/">Install flash player</a>. More instructions for installation can be found here: <a href="http://www.adobe.com/products/flashplayer/productinfo/instructions/">More information</a></p>
                                                        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="{{ url('/') }}/web/images/download/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
                                                    </center>
                                                </div>
                                                    <script type="text/javascript" language="JavaScript">
                                                    var swfobj = new SWFObject("{{ url('/') }}/web/flash/register/HabboRegistration.swf", "habboreg", "406", "327", "7");
                                                    swfobj.addVariable("post_url", "{{ url('/') }}/register/step/2?");
                                                    swfobj.addVariable("back_url", "{{ url('/') }}");
                                                    swfobj.addVariable("figuredata_url", "{{ url('/') }}/web/xml/figure_data_xml.xml");
                                                    swfobj.addVariable("localization_url", "{{ url('/') }}/web/xml/figure_editor.xml");
                                                    swfobj.addVariable("post_figure", "figure");
                                                    swfobj.addVariable("post_gender", "gender");
                                                    swfobj.addVariable("required-birth", "{{ session('birthday') }}");
                                                    swfobj.addVariable("_token", "{{ csrf_token() }}");
                                                    swfobj.write("flashcontent");
                                                    </script>
                                            </div>
                                            {{--<div align="right">
                                                {{ old('year') }}
                                                <form method="post" action="../register/step/2">
                                                    {{ csrf_field() }}
                                                    <textarea name="imgurl" hidden="hidden"></textarea>
                                                    <input name="figure" type="text" value="hd-180-1.hr-100-61.ch-210-66.lg-270-82.sh-290-81" hidden>
                                                    <input name="gender" type="text" value="M" hidden>
                                                    <input type="submit" value="Continue" id="continuebtn" class="process-button" name="button_figure" />
                                                </form>
                                            </div>--}}
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="content-white-bottom">
                                        <div class="content-white-bottom-body"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="content-bottom">
                        <div class="content-bottom-content"></div>
                    </div>
                </div>
            </div>
        </div>

@stop
