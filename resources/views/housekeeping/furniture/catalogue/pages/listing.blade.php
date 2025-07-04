@extends('layouts.housekeeping', ['menu' => 'catalogue'])

@section('title', 'Catalogue Pages')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.furniture.include.menu', ['submenu' => 'catalogue.pages'])
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
                        <form action="{{ route('housekeeping.furniture.catalogue.pages') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                            <div class="tableheaderalt">Search Catalogue Page</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Page name</b>
                                        <div class="graytext">The name of the catalogue page</div>
                                    </td>
                                    <td class="tablerow2" width="70%" valign="middle">
                                        <input type="text" name="name" value="" size="30" class="textinput">
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
                    <div class="tableborder">
                        <div class="tableheaderalt">Catalogue Pages</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="5%" align="center">Order</td>
                                <td class="tablesubheader" width="15%">Name</td>
                                <td class="tablesubheader" width="15%">Layout</td>
                                <td class="tablesubheader" width="20%">Headline</td>
                                <td class="tablesubheader" width="20%">Teasers</td>
                                <td class="tablesubheader" width="10%">Furniture</td>
                                <td class="tablesubheader" width="5%" align="center">Edit</td>
                                <td class="tablesubheader" width="5%" align="center">Delete</td>
                            </tr>
                            @forelse ($pages as $page)
                                <tr>
                                    <td class="tablerow2" align="center">
                                        {{ $page->id }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $page->order_id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $page->name }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $page->layout }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $page->image_headline }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $page->image_teasers }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $page->items->count() }} furnis - <a
                                            href="{{ route('housekeeping.furniture.catalogue.items') }}?page_id={{ $page->id }}"><i>See them</i></a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.furniture.catalogue.pages.edit', $page->id) }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-cataloguepage" data-id="{{ $page->id }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="tablerow1" align="center" colspan="9">
                                        <strong>No catalogue pages.</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                        <div class="tablefooter" align="center">
                            <div class="fauxbutton-wrapper"><span class="fauxbutton"><a href="{{ route('housekeeping.furniture.catalogue.pages.add') }}">Create New Page</a></span>
                            </div>
                        </div>
                    </div>
                    <script>
                        GenericManager.initialise('.delete-cataloguepage', '<p>Are you sure you want to delete this catalogue page? This cannot be undone!</p>',
                            '{{ route('housekeeping.furniture.catalogue.pages.delete') }}', 'tr');
                    </script>

                    <div style="text-align: center; vertical-align: middle;">{!! $pages->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
