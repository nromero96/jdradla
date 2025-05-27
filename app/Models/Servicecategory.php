<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicecategory extends Model
{
    //disable timestamps created_at and updated_at
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'servicecategory_name',
        'servicecategory_color'
    ];
}
