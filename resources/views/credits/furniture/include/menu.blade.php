<div id="top-3rd-level"></div>
<div id="content-3rd-level">
    <ul id="third-level-navi">

        @if ($page == 'furniture')
            <li class="active">
                {{ cms_config('hotel.name.short') }} Furni
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/credits/furniture">{{ cms_config('hotel.name.short') }} Furni</a>
            </li>
        @endif

        @if ($page == 'catalogue')
            <li class="active">
                Furni Catalog
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/credits/furniture/catalogue">Furni Catalog</a>
            </li>
        @endif

        @if ($page == 'catalogue_1')
            <li class="active">
                Furni Styles
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/credits/furniture/catalogue/1">Furni Styles</a>
            </li>
        @endif

        @if ($page == 'catalogue_2')
            <li class="active">
                Functional Furni
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/credits/furniture/catalogue/2">Functional Furni</a>
            </li>
        @endif

        @if ($page == 'catalogue_4')
            <li class="active">
                Seasonal Furni
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/credits/furniture/catalogue/4">Seasonal Furni</a>
            </li>
        @endif

        @if ($page == 'decoration_examples')
            <li class="active">
                Decoration Examples
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/credits/furniture/decoration_examples">Decoration Examples</a>
            </li>
        @endif

        @if ($page == 'starterpacks')
            <li class="active">
                Starter Packs
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/credits/furniture/starterpacks">Starter Packs</a>
            </li>
        @endif

        @if ($page == 'trading')
            <li class="active">
                Trading
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/credits/furniture/trading">Trading</a>
            </li>
        @endif

        @if ($page == 'exchange')
            <li class="active">
                {{ cms_config('hotel.name.short') }} Exchange
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/credits/furniture/exchange">{{ cms_config('hotel.name.short') }} Exchange</a>
            </li>
        @endif

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
