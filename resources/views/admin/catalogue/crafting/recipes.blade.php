<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="/web/admin/styles/style.css" type="text/css" rel="stylesheet" />
    <link href="{{ url('/') }}/web/styles/style.css" type="text/css" rel="stylesheet" />
    <title>Crafting</title>
</head>

<body id="crafting">
    <div id="wrapper">
        <div class="crafting-slots">
    {{-- Show all recipes for crafting altar --}}
    @if(isset($recipes))
    @foreach ($recipes as $recipe)
    <div class="crafting-slot">
        <a href="{{ route('admin.catalogue.crafting.recipe', $recipe->getRecipe()->id) }}">
            <div class="icon"
        style="background: url({{ url('/') }}/gordon/dcr/hof_furni/icon/{{ $recipe->getRecipe()->product_name }}_icon.png) center no-repeat">
            </div>
        </a>
    </div>
    @endforeach

    <div class="crafting-slot">
        <a href="{{ route('admin.catalogue.crafting.recipe.add', $recipe->altar_id) }}">
            <div class="crafting-add">
            </div>
        </a>
    </div>
    {{-- Show ingredients for recipe --}}
    @else
    @foreach($recipe->getIngredients() as $ingredient)
    <div class="crafting-slot">
    <div class="amount">x{{ $ingredient->amount }}</div>
        <div class="icon"
            style="background: url(http://127.0.0.1/gordon/dcr/hof_furni/icon/{{ $ingredient->getFurni()->item_name }}_icon.png) center no-repeat">
        </div>
    </div>
    @endforeach
    <div class="crafting-equal"></div>
    <div class="crafting-slot">
        <div class="icon"
            style="background: url(http://127.0.0.1/gordon/dcr/hof_furni/icon/{{ $recipe->product_name }}_icon.png) center no-repeat">
        </div>
    </div>
    @endif
</div>
</div>
</body>

</html>
