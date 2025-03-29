<div id="select_furni_box">
    <div id="furni-list-search">
        <input type="text" style="float:left;" id="furni-search-string" placeholder="Type the furni name">
        <a class="colorlink orange last" style="float:left;" id="furni-search-button"
            onclick="furniSearchButton('{{ $slot }}')"><span>Search</span></a><input type="number"
            style="float: right;width: 60px" id="furni-amount" placeholder="Amount">
    </div>
    <div id="search-furni-results"></div>
</div>
<div class="clearfix"></div>
