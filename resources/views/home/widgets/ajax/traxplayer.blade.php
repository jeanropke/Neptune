<embed type="application/x-shockwave-flash" src="{{ cms_config('site.web.url') }}/flash/traxplayer/traxplayer.swf" name="traxplayer"
    quality="high" base="{{ cms_config('site.web.url') }}/flash/traxplayer/" allowscriptaccess="always" menu="false"
    wmode="transparent"
    flashvars="songUrl={{ url('/') }}/myhabbo/trax_song/{{ $item->id }}&amp;sampleUrl={{ url('/') }}/dcr/sound/mp3/"
    height="66" width="210" />
