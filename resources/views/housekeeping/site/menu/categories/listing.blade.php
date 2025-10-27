@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Main Categories')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'menu.categories.listing'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif

                    <div class="tableborder">
                        <div class="tableheaderalt">Listing Main Categories</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="25%">Caption</td>
                                <td class="tablesubheader" width="20%" align="center">Icon</td>
                                <td class="tablesubheader" width="20%" align="center">Url</td>
                                <td class="tablesubheader" width="5%" align="center">Order</td>
                                <td class="tablesubheader" width="5%" align="center">Min Rank</td>
                                <td class="tablesubheader" width="5%" align="center">Visible</td>
                                <td class="tablesubheader" width="5%" align="center">Sub Menus</td>
                                <td class="tablesubheader" width="5%" align="center">Edit</td>
                                <td class="tablesubheader" width="5%" align="center">Delete</td>
                            </tr>
                            @forelse($categories as $category)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                    <td class="tablerow1" align="center">
                                        {{ $category->id }}
                                    </td>
                                    <td class="tablerow2">
                                        <strong>{{ $category->caption }}</strong>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $category->icon }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $category->url }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $category->order_num }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $category->min_rank }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $category->visible ? 'Yes' : 'No' }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $category->submenus->count() }} - <a href="{{ route('housekeeping.site.menu.subcategories.listing') }}?parent_id={{ $category->id }}">See them</a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.site.menu.categories.edit', $category->id) }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-categories" data-id="{{ $category->id }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="6" class="tablerow1"><strong>No categories.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                        <div class="tablefooter" align="center">
                            <div class="fauxbutton-wrapper"><span class="fauxbutton"><a href="{{ route('housekeeping.site.menu.categories.create') }}">Create New Category</a></span></div>
                        </div>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $categories->withQueryString()->links('includes.housekeeping.pagination') !!}</div>
                    <script>
                        GenericManager.initialise('.delete-categories', '<p>Are you sure you want to delete this category? This cannot be undone!</p>', '{{ route('housekeeping.site.menu.categories.delete') }}', 'tr');
                    </script>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
