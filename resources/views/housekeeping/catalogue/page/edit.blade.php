@extends('layouts.admin.master', ['menu' => 'catalogue'])

@section('title', 'Catalogue editor')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.catalogue', ['submenu' => 'catalogue'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>

                <script src="{{ url('/') }}/web/admin/js/tiny_mce.js"></script>
                <script type="text/javascript">
                    tinyMCE.init({
                                // General options
                                selector: '#page_text1',
                                theme : "advanced",
                                //plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

                                entity_encoding : "raw",

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

                <form action="{{ route('admin.catalogue.pages.save') }}" method="post" name="theAdminForm"
                    id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Editing Page - {{ $page->caption }} ({{ $page->id }})</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td width="100%" valign="middle">
                                    <b><a href="{{ route('admin.catalogue.items', $page->id) }}">Edit catalogue items ({{ $furnis }} furnis)</a></b>
                                    <div class="graytext"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>ID</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="id" value="{{ $page->id }}" size="30" class="textinput" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Parent ID</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="caption" value="{{ $page->parent_id }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Caption</b>
                                    <div class="graytext">The page name.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="caption" value="{{ $page->caption }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Caption save</b>
                                    <div class="graytext">Used to create links in catalogue to open this page.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="caption_save" value="{{ $page->caption_save }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Icon</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="icon_image" value="{{ $page->icon_image }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Visibility</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="visibility">
                                        <option value="0" @if($page->visible == 0) selected @endif>Not visible</option>
                                        <option value="1" @if($page->visible == 1) selected @endif>Visible</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Enabled</b>
                                    <div class="graytext">Used to create a parent page without a page, just a drop down
                                    </div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="enabled">
                                        <option value="0" @if($page->enabled == 0) selected @endif>Not enabled</option>
                                        <option value="1" @if($page->enabled == 1) selected @endif>Enabled</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Min rank</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="min_rank" value="{{ $page->min_rank }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Club only</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="club_only">
                                        <option value="0" @if($page->club_only == 0) selected @endif>No</option>
                                        <option value="1" @if($page->club_only == 1) selected @endif>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Order num</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="order_num" value="{{ $page->order_num }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Page layout</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="page_layout">
                                        @foreach($layouts as $layout)
                                        <option value="{{ $layout }}" @if($page->page_layout == $layout) selected
                                            @endif>{{ $layout }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Page headline</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="page_headline" value="{{ $page->page_headline }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Page teaser</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="page_teaser" value="{{ $page->page_teaser }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Page special</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="page_special" value="{{ $page->page_special }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Page text1</b>
                                    <div class="graytext">HTML is allowed here.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <textarea name="page_text1" cols="60" rows="5" wrap="soft" id="page_text1"
                                        class="multitext">{!! $page->page_text1 !!}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Page text2</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="page_text2" value="{{ $page->page_text2 }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Page text details</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="page_text_details" value="{{ $page->page_text_details }}"
                                        size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Page text teaser</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="page_text_teaser" value="{{ $page->page_text_teaser }}"
                                        size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Vip only</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="vip_only">
                                        <option value="0" @if($page->vip_only == 0) selected @endif>No</option>
                                        <option value="1" @if($page->vip_only == 1) selected @endif>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Includes</b>
                                    <div class="graytext">Example usage: 1;2;3 This will include page 1, 2 and 3 in the
                                        current page. Note that permissions are only used for the current entry.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="includes" value="{{ $page->includes }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Room id</b>
                                    <div class="graytext"></div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="number" name="room_id" value="{{ $page->room_id }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>

                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Update Catalogue Page" class="realbutton" accesskey="s">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </td>
    </tr>
</table>
@stop
