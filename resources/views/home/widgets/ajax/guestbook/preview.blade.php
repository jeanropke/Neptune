<ul class="guestbook-entries">
    <li id="guestbook-entry--1" class="guestbook-entry">
        <div class="guestbook-author">
            <img src="{{ cms_config('site.avatarimage.url') }}{{ user()->figure }}&direction=2&head_direction=2&gesture=sml&size=s" alt="{{ user()->username }}"
                title="{{ user()->username }}" />
        </div>
        <div class="guestbook-message">
            <div class="{{ user()->isOnline() ? 'online' : 'offline' }}">
                <a href="{{ url('/') }}/home/{{ user()->username }}">
                    {{ user()->username }}
                </a>
            </div>
            <p>
                {!! $message !!}
            </p>
        </div>
        <div class="guestbook-cleaner">&nbsp;</div>
        <div class="guestbook-entry-footer metadata"></div>
    </li>
</ul>
<div class="guestbook-toolbar clearfix">
    <a href="#" class="new-button" id="guestbook-form-continue"><b>Editar</b><i></i></a>
    <a href="#" class="new-button" id="guestbook-form-post"><b>Salvar</b><i></i></a>
</div>
