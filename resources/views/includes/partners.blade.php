
<div class="cooperation">
    @foreach (get_partners() as $partner)
        <table width="168" height="120" background="/web/images/themes/partner_box.gif">
        <tbody>
            <tr>
                <td>
                    <div align="center">
                        <font style="font-size: 11px; font-family: Verdana;">
                            <a href="{{ $partner->url }}" target="_blank">
                                <img src="{{ $partner->image }}" border="0" alt="">
                            </a>
                            <br>
                            <b>{{ $partner->title }}</b>
                            <br>
                            {{ $partner->description }}
                            <br>
                        </font>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    @endforeach
</div>
