<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'company_name',
        'company_website',
        'email',
        'phone',
        'source',
        'subscribed_to_newsletter',
    ];

}
