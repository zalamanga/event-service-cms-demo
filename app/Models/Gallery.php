<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($gallery) {
            $gallery->position = self::max('position') + 1;
        });
    }

    public function getImageAttribute()
    {
        return asset('storage/' . $this->photo);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function details()
    {
        return $this->hasMany(GalleryDetail::class);
    }
}
