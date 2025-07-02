<div class="habbomovie-scrollable-component">
    <table border="0" cellpadding="2" cellspacing="0" width="90%">
        <tbody>
            @foreach ($top as $movie)
                <tr>
                    <td valign="top" class="list-movie-item">
                        <img class="genre-image" src="{{ cms_config('site.web.url') }}/images/habbomovies/genres/action.gif" border="0">
                    </td>
                    <td valign="top" class="list-movie-name">
                        <a href="{{ url('/') }}/entertainment/habbowood/movies/{{ $movie->id }}">
                            {{ $movie->title }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                    <td valign="middle" class="list-movie-creatorname">
                        <a href="{{ url('/') }}/home/{{ $movie->author->username }}">{{ $movie->author->username }}</a>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                    <td valign="middle">
                        <ul class="rater-list">
                            @for ($i = 0; $i < 5; $i++)
                                <li class="rater-list-item">
                                    <img src="{{ cms_config('site.web.url') }}/images/habbomovies/stars/icon_star_{{ $movie->rating > $i ? 'color' : 'grey' }}.gif" alt="">
                                </li>
                            @endfor
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                    <td valign="middle">{{ $movie->views }}</td>
                </tr>
                <tr>
                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="clear"></div>
