@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Edit Box Page')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'box.pages.manage'])
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
                    <div class="tableborder">
                        <div class="tableheaderalt">Boxes</div>
                        <div style="text-align: center; vertical-align: middle;">{!! $boxpages->links('layouts.housekeeping.pagination') !!}</div>
                        <div style="text-align: center; vertical-align: middle;"></div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td class="tablesubheader" width="1%" align="center">ID</td>
                                    <td class="tablesubheader" width="28%">Title</td>
                                    <td class="tablesubheader" width="10%" align="center">Column</td>
                                    <td class="tablesubheader" width="10%" align="center">Page</td>
                                    <td class="tablesubheader" width="10%" align="center">Edit</td>
                                    <td class="tablesubheader" width="12%" align="center">Delete</td>
                                </tr>
                                @foreach ($boxpages as $box)
                                    <tr>
                                        <td class="tablerow1" align="center">
                                            {{ $box->id }}
                                        </td>
                                        <td class="tablerow2">
                                            <strong> {{ \App\Models\Box::find($box->box_id)->title }}</strong>
                                        </td>
                                        <td class="tablerow2" align="center">
                                            {{ $box->column }}
                                        </td>
                                        <td class="tablerow2" align="center">
                                            {{ $box->page }}
                                        </td>
                                        <td class="tablerow2" align="center">
                                            <a href="{{ route('housekeeping.site.box.pages.edit', $box->id) }}">
                                                <img src="{{ url('/') }}/web/housekeeping/images/edit.gif" alt="Edit">
                                            </a>
                                        </td>
                                        <td class="tablerow2" align="center">
                                            <a href="#" class="delete-box-page" data-id="{{ $box->id }}">
                                                <img src="{{ url('/') }}/web/housekeeping/images/delete.gif" alt="Delete">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="tablefooter" align="center">
                            <div class="fauxbutton-wrapper"><span class="fauxbutton"><a href="{{ route('housekeeping.site.box.pages.create') }}">Create New Box</a></span></div>
                        </div>
                    </div>
                    <script>
                        $(window).on('load', function() {
                            BoxPagesManage.initialise();
                        });
                    </script>
                </div>
            </td>
        </tr>
    </table>
@stop
