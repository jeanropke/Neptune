@extends('layouts.iot')

@section('title', '')

@section('content')
    @include('help.iot.include.step1_header')
    @include('help.iot.include.step2_header')
    @include('help.iot.include.step3_header')

    <form method="post" action="go">
        @csrf
        <input type="hidden" name="sid" value="63">
        <table border="0" cellspacing="0" cellpadding="0" class="ihead">
            <tr>
                <td class="icon">
                    <img src="{{ cms_config('site.web.url') }}/iot/header_images/Western2/4.gif" alt=" " width="47" height="37">
                </td>

                <td class="text">
                    <h2>Describe your issue</h2>
                </td>
            </tr>
        </table>
        <br>

        <table border="0" cellspacing="0" cellpadding="0" class="content-table">
            <tr>
                <td>

                    <div class="iinfodiv">
                        Please enter the details of your request.
                        A Habbo Player Support Agent will respond to you as soon as possible.
                        Remember before sending us a mail, you should check out our FAQs.
                        Most common Habbo questions are answered there!<br><br>
                        <textarea name="message" class="imessageform"></textarea>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <div style="float:right;">
            <table height="21" border="0" cellpadding="0" cellspacing="0" class="button">
                <tr>
                    <td class="button-left-side"></td>
                    <td class="middle"><button type="submit" name="submit" class="proceedbutton">Send</button></td>
                    <td class="button-right-side-arrow"></td>
                </tr>
            </table>
        </div>

    </form>
@endsection
