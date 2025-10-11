@extends('layouts.master', ['menuId' => 'articles', 'submenuId' => 'articles'])

@section('title', 'Articles')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody><tr>
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 202px;" class="habboPage-col">
                <div class="v3box yellow">
                    <div class="v3box-top"><h3>Browse</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <p>Did you miss reading about something happening in {{ cms_config('hotel.name.short') }} Hotel? You can find all of the news articles here!<br></p>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
            </td>
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="v3box yellow">
                    <div class="v3box-top"><h3>Browse</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <ul>
                                @foreach($articles as $article)
                                <li>
                                    <span class="articledate">[{{ $article->created_at->format('m/d/y') }}]</span>
                                    <a href="/article/{{ $article->id }}">{{ $article->title_resolved }}</a>
                                </li>
                                @endforeach
                            </ul>

                            <p></p>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
            </td>
            <td style="width: 4px;"></td>
            <td valign="top" style="width: 176px;">
                <div id="ad_sidebar">
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
        </tbody></table>
@stop
