@extends('layouts.email_template')

<style>
    #preview-response p {
        margin: 3px 0;
    }
</style>
@section('content')
    {!! $content !!}
@endsection
