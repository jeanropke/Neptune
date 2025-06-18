<div class="hwood-filmstrip">
    <a href="{{ url('/') }}/entertainment/habbowood">Habbowood Main</a> |
    <a href="{{ url('/') }}/habbomovies/private/openeditor">Shoot a movie</a>|
    @auth()
        <a href="{{ url('/') }}/entertainment/habbowood/mymovies">My Movies</a>|
    @endauth
    <a target="_self" href="{{ url('/') }}/entertainment/habbowood/filmakers">Community</a> |
    <a href="{{ url('/') }}/entertainment/habbowood/movies" target="_self">Featured Movies</a> |
    <a href="{{ url('/') }}/entertainment/habbowood/movieshc" target="_self">HC Extras</a> |
    <span style="text-decoration: underline;"></span>
    <a href="{{ url('/') }}/entertainment/habbowood/embed" target="_self">Embed</a> |
    <a href="{{ url('/') }}/entertainment/habbowood/competition" target="_self">Awards</a> |
    <a href="{{ url('/') }}/entertainment/habbowood/help" target="_self">Demo</a>
</div>
