@extends('layouts.iot')

@section('title', '')

@section('content')
    <form method="post" action="go">
        <input type="hidden" name="sid" value="58">
        @csrf
        <table border="0" cellspacing="0" cellpadding="0" class="ihead">
            <tbody>
                <tr>
                    <td class="icon"><img src="{{ cms_config('site.web.url') }}/iot/header_images/Western2/1.gif" alt=" " width="47" height="37">
                    </td>
                    <td class="text">
                        <h2>DO YOU ALREADY HAVE A HABBO ACCOUNT?</h2>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table border="0" cellspacing="0" cellpadding="0" class="content-table">
            <tbody>
                <tr>
                    <td valign="middle" align="left" style="width: 300px;">
                        <div class="iinfodiv">
                            <b><input type="radio" name="event" value="Member">Yes, I use Habbo</b><br><br>
                            <b><input type="radio" name="event" value="Not member">No, I am not a user</b>
                            <br><br>
                            <div style="padding-left: 10px;">
                                <table height="21" border="0" cellpadding="0" cellspacing="0" class="button">
                                    <tbody>
                                        <tr>
                                            <td class="button-left-side"></td>
                                            <td class="middle">
                                                <input type="submit" class="proceedbutton" value="Next">
                                            </td>
                                            <td class="button-right-side-arrow"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
