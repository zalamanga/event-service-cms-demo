<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($packet) {
            $packet->position = self::max('position') + 1;
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function details()
    {
        return $this->hasMany(DetailPacket::class);
    }

    public function getPhotoAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
