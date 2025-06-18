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
    <div id="habbomovies-administration-links">
        <a href="#" id="habbomovies-administration-link-unpublished" class="selected" onclick="switchToUnpublished(); return false;">Não Publicados</a> |
        <a href="#" id="habbomovies-administration-link-published" onclick="switchToPublished(); return false;">Publicados</a>
    </div>

    <div id="habbomovies-administration-unpublished">
        <p>Carregando filmes não publicados...</p>
    </div>

    <div id="habbomovies-administration-published" style="display:none;">
        <p>Carregando filmes publicados...</p>
    </div>


{{--
<table class="search-result">
    <tr class="odd">
        <td class="image"><img src="genre_icon.png" alt="Gênero"></td>
        <td class="text">
            <strong>Título do Filme</strong><br>
            Criado por: Fulano<br>
            <div id="hwood-rating-stars-1">
                <!-- Estrelas de rating aqui -->
                ★★★☆☆
            </div>
        </td>
    </tr>
    <tr class="even">
        <td class="image"><img src="genre_icon.png" alt="Gênero"></td>
        <td class="text">
            <strong>Outro Filme</strong><br>
            Criado por: Ciclano<br>
            <div id="hwood-rating-stars-2">
                ★★☆☆☆
            </div>
        </td>
    </tr>
</table>
--}}
<!-- Barra de busca -->
<div class="component">
    <form class="search-box" onsubmit="return false;">
        <table class="search-box">
            <tr>
                <td class="search-box-label">Buscar:</td>
                <td><input type="text" class="search-box-query" placeholder="Digite o nome do filme..."></td>
                <td><input type="submit" value="Procurar"></td>
            </tr>
        </table>
    </form>
    <p class="search-result-count">Resultados encontrados: X</p>
</div>
