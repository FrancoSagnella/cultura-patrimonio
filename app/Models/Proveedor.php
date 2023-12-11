<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    //De momento por lo menos uso esta
    protected $table = 'proveedor';
    public $timestamps=false;
    protected $fillable = [
        'nom',
        'ape',
        // 'descripcion_proveedor',
        'provincia_id',
        'localidad',
        'cp',
        'calle',
        'nro',
        'piso',
        'depto',
        'tel',
        'del'
    ];
}
