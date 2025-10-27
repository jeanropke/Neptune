@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Manage Existing Articles')

@section('content')
    @include('includes.housekeeping.tinymce')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'articles'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    @if ($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    <form action="{{ route('housekeeping.site.articles.edit.save', $article->id) }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">{{ $article->title }} - Edit News Article</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <input type="number" value="{{ $article->id }}" name="id" hidden>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Title</b>
                                        <div class="graytext">The full title of your article.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="title" value="{{ old('title') ?? $article->title }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Topstory Image</b>
                                        <div class="graytext">Select an existing topstory image. </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <img src="{{ $article->topstory_image }}" id="ts_preview" data-url="{{ cms_config('site.web.url') }}/images/top_story_images/%icon%.gif">
                                        <br>
                                        <select name="topstory" id="ts_image" class="textinput" style="margin-top: 5px;" size="1">
                                            @foreach ($ts_images as $ts_img)
                                                <option value="{{ $ts_img }}" {{ $ts_img == (old('topstory') ?? $article->topstory) ? 'selected' : '' }}>{{ $ts_img }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Topstory Image Override</b>
                                        <div class="graytext">The URL to the topstory image you want. Optional.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="topstory_override" value="{{ old('topstory_override') ?? $article->topstory_override }}" size="30"
                                            class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>article_image</b>
                                        <div class="graytext">article_image</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="article_image" value="{{ old('article_image') ?? $article->article_image }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Short Story</b>
                                        <div class="graytext">A small introduction to the article.
                                            <br />HTML is not allowed here.
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="short_text" cols="60" rows="5" wrap="soft" id="sub_desc" class="multitext">{{ old('short_text') ?? $article->short_story }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Story</b>
                                        <div class="graytext">The actual news message.
                                            <br />HTML is allowed here.
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="long_text" cols="60" rows="5" wrap="soft" id="article" class="multitext">{{ old('long_text') ?? $article->full_story }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Author Override</b>
                                        <div class="graytext">If you want to use 'Hotel Management' or something like that.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="author_override" value="{{ old('author_override') ?? $article->author_override }}" size="30"
                                            class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>is_published</b>
                                        <div class="graytext">is_published</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="is_published" class="textinput" style="margin-top: 5px;" size="1">
                                            <option value="0" {{ 0 == (old('is_published') ?? $article->is_published) ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ 1 == (old('is_published') ?? $article->is_published) ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>is_future_published</b>
                                        <div class="graytext">is_future_published</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="is_future_published" class="textinput" style="margin-top: 5px;" size="1">
                                            <option value="0" {{ 0 == (old('is_future_published') ?? $article->is_future_published) ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ 1 == (old('is_future_published') ?? $article->is_future_published) ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Future Release</b>
                                        <div class="graytext">In case you want to set a release date for the article.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="datetime-local" name="created_at" value="{{ old('created_at') ?? $article->created_at }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Update Article" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <script>
                        SelectorPreview.initialise($('#ts_image'), $('#ts_preview'));
                    </script>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
