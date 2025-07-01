<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class HomeAsset extends Model
{
    protected $table = 'cms_home_assets';

    protected $fillable = [
        'class',
        'path',
        'type',
        'width',
        'height'
    ];

    public function getType(): string
    {
        return $this->type === 's' ? 'sticker' : 'background';
    }
}
