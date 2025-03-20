@php($rating = \App\Models\Home\HomeRating::where('home_id', $homeId))
@php($average = round(($rating->select(\Illuminate\Support\Facades\DB::raw("SUM(rating) AS rating"))->get()[0]->rating / ($rating->count() > 0 ? $rating->count() : 1)), 1))

<script type="text/javascript">
    var ratingWidget;
    document.observe("dom:loaded", function() {
        ratingWidget = new RatingWidget({{ $widgetId }}, {{ $homeId }});
    });
</script>
<div class="rating-average">

    <b>Average votes: {{ $average }}</b>
    <div id="rating-stars" class="rating-stars" >
        <ul id="rating-unit_ul1" class="rating-unit-rating">
            <li class="rating-current-rating" style="width:{{ ceil($average * 150)/5 }}px;" />
        </ul>
    </div>
    {{ $rating->count() }} votes total
    <br/>
    ({{ $rating->where('rating', '>', '3')->count() }} users voted 4 or better)</div>
</div>
