<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'club_subscribed', 'club_expiration'
    ];

    public $timestamps = false;

    public function expiresAt()
    {
        return $this->club_expiration;
    }

    public function isExpired()
    {
        return $this->expiresAt() <= time();
    }

    public function daysRemaining()
    {
        return floor(($this->expiresAt() - time()) / 60 / 60 / 24);
    }

    public function monthsRemaining()
    {
        return floor($this->daysRemaining() / 31);
    }

    public function getPassedDays()
    {
        return ($this->club_subscribed - time()) / 60 / 60 / 24;
    }

    public function getPassedMonths()
    {
        return abs(ceil($this->getPassedDays() / 31));
    }

    public function neverSubscribed()
    {
        return !$this->club_expiration;
    }
}
