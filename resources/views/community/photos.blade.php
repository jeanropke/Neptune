@extends('layouts.master', ['menuId' => '25', 'submenuId' => '32', 'headline' => true])

@section('title', 'Photos')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
    <tbody>
        <tr>
            <td rowspan="2" style="width: 8px;"></td>
            <td valign="top" style="width: 740px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td id="photos" valign="top" class="habboPage-col rightmost">
                                @foreach ($photos as $photo)
                                <div class="v3box yellow">
                                    <div class="v3box-top">
                                    <h3>Photo by {{ $photo->getUserName() }} - {{ date('d/m/Y', $photo->timestamp) }}</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            <div class="picture" style="background: url({{ $photo->url }})">
                                                {{--<div class="info">
                                                    <div class="likes" data-id="{{ $photo->id }}">
                                                        <div class="icon"></div>
                                                        <div class="amount">{{ $photo->getLikes()->count() }}</div>
                                                    </div>
                                                    <div class="author"><a href="{{ route('home.user.username', $photo->getUserName()) }}">{{ $photo->getUserName() }}</a></div>
                                                    <div class="published_at">Published at {{ \Carbon\Carbon::createFromTimeStamp($photo->timestamp)->diffForHumans() }}</div>
                                                </div>--}}
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
                                @endforeach
                            </td>

                            <script>
                                document.getElementsByClassName("likes", "photos").each(function (el) {
                                    el.onclick = function(e, f) {
                                        new Ajax.Request(habboReqPath + "/myhabbo/photo/like", {
                                            method: "post",
                                            parameters: { photoId: el.dataset.id },
                                            onComplete: (function (response, status) {
                                                el.getElementsByClassName('amount')[0].innerHTML = status.likes;
                                                if(tonumber(status.likes) > 0) stop = true
                                            })
                                        });
                                    };
                                });
                            </script>
                        </tr>
                    </tbody>
                </table>

            </td>

            <td rowspan="2" style="width: 4px;"></td>
        </tr>
    </tbody>
</table>
@stop
