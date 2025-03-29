@extends('layouts.admin.master', ['menu' => 'catalogue'])

@section('title', 'General Configuration')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.catalogue', ['submenu' => 'crafting'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                <div class="tableborder">
                    <div class="tableheaderalt">Altar Recipes</div>
                    <div id="crafting" style="height: 56px">
                        @foreach ($altars as $altar)

                        <div class="crafting-slot">
                            <a id="openCrafting"
                                href="{{ route('admin.catalogue.crafting.recipes', $altar->altar_id) }}">
                                <div class="icon"
                                    style="background: url({{ url('/') }}/gordon/dcr/hof_furni/icon/{{ $altar->getFurni()->item_name }}_icon.png) center no-repeat">
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>

<script>
    $('#openCrafting').click(function (e) {
        e.preventDefault();
        window.open(this.href, 'pagina', "width=570, height=235, top=100, left=110, scrollbars=no ");
    });
</script>
@stop
