@extends('layouts.profile')

@section('profile')
<form action="{{ route('profile.save', 'email') }}" method="post" id="emailform">
    {{ csrf_field() }}
    <h3>CHANGE YOUR EMAIL SETTINGS</h3>
    <div>
        <span class="label">Name:</span> {{ Auth::user()->username }}
    </div>
    <br />
    <div>
        <label for="email" class="left">Email address:</label>
        <div id="email_error" class="left"><input type="text" name="email" id="email" size="32" maxlength="32"
                value="{{ Auth::user()->mail }}" /></div>
    </div>
    <div class="clear"></div>
    <br>
    <div id="register-buttons">
        <div id="register-buttons-continue">
            <input type="submit" value="Save changes" name="save" class="process-button" />
            <div id="register-buttons-back"></div>
        </div>
    </div>
</form>
@stop
