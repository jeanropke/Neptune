@extends('layouts.master', ['menuId' => '25', 'submenuId' => '30', 'headline' => true])

@section('title', 'Community')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
    <tbody>
        <tr>
            <td rowspan="2" style="width: 8px;"></td>
            <td valign="top" style="width: 740px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                @foreach(boxes('community.fansites', 1) as $box)
                                <div class="v3box {{ $box->color }}">
                                    <div class="v3box-top">
                                        <h3>{{ $box->title }}</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            {!! $box->content !!}
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
                                @endforeach
                            </td>

                            <td valign="top" style="width: 539px; height: 400px;" class="habboPage-col rightmost">
                                <div class="v3box yellow">
                                    <div class="v3box-top">
                                        <h3>The Official Fansites of Habbo USA!</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            <p>Welcome to our <b>Official Habbo Fansites</b> list!</p>

                                            <p><img align="right"
                                            src="{{ url('/') }}/c_images/album209/official.gif"
                                                    alt="">Listed in no particular order, these Fansites are the source
                                                to go for the dedicated Habbo. Or even the new Habbo player. You can
                                                find out anything you ever wanted to know about anything Habbo related
                                                from these sites. Ranging from music to forums to everything in between!
                                                Check them out!</p><br>
                                            <hr width="100%">
                                            <table width="100%" cellpadding="2">
                                                <tbody>
                                                    <tr>
                                                        <td width="140" valign="top" align="right"><a target="_blank"
                                                                href="https://web.archive.org/web/20070104013635/http://www.habbodiscussion.com/"><img
                                                                    border="0"
                                                                    src="https://web.archive.org/web/20070104013635im_/http://images.habbohotel.com/c_images/album1149/habbodiscussion.png"
                                                                    alt=""></a></td>
                                                        <td><a target="_blank"
                                                                href="https://web.archive.org/web/20070104013635/http://www.habbodiscussion.com/">Habbo
                                                                Discussion</a><br>Habbo Discussion is one of the most
                                                            active

                                                            forums in the habbo hotel community. It continues to expand
                                                            with a profile of over 2,000 activated users, 12,000 topics,
                                                            and 150,000

                                                            posts. Daily activity consists of nearly 40 visitors on at
                                                            any time during the day.</td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>


                            </td>
                        </tr>
                    </tbody>
                </table>

            </td>

            <td rowspan="2" style="width: 4px;"></td>

            <td rowspan="2" valign="top" style="width: 176px;">
                <div id="ad_sidebar">
                    @include('includes.partners')
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
    </tbody>
</table>
@stop
