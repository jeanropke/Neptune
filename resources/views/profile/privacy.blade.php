@extends('layouts.profile')

@section('profile')
    <form action="{{ route('profile.save', 'privacy') }}" method="post" id="pwform">
        {{ csrf_field() }}
        <h3>CHANGE YOUR PRIVACY SETTINGS</h3>
        <p>
            <b>HABBO HOME:</b><br>
            <label><input type="radio" name="profile_visible" value="EVERYONE" {{ user()->profile_visible ? 'checked=checked' : '' }}>Visible to everyone</label>
            <label><input type="radio" name="profile_visible" value="NOBODY" {{ user()->profile_visible ? '' : 'checked=checked' }}>Invisible to everyone</label>
        </p>
        <p>
            <b>WORD FILTER:</b><br>
            <label><input type="radio" name="wordfilter_enabled" value="ENABLED" {{ user()->wordfilter_enabled ? 'checked=checked' : '' }}>Enable filter</label>
            <label><input type="radio" name="wordfilter_enabled" value="DISABLED" {{ user()->wordfilter_enabled ? '' : 'checked=checked' }}>Disable filter</label>
        </p>
        <p>
            <b>FRIEND REQUESTS:</b><br>
            <label><input type="radio" name="allow_friend_requests" value="ENABLED" {{ user()->allow_friend_requests ? 'checked=checked' : '' }}>Enable friend request</label>
            <label><input type="radio" name="allow_friend_requests" value="DISABLED" {{ user()->allow_friend_requests ? '' : 'checked=checked' }}>Disable friend request</label>
        </p>
        <p>
            <b>ONLINE STATUS:</b><br>
            <label><input type="radio" name="online_status_visible" value="EVERYBODY" {{ user()->online_status_visible ? 'checked=checked' : '' }}>Everybody can view</label>
            <label><input type="radio" name="online_status_visible" value="NOBODY" {{ user()->online_status_visible ? '' : 'checked=checked' }}>Nobody can view</label>
        </p>

        <div class="clear"></div>
        </div>
        <div id="register-buttons">
            <div id="register-buttons-continue">
                <input type="submit" value="Save" name="save" class="process-button" />
            </div>
            <div id="register-buttons-back"></div>
    </form>
@stop
