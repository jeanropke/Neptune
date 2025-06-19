Everyday, a movie will be added to this list by Habbo Staff from the daily Top 10 Rated movies (on the left). The movies in this list will then
become our finalists!<br><br><br>
<div class="habbomovie-scrollable-component">
    <table border="0" cellpadding="2" cellspacing="0" width="90%">
        <tbody>
            @foreach ($staff as $pick)
                @php($movie = $pick->getMovie())
                <tr>
                    <td valign="top" class="list-movie-item">
                        <img class="genre-image" src="{{ url('/') }}/web/images/habbomovies/genres/action.gif" border="0">
                    </td>
                    <td valign="top" class="list-movie-name">
                        <a href="{{ url('/') }}/entertainment/habbowood/movies/{{ $movie->id }}">{{ $movie->getTitle() }}</a>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                    <td valign="middle" class="list-movie-creatorname"><a
                            href="{{ url('/') }}/home/{{ $movie->getAuthor()->username }}">{{ $movie->getAuthor()->username }}</a>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                    <td valign="middle">
                        <ul class="rater-list">
                            @for ($i = 0; $i < 5; $i++)
                                <li class="rater-list-item">
                                    @if ($movie->rating > $i)
                                        <img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                    @else
                                        <img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt="">
                                    @endif
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
<br>
<div class="clear"></div>
