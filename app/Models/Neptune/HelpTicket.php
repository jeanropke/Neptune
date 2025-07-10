<?php

namespace App\Models\Neptune;

use Illuminate\Database\Eloquent\Model;

class HelpTicket extends Model
{
    protected $table = 'cms_help_tickets';

    protected $fillable = [
        'username',
        'email',
        'issue',
        'message',
        'picked_by'
    ];
}
