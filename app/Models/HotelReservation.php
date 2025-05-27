<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hotel_name',
        'habitacion_type',
        'number_guests',
        'check_in',
        'check_out',
        'comment',
    ];
}
