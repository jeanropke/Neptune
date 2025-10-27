<script src="{{ cms_config('site.web.url') }}/housekeeping/js/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        selector: "{{ $selector ?? '#article' }}",
        theme: "advanced",
        width: "100%",
        height: 400,
        convert_urls: true,
        relative_urls: false,
        remove_script_host: false,

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
        ]
    });
</script>
