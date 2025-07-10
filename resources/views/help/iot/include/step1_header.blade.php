<form method="post" action="go">
    <input type="hidden" name="sid" value="0">
    @csrf
    <table border="0" cellspacing="0" cellpadding="0" class="ihead">
        <tbody>
            <tr>
                <td class="icon"><img src="{{ cms_config('site.web.url') }}/iot/header_images/Western2/pass.gif" alt=" " width="47" height="37"></td>
                <td class="text">
                    <h2>Do you already have a {{ cms_config('hotel.name.short') }} account?</h2>
                    <b>{{ session('is_member') ? 'Yes' : 'No' }}</b>
                </td>
                <td class="btn" align="right">
                    <table height="21" border="0" cellpadding="0" cellspacing="0" class="button">
                        <tbody>
                            <tr>
                                <td class="button-left-side-arrow"></td>
                                <td class="middle">
                                    <input type="hidden" name="event" value="change"><input type="submit" class="changebutton" value="Change">
                                </td>
                                <td class="button-right-side"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
</form>
