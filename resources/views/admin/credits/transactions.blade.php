@extends('layouts.admin.master', ['menu' => 'users'])

@section('title', 'Transactions Management')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('layouts.admin.users', ['submenu' => 'transactions'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    <form action="" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Transaction Logs</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                              <tr>
                                <td class="tablerow1" width="40%" valign="middle"><strong>User ID</strong>
                                  <div class="graytext">The ID of the user whom's transaction logs you want to view. To look for a User's ID, use <a href="{{ route('admin.users.edituser') }}">the User ID tool</a>.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                  <input type="text" name="user_id" value="" size="30" class="textinput">
                                </td>
                              </tr>
                              <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                  <input type="submit" value="Retrive logs" class="realbutton" accesskey="s">
                                </td>
                              </tr>
                            </table>
                          </div>
                    </form>
                    <br />
                    @if(isset($results))
                    <div class="tableborder">
                    <div class="tableheaderalt">Search Results - {{ $user->username }}</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                          <tr>
                            <td class="tablesubheader" width="20%" align="center">Date</td>
                            <td class="tablesubheader" width="40%" align="center">Data</td>
                            <td class="tablesubheader" width="5%" align="center">Amount</td>
                            <td class="tablesubheader" width="10%" align="center">Action</td>
                            <td class="tablesubheader" width="25%" align="center">Prices</td>
                          </tr>
                          @foreach($results as $log)
                          <tr>
                            <td class="tablerow1" align="center">
                                {{ Carbon\Carbon::parse($log->timestamp)->format('d/m/Y H:i:s') }}
                            </td>
                            <td class="tablerow2" align="center">
                             catalog_id: {{ $log->catalog_id }} \ catalog_name: {{ $log->catalog_name }}
                            </td>
                            <td class="tablerow2" align="center">
                                {{ $log->amount }}
                            </td>
                            <td class="tablerow2" align="center">
                                {{ $log->action }}
                            </td>
                            <td class="tablerow2" align="center">
                               Credits: {{ $log->credits }} / Points: {{ $log->points }} type: {{ $log->points_type }}
                            </td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                    @endif
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
