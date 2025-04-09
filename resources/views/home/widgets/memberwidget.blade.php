<div class="movable widget MemberWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">Members of the group (<span id="avatar-list-size">259</span>)</span><span
                        class="header-right">&nbsp;</span></h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">

                <div id="avatar-list-search">
                    <input type="text" style="float:left;" id="avatarlist-search-string">
                    <a class="colorlink orange" style="float:left;" id="avatarlist-search-button"><span>Search</span></a>
                </div>
                <br clear="all">

                <div id="avatarlist-content">

                    <div class="avatar-widget-list-container">
                        <ul id="avatar-list-list" class="avatar-widget-list">
                            <li id="avatar-list-{{ $item->id }}-10436" title="HAPPY">
                                <div class="avatar-list-open"><a href="#" id="avatar-list-open-link-{{ $item->id }}-10436" class="avatar-list-open-link"></a></div>
                                <div class="avatar-list-avatar"><img
                                        src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8560360003635147150173010114400b9793fdc905d87ae99216aeb7c58b734.gif"
                                        alt=""></div>
                                <h4><a href="/web/20071017031959/http://www.habbo.com/home/HAPPY">HAPPY</a></h4>
                                <p class="avatar-list-birthday">Sep 1, 2004</p>
                                <p>
                                    <img src="{{ url('/') }}/web/images/groups/owner_icon.gif" alt="" class="avatar-list-groupstatus">
                                </p>
                            </li>

                            <li id="avatar-list-{{ $item->id }}-3137368" title="...Brianna...">
                                <div class="avatar-list-open"><a href="#" id="avatar-list-open-link-{{ $item->id }}-3137368" class="avatar-list-open-link"></a>
                                </div>
                                <div class="avatar-list-avatar"><img
                                        src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/545116000963503700047301011440086e4c1d6a39e0a90b9de5052544d75a5.gif"
                                        alt=""></div>
                                <h4><a href="/web/20071017031959/http://www.habbo.com/home/3137368/id">...Brianna...</a></h4>
                                <p class="avatar-list-birthday">Jun 2, 2005</p>
                                <p>

                                </p>
                            </li>
                        </ul>
                        <div id="avatar-list-info" class="avatar-list-info">
                            <div class="avatar-list-info-close-container"><a href="#" class="avatar-list-info-close"></a></div>
                            <div class="avatar-list-info-container"></div>
                        </div>

                    </div>

                    <div id="avatar-list-paging">
                        1 - 20 / 259
                        <br>
                        First |
                        &lt;&lt; |
                        <a href="#" class="avatar-list-paging-link" id="avatarlist-search-next">&gt;&gt;</a> |
                        <a href="#" class="avatar-list-paging-link" id="avatarlist-search-last">Last</a>
                        <input type="hidden" id="pageNumber" value="1">
                        <input type="hidden" id="totalPages" value="13">
                    </div>

                    <script type="text/javascript">
                        Event.onDOMReady(function() {
                            window.widget{{ $item->id }} = new MemberWidget('{{ $owner->id }}', '{{ $item->id }}');
                        });
                    </script>

                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
