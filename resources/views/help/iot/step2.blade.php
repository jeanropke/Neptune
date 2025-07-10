@extends('layouts.iot')

@section('title', '')

@section('content')
    @include('help.iot.include.step1_header')

    <form method="post" action="go">
        <input type="hidden" name="sid" value="26">
        @csrf
        <table border="0" cellspacing="0" cellpadding="0" class="ihead">
            <tr>
                <td class="icon">
                    {{-- <img src="{{ cms_config('site.web.url') }}/iot/header_images/Western2/<?php if (!isset($error)) {
                        echo '2';
                    } else {
                        echo 'error';
                    } ?>.gif" alt=" " width="47" height="37" />
                    --}}
                    <img src="{{ cms_config('site.web.url') }}/iot/header_images/Western2/2.gif" alt=" " width="47" height="37">
                </td>

                <td class="text">
                    <h2>Enter {{ cms_config('hotel.name.short') }} account information {{-- <?php echo !empty($error) ? '<font class="ErrorHeader">' . $error . '</font>' : $lang->loc['step.2.header']; ?> --}}</h2>
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

                                <td valign="top"><img src="{{ cms_config('site.web.url') }}/iot/images/process/pen.gif" alt="" /></td>
                                <td valign="center">Please give us your {{ cms_config('hotel.name.short') }} name and registered email address.</td>
                                <td align="center">
                            </tr>
                        </table>
                    </div>
                </td>
                <td class="iactiontd" align="center">
                    <b>{{ cms_config('hotel.name.short') }} name</b><br>
                    <input type="text" name="name" size="30" maxlength="50" value="" /><br><br>

                    <b>Email</b><br><input type="text" name="email" size="30" maxlength="50" value="" /><br><br>
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
