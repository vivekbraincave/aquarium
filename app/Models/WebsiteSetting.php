<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $table = 'website_settings';

    protected $fillable = [
        'small_logo',
        'large_logo',
        'favicon',
        'website_name',
        'address',
        'contact_number1',
        'contact_number2',
        'contact_number3',
        'contact_number4',
        'email_address1',
        'email_address2',
        'facebook_url',
        'instagram_url',
    ];
}
