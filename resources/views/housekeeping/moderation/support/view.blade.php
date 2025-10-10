@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Help Query')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'support.view'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    @if ($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    <!-- RIGHT CONTENT BLOCK -->
                    <div class="tableborder">
                        <div class="tableheaderalt">
                            Help Query
                        </div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            {{ $ticket }}
                        </table>
                    </div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
