<?php

namespace App\Models;

use App\Models\Group\GroupReply;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'cms_reports';

    protected $fillable = [
        'id',
        'reported_by',
        'object_id',
        'type',
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

    public function getObjectMessage()
    {
        switch ($this->type) {
            case 'discussionpost':
                $reply = GroupReply::find($this->object_id);
                if ($reply)
                    return bb_format($reply->message);
                break;

            default:
                return $this->type;
                break;
        }
    }

    public function getObjectAuthor()
    {
        switch ($this->type) {
            case 'discussionpost':
                $reply = GroupReply::find($this->object_id);
                if ($reply)
                    return $reply->getAuthor()->username;
                break;

            default:
                return $this->type;
                break;
        }
    }

    public function hideObject()
    {
        switch ($this->type) {
            case 'discussionpost':
                $reply = GroupReply::find($this->object_id);
                $reply->update(['hidden_by_staff' => '1']);
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
