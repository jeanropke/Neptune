<div class="movable widget FriendsWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_goldenskin">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">MY FRIENDS</span><span class="header-right">&nbsp;</span></h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div id="friends">
                    @php($friendsPerPage = 2)
                    @php($friends = $user->getFriends()->take($friendsPerPage))
                    @php($friendsCount = $user->getFriends()->count())
                    @include('home.ajax.friendswidget')
                </div>

                <div class="clear"></div>

                <div id="number">1/{{ ceil($friendsCount / $friendsPerPage) }}</div>

                <div id="slider">
                    <div id="slider-bar">
                        <div style="left: 0px; position: relative;" class="selected" id="slider-handle"><img src="{{ url('/') }}/web/images/myhabbo/slider/slider_scaler.gif">
                        </div>
                    </div>
                </div>

                {{-- Habbo uses account name instead id --}}
                <script language="JavaScript" type="text/javascript">
                    FriendsWidget.init({{ ceil($friendsCount / $friendsPerPage) }}, {{ json_encode(range(1, ceil($friendsCount / $friendsPerPage))) }}, {{ $user->id }});
                </script>

                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
