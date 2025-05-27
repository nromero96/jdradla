<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accompanist extends Model
{
    use HasFactory;

    protected $fillable = [
        'accompanist_name',
        'accompanist_typedocument',
        'accompanist_numdocument',
        'accompanist_solapin',
    ];
}
