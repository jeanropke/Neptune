@extends('layouts.login', ['body' => 'process'])
@section('title', 'Welcome to ' . cms_config('hotel.name.short') . '!')
@section('content')
    <div id="process-header">
        <div id="process-header-body">
            <div id="process-header-content">
                <div id="habbologo"><a href="{{ url('/') }}"></a></div>
            </div>
        </div>
    </div>
    <div id="outer">
        <div id="outer-content">
            <div class="processbox left">
                <div class="headline">
                    <div class="headline-content">
                        <div class="headline-wrapper">
                            <h2>New to {{ cms_config('hotel.name.short') }}? Register Here!</h2>
                        </div>
                    </div>
                </div>
                <div class="content-top">
                    <div class="content">
                        <div class="processbox-inner">
                            <h4>
                                <font style="font-size: 11pt">JOIN NOW - IT'S EASY AND FREE!</font>
                            </h4>
                            <p>
                            </p>
                            <p><img vspace="10" hspace="10" border="0" align="right" src="{{ cms_config('site.web.url') }}/images/login/bandg.gif" alt="">
                            </p>
                            <ol type="1">
                                <li>Type Your Birthday</li>
                                <li>Create Your {{ cms_config('hotel.name.short') }}</li>
                                <li>Enter {{ cms_config('hotel.name.short') }} Hotel</li>
                                <li>Make Your {{ cms_config('hotel.name.short') }} Home</li>
                                <li>Have Fun!</li>
                            </ol>
                            <p>
                                <br><br>
                            </p>
                            <p></p>

                        </div>
                        @if ($errors->any())
                            {{ $errors->first() }}
                        @endif
                        @if (session('status'))
                            <div id="login-errors" style="display: block">
                                <div class="content-red">
                                    <div class="content-red-body" id="login-errors-content"> {{ session('status') }}
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-red-bottom">
                                    <div class="content-red-bottom-body"></div>
                                </div>
                            </div>
                        @endif
                        <div id="registration-errors">
                            <div class="content-red">
                                <div class="content-red-body" id="registration-errors-content">
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="content-red-bottom">
                                <div class="content-red-bottom-body"></div>
                            </div>
                        </div>

                        <div class="content-white-outer" id="registration-start">
                            <div class="content-white">
                                <div class="content-white-body">

                                    <div class="content-white-content">
                                        <form method="post" action="{{ url('/') }}/register/start" id="registration-form">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="from" value="login">
                                            <p>
                                                <label for="day" class="registration-text">When is your birthday?</label>
                                            </p>

                                            <div id="required-birthday">
                                                <select name="month" id="month" class="dateselector">
                                                    <option value="">--</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                                <select name="day" id="day" class="dateselector">
                                                    <option value="">--</option>
                                                    @for ($i = 1; $i <= 31; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <select name="year" id="year" class="dateselector">
                                                    <option value="">--</option>
                                                    @for ($i = date('Y'); $i >= 1900; $i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <p class="last">
                                                <input type="submit" value="Continue registration" class="process-button" id="registration-submit">
                                            </p>
                                        </form>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="content-white-bottom">
                                <div class="content-white-bottom-body"></div>
                            </div>
                        </div>

                        <div class="processbox-inner">
                            <p>
                                <br>
                                <img vspace="0" hspace="0" border="0" align="right" src="{{ cms_config('site.c_images.url') }}/album109/reindeer_1_small.gif"
                                    alt="">
                                <span style="font-weight: bold;">TOP REASONS TO REGISTER</span><br>
                            </p>
                            <ul>
                                <li>Create your own Habbo character and Home page<br></li>
                                <li>Meet your friends and find new ones<br>
                                </li>
                                <li>Decorate your own room
                                </li>
                                <li>It’s more fun than not joining!</li>
                            </ul>
                            <ul>
                                <li><span style="font-weight: bold;">It's completely free!</span></li>
                            </ul><br><br>
                            <p></p>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>
                <div class="content-bottom">
                    <div class="content-bottom-content"></div>
                </div>
            </div>
            <div class="processbox right blue">
                <div class="headline">
                    <div class="headline-content">
                        <div class="headline-wrapper">
                            <h2>Already have a {{ cms_config('hotel.name.short') }}? Please log in here!</h2>
                        </div>
                    </div>
                </div>
                <div class="content-top">
                    <div class="content">
                        <div class="processbox-inner">
                            <p>If you already have a {{ cms_config('hotel.name.short') }} account then log in here using your {{ cms_config('hotel.name.short') }} user name and
                                your password. Your user name and password are the same for here as they are in the Hotel.
                                <br />
                                <br />
                            </p>
                        </div>
                        @if ($errors->any())
                            <div id="login-errors" style="display: block">
                                <div class="content-red">
                                    <div class="content-red-body" id="login-errors-content"> {{ $errors->first() }}
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-red-bottom">
                                    <div class="content-red-bottom-body"></div>
                                </div>
                            </div>
                        @endif
                        <div class="content-white-outer" id="login">
                            <div class="content-white">
                                <div class="content-white-body">
                                    <div class="content-white-content">
                                        <form action="{{ route('account.submit') }}" method="post" id="login-form">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="page" value="{{ request()->page }}">
                                            <p id="login-username-area">
                                                <label for="login-username" class="registration-text">My {{ cms_config('hotel.name.short') }} name</label>
                                                <br />
                                                <input type="text" class="required-username" name="username" id="login-username" value="" />
                                            </p>
                                            <script type="text/javascript" language="JavaScript">
                                                $("login-username").focus();
                                            </script>
                                            <p id="login-password-area">
                                                <label for="login-password" class="registration-text">Password</label>
                                                <br />
                                                <input type="password" class="required-password" name="password" id="login-password" value="" />
                                            </p>
                                            <p id="login-username-area">
                                                <label for="login-remember" class="registration-text">
                                                    <input id="login-remember" type="checkbox" name="remember" /> Remember me
                                                </label>

                                            </p>
                                            <p class="last">
                                                <input type="submit" value="Log in" class="process-button" id="login-submit" />
                                            </p>
                                        </form>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="content-white-bottom">
                                <div class="content-white-bottom-body"></div>
                            </div>
                        </div>
                        <div class="processbox-inner">
                            <p>
                                <br>
                                <span style="font-weight: bold;">FORGOTTEN YOUR PASSWORD?</span>
                                <br><br>

                                If you have forgotten your password or username please visit the <a href="{{ url('/') }}/account/password/forgot" target="_blank">Account
                                    Restore</a> page.
                                <br><br>
                            </p>
                            <h4>Security Information</h4>
                            <p>
                                <img vspace="10" hspace="10" border="0" align="right" src="{{ cms_config('site.c_images.url') }}/album209/encryption_pc_ie.gif"
                                    alt="">
                                The real Habbo site is encrypted to protect you and your data. You can check whether or not this site is encrypted by looking for
                                the nice looking padlock at the bottom of your web browser.
                                <br><br>
                            </p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="content-bottom">
                    <div class="content-bottom-content"></div>
                </div>
            </div>
            <script type="text/javascript" language="JavaScript">
                Event.observe($("registration-form"), "submit", function(e) {
                    if ($("day").selectedIndex == 0 || $("month").selectedIndex == 0 || $("year").selectedIndex == 0) {
                        validatorBeforeSubmit("registration-errors");
                        validatorAddError(false, false, "Coloque uma data válida", "registration-errors");
                        $("required-birthday").className = "validation-failed";
                        Event.stop(e);
                    } else {
                        $("registration-submit").disabled = 'true';
                    }
                }, false);
                Event.observe($("login-form"), "submit", function(e) {
                    if ($F("login-username") == "" || $F("login-password") == "") {
                        validatorBeforeSubmit("login-errors");
                        validatorAddError(false, false, "Digite seu nome e sua senha", "login-errors");
                        if ($F("login-password") == "") {
                            $("login-password").className = "validation-failed";
                            $("login-password").focus();
                        } else {
                            Element.removeClassName($("login-password"), "validation-failed");
                        }
                        if ($F("login-username") == "") {
                            $("login-username").className = "validation-failed";
                            $("login-username").focus();
                        } else {
                            Element.removeClassName($("login-username"), "validation-failed");
                        }
                        Event.stop(e);
                    } else {
                        $("login-submit").disabled = 'true';
                    }
                }, false);
            </script>
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
