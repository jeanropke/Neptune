@extends('layouts.admin.master', ['menu' => 'catalogue'])

@section('title', 'Crackables Configuration')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.catalogue', ['submenu' => 'crackables'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                <div class="tableborder">
                    <div class="tableheaderalt">Crackables - Add new item</div>
                    <form id="inventory">
                        {{ csrf_field() }}
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tbody>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Crackable furni</b>
                                        <div class="graytext">This is the furni will be crackeable.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <div id="crackable-furni" class="furni-slot">
                                            <div class="furni-add"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Save Configuration" class="realbutton"
                                            accesskey="s">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </td>
    </tr>
</table>

<script>

function isJSON(str) {
    try {
        return (JSON.parse(str) && !!str);
    } catch (e) {
        return false;
    }
}

function setupMouseover(e) {
    let name = e.getAttribute('alt');
    let tooltip = $('tooltip');
    let coords = Position.cumulativeOffset(e);
    let x = coords[0];
    let y = coords[1];

    tooltip.innerHTML = name;
    tooltip.style.left = (x - tooltip.offsetWidth / 2 + e.offsetWidth / 2) + "px";
    tooltip.style.top = (y - e.offsetHeight - window.pageYOffset) + "px";
    tooltip.style.display = 'block';
}

function setupMouseleave(e) {
    $('tooltip').style.left = -1000 + 'px';
}


function setupRewardFurni(id, name, slot) {
    $J(slot).innerHTML = '';
    $J(slot).append(Builder.node('div', { class: 'icon', style: 'background: url(/gordon/dcr/hof_furni/icon/' + name.replace('*', '_') + '_icon.png) center no-repeat' }));
    $J(slot).append(Builder.node('input', { type: 'number', value: id, name: slot, hidden: 'hidden' }));
    $J(slot).removeClass('furni-add');
    closeSelectReward();
    setupMouseleave();
}

function furniSearchButton(slot) {
    new Ajax.Request("{{ route('admin.catalogue.furni.search') }}", {
        method: "post", parameters: { _token: _token, furni: $('furni-search-string').value }, onComplete: function (req, json) {
            if (isJSON(req.responseText)) {
                var json = JSON.parse(req.responseText);
                $('search-furni-results').innerHTML = '';
                json.forEach(item => {
                    $('search-furni-results').append(Builder.node('div',
                        { class: 'crafting-slot', alt: item.public_name, onclick: "setupRewardFurni('"+ item.id +"', '" + item.item_name + "', '.furni-add')", onmouseleave: 'setupMouseleave(this)', onmouseover: 'setupMouseover(this)' },
                        [Builder.node('div',
                            { class: 'icon', style: 'background: url(/gordon/dcr/hof_furni/icon/' + item.item_name.replace('*', '_') + '_icon.png) center no-repeat' })]))
                });
            }
            else {
                $('search-furni-results').innerHTML = req.responseText;
            }
        }
    });
}

    $J('#crackable-furni').click(function() {
        selectResultFurni('result');
    });

    function selectResultFurni(slot){
        var dialog = createDialog("select_reward_dialog", "Select furni", 9001, 0, -1000, closeSelectReward);
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
</script>
@stop
