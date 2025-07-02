@extends('layouts.login')
@section('title', cms_config('hotel.name.short') . ' Help Tool')
@section('content')
<link href="{{ cms_config('site.web.url') }}/styles/style-iot.css" type="text/css" rel="stylesheet">
<div id="main-content-process">
    <div style="height: 4px;"></div>
    <div style="height: 18px; padding: 0 0 0 12px;">&nbsp;</div>
    <div class="portlet">
     <div class="portlet-top-process"><div class="portlet-process-header">&nbsp;</div></div>
     <div class="portlet-body-process">
     <div class="imaindiv">
  <form method="post" action="go"><input type="hidden" name="sid" value="51"><table border="0" cellspacing="0" cellpadding="0" class="ihead">
   <tbody><tr>
    <td class="icon"><img src="/web/20071012231314im_/http://www.habbohotel.com/iot/header_images/Western2/1.gif" alt=" " width="47" height="37"></td>
    <td class="text"><h2>What do you need help with?</h2>
     </td>

   </tr>
  </tbody></table>
  <br>

  <table border="0" cellspacing="0" cellpadding="0" class="content-table">
   <tbody><tr>
    <td>
     <div class="iinfodiv">
      To search our FAQs, please type your question here.
  <p>If you need help from a real person email our Player Support Team using the link below.
  </p><p><b>Note: use the link below if you are having problems registering, or if you need a new password.<br><br>
      <textarea name="text" class="imessageform"></textarea>
     </b></p></div><b>
    <br>
     <div align="center">
     <table height="21" border="0" cellpadding="0" cellspacing="0" class="button">
      <tbody><tr><td class="button-left-side"></td><td class="middle"><button type="submit" name="submit" class="proceedbutton">Search FAQs</button></td><td class="button-right-side-arrow"></td></tr>
     </tbody></table>
     </div>
   <br>
    <div class="iinfodiv">

    <a href="?event=Continue&amp;sid=51">Email us</a><br>
    </div>
    </b></td>
   </tr>
  </tbody></table>
  </form>
     </div>
     </div>
     <div class="portlet-bottom-process"></div>
    </div>
   </div>
@stop
