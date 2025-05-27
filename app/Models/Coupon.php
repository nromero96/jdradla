<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    //fillable fields
    protected $fillable = [
        'code',
        'description',
        'type',
        'amount',
        'quantity',
        'used',
        'start_date',
        'end_date',
        'inscripcion_category',
        'is_email_restrict',
        'status',
    ];

}
