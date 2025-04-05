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
    <a href="#" class="toolbutton" id="guestbook-form-continue"><span><b>Edit</b></span><i></i></a>
    <a href="#" class="toolbutton save" id="guestbook-form-post" style="float: right"><span><b>Save</b></span><i></i></a>
</div>
