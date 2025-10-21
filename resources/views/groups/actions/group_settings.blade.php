<form action="#" method="post" id="group-settings-form">

    <div id="group-settings" style="">
        <div id="group-settings-data" class="group-settings-pane">
            <img src="{{ cms_config('site.groupbadge.url') . $group->badge }}.gif">
            <div id="group-identity-area">
                <div id="group-name-area">
                    <div id="group_name_message_error" class="error"></div>
                    <label for="group_name" id="group_name_text">Edit Group name:</label>
                    <input type="text" name="group_name" id="group_name" onkeyup="validateGroupElements('group_name', 30, 'Maximum Group name length reached');" value="{{ $group->name }}">
                    <br>
                </div>

                <div id="group-url-area">
                    <div id="group_url_message_error" class="error" style="display: none;"></div>
                    <label for="group_url" id="group_url_text">Edit Group URL:</label>
                    <br>
                    <input type="text" name="group_url" id="group_url" onkeyup="validateGroupElements('group_url', 30, 'URL limit reached');" value="{{ $group->alias }}" {{ $group->alias != null ? 'disabled' : '' }}>
                    <br>
                    <input type="hidden" name="group_url_edited" id="group_url_edited" value="{{ $group->alias == null ? '1' : '0' }}">
                </div>

                <div id="group-type-area">
                    <p>
                        <label for="group_type" id="group_type_text" style="width: 45%;display: inline-block;">Edit Group type:</label>
                        <select id="group_type" id="group_type" style="width: 50%;" {{ $group->group_type == 3 ? 'disabled' : '' }}>
                            <option value="0" {{ $group->group_type == 0 ? 'selected' : '' }}>Regular</option>
                            <option value="1" {{ $group->group_type == 1 ? 'selected' : '' }}>Exclusive</option>
                            <option value="2" {{ $group->group_type == 2 ? 'selected' : '' }}>Private</option>
                            <option value="3" {{ $group->group_type == 3 ? 'selected' : '' }}>Unlimited</option>
                        </select>
                        <input type="hidden" id="initial_group_type" value="{{ $group->group_type }}">
                    </p>
                </div>
            </div>
            <div class="clear"></div>

            <div id="group-forum-area">
                <p>
                    <label for="forum_type" id="forum_type_text" style="width: 45%;display: inline-block;">Edit Forum type:</label>
                    <select id="forum_type" name="forum_type" style="width: 50%;">
                        <option value="0" {{ $group->forum_type == 0 ? 'selected' : '' }}>Public</option>
                        <option value="1" {{ $group->forum_type == 1 ? 'selected' : '' }}>Private</option>
                    </select>
                </p>

                <p>
                    <label for="new_topic_permission" id="new_topic_permission_text" style="width: 45%;display: inline-block;">Topic permission:</label>
                    <select id="new_topic_permission" name="new_topic_permission" style="width: 50%;">
                        <option value="2" {{ $group->forum_premission == 2 ? 'selected' : '' }}>Admin</option>
                        <option value="1" {{ $group->forum_premission == 1 ? 'selected' : '' }}>Members</option>
                        <option value="0" {{ $group->forum_premission == 0 ? 'selected' : '' }}>Everyone</option>
                    </select>
                </p>
            </div>

            <div id="group-description-area">
                <div id="group_description_message_error" class="error" style="display: none;"></div>
                <label for="group_description" id="description_text">Edit text:</label>
                <span id="description_chars_left">
                    <label for="characters_left">Characters left:</label>
                    <input id="group_description-counter" type="text" value="{{ 255 - Str::length($group->description) }}" size="3" readonly="readonly" class="amount">
                </span>
                <textarea name="group_description" id="group_description" onkeyup="validateGroupElements('group_description', 255, 'Description limit reached');">{{ $group->description }}</textarea>
            </div>
        </div>
    </div>

    <div id="group-button-area">
        <a id="group-delete-button" href="#" class="toolbutton red-button" onclick="openGroupActionDialog('/groups/actions/confirm_delete_group', '/groups/actions/delete_group', null , '{{ $group->id }}', null); return false;">
            <span>Delete group</span>
        </a>
        <a href="#" id="group-settings-update-button" class="toolbutton" onclick="showGroupSettingsConfirmation('{{ $group->id }}', 'title', 'confirm', 'urlConfirm', 'confirm button', 'cancel button'); return false;">
            <span>Save changes</span>
        </a>
        <a href="#" id="group-settings-close-button" class="toolbutton" onclick="closeGroupSettings(); return false;"><span>Cancel</span></a>
        <div class="clear"></div>
    </div>

</form>

<script>
    var exitEl = $("dialog-group-settings-exit");
    if (exitEl) {
        Event.observe(exitEl, "click", function(e) {
            Event.stop(e);
            closeGroupSettings();
        });
    }
</script>

<script type="text/javascript" language="JavaScript">
    L10N.put("group.settings.title.text", "Edit Group Settings");
    L10N.put("group.settings.group_type_change_warning.normal", "Are you sure you want to change the group type to <strong\>normal</strong\>?");
    L10N.put("group.settings.group_type_change_warning.exclusive", "Are you sure you want to change the group type to <strong \>exclusive</strong\>?");
    L10N.put("group.settings.group_type_change_warning.closed", "Are you sure you want to change the group type to <strong\>private</strong\>?");
    L10N.put("group.settings.group_type_change_warning.large", "Are you sure you want to change the group type to <strong\>large</strong\>? If you continue you can\'t change it back later!");
    L10N.put("myhabbo.groups.confirmation_ok", "Ok");
    L10N.put("myhabbo.groups.confirmation_cancel", "Cancel");
</script>
