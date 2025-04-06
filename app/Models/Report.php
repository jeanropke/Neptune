<?php

namespace App\Models;

use App\Models\Group\GroupReply;
use App\Models\Home\Guestbook;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'cms_reports';

    protected $fillable = [
        'id',
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

    public function getUsername()
    {
        $user = User::find($this->reported_by);
        if ($user)
            return $user->username;
    }

    public function getAuthor()
    {
        $user = User::find($this->author_id);
        if ($user)
            return $user->username;
    }

    public function hideObject()
    {
        switch ($this->type) {
            case 'discussionpost':
                $reply = GroupReply::find($this->object_id);
                $reply->update(['hidden_by_staff' => '1']);
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

            default:
                return $this->type;
                break;
        }
    }

    public function getPickedBy()
    {
        $user = User::find($this->picked_by);
        if ($user)
            return $user->username;
    }
}
