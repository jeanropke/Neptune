<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'cms_permissions';

    protected $fillable = [
        'name', 'can_access_housekeeping'
    ];

    public $timestamps = false;

}
