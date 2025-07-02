<div id="group-purchase-header">
    <img src="{{ cms_config('site.web.url') }}/images/groups/group_icon.gif" alt="" width="46" height="46" />
</div>

<p>
    Price: <b>{{ $groupProduct->price }} Credits</b>.<br> You have: <b>{{ user()->credits }} Credits</b>.
</p>

<form action="#" method="post" id="purchase-group-form-id">

    <div id="group-name-area">
        <div id="group_name_message_error" class="error"></div>
        <label for="group_name" id="group_name_text">Group name:</label>
        <input type="text" name="group_name" id="group_name" maxlength="30" onKeyUp="validateGroupElements('group_name', 30, 'Maximum Group name length reached');"
            value="" /><br />
    </div>

    <div id="group-description-area">
        <div id="group_description_message_error" class="error"></div>
        <label for="group_description" id="description_text">Group description:</label>
        <span id="description_chars_left"><label for="characters_left">Characters left:</label>
            <input id="group_description-counter" type="text" value="255" size="3" readonly="readonly" class="amount" /></span><br />
        <textarea name="group_description" id="group_description" onKeyUp="validateGroupElements('group_description', 255, 'Maximum description length reached');"></textarea>
    </div>
</form>

<div class="new-buttons clearfix">
    <a class="new-button" id="group-purchase-cancel-button" href="#" onclick='cancelGroupPurchase(); return false;'><b>Cancel</b><i></i></a>
    <a class="new-button" href="#" onclick="showGroupPurchaseConfirmation('g0 group_product', 'Create a Group'); return false;"><b>Buy this Group</b><i></i></a>
</div>
