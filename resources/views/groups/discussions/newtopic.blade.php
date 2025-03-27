<table border="0" cellpadding="0" cellspacing="0" width="100%" class="group-postlist-list" id="group-postlist-list">
    <tr class="new-topic-entry-label" id="new-topic-entry-label">
        <td class="new-topic-entry-label">Topic:</td>
        <td colspan="2">
            <table border="0" cellpadding="0" cellspacing="0" style="margin: 5px; width: 98%;">
                <tr>
                    <td>
                        <div class="post-list-content-element"><input type="text" size="50" id="new-topic-name" value="" /></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="topic-name-error">
        <td></td>
        <td>
            <div id="topic-name-error"></div>
        </td>
    </tr>
    <tr id="new-post-entry-message" style="background-color:#E5E5E5;">
        <td class="new-post-entry-label">
            <div class="new-post-entry-label" id="new-post-entry-label">Viesti:</div>
        </td>
        <td colspan="2">
            <table border="0" cellpadding="0" cellspacing="0" style="margin: 5px; width: 98%;">
                <tbody>
                    <tr>
                        <td>
                            <input type="hidden" id="edit-type">
                            <input type="hidden" id="post-id">
                            <input type="hidden" id="topic-id" value="2154">
                            <input type="hidden" id="group-id" value="10747">
                            <textarea cols="66" rows="5" name="message" id="post-message" style="height: 153px; width: 550px;"></textarea>
                            <script type="text/javascript">
                                bbcodeToolbar = new Control.TextArea.ToolBar.BBCode("post-message");
                                bbcodeToolbar.toolbar.toolbar.id = "bbcode_toolbar";
                                var colors = {
                                    "red": ["#d80000", "Punainen"],
                                    "orange": ["#fe6301", "Oranssi"],
                                    "yellow": ["#ffce00", "Keltainen"],
                                    "green": ["#6cc800", "Vihreä"],
                                    "cyan": ["#00c6c4", "Turkoosi"],
                                    "blue": ["#0070d7", "Sininen"],
                                    "gray": ["#828282", "Harmaa"],
                                    "black": ["#000000", "Musta"]
                                };
                                bbcodeToolbar.addColorSelect("Väri", colors, false);
                            </script>
                            <div id="linktool-inline">
                                <div id="linktool-scope">
                                    <label for="linktool-query-input">Create link:</label>
                                    <input type="radio" name="scope" class="linktool-scope" value="1" checked="checked">Habbos
                                    <input type="radio" name="scope" class="linktool-scope" value="2">Rooms
                                    <input type="radio" name="scope" class="linktool-scope" value="3">Groups&nbsp;
                                    <input id="linktool-query" type="text" size="25" name="query" value="">
                                </div>
                                <a href="#" class="colorlink orange" id="linktool-find"><span>Find</span></a>
                                <div class="clear" style="height: 0;"><!-- --></div>
                                <div id="linktool-results">
                                </div>
                                <script type="text/javascript">
                                    linkTool = new LinkTool(bbcodeToolbar.textarea);
                                </script>
                            </div>
                            <br><br>
                            <a href="#" class="colorlink noarrow dialogbutton" id="post-form-cancel"><span>Cancel</span></a>
                            <a href="#" class="colorlink dialogbutton" id="post-form-preview"><span>Preview</span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>

</table>
<table id="new-topic-preview-container">
</table>
