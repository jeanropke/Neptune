<?php

namespace App\Models\Home;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    protected $table = 'cms_homes_guestbook';

    protected $fillable = [
        'user_id', 'message', 'widget_id', 'deleted_by', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function getAuthor()
    {
        return User::find($this->user_id);
    }

    public function getHomeOwner()
    {
        $item = HomeItem::find($this->widget_id);

        if(!$item) {
            //not a good thing, but it works :p
            return (object) array('username' => "Widget not found ($this->widget_id)");
        }
        return $item->getOwner();
    }

    public function getDeletedBy()
    {
        return User::find($this->deleted_by);
    }
}
