<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'cms_partners';

    protected $fillable = [
        'title', 'description', 'image', 'url', 'enabled', 'order_num', 'created_by'
    ];

    public function getAuthor()
    {
        $user = User::find($this->created_by);
        if ($user)
            return $user->username;
    }
}
