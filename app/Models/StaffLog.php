<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffLog extends Model
{
    protected $table = 'cms_stafflogs';

    protected $fillable = [
       'user_id', 'page', 'message', 'ip_address'
    ];

    public function getUsername()
    {
        $user = User::find($this->user_id);
        if ($user)
            return $user->username;
    }
}
