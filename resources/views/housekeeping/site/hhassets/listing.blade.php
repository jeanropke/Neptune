@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Habbo Home Assets')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'hh_assets.listing'])
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
                    <form action="{{ route('housekeeping.site.hh_assets.listing') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        <div class="tableborder">
                            <div class="tableheaderalt">Create New Habbo Home Asset</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Class or Path</b></td>
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
                        <div class="tableheaderalt">Habbo Home Assets</div>
                        <table cellpadding="4" cellspacing="0" width="100%" class="listing">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="15%">Class</td>
                                <td class="tablesubheader" width="40%">Path</td>
                                <td class="tablesubheader" width="10%" align="center">Type</td>
                                <td class="tablesubheader" width="5%" align="center">Width</td>
                                <td class="tablesubheader" width="5%" align="center">Height</td>
                                <td class="tablesubheader" width="10%" align="center">Edit</td>
                                <td class="tablesubheader" width="10%" align="center">Delete</td>
                            </tr>
                            @forelse($assets as $asset)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                    <td class="tablerow1" align="center">
                                        {{ $asset->id }}
                                    </td>
                                    <td class="tablerow2">
                                        <strong class="tooltip">
                                            {{ $asset->class }}
                                            @if ($asset->type == 's')
                                                <img src="{{ cms_config('site.c_images.url') }}/stickers/{{ $asset->path }}" class="tooltip-image">
                                            @else
                                                <img src="{{ cms_config('site.c_images.url') }}/backgrounds2/{{ $asset->path }}" class="tooltip-image background">
                                            @endif
                                        </strong>
                                    </td>
                                    <td class="tablerow2">
                                        {{ $asset->path }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $asset->getType() }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $asset->width }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $asset->height }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.site.hh_assets.edit', $asset->id) }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-box" data-id="{{ $asset->id }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="6" class="tablerow1"><strong>No Habbo Home assets.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                        <div class="tablefooter" align="center">
                            <div class="fauxbutton-wrapper"><span class="fauxbutton"><a href="{{ route('housekeeping.site.hh_assets.create') }}">Add New Habbo Home Asset</a></span>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $assets->withQueryString()->links('includes.housekeeping.pagination') !!}</div>
                    <script>
                        GenericManager.initialise('.delete-box', '<p>Are you sure you want to delete Habbo Home asset? This cannot be undone!</p>',
                            '{{ route('housekeeping.site.hh_assets.delete') }}', 'tr');
                    </script>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
