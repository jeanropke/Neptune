<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class StoreItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_homes_store_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'caption', 'class', 'category', 'price', 'type'
    ];

    public $timestamps = false;

    public function getFullType() {
        switch ($this->type) {
            case 'b';
                return 'background';
            case 's';
                return 'sticker';
            case 'w';
                return 'widget';
            case 'commodity';
                return 'note';
            default:
                return $this->type . ' not found?';
        }
    }
}
