@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'Movies')

@section('content')
    @include('entertainment.habbowood.includes.menu')
    <div class="habbomovies-custom-bg">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-3col">
            <tbody>
                <tr>
                    <td style="width: 8px;"></td>
                    <td valign="top" style="width: 741px;" class="habboPage-col rightmost">
                        <div class="portlet-film film">
                            <div class="portlet-film-header">
                                <h3>Share this movie.</h3>
                            </div>
                            <div class="portlet-film-header-b"></div>
                            <div class="portlet-film-body">
                                <div class="portlet-film-content">
                                    <div id="habbowood_tell_1" align="center">
                                        <div class="invitation-component">
                                            <form action="" method="post" id="habbowood_tell_1_invitation_form">
                                                <input type="hidden" name="habbowood_tell_1_sent" value="true">
                                                <input type="hidden" name="habbowood_tell_1_page" value="{{ request()->page }}">


                                                <div class="blackbubble">
                                                    <div class="blackbubble-body">
                                                        Take a look at this Habbowood movie — it's pure fun!
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
                                                    <label for="habbowood_tell_1_recipients_0">Friend's email address 1:</label><br>
                                                    <input type="text" name="habbowood_tell_1_recipients[0]" id="habbowood_tell_1_recipients_0" value="" size="40"
                                                        class="invitation-wide-input">
                                                </p>
                                                <p>
                                                    <label for="habbowood_tell_1_recipients_1">Friend's email address 2:</label><br>
                                                    <input type="text" name="habbowood_tell_1_recipients[1]" id="habbowood_tell_1_recipients_1" value="" size="40"
                                                        class="invitation-wide-input">
                                                </p>
                                                <p>
                                                    <label for="habbowood_tell_1_recipients_2">Friend's email address 3:</label><br>
                                                    <input type="text" name="habbowood_tell_1_recipients[2]" id="habbowood_tell_1_recipients_2" value="" size="40"
                                                        class="invitation-wide-input">
                                                </p>
                                                <p>
                                                    <label for="habbowood_tell_1_recipients_3">Friend's email address 4:</label><br>
                                                    <input type="text" name="habbowood_tell_1_recipients[3]" id="habbowood_tell_1_recipients_3" value="" size="40"
                                                        class="invitation-wide-input">
                                                </p>
                                                <p>
                                                    Tell us a little about yourself:
                                                </p>
                                                <p>
                                                    <label for="habbowood_tell_1_sender_name">Your name:</label><br>
                                                    <input type="text" name="habbowood_tell_1_senderName" id="habbowood_tell_1_sender_name" value="" size="40"
                                                        class="invitation-wide-input">
                                                </p>
                                                <p>
                                                    <label for="habbowood_tell_1_sender_email">Your email address:</label><br>
                                                    <input type="text" name="habbowood_tell_1_senderEmail" id="habbowood_tell_1_sender_email" value="" size="40"
                                                        class="invitation-wide-input">
                                                </p>
                                                <div class="invitation-buttons" id="habbowood_tell_1_invitation-buttons">
                                                    <script type="text/javascript">
                                                        var submit = Builder.node("a", {
                                                            href: "#",
                                                            className: "colorlink orange dialogbutton"
                                                        }, [Builder.node("span", "Preview")]);
                                                        Event.observe(submit, "click", function(e) {
                                                            Event.stop(e);
                                                            $("habbowood_tell_1_invitation_form").submit();
                                                        });
                                                        $("habbowood_tell_1_invitation-buttons").appendChild(submit);
                                                    </script>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-film-bottom">
                                <div class="portlet-film-bottom-body"></div>
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
