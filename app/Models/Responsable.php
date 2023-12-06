<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    protected $table = 'responsable';
    public $timestamps=false;
    protected $fillable = [ 
                            'nom',
                            'ape',
                            'dni',
                            'tel',
                            'mail',
                            'tipo_asi_id',
                            'nro_asig',
                            'anio_asig',
                            'text',
                            'del',
                            'tipo_res_id'];
}
