@if(cms_config('site.ads_160.enabled'))
<div class="ad-scale ad160" id="ad160">
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
                    <img src="{{ url('/') }}/web/images/ads/160/{{ mt_rand(1, 4) }}.gif">
                    @else
                    {!! cms_config('site.ads_160.content') !!}
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
@endif
