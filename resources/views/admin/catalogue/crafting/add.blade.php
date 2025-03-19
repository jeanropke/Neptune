<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="{{ url('/') }}/web/admin/styles/style.css" type="text/css" rel="stylesheet" />
    <link href="{{ url('/') }}/web/styles/style.css" type="text/css" rel="stylesheet" />
    <link href="{{ url('/') }}/web/styles/myhabbo/buttons.css" type="text/css" rel="stylesheet" />

    <script>
        var habboStaticFilePath = "/web/";
        var habboImagerUrl = "/habbo-imaging/";
        var _token = '{{ csrf_token() }}';
    </script>
    <script src="{{ url('/') }}/web/js/prototype.js"></script>
    <script src="{{ url('/') }}/web/js/builder.js"></script>
    <script src="{{ url('/') }}/web/js/habbo.js"></script>
    <script src="{{ url('/') }}/web/admin/js/crafting.js"></script>
    <title>Crafting - Add new recipe</title>
</head>

<body id="crafting" style="padding: 10px;">
    <div id="overlay" style="display: none; height: 1122px; z-index: 9000;"></div>
    <div id="tooltip" style="display: none; z-index: 9999" class="tooltip tooltip-bottom">...</div>
    <div id="wrapper">
        <p>Adding new recipe to <b>{{ $altar->getFurni()->public_name }}</b></p>
        <form id="craft-form" class="crafting-slots clearfix">
            {{ csrf_field() }}
            <input type="number" name="altar_id" value="{{ $altar->altar_id  }}" hidden="hidden">
            <div id="ingredient_0" class="crafting-slot" onclick="selectResultFurni('ingredient_0')">
                <div class="crafting-add"></div>
            </div>
            <div id="equal" class="crafting-equal"></div>
            <div id="result" class="crafting-slot" onclick="selectResultFurni('result')">
                <div class="crafting-add"></div>
            </div>
        </form>
        <a id="save-button" href="#" class="toolbutton save" style="float: none"><span>Save</span></a>
    </div>
</body>
<script>
    function selectResultFurni(slot){
        var dialog = createDialog("select_reward_dialog", "Select Reward", 9001, 0, -1000, closeSelectReward);
        appendDialogBody(dialog, "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_habbos.gif\" alt=\"\" /></p><div style=\"clear\"></div>", true);
        showOverlay();
        new Ajax.Request("{{ route('admin.catalogue.crafting.reward.select') }}",{
            method: "post", parameters: { _token: _token, slot: slot }, onComplete: function(req, json) {
                setDialogBody(dialog, req.responseText);
                moveDialogToCenter(dialog);
            }
        });
    };

    function closeSelectReward(e) {
	if (e) {
		Event.stop(e);
	}
	if($("select_reward_dialog")) {
		Element.remove("select_reward_dialog");
	}
	if($("select_reward_result")) {
		Element.remove("select_reward_result");
	}
	hideOverlay();
}

Event.observe($("save-button"), "click", saveObserver, false);
var saveStart = 0;
function saveObserver() {
    new Ajax.Request("{{ route('admin.catalogue.crafting.recipe.save') }}",{
            method: "post", parameters: $('craft-form').serialize(), onComplete: function(req, json) {
                saveStart = Date.now();
                waitAndGo("{{ route('admin.catalogue.crafting.recipes', $altar->altar_id) }}");
            }
        });
}


function waitAndGo(B) {
    var C = new Date().getTime();
    var A = C - saveStart;
    if (A < 250) {
        A = 250
    }
    window.setTimeout(function() {
        location.href = B
    }, A)
}

</script>

</html>
