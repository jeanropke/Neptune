@extends('layouts.admin.master', ['menu' => 'dashboard', 'submenu' => 'update'])

@section('title', 'Updates')

@section('content')
    <div class="page_title">
        <img src="{{ url('/') }}/web/housekeeping/icons/updates.png" class="pticon">
        <span class="page_name_shadow">Updates</span>
        <span class="page_name">Updates</span>
    </div>
    <div class="page_main">

        <table border="0" cellpadding="0" cellspacing="0" height="100%">
            <tbody>
                <tr height="100%" />
                <td class="page_main_left">
                    <div class="left_date">{{ date('l F j, Y | g:iA') }}</div>
                    <div class="hr"></div>
                    <div class="text">
                        <p>Updates, if available will be displaied on the right. Updates are shown depending on what version you have. If you are using an unstable build, unstable
                            updates will be shown. If you are using a stable build, only stable updates are shown.</p>
                    </div>
                </td>
                <td class="page_main_right">
                    <div class="center">
                        <div class="clean-ok">Your version of {{ config('app.name') }} is up to date.</div>

                        <div class="clean-ok">A newer version is available.</div>
                        <p><strong>Latest Version:</strong> build<br />
                            <a href="git hub repo">Download Now</a><br /><br />
                            <strong>Changelog:</strong>
                        <div class="clean-gray">
                            <strong>Version build</strong><br />
                            message
                        </div>

                        <div class="clean-gray">
                            <strong>Version build</strong><br />
                            message
                        </div>
                        <div class="clean-gray">
                            <strong>Version build</strong><br />
                            message
                        </div>
                    </div>
                </td>
                </tr>
            </tbody>
        </table>

    </div>
@stop
