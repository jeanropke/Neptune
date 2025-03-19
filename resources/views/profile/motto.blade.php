@extends('layouts.profile')

@section('profile')
<form action="{{ route('profile.save', 'motto') }}" method="post">
    {{ csrf_field() }}
    <h3>CHANGE YOUR PROFILE</h3>
    <div>
        <span class="label">Name:</span>
        {{ Auth::user()->username }}
    </div>
    <div class="clear"></div>
    <div>
        <span class="label">Motto:</span>
        <input type="text" name="motto" size="32" maxlength="32" value="{{ Auth::user()->motto }}" id="motto" />
    </div>
    <p>
        Your motto is what other {{ cms_config('hotel.name.short') }}s will see on your {{ cms_config('hotel.name.short') }} Home page and beneath your
        {{ cms_config('hotel.name.short') }} in the Hotel.
    </p>

    <div id="register-buttons">
        <div id="register-buttons-continue">
            <input type="submit" value="Save changes" name="save" class="process-button" />
        </div>
        <div id="register-buttons-back"></div>
    </div>

</form>
@stop
