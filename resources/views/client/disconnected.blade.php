@extends('layouts.login')
@section('title', 'Disconnected!')
@section('content')
<div id="process-wrapper">
    <div id="process-header">
        <div id="process-header-body">
            <div id="process-header-content">
                <div id="habbologo"><a href="{{ url('/') }}"></a></div>
            </div>
        </div>
    </div>
    <div id="outer">
        <div id="outer-content">
            <div class="processbox">
                <div class="headline">
                    <div class="headline-content">
                        <div class="headline-wrapper">
                            <h2>Disconnected</h2>
                        </div>
                    </div>
                </div>
                <div class="content-top">
                    <div class="content">
                        <p>Something has gone wrong and you have been disconnected from {{ cms_config('hotel.name.short') }}.</p>
                        <br>
                        <p>If you would like to reload the client, <a href="{{ url('/') }}/client">click here</a></p>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="content-bottom">
                    <div class="content-bottom-content"></div>
                </div>
            </div>
        </div>
    </div>
    @stop
