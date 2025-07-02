@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Compose New Article')

@section('content')
    <script src="{{ cms_config('site.web.url') }}/housekeeping/js/tiny_mce.js"></script>
    <script type="text/javascript">
        tinyMCE.init({
            // General options
            selector: '#article',
            theme: "advanced",
            //plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

            // Theme options
            theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3: "hr,removeformat,visualaid,|,sub,sup,|,charmap,",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "left",
            theme_advanced_statusbar_location: "bottom",
            theme_advanced_resizing: true,

            // Example content CSS (should be your site CSS)
            content_css: "{{ cms_config('site.web.url') }}/housekeeping/js/themes/advanced/skins/default/content.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url: "lists/template_list.js",
            external_link_list_url: "lists/link_list.js",
            external_image_list_url: "lists/image_list.js",
            media_external_list_url: "lists/media_list.js",

            // Style formats
            style_formats: [{
                    title: 'Default text',
                    inline: 'span',
                    styles: {
                        color: '#000000',
                        'font-size': '11px'
                    }
                },
                {
                    title: 'Bold text',
                    inline: 'b',
                    styles: {
                        color: '#000000',
                        'font-size': '11px'
                    }
                }
            ],

            // Replace values for the template plugin
            template_replace_values: {
                username: "Some User",
                staffid: "991234"
            }
        });
    </script>

    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'articles.create'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if ($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    <form action="{{ route('housekeeping.site.articles.create') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Compose News Article</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Title</b>
                                        <div class="graytext">The full title of your article.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="title" value="{{ old('title') }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Topstory Image</b>
                                        <div class="graytext">The URL to the topstory image.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <img src="{{ cms_config('site.web.url') }}/images/top_story_images/{{ old('topstory') ?? $ts_images[0] }}" id="ts_preview" data-url="{{ cms_config('site.web.url') }}/images/top_story_images/%icon%">
                                        <br>
                                        <select name="topstory" id="ts_image" class="textinput" style="margin-top: 5px;" size="1">
                                            @foreach ($ts_images as $ts_img)
                                                <option value="{{ $ts_img }}" {{ $ts_img == old('topstory') ? 'selected' : '' }}>{{ $ts_img }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Short Story</b>
                                        <div class="graytext">A small introduction to the article.
                                            <br />HTML is not allowed here.
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="short_text" cols="60" rows="5" wrap="soft" id="sub_desc" class="multitext">{{ old('short_text') }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Story</b>
                                        <div class="graytext">The actual news message.
                                            <br />HTML is allowed here.
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="long_text" cols="60" rows="5" wrap="soft" id="article" class="multitext">{{ old('long_text') }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Author Override</b>
                                        <div class="graytext">If you want to use 'Hotel Management' or something like that.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="author_override" value="" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Future Release</b>
                                        <div class="graytext">In case you want to set a release date for the article.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="datetime-local" name="publish_date" value="" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Publish Article" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <script>
                        SelectorPreview.initialise($('#ts_image'), $('#ts_preview'));
                    </script>
                    <br />
                </div>
            </td>
        </tr>
    </table>
@stop
