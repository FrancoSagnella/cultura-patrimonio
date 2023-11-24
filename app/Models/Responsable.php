<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    protected $table = 'responsable';
    protected $fillable = [ 'tipo_responsable_id',
                            'dependencia_id',
                            'nombre',
                            'apellido',
                            'dni',
                            'mail',
                            'tipo_asignacion_id',
                            'nro_asignacion',
                            'anio_asignacion',
                            'descripcion',
                            'sf_guard_user_id' => 0];
}
