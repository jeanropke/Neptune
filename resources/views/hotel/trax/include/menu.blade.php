<div id="top-3rd-level"></div>
<div id="content-3rd-level">
    <ul id="third-level-navi">

        @if ($page == 'index')
            <li class="active">
                TRAX Homepage
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/hotel/trax">TRAX Homepage</a>
            </li>
        @endif

        @if ($page == 'store')
            <li class="active">
                The Traxstore
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/hotel/trax/store">The Traxstore</a>
            </li>
        @endif

        @if ($page == 'masterclass')
            <li class="active">
                Trax Masterclasses
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/hotel/trax/masterclass">Trax Masterclasses</a>
            </li>
        @endif

    </ul>
    <div class="clear"></div>
</div>
<div id="bottom-3rd-level"></div>
