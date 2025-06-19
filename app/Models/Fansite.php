<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fansite extends Model
{
    protected $table = 'cms_fansites';

    protected $fillable = [
        'url', 'name', 'description', 'image', 'created_by'
    ];

    public function getUser()
    {
        return User::find($this->created_by);
    }
}
