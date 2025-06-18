<div class="habbomovies-rating-floatcol1">
    @if (!auth() || (auth() && $movie->alreadyRated()))
        <ul class="rater-list hwood-rating-unit-rating">
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
    @else
        <div class="hwood-rating-unit-rating">
            <div class="hwood-rating-current-rating" style="width: {{ $movie->rating * 17 }}px;"></div>
            <ul class="rater-list">

                <li class="rater-list-item">
                    <a href="#" onclick="javascript:rateMovie({{ $movie->id }}, 1); return false;" class="hwood-r1-unit"></a>
                </li>
                <li class="rater-list-item">
                    <a href="#" onclick="javascript:rateMovie({{ $movie->id }}, 2); return false;" class="hwood-r2-unit"></a>
                </li>
                <li class="rater-list-item">
                    <a href="#" onclick="javascript:rateMovie({{ $movie->id }}, 3); return false;" class="hwood-r3-unit"></a>
                </li>
                <li class="rater-list-item">
                    <a href="#" onclick="javascript:rateMovie({{ $movie->id }}, 4); return false;" class="hwood-r4-unit"></a>
                </li>
                <li class="rater-list-item">
                    <a href="#" onclick="javascript:rateMovie({{ $movie->id }}, 5); return false;" class="hwood-r5-unit"></a>
                </li>
            </ul>
        </div>
    @endif
</div>
<div class="habbomovies-rating-floatcol2">
    <b>{{ $movie->views }}</b> views<br>
    <b>{{ $movie->getRatings()->count() }}</b> ratings
</div>
