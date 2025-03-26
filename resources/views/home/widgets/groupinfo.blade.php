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
                <h4>{{ $owner->name }}</h4>
                <p>Group created: <b>{{ \Carbon\Carbon::createFromTimeStamp($owner->date_created)->format('M d, Y') }}</b></p>
                <div class="group-info-description">{{ $owner->description }}</div>
                <div id="profile-tags-panel">
                    <div id="profile-tag-list">
                        <div id="profile-tags-container">
                            No tags.
                        </div>
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
