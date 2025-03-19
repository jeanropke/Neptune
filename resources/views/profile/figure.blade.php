@extends('layouts.profile')

@section('profile')
<div id="flashcontent">
    You need to have a Flash player installed on your computer before being
    able to edit your {{ cms_config('a') }} character. You can download
    the player from here: http://www.adobe.com/go/getflashplayer

</div>
<script type="text/javascript" language="JavaScript">
    var swfobj = new SWFObject("{{ url('/') }}/web/flash/register/HabboRegistration.swf", "habboreg", "406", "327", "7");
    swfobj.addParam("base", "/profile/");
    swfobj.addVariable("post_url", "figure?");
    swfobj.addVariable("back_url", "");
    @if(user()->isHC())
    swfobj.addVariable("figuredata_url", "{{ url('/') }}/web/xml/figure_data_xml_hc.xml");
    @else
    swfobj.addVariable("figuredata_url", "{{ url('/') }}/web/xml/figure_data_xml.xml");
    @endif
    swfobj.addVariable("localization_url", "{{ url('/') }}/web/xml/figure_editor.xml");
    swfobj.addVariable("post_figure", "newFigure");
    swfobj.addVariable("post_gender", "newGender");
    swfobj.addVariable("figure", "{{ user()->figure }}");
    swfobj.addVariable("gender", "{{ user()->sex }}");
    swfobj.addVariable("_token", "{{ csrf_token() }}");
    swfobj.write("flashcontent");
</script>
@stop
