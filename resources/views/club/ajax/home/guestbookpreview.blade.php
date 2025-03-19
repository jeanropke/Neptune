<ul class="guestbook-entries">
    <li id="guestbook-entry--1" class="guestbook-entry">
        <div class="guestbook-author">
            <img src="http://www.habbo.com/habbo-imaging/avatarimage?figure={{ Auth::user()->look }}&direction=2&head_direction=2&gesture=sml&size=s" alt="{{ Auth::user()->username }}" title="{{ Auth::user()->username }}" />
        </div>
        <div class="guestbook-message">
            <div class="{{ Auth::user()->isOnline() ? 'online' : 'offline' }}">
                <a href="{{ url('/') }}/home/{{ Auth::user()->username }}">
                    {{ Auth::user()->username }}
                </a>
            </div>
            <p>
                {!! $message  !!}
            </p>
        </div>
        <div class="guestbook-cleaner">&nbsp;</div>
        <div class="guestbook-entry-footer metadata"></div>
    </li>
</ul>
<div class="guestbook-toolbar clearfix">
        <a href="#" id="guestbook-form-continue" class="toolbutton"><span><b>Continue editing</b></span><i></i></a>
        <a href="#" id="guestbook-form-post" class="toolbutton notes" style="float: right"><span><b>Add entry</b></span><i></i></a>
</div>