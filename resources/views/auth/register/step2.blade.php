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
                    <img src="{{ cms_config('site.web.url') }}/images/process/step2_on.gif" alt="2" width="30" height="26" />
                    <img src="{{ cms_config('site.web.url') }}/images/process/step_right_on.gif" alt="" width="20" height="26" />
                    <img src="{{ cms_config('site.web.url') }}/images/process/step3.gif" alt="3" width="30" height="26" />
                    <img src="{{ cms_config('site.web.url') }}/images/process/step_right.gif" alt="" width="20" height="26" />
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
                                    <div style="float:right; margin-top:-30px; margin-right:-42px;">
                                        <div id="rect">
                                            <!--input type="button" value="&laquo;" id="change-direction-head-prev" class="direction-change-btn">
                                      <input type="button" value="&raquo;" id="change-direction-head-next" class="direction-change-btn">
                                      <input type="button" value="&lt;" id="change-direction-body-prev" class="direction-change-btn">
                                      <input type="button" value="&gt;" id="change-direction-body-next" class="direction-change-btn"-->

                                        </div>
                                    </div>
                                    <p>Now you should choose your username and password. A good password must contain numbers, uppercase and lowercase letters!</p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="bubble-bottom">
                                <div class="bubble-bottom-body"> <img src="{{ cms_config('site.web.url') }}/images/register/bubble_tail_left.gif" alt="" width="22"
                                        height="31" /> </div>
                            </div>
                            <div class="frank"><img src="{{ cms_config('site.web.url') }}/images/register/register3.gif" alt="" width="245" height="191" /></div>
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
                                            <form method="post" action="{{ url('/') }}/register/step/3" id="stepform" autocomplete="off">
                                                {{ csrf_field() }}
                                                <p> <b>Choose your username:</b><br>
                                                    Your <b>username</b> can contain numbers, uppercase and lowercase letters. Also can contain the following characters:: -=?!@:. </p>
                                                <p>
                                                    <label for="username" class="registration-text">Habbo name
                                                        <div id="error_message"></div>
                                                    </label>
                                                    <br />
                                                    <input type="text" name="username" id="username" maxlength="14" value=""
                                                        class="registration-text required-avatarName" />
                                                <div id="unStatus"></div>

                                                </p>
                                                <hr />
                                                <p> <b>NOW, CHOOSE YOUR PASSWORD:</b><br>
                                                    Your <b>password</b> must be at least ten characters long. Your <b>password</b> can contain both <b>uppercase letters</b> and
                                                    <b>numbers</b>.
                                                </p>
                                                <input name="gender" type="hidden" id="gender" value="hd-180-1.hr-100-61.ch-210-66.lg-270-82.sh-290-81" />
                                                <input name="figure" type="hidden" id="figure" value="M" />
                                                <p>
                                                    <label for="password" class="registration-text">Password</label>
                                                    <br />
                                                    <input type="password" name="password" id="password" maxlength="32"
                                                        class="registration-text required-password required-password2" />
                                                </p>
                                                <div id="pwStatus"></div>
                                                <p>
                                                    <label for="retypedPassword" class="registration-text">Retype password</label>
                                                    <br />
                                                    <input type="password" name="retypedPassword" id="retypedPassword" maxlength="32"
                                                        class="registration-text required-retypedPassword required-retypedPassword2" />
                                                </p>
                                                <div id="pwRetypeStatus"></div>
                                                <div id="register-buttons">
                                                    <div align="right">
                                                        <input type="submit" value="Continue" id="continuebtn" class="process-button" name="button_2" />
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
            <script type="text/javascript" language="JavaScript">
                var pwTotal = [];
                var unTotal = [];

                function initUserDetailForm() {
                    Object.extend(Validation, {
                        addError: validatorAddError
                    });
                    Validation.addAllThese([
                        ['required-avatarName', 'Please choose your name', function(v) {
                            return !Validation.get('IsEmpty').test(v);
                        }],
                        ['required-avatarName', 'Name is too short', function(v) {
                            return v.length >= 3;
                        }],
                        ['required-password', 'Please enter a password', function(v) {
                            return !Validation.get('IsEmpty').test(v);
                        }],
                        ['required-password2', 'Password is too short', function(v) {
                            return v.length >= 6;
                        }],
                        ['required-retypedPassword', 'Please type your password again', function(v) {
                            return !Validation.get('IsEmpty').test(v);
                        }],
                        ['required-retypedPassword2', 'The passwords you typed are not identical', function(v) {
                            return v == $F("password");
                        }]
                    ]);
                    new Validation('stepform', {
                        focusOnError: true,
                        beforeSubmit: validatorBeforeSubmit,
                        skipValidation: function() {
                            return backClicked;
                        }
                    });

                    initPasswordCheck();
                    initUsernameCheck();
                }

                function showStatusMsg(showIn, message, status) {
                    $(showIn).removeClassName('field-status-error');
                    $(showIn).removeClassName('field-status-ok');
                    $(showIn).addClassName('field-status-' + status);
                    $(showIn + '-content').innerText = message;
                }

                function initUsernameCheck() {
                    updateUsernameStatus(false, true);

                    new Form.Element.Observer(
                        "username", .00000001,
                        function(element, value) {
                            updateUsernameStatus(true, false);
                        }
                    );
                }

                function updateUsernameStatus(remoteCheck, init) {
                    var value = $F("username");

                    new Ajax.Request(
                        habboReqPath + "register/username", {
                            method: "get",
                            parameters: "username=" + encodeURIComponent(value),
                            onComplete: showUsernameStatus
                        }
                    );

                }

                function showUsernameStatus(req, jsonObj) {
                    var msgNode = $("unMsg");
                    if (!msgNode) {
                        var node = Builder.node("div", {
                            id: "unMsg",
                            className: "field-status-error"
                        }, [
                            Builder.node("b", "Name check: "),
                            Builder.node("span", {
                                id: "unMsg-content"
                            })
                        ]);
                        $("unStatus").appendChild(node);
                    }

                    if (jsonObj.status == 'ok') {
                        showStatusMsg('unMsg', jsonObj.message, "ok");
                        unTotal[1] = true;
                    } else {
                        showStatusMsg('unMsg', jsonObj.message, "error");
                        unTotal[1] = false;
                    }
                }



                function initPasswordCheck() {
                    updatePasswordStatus(false, true);

                    new Form.Element.Observer(
                        "password", .7,
                        function(element, value) {
                            updatePasswordStatus(false, false);
                        }
                    );

                    new Form.Element.Observer(
                        "retypedPassword", .3,
                        function(element, value) {
                            updatePasswordStatus(false, false);
                        }
                    );
                }

                function updatePasswordStatus(remoteCheck, init) {
                    var value = $F("password");

                    if (!init) {
                        if (!value || value.length < 6) {
                            showPasswordLengthMsg("Your password must be at least 6 characters long.", "error");
                            pwTotal[0] = false;
                        } else {
                            showPasswordLengthMsg("Password is securely long enough.", "ok");
                            pwTotal[0] = true;
                        }
                    }

                    if (value.length < 6) {
                        if ($("pwChars")) {
                            Element.remove("pwChars");
                        }
                        pwTotal[1] = false;
                    } else if (remoteCheck) {
                        new Ajax.Request(
                            habboReqPath + "register/password", {
                                method: "get",
                                parameters: "password=" + encodeURIComponent(value),
                                onComplete: showPasswordStatus
                            }
                        );
                    }

                    if (!init) {
                        var retyped = $F("retypedPassword");
                        if (!retyped) {
                            if ($("pwMatch")) {
                                showStatusMsg("pwMatch", "To make sure you didn\'t misspell, Please retype your password below.", "error");
                            }
                            pwTotal[2] = false;
                        } else if (retyped == $F("password")) {
                            showPasswordMatchMsg("The two passwords match.", "ok");
                            pwTotal[2] = true;
                            Element.removeClassName($("retypedPassword"), "validation-failed");
                        } else {
                            showPasswordMatchMsg("Passwords don\'t match.", "error");
                            pwTotal[2] = false;
                        }

                        updatePasswordTotal();
                    }
                }

                function showPasswordLengthMsg(msg, status) {
                    var msgNode = $("pwLength");
                    if (!msgNode) {
                        var node = Builder.node("div", {
                            id: "pwLength",
                            className: "field-status-error"
                        }, [
                            Builder.node("b", "Length check: "),
                            Builder.node("span", {
                                id: "pwLength-content"
                            })
                        ]);
                        var charsNode = $("pwChars");
                        if (!charsNode) {
                            $("pwStatus").appendChild(node);
                        } else {
                            $("pwStatus").insertBefore(node, $("pwChars"));
                        }
                    }

                    showStatusMsg("pwLength", msg, status);
                }

                function showPasswordCharsMsg(msg, status) {
                    var msgNode = $("pwChars");
                    if (!msgNode) {
                        var node = Builder.node("div", {
                            id: "pwChars",
                            className: "field-status-error"
                        }, [
                            Builder.node("b", "Character check: "),
                            Builder.node("span", {
                                id: "pwChars-content"
                            })
                        ]);
                        $("pwStatus").appendChild(node);
                    }

                    showStatusMsg("pwChars", msg, status);
                }

                function showPasswordMatchMsg(msg, status) {
                    var msgNode = $("pwMatch");
                    if (!msgNode) {
                        var node = Builder.node("div", {
                            id: "pwMatch",
                            className: "field-status-error"
                        }, [
                            Builder.node("b", "Match check: "),
                            Builder.node("span", {
                                id: "pwMatch-content"
                            })
                        ]);
                        $("pwRetypeStatus").insertBefore(node, $("pwTotal"));
                    }

                    showStatusMsg("pwMatch", msg, status);
                }

                function updatePasswordTotal() {
                    var msgNode = $("pwTotal");
                    if (!msgNode) {
                        msgNode = $("pwRetypeStatus").appendChild(Builder.node("div", {
                            id: "pwTotal"
                        }));
                    }

                    if (pwTotal[0] && pwTotal[1] && pwTotal[2]) {
                        msgNode.innerHTML = "Your password is secure!";
                    } else {
                        msgNode.innerHTML = "Please check your password is long enough, contains all required characters and is rewritten correctly.";
                    }
                }

                function showPasswordStatus(req, jsonObj) {
                    if (jsonObj.charOk) {
                        showPasswordCharsMsg(jsonObj.charOk, "ok");
                        pwTotal[1] = true;
                    } else {
                        showPasswordCharsMsg(jsonObj.charErr || "You must use lowercase letters, uppercase letters and numbers.", "error");
                        pwTotal[1] = false;
                    }
                    updatePasswordTotal();
                }

                initUserDetailForm();
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
