@extends('layouts.admin.master', ['menu' => 'site'])

@section('title', 'Manage Existing Articles')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.site', ['submenu' => 'news_manage'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                @if($article)
                <script src="{{ url('/') }}/web/admin/js/tiny_mce.js"></script>
                <script type="text/javascript">
                    tinyMCE.init({
                                // General options
                                selector: '#article',
                                theme : "advanced",
                                //plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

                                // Theme options
                                theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                                theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                                theme_advanced_buttons3 : "hr,removeformat,visualaid,|,sub,sup,|,charmap,",
                                theme_advanced_toolbar_location : "top",
                                theme_advanced_toolbar_align : "left",
                                theme_advanced_statusbar_location : "bottom",
                                theme_advanced_resizing : true,

                                // Example content CSS (should be your site CSS)
                                content_css : "{{ url('/') }}/web/admin/js/themes/advanced/skins/default/content.css",

                                // Drop lists for link/image/media/template dialogs
                                template_external_list_url : "lists/template_list.js",
                                external_link_list_url : "lists/link_list.js",
                                external_image_list_url : "lists/image_list.js",
                                media_external_list_url : "lists/media_list.js",

                                // Style formats
                                style_formats : [
                                    {title : 'Default text', inline : 'span', styles : {color : '#000000', 'font-size' : '11px'}},
                                    {title : 'Bold text', inline : 'b',  styles : {color : '#000000', 'font-size' : '11px'}}
                                ],

                                // Replace values for the template plugin
                                template_replace_values : {
                                    username : "Some User",
                                    staffid : "991234"
                                }
                            });
                </script>
                @if($errors->any())
                <p><strong>{{ $errors->first() }}</strong></p>
                @endif

                <form action="{{ route('admin.site.news_manage.save', $article->id) }}" method="post"
                    name="theAdminForm" id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Edit News Article ({{ $article->title }}) -
                            @if($article->is_deleted)<i>(Deleted)</i>@endif</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Title</b>
                                    <div class="graytext">The full title of your article.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="title" value="{{ $article->title }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Topstory Image</b>
                                    <div class="graytext">The URL to the topstory image.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <img src="{{ $article->image }}" id="ts_preview">
                                    <br>
                                    <select name="topstory" onchange="changePreviewImage()" id="ts_image"
                                        class="textinput" style="margin-top: 5px;" size="1">
                                        @foreach($ts_images as $ts_img)
                                        <option value="{{ url('/') }}/{{ str_replace('\\', '/', $ts_img) }}"
                                            @if(url('/') .'/'. str_replace('\\', '/' , $ts_img)==$article->image)
                                            selected="selected" @endif>{{ explode('/', $ts_img)[2] }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Short Story</b>
                                    <div class="graytext">A small introduction to the article.
                                        <br />HTML is not allowed here.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <textarea name="short_story" cols="60" rows="5" wrap="soft" id="sub_desc"
                                        class="multitext">{{ $article->short_text }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Story</b>
                                    <div class="graytext">The actual news message.
                                        <br />HTML is allowed here.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <textarea name="story" cols="60" rows="5" wrap="soft" id="article"
                                        class="multitext">{!!  $article->long_text  !!}</textarea>
                                </td>
                            </tr>
                            @if($article->is_deleted && Auth::user()->hasPermission('can_restore_site_news'))
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Restore</b>
                                    <div class="graytext">This article is deleted... almost deleted.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="deleted" onchange="changePreviewImage()" id="ts_image"
                                        class="textinput" style="margin-top: 5px;" size="1">
                                        <option value="1" @if($article->is_deleted == 1) selected="selected" @endif>Keep
                                            deleted</option>
                                        <option value="0" @if($article->is_deleted == 0) selected="selected"
                                            @endif>Restore</option>
                                    </select>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Update Article" class="realbutton" accesskey="s">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <script>
                    function changePreviewImage()
                            {
                                var tsImg = document.getElementById('ts_image');
                                document.getElementById('ts_preview').src = tsImg.value;
                            }
                </script>
                @else
                <form action="index.php?p=news_manage&do=save" method="post" name="theAdminForm" id="theAdminForm">
                    <div class="tableborder">
                        <div class="tableheaderalt">News Articles</div>
                        <div style="text-align: center; vertical-align: middle;">{{ $articles->links('layouts.admin.pagination') }}</div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="1%" align="center">ID</td>
                                <td class="tablesubheader" width="28%">Title</td>
                                <td class="tablesubheader" width="10%" align="center">Date</td>
                                <td class="tablesubheader" width="10%" align="center">Author</td>
                                <td class="tablesubheader" width="10%" align="center">Edit</td>
                                <td class="tablesubheader" width="12%" align="center">Delete</td>
                            </tr>
                            @forelse($articles as $article)
                            <tr>
                                <td class="tablerow1" align="center">
                                    {{ $article->id }}
                                </td>
                                <td class="tablerow2">
                                    <strong>{{ $article->title }}</strong>
                                    @if($article->is_deleted)<i>(Deleted)</i>@endif
                                    <div class="desctext">
                                        {{ $article->short_text }}
                                    </div>
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ $article->created_at->format('m/d/y h:i') }}
                                </td>
                                <td class="tablerow2" align="center">
                                    {{ $article->author }}
                                </td>
                                <td class="tablerow2" align="center"><a
                                        href="{{ route('admin.site.news_manage', $article->id) }}"><img
                                            src="{{ url('/') }}/web/admin/images/edit.gif" alt="Edit"></a></td>
                                <td class="tablerow2" align="center"><a
                                        href="{{ route('admin.site.news_manage.delete', $article->id) }}"><img
                                            src="{{ url('/') }}/web/admin/images/delete.gif" alt="Delete"></a></td>
                            </tr>
                            @empty
                            <tr align="center">
                                <td colspan="6" class="tablerow1"><strong>No news.</strong></td>
                            </tr>
                            @endforelse
                        </table>
                        <div class="tablefooter" align="center">
                            <div class="fauxbutton-wrapper"><span class="fauxbutton"><a
                                        href="{{ route('admin.site.news_compose') }}">Compose New News Item</a></span>
                            </div>
                        </div>
                    </div>
                </form>
                @endif

            </div>
            <!-- / RIGHT CONTENT BLOCK -->
        </td>
    </tr>
</table>
@stop
