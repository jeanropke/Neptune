<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class HomeItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_homes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'owner_id', 'x', 'y', 'z', 'item_id', 'data', 'type', 'skin', 'home_id', 'group_id', 'is_deleted'
    ];

    public $timestamps = false;

    public function getStoreItem()
    {
        $item = StoreItem::find($this->item_id);
        if (!$item)
            return 'not found';
        return $item;
    }

    public function getShortType()
    {
        switch ($this->type) {
            case 'background';
                return 'b';
            case 'sticker';
                return 's';
            case 'widget';
                return 'w';
            case 'note';
                return 'commodity';
            default:
                return $this->type . ' not found?';
        }
    }

    public function getFullType() {
        switch ($this->type) {
            case 'background';
                return 'Backgrounds';
            case 'sticker';
                return 'Stickers';
            case 'widget';
                return 'Widgets';
            case 'note';
                return 'commodity';
            default:
                return $this->type . ' not found?';
        }
    }
}
