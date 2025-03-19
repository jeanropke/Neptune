<script type="text/javascript">
    var promoPages = [
            @foreach($top_stories as $article)
            {
            text: "{{ $article->short_text }}",

            image: "<img width=\"425\" height=\"178\" border=\"0\" src=\"{{ $article->image }}\" /\>",
            links: [
                "<a href=\"/article/{{ $article->url }}\">{{ __('Read More!') }}</a>",
                "<a href=\"/client\" target=\"client\" onclick=\"openOrFocusHabbo(this); return false;\"\>{{ __('Enter Hotel') }}</a\>"

            ]
        },
        @endforeach
    ];
</script>

<div id="promoarea">
    <div id="promoheader">
    <h2>{{ __('Top stories') }}</h2>
        <ul style="display: block;" id="promoheader-selectors">
            <li><a href="#" class="selected" onclick="showPromo(0); return false;">1</a></li>
            @for($i = 1; $i < $top_stories->count(); $i++)
                <li><a href="#" onclick="showPromo({{ $i }}); return false;">{{ $i+1 }}</a></li>
                @endfor
        </ul>
        <script type="text/javascript">
            $('promoheader-selectors').style.display = "block";
        </script>
    </div>
    <div id="promocontent">
        <div id="promobody">
            @if($top_stories->count() > 0)
            <p id="promoimage">
                <img width="425" height="178" border="0" src="{{ $top_stories[0]->image }}"></a>
            </p>

            <div class="promotext">
                <p id="promotext-content">{{ $top_stories[0]->short_text }}</p>
            </div>
            <div id="promolinks">
                <ul id="promolinks-list">
                <li><a href="/article/{{ $top_stories[0]->url }}">{{ __('Read More!') }}</a></li>
                    <li><a href="/client" target="client" onclick="openOrFocusHabbo(this); return false;">{{ __('Enter Hotel') }}</a>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
<div id="newsbox">
    <div id="newsbox-header">
    <h2>{{ __('What\'s New') }}</h2>
    </div>
    <div id="newsbox-text">
        @foreach($articles as $article)
        <div class="newsitem">
            <h3><span class="articledate">[{{ $article->created_at->format('d/m/y') }}]</span>
                <a href="/article/{{ $article->url }}">{{ $article->title }}</a></h3>

            <p>
                {{ $article->short_text }}
            </p>
        </div>
        @endforeach

    </div>
    <div id="newsbox-footer">
        <div class="promo-button"><a href="/articles" alt="">{{ __('More News') }}</a></div>
    </div>
</div>
