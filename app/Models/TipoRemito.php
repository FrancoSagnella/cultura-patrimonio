<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRemito extends Model
{
    use HasFactory;
    protected $table = 'tipo_remito';
    public $timestamps=false;
    protected $fillable = [
        'descr',
        'text'
    ];
}
