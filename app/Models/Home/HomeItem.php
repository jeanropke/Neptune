<?php

namespace App\Models\Home;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class HomeItem extends Model
{
    protected $table = 'cms_homes';

    protected $fillable = [
        'owner_id', 'x', 'y', 'z', 'item_id', 'data', 'skin', 'home_id', 'group_id', 'deleted_by'
    ];

    public $timestamps = false;

    public function getOwner()
    {
        return User::find($this->owner_id);
    }

    public function getDeletedBy()
    {
        return User::find($this->deleted_by);
    }

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
