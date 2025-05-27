<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'insc_id',
        'apellido',
        'nombre',
        'sesion',
        'nombre_sesion',
        'fecha',
        'bloque',
        'inicio',
        'termino',
        'sala',
        'tema',
    ];

}
