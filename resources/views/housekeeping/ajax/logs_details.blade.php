<table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
    <tbody>
        <tr>
            <td class="tablerow1" width="20%" valign="middle"><b>Staff username</b>
                <div class="graytext"></div>
            </td>
            <td class="tablerow2" width="80%" valign="middle">
                {{ $log->getUsername() }}
            </td>
        </tr>
        <tr>
            <td class="tablerow1" width="20%" valign="middle"><b>IP Address</b>
                <div class="graytext"></div>
            </td>
            <td class="tablerow2" width="80%" valign="middle">
                {{ $log->ip_address }}
            </td>
        </tr>
        <tr>
            <td class="tablerow1" width="20%" valign="middle"><b>Page</b>
                <div class="graytext"></div>
            </td>
            <td class="tablerow2" width="80%" valign="middle">
                {{ $log->page }}
            </td>
        </tr>
        <tr>
            <td class="tablerow1" width="20%" valign="middle"><b>Date</b>
                <div class="graytext"></div>
            </td>
            <td class="tablerow2" width="80%" valign="middle">
                {{ $log->created_at->format('d/m/Y H:i:s') }}
            </td>
        </tr>
        <tr>
            <td class="tablerow1" width="20%" valign="middle"><b>Message</b>
                <div class="graytext"></div>
            </td>
            <td class="tablerow2" width="80%" valign="middle">
                <textarea style="width: 99%" rows="16">{{ $log->message }}</textarea>
            </td>
        </tr>
        <tr>
            <td align="center" class="tablesubheader" colspan="2">
                <input type="submit" value="Close" class="realbutton" accesskey="s" id="confirm-dialog-close">
            </td>
        </tr>
    </tbody>
</table>
<div class="clear"></div>
