@extends('layouts.housekeeping', ['menu' => 'catalogue'])

@section('title', 'Items Definitions')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.furniture.include.menu', ['submenu' => 'furniture.items'])
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
                        <form action="{{ route('housekeeping.furniture.items') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                            <div class="tableheaderalt">Search Item Definition</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Name or Sprite</b>
                                        <div class="graytext">The name or sprite of the item</div>
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
                        <div class="tableheaderalt">Items Definitions</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="5%" align="center">Sprite</td>
                                <td class="tablesubheader" width="5%">Sprite ID</td>
                                <td class="tablesubheader" width="15%">Name</td>
                                <td class="tablesubheader" width="25%">Description</td>
                                <td class="tablesubheader" width="25%">Behaviour</td>
                                <td class="tablesubheader" width="10%">Interactor</td>
                                <td class="tablesubheader" width="5%" align="center">Edit</td>
                                <td class="tablesubheader" width="5%" align="center">Delete</td>
                            </tr>
                            @forelse ($items as $item)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                    <td class="tablerow2" align="center">
                                        {{ $item->id }}
                                    </td>
                                    <td class="tablerow1" align="center">
                                        {{ $item->sprite }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $item->sprite_id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $item->name }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $item->description }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $item->behaviour }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $item->interactor }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.furniture.items.edit', $item->id) }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-item" data-id="{{ $item->id }}">
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
                            <div class="fauxbutton-wrapper"><span class="fauxbutton"><a href="{{ route('housekeeping.furniture.items.add') }}">Create New Item</a></span></div>
                        </div>
                    </div>
                    <script>
                        GenericManager.initialise('.delete-item', '<p>Are you sure you want to delete this item definition? This cannot be undone!</p>', '{{ route('housekeeping.furniture.items.delete') }}', 'tr');
                    </script>
                    <div style="text-align: center; vertical-align: middle;">{!! $items->withQueryString()->links('includes.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
