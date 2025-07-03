@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Habbo Home Guestbooks Messages')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'hh_moderation.guestbook'])
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
                    <form action="{{ route('housekeeping.moderation.homes.guestbook') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        <div class="tableborder">
                            <div class="tableheaderalt">Search Message</div>
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
                        <div class="tableheaderalt">Guestbook Messages</div>
                        <table cellpadding="4" cellspacing="0" width="100%" class="listing">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="35%">Message</td>
                                <td class="tablesubheader" width="10%">Author</td>
                                <td class="tablesubheader" width="10%">Home Owner</td>
                                <td class="tablesubheader" width="15%" align="center">Posted at</td>
                                <td class="tablesubheader" width="10%" align="center">Deleted by</td>
                                <td class="tablesubheader" width="15%" align="center">Action</td>
                            </tr>
                            @forelse($messages as $message)
                                <tr data-id="{{ $message->id }}" class="{{ $loop->index % 2 == 0 ? 'even' : '' }}">
                                    <td class="tablerow1" align="center">
                                        {{ $message->id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $message->message }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $message->author->username }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $message->getHomeOwner()->username }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $message->created_at->format('M j, Y h:i:s A') }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $message->deletedBy?->username }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.moderation.remote.ban') }}?username={ $message->getAuthor()->username }}">Remote ban</a> -
                                        @if ($message->deletedBy)
                                            <span class="restore-message" data-id="{{ $message->id }}">Restore</span>
                                        @else
                                            <span class="delete-message" data-id="{{ $message->id }}">Delete</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="7" class="tablerow1"><strong>No guestbook messages.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <script>
                        GenericManager.useFadeout = false;
                        GenericManager.initialise('.delete-message', '<p>Are you sure you want to delete this message? The message will be hidden!</p>', '{{ route('housekeeping.moderation.homes.guestbook.delete') }}');
                        GenericManager.initialise('.restore-message', '<p>Are you sure you want to restore this message?</p>', '{{ route('housekeeping.moderation.homes.guestbook.restore') }}');
                    </script>
                    <div style="text-align: center; vertical-align: middle;">{!! $messages->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
