@extends('layouts.master', ['menuId' => 'tags'])

@section('title', 'Tags')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 197px;" class="habboPage-col">
                    <div class="v2box red light">
                        <div class="headline">
                            <h3>Related tags</h3>
                        </div>
                        <div class="border">
                            <div></div>
                        </div>
                        <div class="body">
                            <div class="tag-list">
                                <ul class="tag-list" id="related-tags">
                                    @foreach ($related as $tag)
                                        <li class="tag-search-rowholder"><span class="tag-search-rowholder">
                                                <a href="{{ url('/') }}/tag/search?tag={{ $tag->tag }}" style="font-size: {{ $tag->size }}px">{{ $tag->tag }}</a>
                                                @auth
                                                    @if (user()->tags()->where('tag', $tag->tag)->exists())
                                                        <img border="0" class="tag-delete-link tag-delete-link-{{ $tag->tag }}"
                                                            onmouseover="this.src='{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_delete_hi.gif'"
                                                            onmouseout="this.src='{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_delete.gif'"
                                                            src="{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_delete.gif"
                                                            onclick="TagHelper.removeThisTagFromMe('{{ $tag->tag }}', '{{ user()->id }}')">
                                                    @else
                                                        <img border="0" class="tag-add-link tag-add-link-{{ $tag->tag }}"
                                                            onmouseover="this.src='{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_add_hi.gif'"
                                                            onmouseout="this.src='{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_add.gif'"
                                                            src="{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_add.gif"
                                                            onclick="TagHelper.addThisTagToMe('{{ $tag->tag }}', '{{ user()->id }}')">
                                                    @endif
                                                @endauth
                                                @guest
                                                    <img border="0" class="tag-none-link" src="{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_dim.gif">
                                                @endguest
                                        </li>
                                    @endforeach
                                </ul>
                                <img id="tag-img-added" border="0" src="{{ cms_config('site.web.url') }}//images/buttons/tags/tag_button_added.gif" style="display:none">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">
                    <div class="v2box red light">
                        <div class="headline">
                            <h3>Search Results</h3>
                        </div>
                        <div class="border">
                            <div></div>
                        </div>
                        <div class="body">
                            {{--
                            <p class="search-result-count">
                                @if ($result->count() > 0)
                                    {{ $result->firstItem() ?? 0 }} - {{ $result->lastItem() ?? $result->count() }} / {{ $result->total() }}
                                @endif
                            </p>
                            @if ($result->count() == 0)
                                <p>No results found. </p>
                            @endif
                            --}}
                            <form name="tag_search_form" action="{{ url('/') }}/tag/search" class="search-box">
                                <table class="search-box" border="0">
                                    <tbody>
                                        <tr>
                                            <td class="search-box-label" valign="middle"><label for="search_query">Search</label></td>
                                            <td class="search-box-input" valign="middle">
                                                <input type="text" name="tag" id="search_query" value="{{ request()->tag }}" class="search-box-query">
                                            </td>
                                            <td class="search-box-button" valign="middle">
                                                <a href="#" onclick="javascript:document.tag_search_form.submit(); return false;" class="colorlink orange tagsearch-button"
                                                    style="margin:0 0 0 2px;" id="tagsearch-button"><span>Search</span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <p class="search-result-divider"></p>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="search-result">
                                <tbody>
                                    @foreach ($result as $entry)
                                        <tr class="{{ $loop->index % 2 == 0 ? 'odd' : 'even' }}">
                                            <td class="image" style="width:39px;">
                                                @if ($entry->holder_type == 'user')
                                                    <img src="{{ cms_config('site.avatarimage.url') }}{{ $entry->holder->figure }}114400" alt="" align="left">
                                                @else
                                                    <img src="{{ cms_config('site.groupbadge.url') }}{{ $entry->holder->badge }}.gif">
                                                @endif

                                            </td>
                                            <td class="text">
                                                @if ($entry->holder_type == 'user')
                                                    <a href="{{ url('/') }}/home/{{ $entry->holder->username }}">{{ $entry->holder->username }}</a><br>
                                                    {{ $entry->holder->motto }}
                                                @else
                                                    <a href="{{ url('/') }}/groups/{{ $entry->holder->getUrl() }}">{{ $entry->holder->name }}</a><br>
                                                    {{ $entry->holder->description }}
                                                @endif
                                                <br>
                                                <div class="tag-list">
                                                    <ul class="tag-list">
                                                        @foreach ($entry->holder->tags as $tag)
                                                            <li class="tag-search-rowholder">
                                                                <span class="tag-search-rowholder">
                                                                    <a href="{{ url('/') }}/tag/search?tag={{ $tag->tag }}" style="font-size:10px">{{ $tag->tag }}</a>
                                                                    @auth
                                                                        @if (user()->tags()->where('tag', $tag->tag)->exists())
                                                                            <img border="0" class="tag-delete-link tag-delete-link-{{ $tag->tag }}"
                                                                                onmouseover="this.src='{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_delete_hi.gif'"
                                                                                onmouseout="this.src='{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_delete.gif'"
                                                                                src="{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_delete.gif"
                                                                                onclick="TagHelper.removeThisTagFromMe('{{ $tag->tag }}', '{{ user()->id }}')">
                                                                        @else
                                                                            <img border="0" class="tag-add-link tag-add-link-{{ $tag->tag }}"
                                                                                onmouseover="this.src='{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_add_hi.gif'"
                                                                                onmouseout="this.src='{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_add.gif'"
                                                                                src="{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_add.gif"
                                                                                onclick="TagHelper.addThisTagToMe('{{ $tag->tag }}', '{{ user()->id }}')">
                                                                        @endif
                                                                    @endauth
                                                                    @guest
                                                                        <img border="0" class="tag-none-link" src="{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_dim.gif">
                                                                    @endguest
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <img id="tag-img-added" border="0" src="{{ cms_config('site.web.url') }}//images/buttons/tags/tag_button_added.gif"
                                                        style="display:none">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @if ($result->count() > 0)
                            @php
                                $currentPage = $result->currentPage();
                                $lastPage = $result->lastPage();

                                $before = min($currentPage - 1, 4);
                                $after = 9 - $before;

                                $startPage = max($currentPage - $before, 1);
                                $endPage = min($currentPage + $after, $lastPage);

                                $visiblePages = $endPage - $startPage + 1;
                                if ($visiblePages < 10) {
                                    $missing = 10 - $visiblePages;

                                    $startPage = max($startPage - $missing, 1);

                                    $visiblePages = $endPage - $startPage + 1;
                                    if ($visiblePages < 10) {
                                        $endPage = min($endPage + (10 - $visiblePages), $lastPage);
                                    }
                                }
                            @endphp

                            <p class="search-result-navigation">
                                @if ($result->currentPage() == 1)
                                    First
                                @else
                                    <a href="{{ url('/') }}/tag/search?tag={{ request()->tag }}&page=1">First</a>
                                @endif

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    @if ($result->currentPage() == $i)
                                        {{ $i }}
                                    @else
                                        <a href="{{ url('/') }}/tag/search?tag={{ request()->tag }}&page={{ $i }}">{{ $i }}</a>
                                    @endif
                                @endfor

                                @if ($result->currentPage() == $result->lastPage())
                                    Last
                                @else
                                    <a href="{{ url('/') }}/tag/search?tag={{ request()->tag }}&page={{ $result->lastPage() }}">Last</a>
                                @endif


                            </p>
                            @endif
                            <div class="clear"></div>
                        </div>
                        <div class="bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td style="width: 4px;"></td>
                <td valign="top" style="width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.partners')
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br style="clear: both;">
@stop
