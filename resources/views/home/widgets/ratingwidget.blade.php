<div class="movable widget RatingWidget" id="widget-{{ $item->id }}"
    style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skinName }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3>
                    <span class="header-left"></span>
                    <span class="header-middle">&nbsp;My Rating&nbsp;</span>
                    <span class="header-right">@include('home.edit_button', ['type' => 'widget'])</span>
                </h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div id="rating-main">
                    @php($rating = \App\Models\Home\HomeRating::where('home_id', $owner->id))
                    @php($average = round(($rating->select(\Illuminate\Support\Facades\DB::raw("SUM(rating) AS rating"))->get()[0]->rating / ($rating->count() > 0 ? $rating->count() : 1)), 1))
                    <script type="text/javascript">
                        var ratingWidget;
                        Event.onDOMReady(function() {
                            ratingWidget = new RatingWidget({{ $owner->id }}, {{ $item->id }});
                        });
                    </script>
                    <div class="rating-average">
                        <b>Average votes: {{ $average }}</b>
                        <div id="rating-stars" class="rating-stars">
                            <ul id="rating-unit_ul1" class="rating-unit-rating">
                                <li class="rating-current-rating" style="width:{{ ceil($average * 150)/5 }}px;" />
                                @if(Auth::check())
                                    @if($owner->id != user()->id && \App\Models\Home\HomeRating::where([['user_id', user()->id], ['home_id', $owner->id]])->count() == 0)
                                    <li><a href="#" class="r1-unit rater">1</a></li>
                                    <li><a href="#" class="r2-unit rater">2</a></li>
                                    <li><a href="#" class="r3-unit rater">3</a></li>
                                    <li><a href="#" class="r4-unit rater">4</a></li>
                                    <li><a href="#" class="r5-unit rater">5</a></li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                        {{ $rating->count() }} votes total
                        <br />
                        ({{ $rating->where('rating', '>', '3')->count() }} users voted 4 or better)
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
