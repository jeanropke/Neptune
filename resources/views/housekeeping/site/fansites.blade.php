@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Fansites Configuration')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'fansites'])
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
                    <form action="{{ route('housekeeping.site.fansites.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">{{ isset($fansite) ? 'Edit' : 'Add' }} Fansite</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                @if (isset($fansite))
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>ID</b>
                                            <div class="graytext"></div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="number" name="id" value="{{ isset($fansite) ? $fansite->id : '' }}" size="50" class="textinput" readonly>
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Name</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="name" value="{{ isset($fansite) ? $fansite->name : old('name') }}" size="50" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Description</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="description" cols="50" rows="5">{{ isset($fansite) ? $fansite->description : old('description') }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>URL</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="url" value="{{ isset($fansite) ? $fansite->url : old('url') }}" size="50" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Image URL</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="image" value="{{ isset($fansite) ? $fansite->image : old('image') }}" size="50" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Save Fansite" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />
                    <div class="tableborder">
                        <div class="tableheaderalt">Fansites</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="5%" align="center">ID</td>
                                <td class="tablesubheader" width="10%">Name</td>
                                <td class="tablesubheader" width="25%">Description</td>
                                <td class="tablesubheader" width="20%">URL</td>
                                <td class="tablesubheader" width="20%">Image</td>
                                <td class="tablesubheader" width="20%">Created by</td>
                                <td class="tablesubheader" width="5%" align="center">Edit</td>
                                <td class="tablesubheader" width="5%" align="center">Delete</td>
                            </tr>
                            @forelse ($fansites as $fansite)
                                <tr>
                                    <td class="tablerow2" align="center">
                                        {{ $fansite->id }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $fansite->name }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $fansite->description }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $fansite->url }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $fansite->image }}
                                    </td>
                                    <td class="tablerow2">
                                        {{ $fansite->getUser()->username }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.site.fansites.edit', $fansite->id) }}">
                                            <img src="{{ cms_config('site.web.url') }}/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-item" data-id="{{ $fansite->id }}">
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
                    </div>
                    <script>
                        GenericManager.initialise('.delete-item', '<p>Are you sure you want to delete this fansite? This cannot be undone!</p>',
                            '{{ route('housekeeping.site.fansites.delete') }}');
                    </script>
                    <div style="text-align: center; vertical-align: middle;">{!! $fansites->withQueryString()->links('layouts.housekeeping.pagination') !!}</div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
