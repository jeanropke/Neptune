<div id="top-3rd-level"></div>
<div id="content-3rd-level">

    <ul id="third-level-navi">

        <li class="inactive">
            <a href="{{ url('/') }}/hotel/trax">Trax Homepage</a>
        </li>

        @if ($page == 'index')
        <li class="active">
            The Basics
        </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/hotel/trax/masterclass">The Basics</a>
            </li>
        @endif

        @if ($page == 'hiphop')
        <li class="active">
            Hip-Hop
        </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/hotel/trax/masterclass/hiphop">Hip-Hop</a>
            </li>
        @endif

        <li class="inactive">
            <a href="{{ url('/') }}/hotel/trax/masterclass/rock">Rock &amp; Heavy</a>
        </li>


        <li class="inactive">
            <a href="{{ url('/') }}/hotel/trax/masterclass/electronic">Electronic</a>
        </li>


        <li class="inactive">
            <a href="{{ url('/') }}/hotel/trax/masterclass/disco">Disco</a>
        </li>


        <li class="inactive">
            <a href="{{ url('/') }}/hotel/trax/masterclass/habbo">8-bit / Habbo</a>
        </li>


        <li class="inactive">
            <a href="{{ url('/') }}/hotel/trax/masterclass/groove">Latin &amp; Reggae</a>
        </li>


        <li class="inactive">
            <a href="{{ url('/') }}/hotel/trax/masterclass/sfx">Sound Design &amp; SFX</a>
        </li>


        <li class="inactive">
            <a href="{{ url('/') }}/hotel/trax/masterclass/ambient">Ambient</a>
        </li>

    </ul>
    <div class="clear"></div>
</div>
<div id="bottom-3rd-level"></div>
