<div class="movable widget HabboMoviesWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skinName }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3>
                    <span class="header-left"></span>
                    <span class="header-middle">&nbsp;My Movies&nbsp;</span>
                    <span class="header-right">@include('home.edit_button', ['type' => 'widget'])</span>
                </h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div id="movies_wrapper">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            @forelse ($owner->movies()->where('published', '1')->get() as $movie)
                                <tr>
                                    <td valign="top">
                                        <div class="movie_genre_image">
                                            {{-- If you have any images of movie genres, please post in this issue on the repository page. --}}
                                            {{-- https://github.com/jeanropke/Neptune/issues/2 --}}
                                            <img src="{{ cms_config('site.web.url') }}/images/habbomovies/genres/fantasy.gif" title="Fantasy" align="middle">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="movie_info">
                                            <div class="movie_name"><a href="{{ url('/') }}/entertainment/habbowood/movies/{{ $movie->id }}">{{ $movie->title }}</a>
                                            </div>
                                            <div class="movie_created metadata">Created at: {{ $movie->updated_at->format('Y/m/d') }}
                                            </div>
                                            <div>Views: {{ $movie->views }}
                                            </div>
                                            <div>
                                                <hr>
                                                <ul class="rater-list">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <li class="rater-list-item">
                                                            @if ($movie->rating > $i)
                                                                <img src="{{ cms_config('site.web.url') }}/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            @else
                                                                <img src="{{ cms_config('site.web.url') }}/images/habbomovies/stars/icon_star_grey.gif" alt="">
                                                            @endif
                                                        </li>
                                                    @endfor
                                                </ul> <br class="clear">
                                                <div>Rate: {{ $movie->rating }} Votes: {{ $movie->votes }}</div>
                                            </div>
                                        </div>
                                        <br class="clear">
                                    </td>
                                </tr>
                            @empty
                                <center>No movie</center>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
