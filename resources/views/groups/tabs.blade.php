<ul>
    <li {{ $selected == 'page' ? 'id=selected' : '' }}><a href="{{ url('/') }}/{{ $group->url }}">Front Page</a></li>
    <li {{ $selected == 'forum' ? 'id=selected' : '' }}>
        <a href="{{ url('/') }}/{{ $group->url }}/discussions">Discussion Forum
            @if ($group->forum_type == 1)
                <img src="{{ cms_config('site.web.url') }}/images/grouptabs/privatekey.png" alt="Private Forum" title="Private Forum" class="header-bar-group-status">
            @endif
        </a>
    </li>
</ul>
