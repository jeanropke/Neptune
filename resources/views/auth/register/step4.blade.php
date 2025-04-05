@extends('layouts.login')
@section('title', 'Register!')
@section('content')
    <div id="process-header">
        <div id="process-header-body">
            <div id="process-header-content">
                <div id="habbologo"><a href="{{ url('/') }}"></a></div>
                <div id="steps">
                    <img src="{{ url('/') }}/web/images/process/step1.gif" alt="1" width="30" height="26" />
                    <img src="{{ url('/') }}/web/images/process/step_right.gif" alt="" width="20" height="26" />
                    <img src="{{ url('/') }}/web/images/process/step2.gif" alt="2" width="30" height="26" />
                    <img src="{{ url('/') }}/web/images/process/step_right.gif" alt="" width="20" height="26" />
                    <img src="{{ url('/') }}/web/images/process/step3.gif" alt="3" width="30" height="26" />
                    <img src="{{ url('/') }}/web/images/process/step_right.gif" alt="" width="20" height="26" />
                    <img src="{{ url('/') }}/web/images/process/step4_on.gif" alt="4" width="30" height="26" />
                    <img src="{{ url('/') }}/web/images/process/step_right_on.gif" alt="" width="20" height="26" />
                    <img src="{{ url('/') }}/web/images/process/step5.gif" alt="5" width="30" height="26" />
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
                                    <p>Please read the Terms and Conditions carefully. These ones are more interesting than real Habbo ones</p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="bubble-bottom">
                                <div class="bubble-bottom-body"> <img src="{{ url('/') }}/web/images/register/bubble_tail_left.gif" alt="" width="22"
                                        height="31" /> </div>
                            </div>
                            <div class="frank"><img src="{{ url('/') }}/web/images/register/register4.gif" alt="" width="245" height="180" /></div>
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
                                            <form method="post" action="{{ url('/') }}/register/done" id="stepform" autocomplete="off">
                                                {{ csrf_field() }}
                                                <p> You must agree to the following terms. </p>
                                                <div id="terms"> By Checking the checkbox bellow, I prove that I know, that Habbo retros are illegal and have smaller security
                                                    than real Habbo. Also I don't work at Sulake nor any related company.</span> </div>
                                                <p id="required-termsOfService">
                                                    <input type="checkbox" name="T-O-S" id="T-O-S" value="true" />
                                                    <label for="T-O-S">I accept the Terms and Conditions.</label>
                                                </p>
                                                <div id="register-buttons">
                                                    <div align="right">
                                                        <input type="submit" value="Continue" id="continuebtn" class="process-button" name="button_done" />
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
