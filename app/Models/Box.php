<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_boxes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'content', 'requirement', 'created_by'
    ];

    public $timestamps = false;
}
