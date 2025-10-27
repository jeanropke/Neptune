@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Edit Boxes')

@section('content')
    @include('includes.housekeeping.tinymce')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'boxes.edit'])
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
                    <form action="{{ route('housekeeping.site.boxes.edit.save') }}" method="post" name="theAdminForm" id="theAdminForm">
                        {{ csrf_field() }}
                        <input type="number" name="id" value="{{ $box->id }}" hidden>
                        <div class="tableborder">
                            <div class="tableheaderalt">Edit Box</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Title</b>
                                        <div class="graytext">The full title of the new box.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="title" value="{{ old('title') ?? $box->title }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Content</b>
                                        <div class="graytext">The content of the new box.
                                            <br />HTML is allowed here.
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="content" cols="60" rows="5" wrap="soft" id="article" class="multitext">{{ old('content') ?? $box->content }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Requirement</b>
                                        <div class="graytext">Who can see this box</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="requirement" class="textinput" style="margin-top: 5px;" size="1">
                                            <option value="guest" {{ $box->requirement == 'guest' ? 'selected' : '' }}>Only guest users</option>
                                            <option value="auth" {{ $box->requirement == 'auth' ? 'selected' : '' }}>Only logged users</option>
                                            <option value="both" {{ $box->requirement == 'both' ? 'selected' : '' }}>Both</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Save Box" class="realbutton" accesskey="s">
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
