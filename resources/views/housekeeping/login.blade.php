<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>
      {{ cms_config('hotel.name.short') }}
    </title>
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Expires" content="Mon, 06 May 1996 04:57:00 GMT" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="/web/housekeeping/styles/style.css" type="text/css" rel="stylesheet" />
  </head>

<body style="background-image:url(./images/blank.gif)">
    <div id="loading-layer" style="display:none">
      <div id="loading-layer-shadow">
        <div id="loading-layer-inner">
          <img src="./images/loading_anim.gif" style="vertical-align:middle" border="0" alt="Loading..." />
          <br />
          <span style="font-weight:bold" id="loading-layer-text">Loading Data. Please Wait...</span>
        </div>
      </div>
    </div>
    <div id="ipdwrapper">
      <!-- IPDWRAPPER -->
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div align="center">
        <div style="width:500px">
          <div class="outerdiv" id="global-outerdiv">
            <!-- OUTERDIV -->
            <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
              <tr>
                <td id="rightblock">
                  <div>
                    <form id="loginform" action="{{ route('housekeeping.account.submit') }}" method="post">
                        @csrf
                      <input type="hidden" name="qstring" value="" />
                      <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                          <td width="200" class="tablerow1" valign="top" style="border:0px;width:200px">
                            <div style="text-align:center;padding-top:20px">
                              <img src="{{ cms_config('site.web.url') }}/housekeeping/images/acp-login-lock.gif" alt="Housekeeping" border="0" />
                            </div>
                            <br />
                            <div class="desctext">
                              <div align="center"><strong>Welcome to Housekeeping</strong></div>
                              <br />
                              <div style="color:gray">Please login with your valid moderator/administrator credentials. This service is monitored 24/7.
                                <br />
                            </div>
                          </td>
                          <td width="300" style="width:300px" valign="top">
                            <table width="100%" cellpadding="5" cellspacing="0" border="0">
                              <tr>
                                <td colspan="2" align="center">
                                  <br />
                                  <img src="{{ cms_config('site.web.url') }}/housekeeping/images/cms-logo.png" alt="{{ config('cms.name') }}">
                                  @if ($errors->any())
                                  <div style="font-weight:bold;color:red">{{ $errors->first() }}</div>
                                  @endif
                                  <br />
                                </td>
                              </tr>
                              <tr>
                                <td align="right"><strong>User Name</strong></td>
                                <td>
                                  <input style="border:1px solid #AAA; font-size:12px" type="text" size="20" name="username" id="namefield" value="" />
                                </td>
                              </tr>
                              <tr>
                                <td align="right"><strong>Password</strong></td>
                                <td>
                                  <input style="border:1px solid #AAA; font-size:12px" type="password" size="20" name="password" value="" />
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2" align="center">
                                  <input type="submit" name="submit" style="border:1px solid #AAA; font-size:12px" value="Log In" />
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                  <br />
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </form>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <!-- / OUTERDIV -->
        </div>
      </div>
      <script type="text/javascript">
      <!--
      if (top.location != self.location) {
        top.location = self.location
      }

      try {
        window.onload = function() {
          document.getElementById('namefield').focus();
        }
      } catch (error) {
        alert(error);
      }

      //-->
      </script>
