<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_user_id',
        'guest_user_id',
        'mode_of_transport',
        'cargo_type',
        'service_type',
        'origin_country_id',
        'origin_address',
        'origin_city',
        'origin_state_id',
        'origin_zip_code',
        'origin_airportorport',
        'destination_country_id',
        'destination_address',
        'destination_city',
        'destination_state_id',
        'destination_zip_code',
        'destination_airportorport',
        'total_qty',
        'total_actualweight',
        'total_volum_weight',
        'tota_chargeable_weight',
        'shipping_date',
        'no_shipping_date',
        'declared_value',
        'insurance_required',
        'currency',
        'rating',
        'status',
        'assigned_user_id',
    ];
}
