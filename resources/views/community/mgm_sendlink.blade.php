@extends('layouts.master', ['menuId' => '25'])

@section('title', 'Send link to your friend')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-1col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 741px;" class="habboPage-col rightmost">

                    <div class="content-white-outer">
                        <div class="content-white">
                            <div class="content-white-body">

                                <div class="content-white-content">
                                    <div id="invite_1" align="center">
                                        <div class="invitation-component">



                                            <form action="{{ url('/') }}/community/mgm_sendlink#invite_1" method="post" id="invite_1_invitation_form">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="invite_1_sent" value="true">


                                                <div class="blackbubble">
                                                    <div class="blackbubble-body">

                                                        <label for="invite_1_message_id">Invitation message</label><br>

                                                        <textarea name="invite_1_message" id="invite_1_message_id" class="invitation-message" cols="40" rows="10">Check out Habbo!</textarea>
                                                        <div id="invite_1_message_error" class="error"></div>
                                                        <script type="text/javascript">
                                                            limitTextarea("invite_1_message_id", 450, function(limitReached) {
                                                                if (limitReached) {
                                                                    $("invite_1_message_error").innerHTML = "Your message can have maximum of 450 characters";
                                                                } else {
                                                                    $("invite_1_message_error").innerHTML = "";
                                                                }
                                                            });
                                                        </script>

                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <div class="blackbubble-bottom">
                                                    <div class="blackbubble-bottom-body">
                                                        <img src="{{ cms_config('site.web.url') }}/images/box-scale/bubble_tail_small.gif" alt="" width="12" height="21"
                                                            class="invitation-tail">
                                                    </div>
                                                </div>

                                                <p>
                                                    <img alt="" src="{{ cms_config('site.web.url') }}/images/frank/hello.gif" class="invitation-habbo">
                                                    <label for="invite_1_recipients_0">Friend's email address 1:</label><br>
                                                    <input type="text" name="invite_1_recipients[0]" id="invite_1_recipients_0" value="" size="40"
                                                        class="invitation-wide-input">

                                                </p>
                                                <p>
                                                    <label for="invite_1_recipients_1">Friend's email address 2:</label><br>
                                                    <input type="text" name="invite_1_recipients[1]" id="invite_1_recipients_1" value="" size="40"
                                                        class="invitation-wide-input">

                                                </p>
                                                <p>
                                                    <label for="invite_1_recipients_2">Friend's email address 3:</label><br>
                                                    <input type="text" name="invite_1_recipients[2]" id="invite_1_recipients_2" value="" size="40"
                                                        class="invitation-wide-input">

                                                </p>
                                                <p>
                                                    <label for="invite_1_recipients_3">Friend's email address 4:</label><br>
                                                    <input type="text" name="invite_1_recipients[3]" id="invite_1_recipients_3" value="" size="40"
                                                        class="invitation-wide-input">

                                                </p>


                                                <p>
                                                    Tell us a little about yourself:
                                                </p>

                                                <p>
                                                    <label for="invite_1_sender_name">Your name:</label><br>
                                                    <input type="text" name="invite_1_senderName" id="invite_1_sender_name" value="" size="40"
                                                        class="invitation-wide-input">

                                                </p>

                                                <p>
                                                    <label for="invite_1_sender_email">Your email address:</label><br>
                                                    <input type="text" name="invite_1_senderEmail" id="invite_1_sender_email" value="" size="40"
                                                        class="invitation-wide-input">

                                                </p>


                                                <div class="invitation-buttons" id="invite_1_invitation-buttons">
                                                    <script type="text/javascript">
                                                        var submit = Builder.node("a", {
                                                            href: "#",
                                                            className: "colorlink orange dialogbutton"
                                                        }, [Builder.node("span", "Preview")]);
                                                        Event.observe(submit, "click", function(e) {
                                                            Event.stop(e);
                                                            $("invite_1_invitation_form").submit();
                                                        });
                                                        $("invite_1_invitation-buttons").appendChild(submit);
                                                    </script>
                                                    <noscript>
                                                        <input type="submit" value="Preview" class="process-button" />
                                                    </noscript>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="content-white-bottom">
                            <div class="content-white-bottom-body"></div>
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
@stop
