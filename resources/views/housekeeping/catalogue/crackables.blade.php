@extends('layouts.admin.master', ['menu' => 'catalogue'])

@section('title', 'Crackables Configuration')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.catalogue', ['submenu' => 'crackables'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                <div class="tableborder">
                    <div class="tableheaderalt">Crackables</div>
                    <div class="wrapper" id="inventory">
                        <div class="furni-slot">
                        <a href="{{ route('admin.catalogue.crackables.add') }}">
                                <div class="furni-add">
                                </div>
                            </a>
                        </div>
                        @foreach ($crackables as $item)

                        <div class="furni-slot">
                            <a href="{{ route('admin.catalogue.crackable', $item->item_id) }}">
                                <div class="icon"
                                    style="background: url({{ url('/') }}/gordon/dcr/hof_furni/icon/{{ $item->item_name }}_icon.png) center no-repeat">
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>
@stop
