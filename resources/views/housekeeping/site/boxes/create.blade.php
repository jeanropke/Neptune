@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Create New Box')

@section('content')
@include('includes.housekeeping.tinymce')

<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('housekeeping.site.include.menu', ['submenu' => 'boxes.create'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if($errors->any())
                <p><strong>{{ $errors->first() }}</strong></p>
                @endif
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <form action="{{ route('housekeeping.site.boxes.create.save') }}" method="post" name="theAdminForm"
                    id="theAdminForm" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Create Box</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Title</b>
                                    <div class="graytext">The full title of the new box.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="title" value="{{ old('title') }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Content</b>
                                    <div class="graytext">The content of the new box.
                                        <br />HTML is allowed here.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <textarea name="content" cols="60" rows="5" wrap="soft" id="article"
                                        class="multitext">{{ old('content') }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Requirement</b>
                                    <div class="graytext">Who can see this box</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="requirement" class="textinput" style="margin-top: 5px;" size="1">
                                        <option value="guest">Only guest users</option>
                                        <option value="auth">Only logged users</option>
                                        <option value="both" selected>Both</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Create Box" class="realbutton" accesskey="s">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br />
            </div>
        </td>
    </tr>
</table>
@stop
