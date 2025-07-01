<?php

namespace App\Models\Home;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeItem extends Model
{
    protected $table = 'cms_homes';

    protected $fillable = [
        'owner_id',
        'x',
        'y',
        'z',
        'item_id',
        'data',
        'skin',
        'home_id',
        'group_id',
        'deleted_by'
    ];

    public $timestamps = false;

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function getShortType(): ?string
    {
        return $this->store?->type;
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(StoreItem::class, 'item_id');
    }

    public function getFullType(): string
    {
        $type = $this->store?->type;

        return match ($type) {
            'b' => 'Backgrounds',
            's' => 'Stickers',
            'w' => 'Widgets',
            'commodity' => 'Commodity',
            default => ($type ? "{$type} not found?" : 'Unknown'),
        };
    }
}
