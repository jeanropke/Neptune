@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Restore Articles')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'articles.restore'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    <div class="tableborder">
                        <div class="tableheaderalt">Restore Articles</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="1%" align="center">ID</td>
                                <td class="tablesubheader" width="28%">Title</td>
                                <td class="tablesubheader" width="10%" align="center">Date</td>
                                <td class="tablesubheader" width="10%" align="center">Author</td>
                                <td class="tablesubheader" width="10%" align="center">Edit</td>
                                <td class="tablesubheader" width="12%" align="center">Restore</td>
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
                                        <a href="{{ route('housekeeping.site.articles.edit', $article->id) }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/edit.gif" alt="Edit">
                                        </a>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        <a href="#" class="restore-article" data-id="{{ $article->id }}">
                                            <img src="{{ url('/') }}/web/housekeeping/images/restore.gif" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr align="center">
                                    <td colspan="6" class="tablerow1"><strong>No articles deleted.</strong></td>
                                </tr>
                            @endforelse
                        </table>
                        <div style="text-align: center; vertical-align: middle;">{{ $articles->withQueryString()->links('layouts.housekeeping.pagination') }}</div>
                    </div>
                    <script>
                        GenericManager.initialise('.restore-article', '<p>Are you sure you want to restore this article?</p>', '{{ route('housekeeping.site.articles.restore') }}');
                    </script>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
