@extends('layouts.admin.master', ['menu' => 'catalogue'])

@section('title', 'Catalogue editor - Items')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.catalogue', ['submenu' => 'catalogue_items'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                <div class="tableborder">
                    <div class="tableheaderalt">Search item</div>
                <form action="{{ route('admin.catalogue.items') }}/search" method="GET" autocomplete="off">
                    <div style="text-align: center; vertical-align: middle; padding:15px">
                    <input type="text" class="textinput" name="item_name">
                    <input type="submit" value="Search" class="realbutton">
                    </div>
                </form>
                </div>
            </div>
            <br>
            <div>
                <div class="tableborder">
                    <div class="tableheaderalt">Editing Items @if($page) - {{ $page->caption }} ({{ $page->id }}) @endif</div>
                    <div style="text-align: center; vertical-align: middle;">{{ $furnis->onEachSide(3)->links('layouts.admin.pagination') }}</div>
                    <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                        <tr>
                            <td class="tablesubheader" width="1%" align="center">ID</td>
                            <td class="tablesubheader" width="20%">Catalog name</td>
                            <td class="tablesubheader" width="5%" align="center">Page ID</td>
                            <td class="tablesubheader" width="5%" align="center">Item ID</td>
                            <td class="tablesubheader" width="15%" align="center">Cost credits</td>
                            <td class="tablesubheader" width="15%" align="center">Cost points</td>
                            <td class="tablesubheader" width="15%" align="center">Points type</td>
                            <td class="tablesubheader" width="9%" align="center">Edit</td>
                        </tr>
                        @foreach ($furnis as $furni)
                            <tr>

                                <td class="tablerow1" align="center">
                                    {{ $furni->id }}
                                </td>
                                <td class="tablerow2">
                                    <strong>{{ $furni->catalog_name }}</strong>
                                </td>
                                <td class="tablerow2" align="center">
                                    <a href="{{ route('admin.catalogue.pages.edit', $furni->page_id) }}">{{ $furni->page_id }}</a>
                                </td>
                                <td class="tablerow2" align="center">
                                    <a href="{{ route('admin.catalogue.furni.edit', $furni->item_ids) }}">{{ $furni->item_ids }}</a>
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ $furni->cost_credits }}
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ $furni->cost_points }}
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ $furni->points_type }}
                                </td>
                                <td class="tablerow2" align="center"><a
                                        href="{{ route('admin.catalogue.items.edit', $furni->id) }}"><img
                                            src="{{ url('/') }}/web/admin/images/edit.gif" alt="Edit"></a></td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </td>
    </tr>
</table>
@stop
