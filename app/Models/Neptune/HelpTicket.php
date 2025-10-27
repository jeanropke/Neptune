<?php

namespace App\Models\Neptune;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HelpTicket extends Model
{
    protected $table = 'cms_help_tickets';

    protected $fillable = [
        'username',
        'email',
        'issue',
        'message',
        'picked_by',
        'status',
        'token'
    ];

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            0 => 'open',
            1 => 'waiting_user',
            2 => 'waiting_staff',
            3 => 'closed'
        };
    }

    public function picker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'picked_by');
    }

    public function responses(): HasMany
    {
        return $this->hasMany(HelpTicketResponse::class, 'ticket_id');
    }
}
