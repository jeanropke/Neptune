<?php

namespace App\Models\Home;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class HomeUpdate extends Model
{
    protected $table = 'cms_homes_updates';

    protected $fillable = [
        'user_id', 'updated_at'
    ];

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    public function getUser()
    {
        return User::find($this->user_id);
    }
}
