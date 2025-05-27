<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_inscription_id',
        'price_category',
        'accompanist_id',
        'price_accompanist',
        'total',
        'special_code',
        'document_file',
        'invoice',
        'invoice_ruc',
        'invoice_social_reason',
        'invoice_address',
        'payment_method',
        'voucher_file',
        'status',
    ];
}
