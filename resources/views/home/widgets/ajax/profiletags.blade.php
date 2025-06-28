<div id="profile-tags-container">
    @forelse ($owner->tags as $tag)
        <span class="tag-search-rowholder">
            <a href="{{ url('/') }}/tag/search?tag={{ $tag->tag }}" class="tag">{{ $tag->tag }}</a>
            <div class="tag-id" style="display:none">62</div>
            @auth
                <img border="0" class="tag-delete-link tag-delete-link-{{ $tag->tag }}"
                    onmouseover="this.src='{{ url('/') }}/web/images/buttons/tags/tag_button_delete_hi.gif'"
                    onmouseout="this.src='{{ url('/') }}/web/images/buttons/tags/tag_button_delete.gif'" src="{{ url('/') }}/web/images/buttons/tags/tag_button_delete.gif">
            @endauth
            @guest
                <img id="tag-img-added" border="0" class="tag-none-link" src="{{ url('/') }}/web/images/buttons/tags/tag_button_dim.gif">
            @endguest
        </span>
    @empty
        No tags.
    @endforelse

    <img id="tag-img-added" border="0" src="{{ url('/') }}/web/images/buttons/tags/tag_button_added.gif" style="display:none">
</div>
<script type="text/javascript">
    document.observe("dom:loaded", function() {
        TagHelper.setTexts({
            buttonText: "Ok",
            tagLimitText: "The limit is 8 tags!"
        });
    });
</script>
