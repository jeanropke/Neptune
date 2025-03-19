<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StaffLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_stafflogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'page', 'message'
    ];

    public static function createLog($page, $message)
    {
        StaffLog::create([
            'user_id'   => Auth::user()->id,
            'page'      => $page,
            'message'   => $message
        ]);
    }
}
