<?php

namespace App\Models\Neptune;

use App\Models\Group\GroupReply;
use App\Models\Home\Guestbook;
use App\Models\Home\HomeItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $table = 'cms_reports';

    protected $fillable = [
        'reported_by',
        'object_id',
        'type',
        'message',
        'author_id',
        'picked_by',
        'closed',
        'created_at',
        'updated_at'
    ];

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function picker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'picked_by');
    }

    public function hideObject()
    {
        switch ($this->type) {
            case 'discussionpost':
                $reply = GroupReply::find($this->object_id);
                $reply->update(['hidden_by_staff' => '1']);
                break;

            case 'groupdesc':
                $group = Group::find($this->object_id);
                $group->update(['description' => 'Inappropriate to management.']);
                break;

            case 'groupname':
                $group = Group::find($this->object_id);
                $group->update(['name' => 'Inappropriate to management.']);
                break;

            case 'guestbook':
                $guestbook = Guestbook::find($this->object_id);
                $guestbook->update(['is_deleted' => '1']);
                break;

            case 'motto':
                $user = User::find($this->object_id);
                $user->setMotto('');
                break;

            case 'room':
                $room = Room::find($this->object_id);
                $room->update([
                    'name'          => 'Inappropriate to management.',
                    'description'   => 'Inappropriate to management.'
                ]);
                break;

            case 'stickie':
                $stickie = HomeItem::find($this->object_id);
                $stickie->update(['is_deleted' => '1']);
                break;

            default:
                return $this->type;
                break;
        }
    }
}
