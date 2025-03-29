function furniSearchButton(slot) {
    new Ajax.Request("../../furni/search", {
        method: "post", parameters: { _token: _token, furni: $('furni-search-string').value }, onComplete: function (req, json) {
            if (isJSON(req.responseText)) {
                var json = JSON.parse(req.responseText);
                $('search-furni-results').innerHTML = '';
                json.forEach(item => {
                    $('search-furni-results').append(Builder.node('div',
                        { class: 'crafting-slot', alt: item.public_name, onclick: "setupRewardFurni('" + item.id + "', '" + item.item_name + "', '" + slot + "')", onmouseleave: 'setupMouseleave(this)', onmouseover: 'setupMouseover(this)' },
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
    let amount = parseInt($('furni-amount').value) || 1;
    $(slot).innerHTML = '';
    let amountDiv = Builder.node('div', { class: 'amount' });
    amountDiv.innerHTML = 'x'+amount;
    $(slot).append(amountDiv);
    $(slot).append(Builder.node('div', { class: 'icon', style: 'background: url(/gordon/dcr/hof_furni/icon/' + name.replace('*', '_') + '_icon.png) center no-repeat' }));
    $(slot).append(Builder.node('input', { type: 'number', value: id, name: slot, hidden: 'hidden' }));

    //setup a new add button
    if (slot.startsWith('ingredient_')) {
        $(slot).append(Builder.node('input', { type: 'number', value: amount, name: slot.replace('ingredient', 'amount'), hidden: 'hidden' }));

        slot = parseInt(slot.split('_')[1]);
        if (slot == (document.getElementsByClassName('crafting-slots')[0].getElementsByClassName('crafting-slot').length - 2)) {
            $('equal').before(
                Builder.node('div', { id: 'ingredient_' + (slot + 1), class: 'crafting-slot', onclick: "selectResultFurni('ingredient_" + (slot + 1) + "')" },
                    [Builder.node('div', { class: 'crafting-add' })])
            );
        }
    }
    closeSelectReward();
    setupMouseleave();
}

function isJSON(str) {
    try {
        return (JSON.parse(str) && !!str);
    } catch (e) {
        return false;
    }
}

