<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'inscription_id',
        'user_id',
        'action_description',
        'purchasenumber',
        'card_brand',
        'card_number',
        'amount',
        'currency',
        'transaction_date',
    ];

}
