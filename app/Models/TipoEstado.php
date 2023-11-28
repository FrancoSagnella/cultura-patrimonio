<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstado extends Model
{
    use HasFactory;

    //hay que ver si en la tabla nueva cambia el nombre
    protected $table = 'universo';
    protected $fillable = ['universo', 'habilitado'];

}
