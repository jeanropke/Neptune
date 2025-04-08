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
        'id', 'owner_id', 'x', 'y', 'z', 'item_id', 'data', 'skin', 'home_id', 'group_id', 'is_deleted'
    ];

    public $timestamps = false;

    public function getStoreItem()
    {
        $store = StoreItem::find($this->item_id);
        if (!$store)
            return 'not found';
        return $store;
    }

    public function getShortType()
    {
        return $this->getStoreItem()->type;
    }

    public function getFullType() {
        switch ($this->getStoreItem()->type) {
            case 'b';
                return 'Backgrounds';
            case 's';
                return 'Stickers';
            case 'w';
                return 'Widgets';
            case 'commodity';
                return 'commodity';
            default:
                return $this->type . ' not found?';
        }
    }
}
