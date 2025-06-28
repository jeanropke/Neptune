<div class="movable widget GroupInfoWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">Group info</span><span class="header-right">&nbsp;@if($isEdit)<img
                    src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18"
                    class="edit-button" id="widget-{{ $item->id }}-edit" />
                <script language="JavaScript" type="text/javascript">
                    Event.observe('widget-{{ $item->id }}-edit', 'click', function(e) { openEditMenu(e, {{ $item->id }}, 'widget', 'widget-{{ $item->id }}-edit'); }, false);
                </script>@endif
                </span></h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div class="group-info-icon"><img src="{{ cms_config('site.groupbadge.url') }}{{ $owner->badge }}.gif">
                </div>
                <h4>{{ $owner->name }}<img src="{{ url('/') }}/web/images/myhabbo/buttons/report_button.gif" width="19" height="18" class="report-button report-gn" id="groupname-{{ $owner->id }}-report" style="display: none;margin-top: -1px;"></h4>
                <p>Group created: <b>{{ $owner->created_at->format('M d, Y') }}</b></p>
                <div class="group-info-description">{{ $owner->description }}<img src="{{ url('/') }}/web/images/myhabbo/buttons/report_button.gif" width="19" height="18" class="report-button report-gd" id="groupdesc-{{ $owner->id }}-report" style="display: none;margin-top: -1px;"></div>
                <div id="profile-tags-panel">
                    <div id="profile-tag-list">
                        @include('home.widgets.ajax.profiletags')
                    </div>
                    <div id="profile-tags-status-field" style="display: none">
                        <div style="display: block;">
                            <div class="content-red">
                                <div class="content-red-body">
                                    <span id="tag-limit-message" style="display: none;">
                                        <img src="{{ url('/') }}/web/images/register/icon_error.gif"> The limit is 8 tags!
                                    </span>
                                    <span id="tag-invalid-message" style="display: none;">
                                        <img src="{{ url('/') }}/web/images/register/icon_error.gif"> Invalid tag.
                                    </span>
                                </div>
                            </div>
                            <div class="content-red-bottom">
                                <div class="content-red-bottom-body"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-add-tag">
                        <input type="text" id="profile-add-tag-input" maxlength="30"><br clear="all">
                        <a href="#" class="toolbutton" style="float:left;margin:5px 0 0 0;" id="profile-add-tag"><span>Add tag</span></a>
                    </div>
                </div>
                <script type="text/javascript">
                    Event.onDOMReady(function() {
                        new GroupInfoWidget('{{ $owner->id }}');
                    });
                </script>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
