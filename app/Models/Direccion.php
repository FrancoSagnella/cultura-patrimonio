<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'dir';
    protected $fillable = [
        'prov_id',
        'loc',
        'cp',
        'calle',
        'nro',
        'tel',
        'upd',
        'user',
        'del'
    ];
}
