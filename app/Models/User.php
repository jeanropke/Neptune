<?php

namespace App\Models;

use App\Helpers\Hotel;
use App\Models\Guild;
use App\Models\GuildMember;
use App\Models\Home\HomeSong;
use App\Models\Permission;
use App\Models\Room;
use App\Models\UserBadge;
use App\Models\UserCurrency;
use App\Models\UserFriend;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'motto', 'last_online', 'sso_ticket', 'created_at', 'birthday', 'sex', 'figure', 'rank', 'allow_stalking', 'allow_friend_requests', 'badge', 'badge_active',
        'battleball_points', 'snowstorm_points'
    ];

    protected $hidden = [
        'password', 'remember_token',
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
        mus("refresh_looks", ['userId' => $this->id]);
    }

    public function setMotto($motto)
    {
        $this->motto   = $motto;
        $this->save();
        mus("refresh_looks", ['userId' => $this->id]);
    }

    /**
     * Give users credits and update on client
     *
     * @return string
     */
    public function updateCredits($amount)
    {
        if ($this->isOnline()) {
            Hotel::sendRconMessage('givecredits', ['user_id' => $this->id, 'credits' => $amount]);
        } else {
            $this->increment('credits', $amount);
        }
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
        $subscription = UserSubscription::where([['user_id', '=', $this->id], ['active', '=', '1']])->first();

        if($this->isOnline()) {
            Hotel::sendRconMessage('modifysubscription', ['user_id' => $this->id, 'type' => 'HABBO_CLUB', 'action' => 'add', 'duration' => 86400 * $days]);
        }
        else
        {
            if (!$subscription) {
                UserSubscription::create([
                    'user_id' => $this->id,
                    'subscription_type' => 'HABBO_CLUB',
                    'timestamp_start' => time(),
                    'duration' => 86400 * $days,
                    'active' => 1
                ]);
            }
            else {
                $subscription->increment('duration', 86400 * $days);
            }
        }
    }


    /**
     * Get user badges
     */
    public function getBadges()
    {
        return UserBadge::select('badge')->where('user_id', $this->id)->orderBy('badge', 'ASC')->get();
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
        return GuildMember::where('guilds_members.user_id', $this->id)->join('guilds', 'guilds_members.guild_id', '=', 'guilds.id')->get();
    }

    /**
     * Get user favorite group.
     */
    public function getFavoriteGroup()
    {
        if (!$this->getSettings() || $this->getSettings()->guild_id == 0)
            return;

        $group = Guild::find($this->getSettings()->guild_id);

        if(!$group)
            return;

        return $group;
    }

    /**
     * Get user settings
     *
     * @return mixed
     */
    public function getSettings()
    {
        return UserSettings::where('user_id', $this->id)->first();
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
     *
     * @return bool
     */
    public function isOnline()
    {
        return $this->last_online > time();
    }

    public function getCurrencies()
    {
        return UserCurrency::where('user_id', $this->id);
    }

    public function getCurrency($type)
    {
        $currency = $this->getCurrencies()->where('type', $type)->first();

        if (!empty(json_decode($currency))) {
            return json_decode($currency)[0]->amount;
        }
        return 0;
    }

    public function setPoints($amount, $type)
    {

        $currency = UserCurrency::where([['user_id', $this->id], ['type', $type]])->first();
        if ($currency == null) {
            UserCurrency::create([
                'user_id'   => $this->id,
                'amount'    => $amount,
                'type'      => $type
            ]);
        } else {
            $currency->update(['amount' => $currency->amount + $amount]);
        }
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
