@extends('layouts.admin.master', ['menu' => 'server'])

@section('title', 'Server Startup')

@section('content')

<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.server', ['submenu' => 'server_startup'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif

                <div class="tableborder">
                    <div class="tableheaderalt">Server Startup</div>
                    <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                        @if($isOnline)
                        <tr>
                            <td>
                                Server is online
                            </td>
                        </tr>
                        @else
                        <form action="{{ route('admin.server.startup') }}" method="POST">
                            {{ csrf_field() }}
                            <tr>
                                <td>
                                    Server is offline
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Turn on" class="realbutton" accesskey="s">
                                </td>
                            </tr>
                        <form>
                        @endif
                    </table>
                </div>
                <br />
            </div>
        </td>
    </tr>
</table>
@stop
