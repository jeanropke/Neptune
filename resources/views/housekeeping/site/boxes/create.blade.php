@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Create New Box')

@section('content')
<script src="{{ url('/') }}/web/housekeeping/js/tiny_mce.js"></script>
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
            content_css : "{{ url('/') }}/web/housekeeping/js/themes/advanced/skins/default/content.css",

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

<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('housekeeping.site.include.menu', ['submenu' => 'boxes.create'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if($errors->any())
                <p><strong>{{ $errors->first() }}</strong></p>
                @endif
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <form action="{{ route('housekeeping.site.boxes.create.save') }}" method="post" name="theAdminForm"
                    id="theAdminForm" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Create Box</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Title</b>
                                    <div class="graytext">The full title of the new box.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="title" value="{{ old('title') }}" size="30"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Content</b>
                                    <div class="graytext">The content of the new box.
                                        <br />HTML is allowed here.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <textarea name="content" cols="60" rows="5" wrap="soft" id="article"
                                        class="multitext">{{ old('content') }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Requirement</b>
                                    <div class="graytext">Who can see this box</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="requirement" class="textinput" style="margin-top: 5px;" size="1">
                                        <option value="guest">Only guest users</option>
                                        <option value="auth">Only logged users</option>
                                        <option value="both" selected>Both</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Create Box" class="realbutton" accesskey="s">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br />
            </div>
        </td>
    </tr>
</table>
@stop
