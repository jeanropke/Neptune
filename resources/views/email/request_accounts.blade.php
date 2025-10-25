@extends('layouts.email_template')

@section('content')
    <img vspace="0" hspace="10" border="0" align="left" src="{{ url('/') }}/c_images/album1358/frank_thumbup.gif" alt="">
    <h4>Hey there</h4>
    <p>A little rubber duck told us you couldn’t remember your Habbo accounts!</p>
    <p>No worries, here’s a list of all Habbo accounts registered with the email <b>{{ $email }}</b></p>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->username }}</li>
        @endforeach
    </ul>
    <p>If you didn’t request this information, you can safely ignore this message.</p>
    <p>Your accounts are safe and no changes have been made.
    <p>See you soon!</p>
@stop
