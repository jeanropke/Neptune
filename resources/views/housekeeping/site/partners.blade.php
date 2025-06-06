@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Partners Configuration')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'partners'])
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
                    <form action="{{ route('housekeeping.site.partners.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">{{ isset($partner) ? 'Edit' : 'Create' }} Partner</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                @if (isset($partner))
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>ID</b>
                                            <div class="graytext"></div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="number" name="id" value="{{ isset($partner) ? $partner->id : '' }}" size="50" class="textinput" readonly>
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Title</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="title" value="{{ isset($partner) ? $partner->title : '' }}" size="50" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Description</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="description" value="{{ isset($partner) ? $partner->description : '' }}" size="50" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>URL</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="url" value="{{ isset($partner) ? $partner->url : '' }}" size="50" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Image URL</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="image" value="{{ isset($partner) ? $partner->image : '' }}" size="50" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Order</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="number" name="order_num" value="{{ isset($partner) ? $partner->order_num : '' }}" size="50" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Enabled</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="enabled" class="dropdown">
                                            <option value="1" {{ (isset($partner) ? $partner->enabled : false) ? 'selected="selected"' : '' }}>Enabled</option>
                                            <option value="0" {{ (isset($partner) ? $partner->enabled : false) ? '' : 'selected="selected"' }}>Disabled</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Save Partner" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />
                    <div class="tableborder">
                        <div class="tableheaderalt">Partners</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="10%">Title</td>
                                <td class="tablesubheader" width="25%">Description</td>
                                <td class="tablesubheader" width="20%">URL</td>
                                <td class="tablesubheader" width="20%">Image</td>
                                <td class="tablesubheader" width="5%">Order</td>
                                <td class="tablesubheader" width="5%">Enabled</td>
                                <td class="tablesubheader" width="5%" align="center">Edit</td>
                                <td class="tablesubheader" width="5%" align="center">Delete</td>
                            </tr>
                            @forelse ($partners as $partner)
                                <tr>
                                    <td class="tablerow2" align="center">
                                        {{ $partner->id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $partner->title }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $partner->description }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $partner->url }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $partner->image }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $partner->order_num }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $partner->enabled ? 'Yes' : 'No' }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.site.partners.edit', $partner->id) }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-item" data-id="{{ $partner->id }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/delete.gif" alt="Delete">
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
                    </div>
                    <script>
                        GenericManager.initialise('.delete-item', '<p>Are you sure you want to delete this partner? This cannot be undone!</p>',
                            '{{ route('housekeeping.site.partners.delete') }}');
                    </script>
                    <div style="text-align: center; vertical-align: middle;">{!! $partners->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
