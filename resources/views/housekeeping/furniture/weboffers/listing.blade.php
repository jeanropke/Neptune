@extends('layouts.housekeeping', ['menu' => 'catalogue'])

@section('title', 'Web Offers')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.furniture.include.menu', ['submenu' => 'furniture.weboffers'])
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
                        <form action="{{ route('housekeeping.furniture.weboffers') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                            <div class="tableheaderalt">Search Web Offer</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Name or Sale code</b>
                                        <div class="graytext">The name or sale code of the offer</div>
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
                        <div class="tableheaderalt">Web Offers</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="25%" align="center">Sale code</td>
                                <td class="tablesubheader" width="25%">Name</td>
                                <td class="tablesubheader" width="25%">Items</td>
                                <td class="tablesubheader" width="5%">Price</td>
                                <td class="tablesubheader" width="5%">Enabled</td>
                                <td class="tablesubheader" width="5%" align="center">Edit</td>
                                <td class="tablesubheader" width="5%" align="center">Delete</td>
                            </tr>
                            @forelse ($offers as $offer)
                                <tr>
                                    <td class="tablerow2" align="center">
                                        {{ $offer->id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $offer->salecode }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $offer->name }}
                                    </td>
                                    <td class="tablerow2" id="furni-picked">
                                        @foreach ($offer->getItems() as $item)
                                            <div class="slot" data-item-id="{{ $item->id }}">
                                                <div class="image" style="background-image: url({{ cms_config('furni.small.url') }}/{{ $item->getNormalizedName() }}_icon.png)"></div>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="tablerow2">
                                        {{ $offer->price }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $offer->enabled ? 'Yes' : 'No' }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.furniture.weboffers.edit', $offer->id) }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-offer" data-id="{{ $offer->id }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="tablerow1" align="center" colspan="9">
                                        <strong>No offers found.</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                        <div class="tablefooter" align="center">
                            <div class="fauxbutton-wrapper"><span class="fauxbutton"><a href="{{ route('housekeeping.furniture.weboffers.add') }}">Create New Item</a></span></div>
                        </div>
                    </div>
                    <script>
                        GenericManager.initialise('.delete-offer', '<p>Are you sure you want to delete this web offer? This cannot be undone!</p>', '{{ route('housekeeping.furniture.weboffers.delete') }}');
                    </script>
                    <div style="text-align: center; vertical-align: middle;">{!! $offers->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
