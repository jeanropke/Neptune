<?php

namespace App\Models\Staff;

use App\Models\Habbowood\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

class Pick extends Model
{
    protected $table = 'cms_staffpicks';

    protected $fillable = [
        'pick_id',
        'pick_type',
        'picker_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'picker_id');
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class, 'pick_id');
    }
}
