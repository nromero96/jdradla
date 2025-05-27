<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplierserviceroute extends Model
{

    //disable timestamps created_at and updated_at
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'supplierservice_id',
        'origin_country',
        'origin_state',
        'origin_city',
        'destination_country',
        'destination_state',
        'destination_city',
        'crossing',
        'return_route',
    ];
}
