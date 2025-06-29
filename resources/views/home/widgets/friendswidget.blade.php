<div class="movable widget FriendsWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">MY FRIENDS</span><span class="header-right">&nbsp;@include('home.edit_button', ['type' => 'widget'])</span></h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div id="friends">
                    @php($friendsPerPage = 10)
                    @php($friends = $owner->getFriends()->take($friendsPerPage))
                    @php($friendsCount = $owner->getFriends()->count())
                    @include('home.widgets.ajax.friendswidget')
                </div>

                <div class="clear"></div>
                @if (ceil($friendsCount / $friendsPerPage) > 1)
                    <div id="number">1/{{ ceil($friendsCount / $friendsPerPage) }}</div>

                    <div id="slider">
                        <div id="slider-bar">
                            <div style="left: 0px; position: relative;" class="selected" id="slider-handle"><img
                                    src="{{ url('/') }}/web/images/myhabbo/slider/slider_scaler.gif">
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Habbo uses account name instead id --}}
                <script language="JavaScript" type="text/javascript">
                    FriendsWidgetOld.init({{ ceil($friendsCount / $friendsPerPage) }}, {{ json_encode(range(1, ceil($friendsCount / $friendsPerPage))) }}, {{ $owner->id }});
                </script>

                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
