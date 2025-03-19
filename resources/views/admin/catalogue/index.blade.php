@extends('layouts.admin.master', ['menu' => 'catalogue'])

@section('title', 'General Configuration')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.catalogue', ['submenu' => 'catalogue'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif

                <div class="tableborder">
                    <div class="tableheaderalt">Catalogue</div>
                    <div style="text-align: center; vertical-align: middle;">
                        {{ $catalogue->links('layouts.admin.pagination') }}</div>

                    <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                        <tbody>
                            <tr>
                                <td class="tablesubheader" width="1%" align="center">ID</td>
                                <td class="tablesubheader" width="20%">Caption</td>
                                <td class="tablesubheader" width="10%" align="center">Min Rank</td>
                                <td class="tablesubheader" width="15%" align="center">Caption save</td>
                                <td class="tablesubheader" width="15%" align="center">Headline</td>
                                <td class="tablesubheader" width="15%" align="center">Teaser</td>
                                <td class="tablesubheader" width="9%" align="center">Edit</td>
                            </tr>
                            @foreach ($catalogue as $page)
                            <tr>

                                <td class="tablerow1" align="center">
                                    {{ $page->id }}
                                </td>
                                <td class="tablerow2">
                                    <strong>{{ $page->caption }}</strong>
                                    <div class="desctext">
                                        {{ $page->page_layout }}
                                    </div>
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ $page->min_rank }}
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ $page->caption_save }}
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ $page->page_headline }}
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ $page->page_teaser }}
                                </td>
                                <td class="tablerow2" align="center"><a
                                        href="{{ route('admin.catalogue.pages.edit', $page->id) }}"><img
                                            src="{{ url('/') }}/web/admin/images/edit.gif" alt="Edit"></a></td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </td>
    </tr>
</table>
@stop
