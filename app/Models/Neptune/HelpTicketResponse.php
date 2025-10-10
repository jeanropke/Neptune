<?php

namespace App\Models\Neptune;

use Illuminate\Database\Eloquent\Model;

class HelpTicketResponse extends Model
{
    protected $table = 'cms_help_tickets';

    protected $fillable = [
        'ticket_id',
        'message',
        'staff_id',
    ];
}
