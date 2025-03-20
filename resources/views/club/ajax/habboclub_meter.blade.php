@if (!Auth::check())
    In order to join {{ cms_config('hotel.name.short') }} Club you need to <a href="{{ url('/') }}/login">log in</a> first.
@else
    @if (user()->getSubscription()->neverSubscribed()) {{-- never been hc member --}}
        <div id="subscription-meter-box2" style="left: 10px;">
            <div id="pastmonthsVal">0</div>
            <div style="float: right; width: 160px; margin-right: 10px;">
                Você nunca
                fez parte do {{ cms_config('hotel.name.short') }} Club, para entrar basta
                comprar um periodo
                abaixo. </div>
            <div style="float: left; width: 60px; margin-top: 45px;"><b>
                    <center><span class="lang-hcjoin-comingTitle">Periodos
                            Decorridos</span></center>
                </b></div>
        </div>
    @elseif(user()->getSubscription()->isExpired())
        {{-- hc membership expired --}}
        <div id="subscription-meter-box2" style="left: 10px;">
            <div id="pastmonthsVal">{{ user()->getSubscription()->getPassedMonths() }}</div>
            <div style="float: right; width: 160px; margin-right: 10px;">
                Seu Periodo
                de membro de {{ cms_config('hotel.name.short') }} Club venceu no dia
                {{ date('d/m/y', user()->getSubscription()->expiresAt()) }}, aproveite e renove a
                sua assinatura abaixo. </div>
            <div style="float: left; width: 60px; margin-top: 45px;"><b>
                    <center><span class="lang-hcjoin-comingTitle">Periodos
                            Decorridos</span></center>
                </b></div>
        </div>
    @elseif (!user()->getSubscription()->isExpired())
        {{-- has hc membership --}}
        @if (user()->getSubscription()->daysRemaining() > 31)
            {{-- has more than one month --}}
            @php($days = user()->getSubscription()->daysRemaining() % 31)
            <div id="subscription-meter-box">
                <div id="pastmonthsVal">{{ user()->getSubscription()->getPassedMonths() }}</div>
                <div id="clubdays"> <b>{{ $days }}</b> <span class="lang-hcjoin-remainingHeader">days
                        remaining</span> </div>
                <div id="comingmonthsVal">{{ user()->getSubscription()->monthsRemaining() }}</div>
                <span><img src="{{ url('/') }}/web/images/club/club_subscription_arrow.png" style="margin-left: {{ 52 + (31 - $days) * 5 }}px;"></span>
                <div style=" margin-top: 35px;">
                    <div style="float: left; width: 60px">
                        <center>Months passed</center>
                    </div>
                    <div style="float: right; width: 56px">
                        <center>Months to go</center>
                    </div>
                </div>
            </div>
        @else
            {{-- has more than one month --}}
            @php($days = user()->getSubscription()->daysRemaining() % 31)
            <div id="subscription-meter-box3" style="left: 20px;">
                <div id="habboclub-buy-details">
                    <span><img src="{{ url('/') }}/web/images/club/club_subscription_arrow.png" style="margin-left: {{ 55 + (31 - $days) * 5 }}px;"></span>
                    <div style=" margin-top: 35px;">
                        <div style="float: left; width: 56px">
                            <center><span class="lang-hcjoin-comingTitle">Periodos
                                    Decorridos</span></center>
                        </div>
                    </div>
                </div>
                <div id="pastmonthsVal">{{ user()->getSubscription()->getPassedMonths() }}</div>
                <div id="clubdays"> <b>{{ $days }}</b> <span class="lang-hcjoin-remainingHeader">days
                        remaining</span> </div>
            </div>
        @endif
    @endif
@endif
