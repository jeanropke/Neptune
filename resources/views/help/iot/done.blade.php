@extends('layouts.iot', ['no_faq' => true])

@section('title', '')

@section('content')
    <h2>Thank You!</h2>
    <br>
    Thank you for using the {{ cms_config('hotel.name.short') }} Help Tool. We will try to respond as soon as we can. Thanks!
    <br><br>
    <br><br>
    <a href="javascript:window.close();">Close window</a>
@endsection
