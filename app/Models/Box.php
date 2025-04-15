<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $table = 'cms_boxes';

    protected $fillable = [
        'title', 'content', 'requirement', 'created_by'
    ];

    public $timestamps = false;

    public function getCreator()
    {
        $user = User::find($this->created_by);
        if($user)
            return $user->username;

        return 'Unknown creator';
    }
}
