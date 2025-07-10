@extends('layouts.iot')

@section('title', '')

@section('content')
    @include('help.iot.include.step1_header')
    @include('help.iot.include.step2_header')

    <form method="post" action="go">
        <input type="hidden" name="sid" value="76">
        @csrf
        <table border="0" cellspacing="0" cellpadding="0" class="ihead">
            <tr>
                <td class="icon">
                    <img src="{{ cms_config('site.web.url') }}/iot/header_images/Western2/3.gif" alt=" " width="47" height="37">
                </td>

                <td class="text">
                    <h2>Select your issue</h2>
                </td>
            </tr>
        </table>
        <br>

        <table border="0" cellspacing="0" cellpadding="0" class="content-table">
            <tr>
                <td valign="top">
                    <div class="iinfodiv" style="margin-left:0px;">
                        <table border="0">
                            <tr>
                                <td valign="top"></td>
                                <td valign="center">
                                    Please choose the option that describes your issues! Please choose the right one, as it will help us answer your question quicker.
                                </td>
                                <td align="center">
                            </tr>
                        </table>
                    </div>
                </td>
                <td class="iactiontd" align="center">
                    <b>Issue</b><br>
                    <select name="issue_type">
                        <option value="">-</option>
                        <option value="habbo_credits">A problem with Habbo Credits purchase</option>
                        <option value="password_issue">My Habbo password/my child's Habbo password</option>
                        <option value="ban_issue">My banned/my child's banned Habbo account</option>
                        <option value="unauthorized_access">My account/ my child's account is compromised</option>
                        <option value="bug_technical">A technical problem with Habbo</option>
                        <option value="account_issue">I have a log in/ account problem</option>
                        <option value="idea_share">How to share my good idea with Habbo</option>
                        <option value="business_enquiry">A business/advertising/marketing proposition or query</option>
                        <option value="other_issue">My question doesn't fit the other topics</option>
                    </select><br><br>
                    <div align="right" class="btn-div">
                        <table height="21" border="0" cellpadding="0" cellspacing="0" class="button">
                            <tr>
                                <td class="button-left-side"></td>
                                <td class="middle"><input type="submit" class="proceedbutton" value="Proceed" /></td>
                                <td class="button-right-side-arrow"></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </form>
@endsection
