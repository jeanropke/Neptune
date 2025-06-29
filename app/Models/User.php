<?php

namespace App\Models;

use App\Models\Habbowood\Movie;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSession;
use App\Models\Home\HomeSong;
use App\Models\Permission;
use App\Models\Room;
use App\Models\UserBadge;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'motto',
        'console_motto',
        'credits',
        'last_online',
        'sso_ticket',
        'created_at',
        'birthday',
        'sex',
        'figure',
        'rank',
        'allow_stalking',
        'allow_friend_requests',
        'badge',
        'badge_active',
        'battleball_points',
        'snowstorm_points',
        'club_subscribed',
        'club_expiration',
        'club_gift_due',
        'favourite_group'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['created_at'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function setAuthTicket()
    {
        $ticket = 'Habbo-' . md5(uniqid(rand(), true)) . '-Hotel-' . md5(uniqid(rand(), true)) . '-' . uniqid();
        $this->update(['sso_ticket' => $ticket]);
        return $ticket;
    }

    public function setLook($figure, $sex)
    {
        $this->figure   = $figure;
        $this->sex      = $sex;
        $this->save();
        if (is_hotel_online())
            rcon("refresh_looks", ['userId' => $this->id]);
    }

    public function setMotto($motto)
    {
        $this->motto = $motto;
        $this->save();
        if (is_hotel_online())
            rcon("refresh_looks", ['userId' => $this->id]);
    }

    public function setFavouriteGroup($id)
    {
        $this->favourite_group = $id;
        $this->save();

        if (is_hotel_online())
            rcon("refresh_group_perms", ['userId' => $this->id]);
    }

    public function updateCredits($amount)
    {
        $this->increment('credits', $amount);
        if (is_hotel_online())
            rcon("refresh_credits", ['userId' => $this->id]);
    }

    public function subscription(): HasOne
    {
        return $this->hasOne(UserSubscription::class, 'id');
    }

    public function giveHCDays($days)
    {
        $now = time();
        if ($this->club_subscribed == 0) {
            $this->update([
                'club_subscribed'   => $now,
                'club_expiration'   => $now + ($days * 86400),
                'club_gift_due'     => $now + (31 * 86400)
            ]);

            $this->giveGift(325, "From Habbo", "You have just received your monthly club gift!");
        } else {
            $this->increment('club_expiration', $days * 86400);
        }
        if (is_hotel_online())
            rcon("refresh_club", ['userId' => $this->id]);
    }

    public function giveGift($cataItemId, $sender, $message, $unk = "-")
    {
        $now = time();
        $message = str_replace('|', '', $message);
        $wraps = explode(',', cms_config('hotel.gift.wraps'));
        $wrap = $wraps[rand(0, count($wraps) - 1)];
        $this->furnis()->create([
            'user_id'       => $this->id,
            'definition_id' => $wrap,
            'custom_data'   => "{$cataItemId}|{$sender}|{$message}|{$unk}|{$now}"
        ]);

        if (is_hotel_online())
            rcon("refresh_hand", ['userId' => $this->id]);
    }

    public function giveItem($id, $custom)
    {
        $this->furnis()->create([
            'user_id'       => $this->id,
            'definition_id' => $id,
            'custom_data'   => $custom
        ]);
    }

    public function furnis(): HasMany
    {
        return $this->hasMany(Furni::class, 'user_id');
    }

    public function ipAddresses(): HasMany
    {
        return $this->hasMany(UserIPLog::class, 'user_id')->orderBy('created_at', 'ASC');
    }

    public function refreshHand()
    {
        if (is_hotel_online())
            rcon("refresh_hand", ['userId' => $this->id]);
    }

    public function giveHomeItem($itemId)
    {
        HomeItem::create([
            'owner_id'  => $this->id,
            'item_id'   => $itemId
        ]);
    }

    public function badges(): HasMany
    {
        return $this->hasMany(UserBadge::class, 'user_id');
    }

    public function allBadges()
    {
        $temp = [];
        foreach (DB::table('rank_badges')->where('rank', '<=', $this->rank)->get() as $badge) {
            $temp[] = new UserBadge([
                'badge' => $badge->badge
            ]);
        }
        return $this->badges->concat(collect($temp))->sortBy('badge')->values();
    }

    public function giveBadge($code)
    {
        if (!$this->badges()->where('badge', $code)->exists()) {
            $this->badges()->insert([
                'badge'           => $code,
                'user_id'     => $this->id
            ]);
            return true;
        }
        return false;
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class, 'photo_user_id')->orderBy('timestamp', 'DESC');
    }

    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class, 'author_id')->orderBy('updated_at', 'DESC');
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'owner_id')->orderBy('name', 'ASC');
    }

    public function groups(): HasMany
    {
        return $this->hasMany(GroupMember::class, 'user_id')->orderBy('created_at', 'DESC');
    }

    public function getFavoriteGroup()
    {
        $group = Group::find($this->favourite_group);

        if (!$group)
            return;

        return $group;
    }

    public function friendsOfMine(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'messenger_friends', 'from_id', 'to_id')->orderBy('username')
            ->withPivot('from_id', 'to_id');
    }

    public function friendOf(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'messenger_friends', 'to_id', 'from_id')->orderBy('username')
            ->withPivot('from_id', 'to_id');
    }

    public function friends()
    {
        return $this->friendsOfMine->merge($this->friendOf);
    }

    /**
     * Get if user is online
     * Kepler does not support it right now :/
     * @return bool
     */
    public function isOnline()
    {
        return false;
    }

    /**
     * Check if user has permission
     *
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        $tempPermission = $this->getPermission();
        if ($tempPermission->$permission == 1)
            return true;
        return false;
    }

    public function getPermission()
    {
        return Permission::find($this->rank);
    }

    public function cmsSettings(): HasOne
    {
        return $this->hasOne(CmsUserSettings::class, 'user_id');
    }

    public function traxSongs(): HasMany
    {
        return $this->hasMany(HomeSong::class, 'user_id');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class, 'holder_id')->where('holder_type', 'user');
    }

    public function addTag($tag)
    {
        if (!$this->tags()->where('tag', $tag)->exists()) {
            $this->tags()->insert([
                'tag'           => $tag,
                'holder_id'     => $this->id,
                'holder_type'   => 'user'
            ]);
            return 'valid';
        }

        return 'invalidtag';
    }

    public function removeTag($tag)
    {
        $this->tags()->where('tag', $tag)->delete();
    }

    public function homeSession(): HasOne
    {
        return $this->hasOne(HomeSession::class, 'user_id');
    }
}
