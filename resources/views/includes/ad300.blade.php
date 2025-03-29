@if(cms_config('site.ads_300.enabled'))
<div class="ad-scale ad300" id="ad300">
    <table>
        <tbody>
            <tr>
                <td class="ad-header-tl"></td>
                <td class="ad-header-t"></td>
                <td class="ad-header-tr"></td>
            </tr>
            <tr>
                <td class="ad-content-ml"></td>
                <td class="ad-content-m" align="center" valign="top">
                    @if(config('app.debug'))
                    <img src="{{ url('/') }}/web/images/ads/300/{{ mt_rand(1, 4) }}.gif">
                    @else
                    {!! cms_config('site.ads_300.content') !!}
                    @endif
                </td>
                <td class="ad-content-mr"></td>
            </tr>
            <tr>
                <td class="ad-content-bl"></td>
                <td class="ad-content-b"></td>
                <td class="ad-content-br"></td>
            </tr>
        </tbody>
    </table>
</div>
<div id="message-300"><img src="{{ url('/') }}/web/images/warnings/message-300.png"></div>
<script>
if($('ad300').offsetHeight == 0) $('message-300').style.display = 'block';
</script>
@endif
