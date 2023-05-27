<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankImage extends Model
{
    use HasFactory;

    protected $table = 'tank_images';
    protected $fillable = ['image_path'];
}
