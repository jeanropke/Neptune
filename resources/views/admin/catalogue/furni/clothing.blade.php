@extends('layouts.admin.master', ['menu' => 'catalogue'])

@section('title', 'Fix Clothing')

@section('content')

<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.catalogue', ['submenu' => 'clothing_fix'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <div class="tableborder">
                    <div class="tableheaderalt">Fix Clothings</div>
                    <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                        <form action="{{ route('admin.catalogue.clothing.fix') }}" method="POST">
                            {{ csrf_field() }}
                            <tbody>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle">
                                        <div class="graytext">There are <b>{{ $furnis->count() }}</b> clothing furnis
                                            added on 'items_base' and <b>{{ $clothing->count() }}</b> clothing data
                                            added on 'catalog_clothing'.<br>If the values are different, please, use the button bellow.</div>
                                    </td>

                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Fix clothing" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </td>
    </tr>
</table>
@stop
