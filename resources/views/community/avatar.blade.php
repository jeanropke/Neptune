@extends('layouts.master', ['menuId' => '25'])

@section('title', 'Habbo Avatar Export')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 202px;" class="habboPage-col">
                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>Export your Habbo? What's that?</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">
                                <img width="48" height="119" border="0" align="right" alt="callie globe2" id="galleryImage"
                                    src="{{ cms_config('site.c_images.url') }}/common/callie_globe2.gif">
                                Exporting your Habbo character to another website is very easy. Simply copy and paste the code you'll see in the box on the right and add it to your
                                website outside of Habbo.
                                <br><br>
                                Note: If you update your Habbo profile, you'll need to export your character again.<br>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Your Habbo on the Web!</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">
                                @guest
                                    To export your Habbo to another website, you first need to be registered.
                                    <a href="{{ url('/') }}/account/login?page=/community/avatar" target="_self">Log in to your character here or create a new one</a>!
                                @endguest
                                @auth
                                    <textarea style="width: 99%; height:200px">
<!-- habbo export begins -->
<table width="200" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td height="80"><div style="position: relative; font-family: Verdana,Arial,Helvetica; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-size-adjust: none; color: white;">
<div style="background: transparent url({{ cms_config('site.web.url') }}/images/export/bg.png) no-repeat scroll 0% 50%; height: 80px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">
<div style="background: transparent url({{ cms_config('site.avatarimage.url') }}{{ user()->figure }}&gesture=sml&action=std&direction=2&head_direction=2) no-repeat scroll 0pt -10px; float: left; width: 64px; height: 80px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;"></div></div>
<div style="background: transparent url({{ cms_config('site.web.url') }}/images/export/mask.png) no-repeat scroll 0% 50%; position: absolute; top: 0pt; left: 0pt; height: 80px; width: 200px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;"></div>
<div style="position: absolute; width: 124px; top: 10px; left: 66px;"><span style="border-bottom: 1px dashed white; margin: 0pt 0pt 4px; padding: 0pt 0pt 4px; font-family: Verdana,Arial,Helvetica; font-style: normal; font-variant: normal; font-size: 12px; line-height: normal; font-size-adjust: none; font-weight: bold; float: left;">
<a href="{{ url('/') }}/home/{{ user()->username }}?partner=export" style="color: white; text-decoration: none;" target="_self">{{ user()->username }}</a></span><p style="margin-top: 8px; margin-right: 0pt; margin-bottom: 0pt; text-align: left; clear: left;">{{ user()->motto }}<br></p>
</div></div></td></tr><tr><td align="center" style="font-family: Verdana,Arial,Helvetica; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-size-adjust: none; color: black;">
<a href="{{ url('/') }}/home/{{ user()->username }}?partner=export" style="font-family: Verdana,Arial,Helvetica; font-style: normal; font-variant: normal; font-size: 11px; line-height: normal; font-size-adjust: none; color: rgb(26, 117, 164); font-weight: bold;" target="_self">{{ user()->username }} has a Home on Habbo </a></td></tr></tbody></table>
<!-- habbo export ends --></textarea>

                                @endauth
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Avatar Export Preview</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">
                                <ul>
                                    <ul>
                                        <ul>
                                            <ul>
                                                @auth
                                                <!-- habbo export begins -->
                                                <table width="200" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td height="80">
                                                                <div
                                                                    style="position: relative; font-family: Verdana,Arial,Helvetica; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-size-adjust: none; color: white;">
                                                                    <div
                                                                        style="background: transparent url({{ cms_config('site.web.url') }}/images/export/bg.png) no-repeat scroll 0% 50%; height: 80px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">
                                                                        <div
                                                                            style="background: transparent url({{ cms_config('site.avatarimage.url') }}{{ user()->figure }}&gesture=sml&action=std&direction=2&head_direction=2) no-repeat scroll 0pt -10px; float: left; width: 64px; height: 80px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        style="background: transparent url({{ cms_config('site.web.url') }}/images/export/mask.png) no-repeat scroll 0% 50%; position: absolute; top: 0pt; left: 0pt; height: 80px; width: 200px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">
                                                                    </div>
                                                                    <div style="position: absolute; width: 124px; top: 10px; left: 66px;">
                                                                        <span
                                                                            style="border-bottom: 1px dashed white; margin: 0pt 0pt 4px; padding: 0pt 0pt 4px; font-family: Verdana,Arial,Helvetica; font-style: normal; font-variant: normal; font-size: 12px; line-height: normal; font-size-adjust: none; font-weight: bold; float: left;"><a
                                                                                href="{{ url('/') }}/home/{{ user()->username }}?partner=export"
                                                                                style="color: white; text-decoration: none;" target="_self">{{ user()->username }}</a></span>
                                                                        <p style="margin-top: 8px; margin-right: 0pt; margin-bottom: 0pt; text-align: left; clear: left;">
                                                                            {{ user()->motto }}<br></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center"
                                                                style="font-family: Verdana,Arial,Helvetica; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-size-adjust: none; color: black;">
                                                                <a href="{{ url('/') }}/home/{{ user()->username }}?partner=export"
                                                                    style="font-family: Verdana,Arial,Helvetica; font-style: normal; font-variant: normal; font-size: 11px; line-height: normal; font-size-adjust: none; color: rgb(26, 117, 164); font-weight: bold;"
                                                                    target="_self">{{ user()->username }} has a Home on Habbo </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- habbo export ends -->
                                                @endauth
                                            </ul>
                                        </ul>
                                    </ul>
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
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
