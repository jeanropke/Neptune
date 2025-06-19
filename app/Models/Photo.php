<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'items_photos';

    protected $fillable = [
        'photo_id',
        'photo_user_id',
        'timestamp',
        'photo_data',
        'photo_checksum'
    ];

    protected  $primaryKey = 'photo_id';
    public $timestamps = false;

    private function getFurni()
    {
        return Furni::find($this->photo_id);
    }

    public function getData()
    {
        $data = array(
            'date'  => Carbon::parse($this->timestamp),
            'text'  => ''
        );
        $furni = $this->getFurni();
        if ($furni)
            $data['text'] = substr($this->getFurni()->custom_data, 20);

        return (object)$data;
    }
}
