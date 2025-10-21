<form action="#" method="post" id="topic-settings-form">
    <div id="topic-name-area">
        <div class="topic-name-input">
            <span class="topic-name-text" id="topic_name_text">Topic: (max 32 characters)</span>
        </div>
        <div class="topic-name-input">
            <input type="text" size="38" maxlength="32" name="topic_name" id="topic_name"
                onkeyup="validateGroupElements('topic_name', 32, 'myhabbo.topic.name.max.length.exceeded');" value="{{ $topic->topic_title}}">
        </div>
        <div id="topic-name-error"></div>
        <div id="topic_name_message_error" class="error"></div>
    </div>
    <div id="topic-type-area">
        <div class="topic-type-label">
            <span class="topic-type-label">Type:</span>
        </div>
        <div class="topic-type-input">
            <input type="radio" name="topic_type" id="topic_open" value="0" {{ $topic->is_open == 1 ? 'checked="true"' : '' }}> Open
            <br>
            <input type="radio" name="topic_sticky" id="topic_normal" value="0" {{ $topic->is_stickied == 0 ? 'checked="true"' : '' }}> Normal
        </div>
        <div class="topic-type-input">
            <input type="radio" name="topic_type" id="topic_closed" value="1" {{ $topic->is_open == 0 ? 'checked="true"' : '' }}> Closed
            <br>
            <input type="radio" name="topic_sticky" id="topic_sticky" value="1" {{ $topic->is_stickied == 1 ? 'checked="true"' : '' }}> Sticky thread
        </div>
    </div>
    <br clear="all">
    <br clear="all">
    <div id="topic-button-area" class="topic-button-area clear">

        <a href="#" class="colorlink dialogbutton" id="save-topic-settings" style="float: left">
            <span>Ok</span>
        </a>
        <a href="#" class="colorlink noarrow" id="delete-topic" style="float: right">
            <span>Delete</span>
        </a>
        <a href="#" class="colorlink noarrow" id="cancel-topic-settings" style="float: right">
            <span>Cancel</span>
        </a>
    </div>
    <br clear="all">
</form>

