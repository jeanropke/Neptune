@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Edit Box Page')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('housekeeping.site.include.menu', ['submenu' => 'box.pages.create'])
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
                <form action="{{ route('housekeeping.site.box.pages.create.save') }}" method="post" name="theAdminForm"
                    id="theAdminForm" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">New Box Page</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Page</b>
                                    <div class="graytext">The page where this box will appears.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <br>
                                    <select name="page" class="textinput" style="margin-top: 5px;" size="1">
                                        @foreach($pages as $page)
                                        <option value="{{ $page }}">{{ $page }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Column</b>
                                    <div class="graytext">The column where this box will appears. By default, Habbo
                                        support only 3 columns.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="column" class="textinput" style="margin-top: 5px;" size="1">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Color</b>
                                    <div class="graytext">Set the box color</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="override_color">
                                        <option value="black">Black</option>
                                        <option value="blue">Blue</option>
                                        <option value="darkgrey">Dark Grey</option>
                                        <option value="diamond">Diamond</option>
                                        <option value="green">Green</option>
                                        <option value="lightgrey">Light Grey</option>
                                        <option value="orange">Orange</option>
                                        <option value="purple">Purple</option>
                                        <option value="yellow" selected>Yellow</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Box</b>
                                    <div class="graytext">The box that will appear.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="box_id" class="textinput" style="margin-top: 5px;" size="1">
                                        @foreach($boxes as $b)
                                        <option value="{{ $b->id }}">{{ $b->title }}</option>
                                        @endforeach
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

                <br />
            </div>
        </td>
    </tr>
</table>
@stop
