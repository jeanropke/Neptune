<div id="outer">
    <div id="outer-content">
        <div id="footer">
            <div id="footer-top">
                <div id="footer-content">
                    <p>
                    <a href="/">{{ __('HOME') }}</a>
                        |
                        <a href="/hotel">{{ __('New?') }}</a>
                        |
                        <a href="/club">{{ __('Habbo Club', ['hotel' => cms_config('hotel.name.short')]) }}</a>
                        |
                        <a href="/credits">{{ __('Coins') }}</a>
                        |
                        <a href="/community">{{ __('Community') }}</a>
                        |
                        <a href="/groups">{{ __('Groups') }}</a>
                        |
                        <a href="/games">{{ __('Games') }}</a>
                        |
                        <a href="/help">{{ __('Help') }}</a>
                    </p>
                    {{--<p><a href="/footer_pages/privacy_policy.html">Privacy Policy</a> | <a href="/footer_pages/terms_and_conditions.html">Terms &amp; Conditions of Use</a> |
                        <a href="/footer_pages/terms_of_sale.html">Terms &amp; Conditions of Sale</a> |<a href="/help/lawenforcementcontact.html">Law Enforcement</a> | <a href="/footer_pages/atlas.html">Other {{ cms_config('hotel.name.short') }} sites</a> |<a href="/footer_pages/advertise_in_habbo.html">Advertise in Habbo</a> | <a href="https://web.archive.org/web/20071001095005/http://www.sulake.com/">Sulake</a>
                    </p>--}}
                    <p class="footer-legal">© {{ date('Y') }} {{ __('Sulake Corporation Ltd. HABBO is a registered trademark of Sulake Corporation Oy. This is not HABBO and :hotel is not affiliated with Sulake.', ['hotel' => cms_config('hotel.name.short')]) }}</p>
                </div>
            </div>
            <div id="footer-bottom">
                <div id="footer-bottom-content"></div>
            </div>
        </div>
    </div>
</div>

<div id="outer-bottom">
    <div id="outer-bottom-content"></div>
</div>
@if(cms_config('site.ads.enabled') == '1')
<div id="ad-leader" align="center">
    <div class="ad-scale ad-leader">
        <table>
            <tr>
                <td class="ad-header-tl"></td>
                <td class="ad-header-t"></td>
                <td class="ad-header-tr"></td>
            </tr>
            <tr>
                <td class="ad-content-ml"></td>
                <td class="ad-content-m" align="center" valign="top">
                    @if(config('app.debug'))
                    <img src="{{ url('/') }}/web/images/ads/728/{{ mt_rand(1, 5) }}.gif">
                    @else
                    {!! cms_config('site.ads.footer') !!}
                    @endif
                </td>
                <td class="ad-content-mr"></td>
            </tr>
            <tr>
                <td class="ad-content-bl"></td>
                <td class="ad-content-b"></td>
                <td class="ad-content-br"></td>
            </tr>
        </table>
    </div>
</div>
<div id="footer-message" style="width: 736px; margin: 8px auto;"><img src="{{ url('/') }}/web/images/warnings/message-footer.png"></div>
<script>
if($('ad-leader').offsetHeight == 0) $('footer-message').style.display = 'block';
</script>
@endif
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-39999584-3"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-39999584-3');

</script>
