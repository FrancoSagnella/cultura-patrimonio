<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoResponsable extends Model
{
    use HasFactory;
    protected $table = 'tipo_responsable';
    public $timestamps=false;
    protected $fillable = [
        'descr',
        'text'
    ];

}
