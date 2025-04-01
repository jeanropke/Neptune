@extends('layouts.housekeeping', ['menu' => 'catalogue'])

@section('title', 'Catalogue Page Editor')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.furniture.include.menu', ['submenu' => 'catalogue.edit'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if ($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    <form action="{{ route('housekeeping.furniture.catalogue.pages.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <input name="id" type="text" size="30" value="{{ $page->id }}" hidden>
                        <div class="tableborder">
                            <div class="tableheaderalt">Catalogue Page Editor - {{ $page->name }}</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Order</b>
                                        <div class="graytext">In which position this page will appear.</div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="number" name="order_id" size="30" value="{{ old('order_id') ?? $page->order_id }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Min Role</b>
                                        <div class="graytext">Minimum role to access the page.</div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="number" name="min_role" size="30" value="{{ old('min_role') ?? $page->min_role }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Index Visible</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <select name="index_visible" class="dropdown">
                                            <option value="1" {{ (old('index_visible') ?? $page->index_visible) ? 'selected="selected"' : '' }}>Yes</option>
                                            <option value="0" {{ (old('index_visible') ?? $page->index_visible) ? '' : 'selected="selected"' }}>No</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Club Only</b>
                                        <div class="graytext">Only Habbo Club members can access this page?</div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <select name="is_club_only" class="dropdown">
                                            <option value="1" {{ (old('is_club_only') ?? $page->is_club_only) ? 'selected="selected"' : '' }}>Yes</option>
                                            <option value="0" {{ (old('is_club_only') ?? $page->is_club_only) ? '' : 'selected="selected"' }}>No</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Name Index</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="name_index" size="30" value="{{ old('name_index') ?? $page->name_index }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Link List</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="link_list" size="30" value="{{ old('link_list') ?? $page->link_list }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Name</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="name" size="30" value="{{ old('name') ?? $page->name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Layout</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="layout" size="30" value="{{ old('layout') ?? $page->layout }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Image Headline</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <input type="text" name="image_headline" size="30" value="{{ old('image_headline') ?? $page->image_headline }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Body</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <textarea name="body" cols="80" rows="8">{{ old('body') ?? $page->body }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Label Pick</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <textarea name="label_pick" cols="80" rows="8">{{ old('label_pick') ?? $page->label_pick }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Label Extra S</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <textarea name="label_extra_s" cols="80" rows="8">{{ old('label_extra_s') ?? $page->label_extra_s }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="10%" valign="middle">
                                        <b>Label Extra T</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="40%" valign="middle">
                                        <textarea name="label_extra_t" cols="80" rows="8">{{ old('label_extra_t') ?? $page->label_extra_t }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Save Catalogue Page" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>

@stop
