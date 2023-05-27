<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class FAQ extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'faqs';

    protected $fillable = [
        'question',
        'answer',
    ];
}
