@extends('layouts.admin.master', ['menu' => 'server'])

@section('title', 'Texts Override')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.server', ['submenu' => 'texts_override'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <b>DO NOT GENERATE CONSTANTLY.</b>
                <form action="{{ route('admin.server.texts.generate') }}" method="post" name="theAdminForm"
                    id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Texts Override</div>
                        <div style="text-align: center; vertical-align: middle;">
                            {!! $texts->links('layouts.admin.pagination') !!}</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tbody>
                                <tr>
                                    <td class="tablesubheader" width="35%">Key</td>
                                    <td class="tablesubheader" width="35%" align="center">Value</td>
                                    <td class="tablesubheader" width="15%" align="center">Edit</td>
                                    <td class="tablesubheader" width="15%" align="center">Delete</td>
                                </tr>
                                @foreach ($texts as $text)
                                <tr>
                                    <td class="tablerow2">
                                        <strong>{{ $text->key }}</strong>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $text->value }}
                                    </td>
                                    <td class="tablerow2" align="center"><a
                                            href="{{ route('admin.server.texts.edit', $text->key) }}"><img
                                                src="{{ url('/') }}/web/admin/images/edit.gif" alt="Edit"></a></td>
                                    <td class="tablerow2" align="center"><a
                                            href="{{ route('admin.server.texts.delete', $text->key) }}"><img
                                                src="{{ url('/') }}/web/admin/images/delete.gif" alt="Delete"></a></td>

                                </tr>
                                @endforeach

                                <tr>
                                    <td align="center" class="tablesubheader" colspan="4">
                                        <input type="submit" value="Generate" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <br />

                @if($errors->any())
                <p><strong>{{ $errors->first() }}</strong></p>
                @endif
                <form action="{{ route('admin.server.texts.add') }}" method="post" name="theAdminForm"
                    id="theAdminForm" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Add New Text</div>

                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tbody>

                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Text Key</b>
                                        <div class="graytext">Must be unique or will be replaced</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="new_text_key" value="{{ $edit->key ?? '' }}" size="59"
                                            class="textinput" {{$edit ? 'readonly' : '' }} >
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Text Value</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="new_text_value" cols="60" rows="5" wrap="soft" id="sub_desc"
                                            class="multitext">{{ $edit->value ?? '' }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="4">
                                        <input type="submit" value="Add" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <!-- / RIGHT CONTENT BLOCK -->
        </td>
    </tr>
</table>
@stop
