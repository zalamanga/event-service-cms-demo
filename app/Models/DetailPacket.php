<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPacket extends Model
{
    use HasFactory;
    public $table = 'packet_details';

    public function packet()
    {
        return $this->belongsTo(Packet::class);
    }

    public function getPhotoAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
