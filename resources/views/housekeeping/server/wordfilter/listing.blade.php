@extends('layouts.housekeeping', ['menu' => 'server'])

@section('title', 'Wordfilter Options')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.server.include.menu', ['submenu' => 'wordfilter'])
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
                        <form action="{{ route('housekeeping.server.wordfilter') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                            <div class="tableheaderalt">Search Wordfilter</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Word</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="70%" valign="middle">
                                        <input type="text" name="word" value="" size="30" class="textinput">
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

                    <div style="text-align: center; vertical-align: middle;">{!! $words->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                    <div class="tableborder">
                        <div class="tableheaderalt">Wordfilter Options</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="30%">Word</td>
                                <td class="tablesubheader" width="20%" align="center">Bannable</td>
                                <td class="tablesubheader" width="20%" align="center">Filterable</td>
                                <td class="tablesubheader" width="15%" align="center">Edit</td>
                                <td class="tablesubheader" width="15%" align="center">Delete</td>
                            </tr>
                            @forelse($words as $w)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                    <td class="tablerow2">
                                        <strong>{{ $w->word }}</strong>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $w->is_bannable ? 'yes' : 'no' }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $w->is_filterable ? 'yes' : 'no' }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.server.wordfilter.edit', $w->id) }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-item" data-id="{{ $w->id }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="7" class="tablerow1"><strong>No words added.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                        <div class="tablefooter" align="center">
                            <div class="fauxbutton-wrapper">
                                <span class="fauxbutton">
                                    <a href="{{ route('housekeeping.server.wordfilter.new') }}">Add New Word</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <script>
                        GenericManager.initialise('.delete-item', '<p>Are you sure you want to delete this wordfilter? This cannot be undone!</p>',
                            '{{ route('housekeeping.server.wordfilter.delete') }}', 'tr');
                    </script>
                    <div style="text-align: center; vertical-align: middle;">{!! $words->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
