<?php

namespace App\Models;

use App\Models\Habbowood\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class StaffPick extends Model
{
    protected $table = 'cms_staffpicks';

    protected $fillable = [
        'pick_id', 'pick_type', 'picker_id'
    ];

    public function getPicker()
    {
        return User::find($this->picker_id);
    }

    public function getMovie()
    {
        return Movie::find($this->pick_id);
    }
}
