<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesBanner extends Model
{
    use HasFactory;

    protected $table = 'pages_banners';

    protected $fillable = [
        'image_path',
    ];
}
