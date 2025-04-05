<form action="#" method="post" id="webstore-notes-form">
    <input type="hidden" name="maxlength" id="webstore-notes-maxlength" value="500" />
    <div id="webstore-notes-counter">500</div>
    <p>
        <select id="webstore-notes-skin" name="skin">
            <option value="1" id="webstore-notes-skins-select-defaultskin" {{ ($item->skin ?? 0) == 1 ? 'selected' : ''  }}>Default</option>
            <option value="6" id="webstore-notes-skins-select-goldenskin" {{ ($item->skin ?? 0) == 6 ? 'selected' : ''  }}>Golden</option>
            <option value="3" id="webstore-notes-skins-select-metalskin" {{ ($item->skin ?? 0) == 3 ? 'selected' : ''  }}>Metal</option>
            <option value="5" id="webstore-notes-skins-select-notepadskin" {{ ($item->skin ?? 0) == 5 ? 'selected' : ''  }}>Notepad</option>
            <option value="2" id="webstore-notes-skins-select-speechbubbleskin" {{ ($item->skin ?? 0) == 2 ? 'selected' : ''  }}>Speech Bubble</option>
            <option value="4" id="webstore-notes-skins-select-noteitskin" {{ ($item->skin ?? 0) == 4 ? 'selected' : ''  }}>Stickie Note</option>
            @if (!user()->getSubscription()->isExpired())
                <option value="8" id="edit-menu-skins-select-hc_pillowskin" {{ ($item->skin ?? 0) == 8 ? 'selected' : ''  }}>HC Bling</option>
                <option value="7" id="edit-menu-skins-select-hc_machineskin" {{ ($item->skin ?? 0) == 7 ? 'selected' : ''  }}>HC Scifi</option>
            @endif
            @if (user()->rank > 5)
                <option value="9" id="edit-menu-skins-select-nakedskin" {{ ($item->skin ?? 0) == 9 ? 'selected' : ''  }}>Staff - Naked Skin</option>
            @endif
        </select>
    </p>
    <div id="webstore-notes-edit-container">
        <textarea id="webstore-notes-text" rows="7" cols="42" name="noteText">{{ $item->data ?? '' }}</textarea>
        <script type="text/javascript">
            bbcodeToolbar = new Control.TextArea.ToolBar.BBCode("webstore-notes-text");
            bbcodeToolbar.toolbar.toolbar.id = "bbcode_toolbar";
            var colors = {
                "red": ["#d80000", "Red"],
                "orange": ["#fe6301", "Orange"],
                "yellow": ["#ffce00", "Yellow"],
                "green": ["#6cc800", "Green"],
                "cyan": ["#00c6c4", "Cyan"],
                "blue": ["#0070d7", "Blue"],
                "gray": ["#828282", "Gray"],
                "black": ["#000000", "Black"]
            };
            bbcodeToolbar.addColorSelect("Color", colors, true);
        </script>
        {{--<div id="linktool">
            <div id="linktool-scope">
                <label for="linktool-query-input">Create link:</label>
                <input type="radio" name="scope" class="linktool-scope" value="1" checked="checked" />Habbos
                <input type="radio" name="scope" class="linktool-scope" value="2" />Rooms <input type="radio"
                    name="scope" class="linktool-scope" value="3" />Groups
            </div>
            <input id="linktool-query" type="text" name="query" value="" />
            <a href="#" class="new-button" id="linktool-find"><b>Find</b><i></i></a>
            <div class="clear" style="height: 0;"><!-- --></div>
            <div id="linktool-results" style="display: none">
            </div>
            <script type="text/javascript">
                linkTool = new LinkTool(bbcodeToolbar.textarea);
            </script>
        </div>--}}
        <p class="warning">Note! The text is not editable after you place the note to your page.</p>
    </div>

</form>
<div class="player-buttons" style="height: 11px">
    <a href="#" id="note-editor-purchase" class="colorlink"><span>Purchase notes</span></a>
</div>
<br>
<div>
    <a href="#" id="note-editor-cancel" class="toolbutton"><span>Cancel</span></a>
    <a href="#" id="note-editor-preview" class="colorlink" style="margin: 0; margin-top: 4px"><span>Preview</span></a>
</div>

<div class="clear"></div>
