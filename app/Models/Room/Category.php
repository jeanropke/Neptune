<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'rooms_categories';

    protected $fillable = [
        'order_id',
        'parent_id',
        'isnode',
        'name',
        'public_spaces',
        'allow_trading',
        'minrole_access',
        'minrole_setflatcat'
    ];

    public $timestamps = false;
}
