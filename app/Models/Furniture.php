<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items_base';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id ', 'item_name', 'public_name', 'interaction_type', 'description'
    ];

    public $timestamps = false;
    public $incrementing = false;

    public function getNormalizedName()
    {
        return str_replace('*', '_', $this->item_name);
    }
}
