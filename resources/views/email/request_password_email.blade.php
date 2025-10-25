@extends('layouts.email_template')

@section('content')
    <img vspace="0" hspace="10" border="0" align="left" src="{{ url('/') }}/c_images/album1358/frank_thumbup.gif" alt="">
    <h4>Hey there {{ $user->username }}</h4>
    <p>A little rubber duck told us that you needed to change the password for the Habbo
        account registered with the following email: <b>{{ $user->email }}</b></p>
    <p>The link below will expire in 2 hours, so be quick!</p>
    <p>
        <a href="{{ url('/') }}/account/password/reset/{{ $token }}" target="_blank" class="process-button" id="accountlist-submit"><span> Reset password </span></a>
    </p>
    <p>
        <a href="{{ url('/') }}/account/password/reset/{{ $token }}" target="_blank">
            {{ url('/') }}/account/password/reset/{{ $token }}
        </a>

    </p>
    <p>You didn’t request this change? Sorry about that! Just ignore this message and your current password will stay the same!</p>
    <p>See you soon!</p>
@stop
