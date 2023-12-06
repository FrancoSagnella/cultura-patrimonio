<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrimonio_Extension extends Model
{
    use HasFactory;
    protected $table = 'patrimonio_e';
    protected $fillable = [
        'inventario',
        'marca',
        'modelo',
        'serie',
        'res_id',
        'text',
        'archivo',
        ];
}
