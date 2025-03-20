<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'owner_id', 'name', 'accesstype', 'visitors_now', 'visitors_max', 'password', 'description', 'is_public'
    ];

    public $timestamps = false;

    public function getState()
    {
        switch($this->accesstype)
        {
            case 0:
                return 'open';
            case 1:
                return 'locked';
            case 2:
                return 'password';
        }
    }

}
