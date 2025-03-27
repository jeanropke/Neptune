<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'cms_reports';

    protected $fillable = [
        'id', 'reported_by', 'object_id', 'type', 'picked_by', 'created_at', 'updated_at'
    ];
}
