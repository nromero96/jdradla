<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statusnote extends Model
{
    use HasFactory;

    protected $fillable = [
        'inscription_id',
        'action',
        'note',
        'user_id',
    ];


}
