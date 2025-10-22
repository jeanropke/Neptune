@php($songs = $owner->traxSongs)
<div class="movable widget TraxPlayerWidget" id="widget-{{ $item->id }}"
    style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skinName }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3>
                    <span class="header-left"></span>
                    <span class="header-middle">&nbsp;TRAXPLAYER&nbsp;</span>
                    <span class="header-right">@include('home.edit_button', ['type' => 'widget'])</span>
                </h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                @if($editing)
                <div id="traxplayer-content" style="text-align: center;">
                    <img src="{{ cms_config('site.web.url') }}/images/myhabbo/traxplayer/player.png" />
                </div>
                <div id="edit-menu-trax-select-temp" style="display:none">
                    <select id="trax-select-options-temp">
                        <option value="">-Choose song-</option>
                        @foreach($songs as $song)
                        <option value="{{ $song->id }}">{{ !empty($song->title) ? $song->title : "Song #{$song->id}" }}</option>
                        @endforeach
                    </select>
                </div>
                @elseif($item->data == null)
                You don't have a selected Trax song
                @else
                <div id="traxplayer-content" style="text-align:center;"></div>
                <embed type="application/x-shockwave-flash" src="{{ cms_config('site.web.url') }}/flash/traxplayer/traxplayer.swf"
                    name="traxplayer" quality="high" base="{{ cms_config('site.web.url') }}/flash/traxplayer/"
                    allowscriptaccess="always" menu="false" wmode="transparent"
                    flashvars="songUrl={{ url('/') }}/myhabbo/trax_song/{{ $item->data }}&amp;sampleUrl={{ url('') }}/dcr/sound/mp3/"
                    height="66" width="210" />
                @endif
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
