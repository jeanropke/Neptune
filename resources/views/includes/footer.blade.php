<div id="outer">
    <div id="outer-content">
        <div id="footer">
            <div id="footer-top">
                <div id="footer-content">
                    <p>
                        @foreach (cms_menu() as $item)
                            <a href="/{{ $item->url }}">{{ $item->caption }}</a>
                            @if(!$loop->last) | @endif
                        @endforeach
                    </p>
                    <p>
                        <a href="/footer_pages/privacy_policy">Privacy Policy</a> | <a href="/footer_pages/terms_and_conditions">Terms &amp; Conditions of Use</a> |
                        <a href="/footer_pages/terms_of_sale">Terms &amp; Conditions of Sale</a> | <a href="/help/lawenforcementcontact">Law Enforcement</a> |
                        <a href="/footer_pages/atlas">Other {{ cms_config('hotel.name.short') }} sites</a> | <a href="/footer_pages/advertise">Advertise in {{ cms_config('hotel.name.short') }}</a> |
                        <a href="https://www.sulake.com/">Sulake</a>
                    </p>
                    <p class="footer-legal">© {{ date('Y') }} Sulake Corporation Ltd. HABBO is a registered trademark of Sulake Corporation Oy. This is not HABBO and {{ cms_config('hotel.name.short') }} is
                        not affiliated with Sulake.</p>
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
@if (cms_config('site.ads_footer.enabled'))
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
                        @if (config('app.debug'))
                            <img src="{{ url('/') }}/web/images/ads/728/{{ mt_rand(1, 5) }}.gif">
                        @else
                            {!! cms_config('site.ads_footer.content') !!}
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
        if ($('ad-leader').offsetHeight == 0) $('footer-message').style.display = 'block';
    </script>
@endif
@if (cms_config('site.tracking.enabled'))
    {{ cms_config('site.tracking.content') }}
@endif
