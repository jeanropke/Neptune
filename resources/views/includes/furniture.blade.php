<td valign="top" style="width: 202px;" class="habboPage-col">
    <div id="top-3rd-level"></div>
    <div id="content-3rd-level">
        <ul id="third-level-navi">
            <li class="@if ($page == 'furniture') active @else inactive @endif">
                @if ($page == 'furniture')
                    {{ cms_config('hotel.name.short') }} Furni
                @else
                    <a href="{{ url('/') }}/credits/furniture">{{ cms_config('hotel.name.short') }} Furni</a>
                @endif
            </li>
            <li class="@if ($page == 'catalogue') active @else inactive @endif">
                @if ($page == 'catalogue')
                    Furni Catalog
                @else
                    <a href="{{ url('/') }}/credits/furniture/catalogue">Furni Catalog</a>
                @endif
            </li>
            <li class="@if ($page == 'catalogue_1') active @else inactive @endif">
                @if ($page == 'catalogue_1')
                    Furni Styles
                @else
                    <a href="{{ url('/') }}/credits/furniture/catalogue/1">Furni Styles</a>
                @endif
            </li>
            <li class="@if ($page == 'catalogue_2') active @else inactive @endif">
                @if ($page == 'catalogue_2')
                    Functional Furni
                @else
                    <a href="{{ url('/') }}/credits/furniture/catalogue/2">Functional Furni</a>
                @endif
            </li>
            <li class="@if ($page == 'catalogue_4') active @else inactive @endif">
                @if ($page == 'catalogue_4')
                    Seasonal Furni
                @else
                    <a href="{{ url('/') }}/credits/furniture/catalogue/4">Seasonal Furni</a>
                @endif
            </li>
            <li class="@if ($page == 'decoration_examples') active @else inactive @endif">
                @if ($page == 'decoration_examples')
                    Decoration Examples
                @else
                    <a href="{{ url('/') }}/credits/furniture/decoration_examples">Decoration Examples</a>
                @endif
            </li>

            <li class="@if ($page == 'starterpacks') active @else inactive @endif">
                @if ($page == 'starterpacks')
                    Starter Packs
                @else
                    <a href="{{ url('/') }}/credits/furniture/starterpacks">Starter Packs</a>
                @endif
            </li>
            <li class="@if ($page == 'trading') active @else inactive @endif">
                @if ($page == 'trading')
                    Trading
                @else
                    <a href="{{ url('/') }}/credits/furniture/trading">Trading</a>
                @endif
            </li>
            <li class="@if ($page == 'exchange') active @else inactive @endif">
                @if ($page == 'exchange')
                    {{ cms_config('hotel.name.short') }} Exchange
                @else
                    <a href="{{ url('/') }}/credits/furniture/exchange">{{ cms_config('hotel.name.short') }} Exchange</a>
                @endif
            </li>
            <li class="@if ($page == 'cameras') active @else inactive @endif">
                @if ($page == 'cameras')
                    Cameras
                @else
                    <a href="{{ url('/') }}/credits/furniture/cameras">Cameras</a>
                @endif
            </li>
            <li class="@if ($page == 'ecotronfaq') active @else inactive @endif">
                @if ($page == 'ecotronfaq')
                    Ecotron - Furni Recycling
                @else
                    <a href="{{ url('/') }}/credits/furniture/ecotronfaq">Ecotron - Furni Recycling</a>
                @endif
            </li>
        </ul>
        <div class="clear"></div>
    </div>
    <div id="bottom-3rd-level"></div>


    @foreach (boxes('include.furniture', 1) as $box)
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
