@extends('layouts.admin.master', ['menu' => 'catalogue'])

@section('title', 'Check Missing Furnis')

@section('content')

<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.catalogue', ['submenu' => 'missing_furni'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <div class="tableborder">
                    <div class="tableheaderalt">Check Missing Furni</div>
                    <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                        <form action="{{ route('admin.catalogue.furni.missing.check') }}" method="POST">
                            {{ csrf_field() }}
                        <tbody>
                            <tr>
                            <td class="tablerow1" width="40%" valign="middle">
                                <div class="graytext">Click on this button to check missing furnis. The 'furnidata.xml' will be downloaded again from Habbo.com.br.</div>
                            </td>

                        </tr>
                        <tr>
                            <td align="center" class="tablesubheader" colspan="2">
                                <input type="submit" value="Generate" class="realbutton" accesskey="s">
                            </td>
                        </tr>
                    </form>
                    </tbody></table>
                </div>
            </div>
        </td>
    </tr>
</table>
@stop
