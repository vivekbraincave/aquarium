<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class GalleryImage extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'gallery_id',
        'img_alt',
        'img_title',
        'image_path',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
