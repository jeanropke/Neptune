<div class="group-memberlist-avatarinfo-images">
    <img src="{{ cms_config('site.avatarimage.url') }}{{ $member->figure }}&direction=4&head_direction=4&gesture=sml&size=s" alt="">
</div>
<div class="group-memberlist-avatarinfo-birthday">
    <b>{{ $member->created_at->format('M d, Y') }}</b>
</div>
<div class="group-memberlist-avatarinfo-motto">{{ $member->motto }}</div>
