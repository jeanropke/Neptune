<td valign="top" style="width: 202px;" class="habboPage-col">
    <div id="top-3rd-level"></div>
    <div id="content-3rd-level">

        <ul id="third-level-navi">
            <li class="@if($page == 'welcome_started')active @else inactive @endif">
                @if($page == 'welcome_started')Getting Started @else <a href="{{ url('/') }}/hotel/welcome_to_habbo_hotel/how_to_get_started">Getting Started</a> @endif
            </li>

            <li class="@if($page == 'welcome_chatting')active @else inactive @endif">
                @if($page == 'welcome_chatting'){{ cms_config('hotel.name.short') }} Console @else <a href="{{ url('/') }}/hotel/welcome_to_habbo_hotel/chatting">{{ cms_config('hotel.name.short') }} Console</a> @endif
            </li>

            <li class="@if($page == 'welcome_navigator')active @else inactive @endif">
                @if($page == 'welcome_navigator')Using The Navigator @else <a href="{{ url('/') }}/hotel/welcome_to_habbo_hotel/navigator">Using The Navigator</a> @endif
            </li>

            <li class="@if($page == 'welcome_room')active @else inactive @endif">
                @if($page == 'welcome_room')Your Own Room @else <a href="{{ url('/') }}/hotel/welcome_to_habbo_hotel/your_own_room">Your Own Room</a> @endif
            </li>

            <li class="@if($page == 'welcome_help')active @else inactive @endif">
                @if($page == 'welcome_help')Help and Safety @else <a href="{{ url('/') }}/hotel/welcome_to_habbo_hotel/help_safety">Help and Safety</a> @endif
            </li>
        </ul>
        <div class="clear"></div>
    </div>
    <div id="bottom-3rd-level"></div>
    @foreach(boxes('hotel.welcome', $page != 'welcome_help' ? 1 : 2) as $box)
    <div class="v3box {{ $box->color }}">
        <div class="v3box-top">
            <h3>{{ $box->title }}</h3>
        </div>
        <div class="v3box-content">
            <div class="v3box-body">
                {!! $box->content !!}
                <div class="clear"></div>
            </div>
        </div>
        <div class="v3box-bottom">
            <div></div>
        </div>
    </div>
    @endforeach
</td>
