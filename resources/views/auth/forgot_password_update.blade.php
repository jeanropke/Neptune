@extends('layouts.login')
@section('title', 'Forgotten password!')
@section('content')
<div id="process-wrapper">
    <div id="process-header">
        <div id="process-header-body">
            <div id="process-header-content">
                <div id="habbologo"><a href="{{ url('/') }}"></a></div>
            </div>
        </div>
    </div>
    <div id="outer">
        <div id="outer-content">
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


                        <img vspace="0" hspace="10" border="0" align="right"
                            src="{{ url('/') }}/gordon/c_images/album1358/frank_thumbup.gif" alt="">
                        <h4>Reset your password!</h4>
                        <p>Your <b>password</b> must be at least 8 characters long. Your <b>password</b> can contain both <b>uppercase letters</b> and <b>numbers</b>.</p>

                        <div class="clear"></div>
                        @if($errors->any())
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

                        <div class="content-white-outer">
                            <div class="content-white">
                                <div class="content-white-body">

                                    <div class="content-white-content">
                                        <form action="{{ url('/')  }}/account/password/reset" method="post" id="stepform" autocomplete="off">
                                            {{ csrf_field() }}
                                        <input name="reset_token" value="{{ $token }}" hidden>
                                            <p>
                                                <label for="password" class="registration-text">Password</label>
                                                <br />
                                                <input type="password" name="password" id="password" maxlength="32" class="registration-text required-password required-password2" />
                                            </p>
                                            <div id="pwStatus"></div>
                                            <p>
                                                <label for="retypedPassword" class="registration-text">Retype password</label>
                                                <br />
                                                <input type="password" name="retypedPassword" id="retypedPassword" maxlength="32" class="registration-text required-retypedPassword required-retypedPassword2" />
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
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="content-bottom">
                    <div class="content-bottom-content"></div>
                </div>
            </div>

        </div>
        <div class="clear"></div>

        <style type="text/css">
            #accountlist-form-errors {
                display: none
            }

            #forgottenpw-form-errors {
                display: none
            }

            div.left-column {
                float: left;
                width: 50%;
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
        <script type="text/javascript" language="JavaScript">
            var pwTotal = [];
            var unTotal = [];

            function initUserDetailForm() {
                Object.extend(Validation, { addError : validatorAddError });
                Validation.addAllThese([
                    ['required-password', 'Please enter a password', function(v) {
                        return !Validation.get('IsEmpty').test(v);
                    }],
                    ['required-password2', 'Password is too short', function(v) {
                        return v.length >= 8;
                    }],
                    ['required-retypedPassword', 'Please type your password again', function(v) {
                        return !Validation.get('IsEmpty').test(v);
                    }],
                    ['required-retypedPassword2', 'The passwords you typed are not identical', function(v) {
                        return v == $F("password");
                    }]
                ]);
                new Validation('stepform', {focusOnError:true, beforeSubmit:validatorBeforeSubmit, skipValidation:function(){ return backClicked; }});

                initPasswordCheck();
            }

            function showStatusMsg(showIn, message, status)
            {
                $(showIn).removeClassName('field-status-error');
                $(showIn).removeClassName('field-status-ok');
                $(showIn).addClassName('field-status-'+status);
                $(showIn + '-content').innerText = message;
            }

            function initPasswordCheck()
            {
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

            function updatePasswordStatus(remoteCheck, init)
            {
                var value = $F("password");

                if (!init) {
                    if (!value || value.length < 8) {
                        showPasswordLengthMsg("Your password must be at least 8 characters long.", "error");
                        pwTotal[0] = false;
                    } else {
                        showPasswordLengthMsg("Password is securely long enough.", "ok");
                        pwTotal[0] = true;
                    }
                }

                if (value.length < 8) {
                    if ($("pwChars")) { Element.remove("pwChars"); }
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
                    var node = Builder.node("div", { id:"pwLength", className:"field-status-error" }, [
                        Builder.node("b", "Length check: "),
                        Builder.node("span", { id:"pwLength-content" })
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
                    var node = Builder.node("div", { id:"pwChars", className:"field-status-error" }, [
                        Builder.node("b", "Character check: "),
                        Builder.node("span", { id:"pwChars-content" })
                    ]);
                    $("pwStatus").appendChild(node);
                }

                showStatusMsg("pwChars", msg, status);
            }
            function showPasswordMatchMsg(msg, status) {
                var msgNode = $("pwMatch");
                if (!msgNode) {
                    var node = Builder.node("div", { id:"pwMatch", className:"field-status-error" }, [
                        Builder.node("b", "Match check: "),
                        Builder.node("span", { id:"pwMatch-content" })
                    ]);
                    $("pwRetypeStatus").insertBefore(node, $("pwTotal"));
                }

                showStatusMsg("pwMatch", msg, status);
            }
            function updatePasswordTotal() {
                var msgNode = $("pwTotal");
                if (!msgNode) {
                    msgNode = $("pwRetypeStatus").appendChild(Builder.node("div", {id:"pwTotal"}));
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
    </div>
    @stop
