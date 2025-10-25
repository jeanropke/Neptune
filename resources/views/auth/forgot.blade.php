@extends('layouts.login')
@section('title', 'Forgotten password!')
@section('content')
    <style type="text/css">
        #accountlist-form-errors {
            display: none
        }

        #forgottenpw-form-errors {
            display: none
        }

        div.left-column {
            float: left;
            width: 50%
        }

        div.right-column {
            float: right;
            width: 49%
        }

        label {
            display: block
        }

        input {
            width: 98%
        }

        input.process-button {
            width: auto;
            float: right
        }
    </style>
    <div id="process-header">
        <div id="process-header-body">
            <div id="process-header-content">
                <div id="habbologo"><a href="{{ url('/') }}"></a></div>
            </div>
        </div>
    </div>
    <div id="outer">
        <div id="outer-content">
            <div class="left-column">
                <div id="forgotten-password" class="processbox grey">
                    <div class="headline">
                        <div class="headline-content">
                            <div class="headline-wrapper">
                                <h2>&nbsp;</h2>
                            </div>
                        </div>
                    </div>
                    <div class="content-top">
                        <div class="content">
                            <div id="forgottenpw-form-errors">
                                <div class="content-red">
                                    <div class="content-red-body" id="forgottenpw-form-errors-content">
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-red-bottom">
                                    <div class="content-red-bottom-body"></div>
                                </div>
                            </div>

                            @session('success_email')
                                <div class="content-ok">
                                    <div class="content-ok-body">
                                        {{ $value }}
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-ok-bottom">
                                    <div class="content-ok-bottom-body"></div>
                                </div>
                            @endsession
                            @session('error_email')
                                <div class="content-red">
                                    <div class="content-red-body">
                                        {{ $value }}
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-red-bottom">
                                    <div class="content-red-bottom-body"></div>
                                </div>
                            @endsession


                            <img vspace="0" hspace="10" border="0" align="right" src="{{ cms_config('site.c_images.url') }}/album1358/frank_shocked.gif" alt="">
                            <h4>I can't remember my password!</h4>
                            <p>Don't panic! Please enter your account information below and we'll send you an email telling you how to reset your password.</p>
                            <div class="clear"></div>
                            <div class="content-white-outer">
                                <div class="content-white">
                                    <div class="content-white-body">

                                        <div class="content-white-content">
                                            <form method="post" action="forgot" id="forgottenpw-form">
                                                @csrf
                                                <p>
                                                    <label for="forgottenpw-username" class="registration-text">Habbo name</label>
                                                    <input type="text" class="required-username" name="habboName" id="forgottenpw-username" value="">
                                                </p>

                                                <p>
                                                    <label for="forgottenpw-email" class="registration-text">Email address</label>
                                                    <input type="text" class="required-email" name="emailAddress" id="forgottenpw-email" value="">
                                                </p>

                                                <p>
                                                    <input type="submit" value="Request password email" name="actionForgot" class="process-button" id="forgottenpw-submit">
                                                </p>
                                                <input type="hidden" value="default" name="origin">
                                            </form>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-white-bottom">
                                    <div class="content-white-bottom-body"></div>
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
            <div class="right-column">
                <div id="accountlist" class="processbox grey">
                    <div class="headline">
                        <div class="headline-content">
                            <div class="headline-wrapper">
                                <h2>&nbsp;</h2>
                            </div>
                        </div>
                    </div>
                    <div class="content-top">
                        <div class="content">
                            <div id="accountlist-form-errors">
                                <div class="content-red">
                                    <div class="content-red-body" id="accountlist-form-errors-content">
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-red-bottom">
                                    <div class="content-red-bottom-body"></div>
                                </div>
                            </div>

                            @session('success_owner')
                                <div class="content-ok">
                                    <div class="content-ok-body">
                                        {{ $value }}
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-ok-bottom">
                                    <div class="content-ok-bottom-body"></div>
                                </div>
                            @endsession
                            @session('error_owner')
                                <div class="content-red">
                                    <div class="content-red-body">
                                        {{ $value }}
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-red-bottom">
                                    <div class="content-red-bottom-body"></div>
                                </div>
                            @endsession

                                {{ config('mail.host') }} a
                            <img vspace="0" hspace="10" border="0" align="right" src="{{ cms_config('site.c_images.url') }}/album1358/frank_sorry.gif" alt="">
                            <h4>I can't remember my Habbo name!</h4>
                            <p>No problem - just enter your email address below and we'll send you a list of your accounts.</p>

                            <div class="clear"></div>

                            <div class="content-white-outer">
                                <div class="content-white">
                                    <div class="content-white-body">

                                        <div class="content-white-content">
                                            <form method="post" action="forgot" id="accountlist-form">
                                                @csrf
                                                <p>
                                                    <label for="accountlist-owner-email" class="registration-text">Email address</label>
                                                    <input type="text" class="required-owner-email" name="ownerEmailAddress" id="accountlist-owner-email" value="">
                                                </p>

                                                <p>
                                                    <input type="submit" value="Get my accounts" name="actionList" class="process-button" id="accountlist-submit">
                                                </p>
                                                <input type="hidden" value="default" name="origin">
                                            </form>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="content-white-bottom">
                                    <div class="content-white-bottom-body"></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="content-bottom">
                        <div class="content-bottom-content"></div>
                    </div>
                </div>
                <div class="processbox grey">
                    <div class="headline">
                        <div class="headline-content">
                            <div class="headline-wrapper">
                                <h2>&nbsp;</h2>
                            </div>
                        </div>
                    </div>
                    <div class="content-top">
                        <div class="content">


                            <img vspace="0" hspace="10" border="0" align="left" src="{{ cms_config('site.c_images.url') }}/album1358/frank_thumbup.gif"
                                alt="">
                            <h4>False alarm - I've remembered</h4>
                            <p>Great stuff! If you forget again, just pop back here and we'll help you.<br><br><a target="_self" href="{{ url('/') }}/account/login">Sign in to
                                    Habbo</a><br><a target="_blank" href="{{ url('/') }}/">Go back to the homepage &gt;&gt;</a></p>

                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="content-bottom">
                        <div class="content-bottom-content"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>

            <script type="text/javascript" language="JavaScript">
                function selectiveAddError(element, name, message) {
                    while (element = element.parentNode)
                        if (element.tagName == 'FORM') {
                            validatorAddError(element, name, message, element.id + "-errors");
                        }

                }

                function initFormValidation() {
                    Object.extend(Validation, {
                        addError: selectiveAddError
                    });
                    Validation.addAllThese([
                        ['required-username', 'Please enter your Habbo name', function(v) {
                            return !Validation.get('IsEmpty').test(v);
                        }],
                        ['required-email', 'Please enter your correct email address', function(v) {
                            return /^[\w\-.%]{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/.test(v);
                        }],
                        ['required-owner-email', 'Please enter a correct email address', function(v) {
                            return /^[\w\-.%]{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/.test(v);
                        }]

                    ]);
                    var fpValidation = new Validation('forgottenpw-form', {
                        focusOnError: true,
                        beforeSubmit: function() {
                            validatorBeforeSubmit("forgottenpw-form-errors");
                            validatorBeforeSubmit("accountlist-form-errors");
                            alValidation.reset();
                        },
                        afterSuccesfulValidation: function(e) {
                            console.log('afterSuccesfulValidation');
                            $('forgottenpw-submit').disabled = true;
                        }
                    });
                    var alValidation = new Validation('accountlist-form', {
                        focusOnError: true,
                        beforeSubmit: function() {
                            validatorBeforeSubmit("accountlist-form-errors");
                            validatorBeforeSubmit("forgottenpw-form-errors");
                            fpValidation.reset();
                        },
                        afterSuccesfulValidation: function(e) {
                            console.log('afterSuccesfulValidation');
                            $('accountlist-submit').disabled = true;
                        }
                    });
                }
                initFormValidation();
            </script>

            <div id="footer">
                <div id="footer-top">
                    <div id="footer-content">© 2006 Sulake Corporation Ltd. HABBO is a registered trademark of Sulake Corporation Oy in the European Union, the USA, Japan, the
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
