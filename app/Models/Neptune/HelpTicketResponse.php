<?php

namespace App\Models\Neptune;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HelpTicketResponse extends Model
{
    protected $table = 'cms_help_tickets_responses';

    protected $fillable = [
        'ticket_id',
        'message',
        'response_by',
        'email_sent'
    ];

    public function responder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'response_by');
    }

    public function getResponderNameAttribute()
    {
        $this->load('responder');
        return $this->responder->username ?? null;
    }
}
