@extends('layouts.housekeeping', ['menu' => 'catalogue'])

@section('title', 'Catalogue Items')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.furniture.include.menu', ['submenu' => 'catalogue.items'])
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
                        <form action="{{ route('housekeeping.furniture.catalogue.items') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                            <div class="tableheaderalt">Search Catalogue Item</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Name, Sale code or Package</b>
                                        <div class="graytext">The name, sale code or package of the item</div>
                                    </td>
                                    <td class="tablerow2" width="70%" valign="middle">
                                        <input type="text" name="value" value="" size="30" class="textinput">
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
                        <div class="tableheaderalt">Catalogue Items
                        </div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="5%" align="center">Order</td>
                                <td class="tablesubheader" width="15%">Sale Code</td>
                                <td class="tablesubheader" width="15%">Name / Package Name</td>
                                <td class="tablesubheader" width="20%">Description / Package Description</td>
                                <td class="tablesubheader" width="20%">Price</td>
                                <td class="tablesubheader" width="10%">Definition ID</td>
                                <td class="tablesubheader" width="5%" align="center">Edit</td>
                                <td class="tablesubheader" width="5%" align="center">Delete</td>
                            </tr>
                            @forelse ($items as $item)
                                <tr>
                                    <td class="tablerow2" align="center">
                                        {{ $item->id }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $item->order_id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $item->sale_code }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $item->getName() }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $item->getDescription() }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $item->price }}
                                    </td>
                                    <td class="tablerow2">
                                        @if ($item->package)
                                             {{ $item->package->id }} - <a href="{{ route('housekeeping.furniture.catalogue.packages.edit', $item->package->id)}}"><i>See package</i></a>
                                        @else
                                            {{ $item->definition_id }} - <a href="{{ route('housekeeping.furniture.items.edit', $item->definition_id) }}"><i>See item</i></a>
                                        @endif
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.furniture.catalogue.items.edit', $item->id) }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-catalogueitem" data-id="{{ $item->id }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="tablerow1" align="center" colspan="9">
                                        <strong>No items found.</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                        <div class="tablefooter" align="center">
                            <div class="fauxbutton-wrapper"><span class="fauxbutton"><a href="{{ route('housekeeping.furniture.catalogue.items.add') }}">Create New Item</a></span></div>
                        </div>
                    </div>
                    <script>
                        GenericManager.initialise('.delete-catalogueitem', '<p>Are you sure you want to delete this catalogue item? This cannot be undone!</p>', '{{ route('housekeeping.furniture.catalogue.items.delete') }}');
                    </script>
                    <div style="text-align: center; vertical-align: middle;">{!! $items->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
