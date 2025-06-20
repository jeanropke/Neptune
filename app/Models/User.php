<?php

namespace App\Models;

use App\Models\Habbowood\Movie;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSong;
use App\Models\Permission;
use App\Models\Room;
use App\Models\UserBadge;
use App\Models\UserFriend;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'motto', 'console_motto', 'credits', 'last_online', 'sso_ticket', 'created_at', 'birthday',
        'sex', 'figure', 'rank', 'allow_stalking', 'allow_friend_requests', 'badge', 'badge_active', 'battleball_points', 'snowstorm_points',
        'club_subscribed', 'club_expiration', 'club_gift_due', 'favourite_group'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['created_at'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Generate, save and return the SSO-Ticket
     *
     * @return string
     */
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

    /**
     * Give users credits and update on client
     *
     * @return string
     */
    public function updateCredits($amount)
    {
        $this->increment('credits', $amount);
        if (is_hotel_online())
            rcon("refresh_credits", ['userId' => $this->id]);
    }

    public function getSubscription()
    {
        return UserSubscription::find($this->id);
    }

    /**
     * Give users HC days
     *
     * @return int
     */
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
        $wrap = $wraps[rand(0, count($wraps)-1)];
        Furni::create([
            'user_id'       => $this->id,
            'definition_id' => $wrap,
            'custom_data'   => "{$cataItemId}|{$sender}|{$message}|{$unk}|{$now}"
        ]);

        if (is_hotel_online())
            rcon("refresh_hand", ['userId' => $this->id]);
    }

    public function giveItem($id, $custom)
    {
        Furni::create([
            'user_id'       => $this->id,
            'definition_id' => $id,
            'custom_data'   => $custom
        ]);
    }

    public function getInventory()
    {
        return Furni::where([['user_id', $this->id], ['room_id', '0']])->get();
    }

    public function getLatestIP()
    {
        $ip = UserIPLog::where('user_id', $this->id)->orderBy('created_at', 'DESC')->first();
        if ($ip)
            return $ip->ip_address;

        return '0.0.0.0';
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

    /**
     * Get user badges
     */
    public function getBadges($skipRankBadge = false)
    {
        $badges = array();

        foreach (UserBadge::select('users_badges.badge')->where('user_id', $this->id)->get() as $badge) {
            array_push($badges, array('badge' => $badge->badge));
        }

        if (!$skipRankBadge) {
            foreach (DB::table('rank_badges')->where('rank', '<=', $this->rank)->get() as $badge) {
                array_push($badges, array('badge' => $badge->badge));
            }
        }

        sort($badges);

        return collect($badges);
    }

    public function giveBadge($code)
    {
        $badge = UserBadge::where([['user_id', '=', $this->id], ['badge', '=', $code]])->get();
        if ($badge->count() > 0)
            return false;

        UserBadge::insert([
            'user_id'   => $this->id,
            'badge'     => $code
        ]);

        return true;
    }

    public function getPhotos()
    {
        return Photo::where('photo_user_id', $this->id)->orderBy('timestamp', 'DESC')->get();
    }

    public function getMovies($published)
    {
        if ($published)
            return Movie::where([['author_id', $this->id], ['published', '1']])->orderBy('rating', 'DESC')->get();
        return Movie::where('author_id', $this->id)->orderBy('rating', 'DESC')->get();
    }

    /**
     * Get user rooms
     */
    public function getRooms()
    {
        return Room::where('owner_id', $this->id)->get();
    }

    /**
     * Get user groups
     */
    public function getGroups()
    {
        return GroupMember::where([['groups_memberships.user_id', $this->id], ['is_pending', '0']])
            ->join('groups_details', 'groups_details.id', '=', 'groups_memberships.group_id')
            ->orWhere('groups_details.owner_id', $this->id)
            ->get();
    }

    /**
     * Get user favorite group.
     */
    public function getFavoriteGroup()
    {
        if (!$this->getCmsSettings() || !$this->getCmsSettings()->favorite_group)
            return;

        $group = Group::find($this->getCmsSettings()->favorite_group);

        if (!$group)
            return;

        return $group;
    }

    /**
     * Get user friends
     *
     * @return mixed
     */
    public function getFriends()
    {
        return UserFriend::where('from_id', $this->id)->join('users', 'users.id', '=', 'to_id')
            ->select('users.id', 'username', 'figure', 'created_at', 'to_id')
            ->orderBy('username', 'asc')->get();
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

    public function getCmsSettings()
    {
        return CmsUserSettings::where('user_id', $this->id)->first();
    }

    public function getTraxSongs()
    {
        return HomeSong::where('user_id', $this->id)->get();
    }
}
