@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Manage Existing Articles')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'article.manage'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    <div class="tableborder">
                        <div class="tableheaderalt">News Articles</div>
                        <div style="text-align: center; vertical-align: middle;">{{ $articles->links('layouts.housekeeping.pagination') }}</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="1%" align="center">ID</td>
                                <td class="tablesubheader" width="28%">Title</td>
                                <td class="tablesubheader" width="10%" align="center">Date</td>
                                <td class="tablesubheader" width="10%" align="center">Author</td>
                                <td class="tablesubheader" width="10%" align="center">Edit</td>
                                <td class="tablesubheader" width="12%" align="center">Delete</td>
                            </tr>
                            @forelse($articles as $article)
                                <tr>
                                    <td class="tablerow1" align="center">
                                        {{ $article->id }}
                                    </td>
                                    <td class="tablerow2">
                                        <strong>{{ $article->title }}</strong>
                                        @if ($article->is_deleted)
                                            <i>(Deleted)</i>
                                        @endif
                                        <div class="desctext">
                                            {{ $article->short_text }}
                                        </div>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $article->created_at->format('m/d/y h:i') }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $article->author }}
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="{{ route('housekeeping.site.article.edit', $article->id) }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="delete-article" data-id="{{ $article->id }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/delete.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="6" class="tablerow1"><strong>No news.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                        <div class="tablefooter" align="center">
                            <div class="fauxbutton-wrapper"><span class="fauxbutton"><a href="{{ route('housekeeping.site.article.create') }}">Compose New News Item</a></span>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(window).on('load', function() {
                            NewsManage.initialise();
                        });
                    </script>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
