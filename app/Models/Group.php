<?php

namespace App\Models;

use App\Models\Group\GroupTopic;
use App\Models\Home\HomeItem;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'name', 'description', 'badge', 'url', 'date_created'
    ];

    public $timestamps = false;

    public function getUrl()
    {
        if($this->url)
            return $this->url;

        return "{$this->id}/id";
    }

    public function getItems()
    {
        return HomeItem::where('group_id', $this->id)->get();
    }

    public function getTopics()
    {
        return GroupTopic::where('group_id', $this->id)->get();
    }

}
