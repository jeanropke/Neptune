<?php

namespace App\Models;

use App\Models\Furni\Photo;
use App\Models\Group\Member;
use App\Models\Habbowood\Movie;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSession;
use App\Models\Home\HomeSong;
use App\Models\Neptune\Permission;
use App\Models\Neptune\UserSettings;
use App\Models\Room;
use App\Models\User\Badge;
use App\Models\User\IPLog;
use App\Models\User\Subscription;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        return $this->hasOne(Subscription::class, 'id');
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

    public function giveItem($id, $custom = '')
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
        return $this->hasMany(IPLog::class, 'user_id')->orderBy('created_at', 'ASC');
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
        return $this->hasMany(Badge::class, 'user_id');
    }

    public function allBadges()
    {
        $temp = [];
        foreach (DB::table('rank_badges')->where('rank', '<=', $this->rank)->get() as $badge) {
            $temp[] = new Badge([
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
        return $this->hasMany(Photo::class, 'photo_user_id')->with('furni')->orderBy('timestamp', 'DESC');
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
        return $this->hasMany(Member::class, 'user_id')->orderBy('created_at', 'DESC');
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
        return $this->hasOne(UserSettings::class, 'user_id');
    }

    public function traxSongs(): HasMany
    {
        return $this->hasMany(HomeSong::class, 'user_id');
    }

    public function homeItems(): HasMany
    {
        return $this->hasMany(HomeItem::class, 'home_id')->with('store');
    }

    public function tags(): MorphMany
    {
        return $this->morphMany(Tag::class, 'holder');
    }

    public function addTag($tag)
    {
        $tag = Str::lower($tag);
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

    public function ensureHomeItems()
    {
        if ($this->homeItems->isEmpty()) {
            $defaultItems = [
                ['x' => '125',    'y' => '38',    'z' => '131', 'item_id' => '15',  'data' => 'Remember![br]Posting personal information about yourself or your friends, including addresses, phone numbers or email, and getting round the filter will result in your note being deleted.[br]Deleted notes will not be funded.[br][br]', 'skin' => 'noteitskin'],
                ['x' => '56',     'y' => '229',   'z' => '151', 'item_id' => '15',  'data' => 'Welcome to a brand new Habbo Home page![br]This is the place where you can express yourself with a wild and unique variety of stickers, hoot yo [br]trap off with colourful notes and showcase your Habbo rooms! To [br]start editing just click the edit button.[br][br]', 'skin' => 'speechbubbleskin'],
                ['x' => '110',    'y' => '409',   'z' => '170', 'item_id' => '15',  'data' => 'Where are my friends?[br]To add your buddy list to your page click edit and look in your widgets inventory. After placing it on the page you can move it all over the place and even change how it looks. Go on!', 'skin' => 'notepadskin'],
                //Profile Widget
                ['x' => '455',    'y' => '27',    'z' => '129', 'item_id' => '1', 'skin' => 'defaultskin'],
                //Rooms Widget
                ['x' => '440',    'y' => '321',   'z' => '177', 'item_id' => '6', 'skin' => 'defaultskin'],
                //High Scores Widg
                ['x' => '383',    'y' => '491',   'z' => '179', 'item_id' => '7', 'skin' => 'goldenskin'],
                //needle_3
                ['x' => '109',    'y' => '19',    'z' => '134', 'item_id' => '18'],
                //sticker_spaceduc
                ['x' => '275',    'y' => '367',   'z' => '152', 'item_id' => '24'],
                //paper_clip_1
                ['x' => '183',    'y' => '373',   'z' => '171', 'item_id' => '21'],
                //bg_pattern_abstr
                ['x' => '0',      'y' => '0',     'z' => '0',   'item_id' => '28',  'data' => 'background'],
                // Inventory items
                //needle_1
                ['item_id' => '16'],
                //needle_2
                ['item_id' => '17']
            ];

            foreach ($defaultItems as $item) {
                HomeItem::create(array_merge([
                    'owner_id'  => $this->id,
                    'home_id'   => $this->id
                ], $item));
            }

            $this->load('homeItems');
        }
    }
}
