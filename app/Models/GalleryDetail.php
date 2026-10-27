<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryDetail extends Model
{
    use HasFactory;

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function getImageAttribute()
    {
        return asset('storage/' . $this->photo);
    }
}
