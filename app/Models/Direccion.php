<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direccion';
    public $timestamps=false;
    protected $fillable = [
        'prov_id',
        'loc_id',
        'cp',
        'calle',
        'nro',
        'tel',
        // 'upd',
        // 'user',
        'del'
    ];
}
