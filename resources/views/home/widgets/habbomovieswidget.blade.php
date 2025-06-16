<div class="movable widget HabboMoviesWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">My Movies</span>
                    <span class="header-right">&nbsp;@if ($isEdit)
                            <img src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18" class="edit-button"
                                id="widget-{{ $item->id }}-edit" />
                            <script language="JavaScript" type="text/javascript">
                                Event.observe('widget-{{ $item->id }}-edit', 'click', function(e) {
                                    openEditMenu(e, {{ $item->id }}, 'widget', 'widget-{{ $item->id }}-edit');
                                }, false);
                            </script>
                        @endif
                    </span>
                </h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div id="movies_wrapper">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td valign="top">
                                    <div class="movie_genre_image">
                                        <img src="https://web.archive.org/web/20071114062110im_/http://images.habbohotel.jp/habboweb/17/16/web-gallery/images/habbomovies/genres/fantasy.gif"
                                            title="Fantasy" align="middle">
                                    </div>
                                </td>
                                <td>
                                    <div class="movie_info">
                                        <div class="movie_name"><a href="/web/20071114062110/http://www.habbo.jp/entertainment/habbowood/movies/370">movie name</a>
                                        </div>
                                        <div class="movie_created metadata">Created at: 2007/09/03
                                        </div>
                                        <div>Views: 1,993
                                        </div>
                                        <div>
                                            <hr>
                                            <ul class="rater-list">
                                                <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                            </ul> <br class="clear">
                                            <div>Rate: 0 Votes: 0</div>
                                        </div>
                                    </div>
                                    <br class="clear">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
