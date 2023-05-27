<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = 'outlets';

    protected $fillable = [
        'outlet_name',
        'image',
        'address',
        'opening_time',
        'closing_time',
        'second_address',
        'telephone',
        'iframe_src',
        'iframe_width',
        'iframe_height',
    ];
}
