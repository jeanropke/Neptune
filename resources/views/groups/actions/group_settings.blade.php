<form action="#" method="post" id="group-settings-form">

    <div id="group-settings" style="">
        <div id="group-settings-data" class="group-settings-pane">
            <img src="{{ cms_config('site.groupbadge.url') . $group->badge }}.gif">
            <div id="group-identity-area">
                <div id="group-name-area">
                    <div id="group_name_message_error" class="error"></div>
                    <label for="group_name" id="group_name_text">Edit Group name:</label>
                    <input type="text" name="group_name" id="group_name" onkeyup="validateGroupElements('group_name', 30, 'Maximum Group name length reached');" value="|">
                    <br>
                </div>

                <div id="group-url-area">
                    <div id="group_url_message_error" class="error" style="display: none;"></div>
                    <label for="group_url" id="group_url_text">Edit Group URL:</label>
                    <br>
                    <input type="text" name="group_url" id="group_url" onkeyup="validateGroupElements('group_url', 30, 'URL limit reached');" value="{{ $group->alias }}">
                    <br>
                    <input type="hidden" name="group_url_edited" id="group_url_edited" value="{{ $group->alias != null ? '1' : '0' }}">
                </div>

                <div id="group-type-area">
                    <p>
                        <label for="group_type" id="group_type_text">Edit Group type:</label>
                        <select id="group_type" id="group_type">
                            <option value="0">Regular</option>
                            <option value="1">Exclusive</option>
                            <option value="2">Private</option>
                            <option value="3">Unlimited</option>
                        </select>
                        <input type="hidden" id="initial_group_type" value="0">
                    </p>
                </div>
            </div>

            <div id="group-forum-area">
                <p>
                    <label for="forum_type" id="forum_type_text">Edit Forum type:</label>
                    <select id="forum_type" name="forum_type">
                        <option value="0">Public</option>
                        <option value="1">Private</option>
                    </select>
                </p>

                <p>
                    <label for="new_topic_permission" id="new_topic_permission_text">Topic permission:</label>
                    <select id="new_topic_permission" name="new_topic_permission">
                        <option value="2">Admin</option>
                        <option value="1">Members</option>
                        <option value="0">Everyone</option>
                    </select>
                </p>
            </div>

            <div id="group-description-area">
                <div id="group_description_message_error" class="error" style="display: none;"></div>
                <label for="group_description" id="description_text">Edit text:</label>
                <span id="description_chars_left">
                    <label for="characters_left">Characters left:</label>
                    <input id="group_description-counter" type="text" value="255" size="3" readonly="readonly" class="amount">
                </span>
                <textarea name="group_description" id="group_description" onkeyup="validateGroupElements('group_description', 255, 'Description limit reached');">{{ $group->description }}</textarea>
            </div>
        </div>
    </div>

    <div id="group-button-area">
        <a href="#" id="group-settings-update-button" class="toolbutton" onclick="showGroupSettingsConfirmation('{{ $group->id }}');">
            <span>Save changes</span>
        </a>
        <a id="group-delete-button" href="#" class="toolbutton red-button"
            onclick="openGroupActionDialog('/groups/actions/confirm_delete_group', '/groups/actions/delete_group', null , '{{ $group->id }}', null);">
            <span>Delete group</span>
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
