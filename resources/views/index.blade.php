@extends('layouts.master', ['menuId' => '1', 'skipHeadline' => true])

@section('title', 'Welcome to ' . cms_config('hotel.name.short'))

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-home">
        <tbody>
            <tr>
                <td colspan="6" style="height: 4px;"></td>
            </tr>
            <tr>
                <td rowspan="2" style="width: 8px;">&nbsp;</td>
                <td valign="top" style="width: 740px;">

                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td colspan="3" style="padding-bottom: 3px;">
                                    @include('includes.news')
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                    @foreach (boxes('index', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach


                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>Got Tags?</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <p><span><img align="left"
                                                            src="{{ cms_config('site.c_images.url') }}/album2479/tagfriends_group.gif"
                                                            alt=""></span>Use Habbo Tags to find new friends with similar interests! Start by adding some tags to your Habbo
                                                    Home Page or check out some of these hot tags...

                                                </p>
                                                <div class="tag-list">
                                                    <span class="tag-search-rowholder">
                                                        <a href="{{ url('/') }}/tag/search?tag=cool" style="font-size:22px">cool
                                                        </a><img border="0" class="tag-none-link"
                                                            src="{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_dim.gif">
                                                    </span>
                                                    <img id="tag-img-added" border="0"
                                                        src="{{ cms_config('site.web.url') }}/images/buttons/tags/tag_button_added.gif"
                                                        style="display:none">
                                                </div>

                                                <p></p>
                                                <p><a href="{{ url('/') }}/tag/search"><br>Search more tags here! </a></p>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                </td>
                                <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                    @foreach (boxes('index', 2) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 310px; height: 400px;" class="habboPage-col rightmost">
                                    @include('includes.ad300')
                                    @foreach (boxes('index', 3) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td rowspan="2" style="width: 4px;"></td>
                <td rowspan="2" valign="top" style=" margin-left: 4px; width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.partners')
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br style="clear: both;">
@stop
