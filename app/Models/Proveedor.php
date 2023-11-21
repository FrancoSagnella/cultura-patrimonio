<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    //De momento por lo menos uso esta
    protected $table = 'proveedor';
    protected $fillable = [
        'nombre_proveedor',
        'descripcion_proveedor',
        'calle',
        'numero',
        'piso',
        'departamento',
        'localidad',
        'provincia_id',
        'telefono',
        'codigo_postal',
        'sf_guard_user_id' => 1
    ];
}
