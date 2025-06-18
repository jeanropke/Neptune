{{--

#habbomovies-administration {
    z-index: 10006;
    width: 300px;
}

* html #habbomovies-administration {
    left: -500px;
}

#habbomovie-administration {
    z-index: 10007;
    width: 300px;
    position: absolute !important;
    position: relative;
}

#habbomovies-administration-unpublished, #habbomovies-administration-published {
    overflow: auto;
    height: 200px;
}
form.search-box {
    margin-bottom: 0;
}

table.search-box {
    margin-left: auto;
    margin-right: auto;
}

div.component table.search-box {
    width: 100%;
}

td.search-box-label {
    text-align: right;
}

div.component input.search-box-query {
    width: 70%;
}

div.component input.search-box-sidebar-query {
    width: 95%;
}

p.search-result-count {
    position: absolute;
    left: auto;
    top: auto;
}

p.search-result-divider {
    margin: 5px;
    border-bottom: 1px dashed black;
}

table.search-result {
    border-spacing: 0;
    border-collapse: collapse;
    width: 100%;
    clear: both;
}

table.search-result tr.odd {
    background-color: #e6e6e6;
}

table.search-result tr.even {
    background-color: white;
}

table.search-result tr td.image {
    padding-left: 5px;
    padding-right: 5px;
}

table.search-result tr td.text {
    padding-top: 5px;
    padding-bottom: 5px;
}

p.search-result-navigation {
    text-align: center;
}
--}}

<div class="component">
    <form class="search-box">
        <table class="search-box">
            <input class="search-box-query" />
            <input class="search-box-sidebar-query" />
        </table>
    </form>
</div>

<p class="search-result-count">count</p>
<p class="search-result-divider">divider</p>

<table class="search-result">
    <tr class="odd">
        <td class="image">image</td>
        <td class="text">text</td>
    </tr>
    <tr class="even">
        <td class="image">image</td>
        <td class="text">text</td>
    </tr>
</table>

<p class="search-result-navigation">search-result-navigation</p>

<table>
    <tr>
        <td class="list-movie-item">
            <span>item</span>
        </td>
        <td class="list-movie-name">
            <a href="{{ url('/') }}">name</a>
        </td>
        <td class="list-movie-creatorname"><a href="{{ url('/') }}/home/">creatorname</a></td>
        <td class="list-movie-item">
            <div class="genre-image"></div>
        </td>

    </tr>
</table>
<div id="habbomovies-administration-unpublished">test</div>
