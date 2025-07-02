@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Sub Categories')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'menu.subcategories.listing'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif

                    <div class="tableborder">
                        <div class="tableheaderalt">Listing Sub Categories</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="5%" align="center">Parent ID</td>
                                <td class="tablesubheader" width="30%">Caption</td>
                                <td class="tablesubheader" width="20%" align="center">Url</td>
                                <td class="tablesubheader" width="5%" align="center">Order</td>
                                <td class="tablesubheader" width="5%" align="center">Min Rank</td>
                                <td class="tablesubheader" width="5%" align="center">Edit</td>
                                <td class="tablesubheader" width="5%" align="center">Delete</td>
                            </tr>
                            @forelse($subcategories as $subcategory)
                                <tr>
                                    <td class="tablerow1" align="center">
                                        {{ $subcategory->id }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $subcategory->parent_id }}
                                    </td>
                                    <td class="tablerow2">
                                        <strong>{{ $subcategory->caption }}</strong>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $subcategory->url }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $subcategory->order_num }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $subcategory->min_rank }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.site.menu.subcategories.edit', $subcategory->id) }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-subcategory" data-id="{{ $subcategory->id }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="8" class="tablerow1"><strong>No subcategories.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                        <div class="tablefooter" align="center">
                            <div class="fauxbutton-wrapper"><span class="fauxbutton"><a href="{{ route('housekeeping.site.menu.subcategories.create') }}">Create New Subcategory</a></span></div>
                        </div>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">{!! $subcategories->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                    <script>
                        GenericManager.initialise('.delete-subcategory', '<p>Are you sure you want to delete this sub category? This cannot be undone!</p>', '{{ route('housekeeping.site.menu.subcategories.delete') }}');
                    </script>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
