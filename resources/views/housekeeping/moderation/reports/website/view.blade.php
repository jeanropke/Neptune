@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'View Website Report')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'users.edit'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if ($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    <form action="{{ route('housekeeping.moderation.reports.website.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <input name="id" type="text" size="30" value="{{ $report->id }}" hidden>
                        <div class="tableborder">
                            <div class="tableheaderalt">View Website Report #{{ $report->id }}</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Reported by</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        {{ $report->getUsername() }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Report Type</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        {{ $report->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Object Author</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        {{ $report->getObjectAuthor() }} - <a href="{{ route('housekeeping.moderation.remote.ban') }}?username={{ $report->getObjectAuthor() }}">Remote ban</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Object Message</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        {!! $report->getObjectMessage() !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Hide Message</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <a href="#" id="hide-message" data-id="{{ $report->id }}">Hide</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Close Report" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <script>
                        GenericManager.initialise('#hide-message', '<p>Are you sure you want to hide this message?</p>', '{{ route('housekeeping.moderation.reports.website.hide') }}');
                    </script>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>

@stop
