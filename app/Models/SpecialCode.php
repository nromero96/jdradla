<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'amount',
        'description',
        'status',
        'payment_required',
        'quantity',
        'expiration',
    ];
}
