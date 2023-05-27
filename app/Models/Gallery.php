<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Gallery extends Model
{
    use HasFactory, HasRoles;
    
    protected $fillable = [
        'status',
    ];

    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
