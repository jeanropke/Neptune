@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Tags')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'moderation.tags'])
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
                    <div class="tableborder">
                        <form action="{{ route('housekeeping.moderation.tags') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                            <div class="tableheaderalt">Search Tags</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Tag</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="70%" valign="middle">
                                        <input type="text" name="tag" value="" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Search" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <br />

                    <div style="text-align: center; vertical-align: middle;">{!! $tags->withQueryString()->links('includes.housekeeping.pagination') !!}</div>
                    <div class="tableborder">
                        <div class="tableheaderalt">Tags Listing</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="30%">Tag</td>
                                <td class="tablesubheader" width="20%" align="center">User/Group/Room</td>
                                <td class="tablesubheader" width="20%" align="center">Amount</td>
                                <td class="tablesubheader" width="15%" align="center">Added at</td>
                                <td class="tablesubheader" width="15%" align="center">Delete</td>
                            </tr>
                            @forelse($tags as $tag)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                    <td class="tablerow2">
                                        <strong><a href="{{ route('housekeeping.moderation.tags', ['tag' => $tag->tag]) }}">{{ $tag->tag }}</a></strong>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ !$tag->amount ? $tag->owner_type . ': ' . ($tag->owner->name ?? $tag->owner->username) : '-' }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $tag->amount ?? '-' }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ !$tag->amount ? $tag->created_at : '-' }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-item" data-id="{{ $tag->tag }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="7" class="tablerow1"><strong>No tags.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <script>
                        GenericManager.initialise('.delete-item', '<p>Are you sure you want to delete this tag from all groups, users ands rooms? This action cannot be undone!</p>', '{{ route('housekeeping.moderation.tags.delete') }}', 'tr');
                    </script>
                    <div style="text-align: center; vertical-align: middle;">{!! $tags->withQueryString()->links('includes.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
