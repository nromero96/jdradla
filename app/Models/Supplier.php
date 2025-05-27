<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Supplier extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'company_name',
        'company_address',
        'country_id',
        'state_id',
        'city',
        'company_website',
        'company_rating',
        'document_one',
        'document_two',
        'document_three',
        'company_note',
    ];

}
