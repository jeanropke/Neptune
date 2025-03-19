<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_homes_guestbook';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'message', 'widget_id', 'time', 'is_deleted'
    ];

    public $timestamps = false;

}
