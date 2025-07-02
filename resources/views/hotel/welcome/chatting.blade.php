@extends('layouts.master', ['menuId' => '2'])

@section('title', 'The '. cms_config('hotel.name.short') .' Console')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
    <tbody>
        <tr>
            <td style="width: 8px;"></td>
            @include('includes.welcome', ['page'=> 'welcome_chatting'])

            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="portlet-scale gold">
                    <div class="portlet-scale-header">
                        <h3>The {{ cms_config('hotel.name.short') }} Console</h3>
                    </div>
                    <div class="portlet-scale-body">
                        <div class="portlet-scale-content">

                            <img align="right" src="{{ url('/') }}/c_images/album238/hvimage2.gif" alt="">The {{ cms_config('hotel.name.short') }}
                            Console lets you keep in touch with your {{ cms_config('hotel.name.short') }} Friends through instant messages. When you
                            click the {{ cms_config('hotel.name.short') }} Console icon. your {{ cms_config('hotel.name.short') }} Console will open. If it's flashing, you have a
                            message or a new Friend Request! <br><br><strong>Adding a Friend</strong><br>If you click
                            the 'Friends' tab in your {{ cms_config('hotel.name.short') }} Console, you will see a list of people you've added to your
                            console. When you first check in the list will be empty, but you'll soon meet lots of new
                            people you want to add to that list.<br><br>To add someone to your {{ cms_config('hotel.name.short') }} Console, you need
                            to send them a Friend Request. You can send a Friend Request in two ways. You can either
                            click on the {{ cms_config('hotel.name.short') }} you want to be your friend with while you are in a {{ cms_config('hotel.name.short') }} room and then
                            click the 'Ask to be friend' button that appears under the character. Or, you can open your
                            {{ cms_config('hotel.name.short') }} Console and click 'Find', type in the name of the {{ cms_config('hotel.name.short') }} you want to add to your list
                            and then click find. If the {{ cms_config('hotel.name.short') }}'s found, you'll see an 'Ask to be friend' button, click it
                            to send them a Friend Request.<br><br>If they accept your Friend Request their name will
                            appear in your Friends List. You can add up to 100 {{ cms_config('hotel.name.short') }} friends to your {{ cms_config('hotel.name.short') }} Console (500
                            if you join <a href="{{ url('/') }}/club/" target="_self">{{ cms_config('hotel.name.short') }}
                                Club</a>).<br><br><strong>Sending a message</strong><br><img width="194" hspace="0"
                                height="129" border="0" align="right" alt="tour_console.gif"
                                src="{{ cms_config('site.web.url') }}/images/tour/tour_console.gif">When
                            you've added someone to your Friend List you can send them a Console Message even when they
                            are offline. To send a message; open your {{ cms_config('hotel.name.short') }} Console and click 'Friends', then click to
                            select the name of the {{ cms_config('hotel.name.short') }} you want to send the message to. (Remember: you can send the
                            message to more than one {{ cms_config('hotel.name.short') }}, just click and select everyone you want to receive it).
                            <br><br>Click on 'Compose a message' enter your message and click send. If you change your
                            mind and decide not to send the message, you can click 'Cancel'. <br><br><br>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="portlet-scale-bottom">
                        <div class="portlet-scale-bottom-body"></div>
                    </div>
                </div>
            </td>
            <td style="width: 4px;"></td>
            <td valign="top" style="width: 176px;">
                <div id="ad_sidebar">

                    @include('includes.ad160')



                </div>
            </td>
        </tr>
    </tbody>
</table>
@stop
