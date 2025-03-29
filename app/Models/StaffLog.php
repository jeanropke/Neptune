<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffLog extends Model
{
    protected $table = 'cms_stafflogs';

    protected $fillable = [
        'id', 'user_id', 'page', 'message'
    ];

    public static function createLog($page, $message)
    {
        StaffLog::create([
            'user_id'   => user()->id,
            'page'      => $page,
            'message'   => $message
        ]);
    }
}
