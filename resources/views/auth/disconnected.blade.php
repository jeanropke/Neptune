@extends('layouts.login', ['body' => 'popup'])
@section('title', 'Welcome to ' . cms_config('hotel.name.short') . '!')
@section('content')
    <div id="process-header">
        <div id="process-header-body">
            <div id="process-header-content">
                <div id="habbologo"></div>
            </div>
        </div>
    </div>
    <div id="outer">
        <div id="outer-content">
            <div class="processbox">
                <div class="headline">
                    <div class="headline-content">
                        <div class="headline-wrapper">
                            <h2>Logged out</h2>
                        </div>
                    </div>
                </div>
                <div class="content-top">
                    <div class="content">
                        <img vspace="0" hspace="0" border="0" align="right"
                            src="{{ url('/') }}/c_images/album209/frank_waving_dbl.gif" alt="">
                        You have logged out succesfully.<br><br>Goodbye, and we hope you come back soon!<br><br><a target="_self"
                            href="{{ route('auth.login') }}?page=/client">Sign in again</a><br><br><br>
                        <br>
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
