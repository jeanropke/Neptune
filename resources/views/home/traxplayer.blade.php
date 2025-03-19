@php($songs = \App\Models\Home\HomeTrax::get())
<div class="movable widget TraxPlayerWidget" id="widget-{{ $item->id }}"
    style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3>@if($isEdit)
                    <img src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18"
                        class="edit-button" id="widget-{{ $item->id }}-edit" />
                    <script language="JavaScript" type="text/javascript">
                        Event.observe('widget-{{ $item->id }}-edit', 'click', function(e) { openEditMenu(e, {{ $item->id }}, 'widget', 'widget-{{ $item->id }}-edit'); }, false);
                    </script>
                    @endif<span class="header-left">&nbsp;</span><span class="header-middle">TRAXPLAYER</span><span
                        class="header-right">&nbsp;</span>
                </h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                @if($isEdit)
                <div id="traxplayer-content" style="text-align: center;">
                    <img src="{{ url('/') }}/web/images/myhabbo/traxplayer/player.png" />
                </div>
                <div id="edit-menu-trax-select-temp" style="display:none">
                    <select id="trax-select-options-temp">
                        <option value="">-Choose song-</option>
                        @foreach($songs as $song)
                        <option value="{{ $song->id }}">{{ $song->name }}</option>
                        @endforeach
                    </select>
                </div>

                @elseif($item->data == null)
                You don't have a selected Trax song
                @else
                <div id="traxplayer-content" style="text-align:center;"></div>
                <embed type="application/x-shockwave-flash" src="{{ url('/') }}/web/flash/traxplayer/traxplayer.swf"
                    name="traxplayer" quality="high" base="{{ url('/') }}/web/flash/traxplayer/"
                    allowscriptaccess="always" menu="false" wmode="transparent"
                    flashvars="songUrl={{ url('/') }}/myhabbo/trax_song/{{ $item->data }}&amp;sampleUrl={{ url('') }}/gordon/dcr/hof_furni/mp3/"
                    height="66" width="210" />
                @endif
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
