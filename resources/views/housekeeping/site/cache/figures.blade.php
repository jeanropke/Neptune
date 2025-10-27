@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Cached Figures')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'cache.figures'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    <div class="tableborder">
                        <div class="tableheaderalt">Cached Figures</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="25%" align="center">Name</td>
                                <td class="tablesubheader" width="20%">Size</td>
                                <td class="tablesubheader" width="25%">Modified at</td>
                                <td class="tablesubheader" width="20%">Image</td>
                                <td class="tablesubheader" width="10%" align="center">Delete</td>
                            </tr>
                            @forelse ($figures as $figure)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                    <td class="tablerow2" align="center">
                                        {{ $figure->name }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ round(($figure->size / 1024), 2) }} KB
                                    </td>
                                    <td class="tablerow2">
                                        {{  $figure->last_modified->format('d/m/y H:i:s') }}
                                    </td>
                                    <td class="tablerow2">
                                        <img src="{{ $figure->url }}">
                                    </td>

                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-item" data-id="{{ $figure->name }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="tablerow1" align="center" colspan="9">
                                        <strong>No cached figures.</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <script>
                        GenericManager.initialise('.delete-item', '<p>Are you sure you want to delete this figure? This cannot be undone!</p>', '{{ route('housekeeping.site.cache.figures.delete') }}');
                    </script>
                    <div style="text-align: center; vertical-align: middle;">{!! $figures->withQueryString()->links('includes.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
