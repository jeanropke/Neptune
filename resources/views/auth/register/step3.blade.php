@extends('layouts.login')
@section('title', 'Register!')
@section('content')
    <div id="process-header">
        <div id="process-header-body">
            <div id="process-header-content">
                <div id="habbologo"><a href="{{ url('/') }}"></a></div>
                <div id="steps">
                    <img src="{{ cms_config('site.web.url') }}/images/process/step1.gif" alt="1" width="30" height="26" />
                    <img src="{{ cms_config('site.web.url') }}/images/process/step_right.gif" alt="" width="20" height="26" />
                    <img src="{{ cms_config('site.web.url') }}/images/process/step2.gif" alt="2" width="30" height="26" />
                    <img src="{{ cms_config('site.web.url') }}/images/process/step_right.gif" alt="" width="20" height="26" />
                    <img src="{{ cms_config('site.web.url') }}/images/process/step3_on.gif" alt="3" width="30" height="26" />
                    <img src="{{ cms_config('site.web.url') }}/images/process/step_right_on.gif" alt="" width="20" height="26" />
                    <img src="{{ cms_config('site.web.url') }}/images/process/step4.gif" alt="4" width="30" height="26" />
                    <img src="{{ cms_config('site.web.url') }}/images/process/step_right.gif" alt="" width="20" height="26" />
                    <img src="{{ cms_config('site.web.url') }}/images/process/step5.gif" alt="5" width="30" height="26" />
                </div>
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
                                    <p>Email is the only way for our Support team to contact you if you need any help with your account.</p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="bubble-bottom">
                                <div class="bubble-bottom-body"> <img src="{{ cms_config('site.web.url') }}/images/register/bubble_tail_left.gif" alt="" width="22"
                                        height="31" /> </div>
                            </div>
                            <div class="frank"><img src="{{ cms_config('site.web.url') }}/images/register/register7.gif" alt="" width="245" height="181" /></div>
                        </div>
                        <div class="content-column2">
                            @if ($errors->any())
                                <div id="process-errors" style="display: block;">
                                    <div class="content-red">
                                        <div class="content-red-body" id="process-errors-content">{{ $errors->first() }}<br></div>
                                    </div>
                                    <div class="content-red-bottom">
                                        <div class="content-red-bottom-body"></div>
                                    </div>
                                </div>
                            @endif
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
                                        <div>
                                            <form method="post" action="{{ url('/') }}/register/step/4" id="stepform" autocomplete="off">
                                                {{ csrf_field() }}
                                                <p> Please enter your email address. </p>
                                                <p id="error_message"></p>
                                                <p>
                                                    <label for="email" class="registration-text">Your email address:</label>
                                                    <br />
                                                    <input type="text" name="email" id="email" value="" class="registration-text required-email" />
                                                </p>
                                                <div id="register-buttons">
                                                    <div align="right">
                                                        <input type="submit" value="Continue" id="continuebtn" class="process-button" name="button_3" />
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </form>
                                        </div>
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
            <div id="footer">
                <div id="footer-top">
                    <div id="footer-content">© 2005 Sulake Corporation Ltd. HABBO is a registered trademark of Sulake Corporation Oy in the European Union, the USA, Japan, the
                        People's Republic of China and various other jurisdictions. All rights reserved.</div>
                </div>
                <div id="footer-bottom">
                    <div id="footer-bottom-content"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="outer-bottom">
        <div id="outer-bottom-content"></div>
    </div>
@stop
