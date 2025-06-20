@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Habbo Home Guestbooks Messages')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'hh_moderation.stickies'])
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
                    <form action="{{ route('housekeeping.moderation.homes.stickies') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        <div class="tableborder">
                            <div class="tableheaderalt">Search Stickies</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Message</b></td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="q" value="{{ request()->q }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Search" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />
                    <div class="tableborder">
                        <div class="tableheaderalt">Stickies</div>
                        <table cellpadding="4" cellspacing="0" width="100%" class="listing">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="65%">Message</td>
                                <td class="tablesubheader" width="10%">Author</td>
                                <td class="tablesubheader" width="10%" align="center">Deleted by</td>
                                <td class="tablesubheader" width="10%" align="center">Action</td>
                            </tr>
                            @forelse($stickies as $stickie)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : '' }}">
                                    <td class="tablerow1" align="center">
                                        {{ $stickie->id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $stickie->data }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $stickie->getOwner()->username }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $stickie->getDeletedBy() ? $stickie->getDeletedBy()->username : '' }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.moderation.remote.ban') }}?username={{ $stickie->getOwner()->username }}">Remote ban</a> -
                                        @if ($stickie->getDeletedBy())
                                            <span class="restore-stickie" data-id="{{ $stickie->id }}">Restore</span>
                                        @else
                                            <span class="delete-stickie" data-id="{{ $stickie->id }}">Delete</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="5" class="tablerow1"><strong>No stickies messages.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <script>
                        GenericManager.initialise('.delete-stickie', '<p>Are you sure you want to delete this stickie? The stickie will be hidden!</p>', '{{ route('housekeeping.moderation.homes.stickies.delete') }}');
                        GenericManager.initialise('.restore-stickie', '<p>Are you sure you want to restore this stickie?</p>', '{{ route('housekeeping.moderation.homes.stickies.restore') }}');
                    </script>
                    <div style="text-align: center; vertical-align: middle;">{!! $stickies->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
