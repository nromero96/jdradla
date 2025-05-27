<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliercontact extends Model
{
    use HasFactory;

    //disable timestamps created_at and updated_at
    public $timestamps = false;

    protected $fillable = [
        'supplier_id',
        'contact_name',
        'contact_email',
        'contact_position',
        'contact_main',
        'contact_typeone',
        'contact_typeone_value',
        'contact_typetwo',
        'contact_typetwo_value',
        'contact_typethree',
        'contact_typethree_value',
        'contact_typefour',
        'contact_typefour_value',
        'contact_typefive',
        'contact_typefive_value',
    ];
}
