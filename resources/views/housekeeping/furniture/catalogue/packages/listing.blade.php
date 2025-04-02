@extends('layouts.housekeeping', ['menu' => 'catalogue'])

@section('title', 'Catalogue Packages')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.furniture.include.menu', ['submenu' => 'catalogue.packages'])
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
                        <form action="{{ route('housekeeping.furniture.catalogue.packages') }}" method="get" name="theAdminForm" id="theAdminForm" autocomplete="off">
                            <div class="tableheaderalt">Search Catalogue Item</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>Package Sale Code</b>
                                        <div class="graytext">The sale code of package</div>
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
                        <div class="tableheaderalt">Catalogue Packages
                        </div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="15%" align="center">ID</td>
                                <td class="tablesubheader" width="35%">Sale Code</td>
                                <td class="tablesubheader" width="10%">Definition ID</td>
                                <td class="tablesubheader" width="10%">Special Definition ID</td>
                                <td class="tablesubheader" width="10%">Amount</td>
                                <td class="tablesubheader" width="10%" align="center">Edit</td>
                                <td class="tablesubheader" width="10%" align="center">Delete</td>
                            </tr>
                            @forelse ($packages as $package)
                                <tr>
                                    <td class="tablerow2" align="center">
                                        {{ $package->id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $package->salecode }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $package->definition_id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $package->special_sprite_id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $package->amount }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.furniture.catalogue.packages.edit', $package->id) }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-cataloguepackage" data-id="{{ $package->id }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="tablerow1" align="center" colspan="4">
                                        <strong>No logs.</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                        <div class="tablefooter" align="center">
                            <div class="fauxbutton-wrapper"><span class="fauxbutton"><a href="{{ route('housekeeping.furniture.catalogue.packages.add') }}">Create New Package</a></span></div>
                        </div>
                    </div>
                    <script>
                        GenericManager.initialise('.delete-cataloguepackage', '<p>Are you sure you want to delete this catalogue package? This cannot be undone!</p>', '{{ route('housekeeping.furniture.catalogue.packages.delete') }}');
                    </script>
                    <div style="text-align: center; vertical-align: middle;">{!! $packages->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
