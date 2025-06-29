@extends('layouts.master', ['menuId' => 'article'])

@section('title', $article->title_resolved)

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        <tr>
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 202px; padding-top: 3px;" class="habboPage-col">
                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>What's New</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">
                            <div class="archive-sidebar">
                                <ul>
                                    @foreach($articles as $art)
                                    <li>
                                        <span class="articledate">{{ $art->publish_date_resolved->format('d/m/y') }}</span>
                                        <a href="/article/{{ $art->url }}">{{ $art->title_resolved }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="promo-button"><a href="/articles">More News</a></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
            </td>
            <td valign="top" style="width: 539px; padding-top: 3px;" class="habboPage-col rightmost">
                <div class="v3box yellow">
                    <div class="v3box-top">
                        <h3>{{ $article->title_resolved }}</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">
                            <div class="article-full">
                                <i class="article-author">Published at
                                    {{ $article->publish_date_resolved->format('F j, Y') }}</i><br><br>
                                <p class="teaser"><b>{{ $article->short_text }}</b></p><br>
                                <div>
                                    {!! $article->long_text !!}
                                </div>

                                <br />
                                <b style="float: right; margin-right: 25px;">{{ $article->author_name }}</b>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
            </td>
            <td style="width: 4px;"></td>
            <td valign="top">
                <div id="ad_sidebar">
                    @include('includes.ad160')
                </div>
                <div style="width: 4px"></div>
            </td>
        </tr>
    </tbody>
</table>
<br style="clear: both;">
@stop
