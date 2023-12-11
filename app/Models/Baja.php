<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baja extends Model
{
    use HasFactory;
    //baja patrimonial, se va a usar mas adelante, sin codeo
    protected $table = 'baja';
    public $timestamps=false;
    protected $fillable=[
        'inventario',
        'cod_presup',
        'tipo_bien',
        'proveedor_id',
        'tipo_ingreso_id',
        'orden_compra',
        'fecha_orden',
        'nro_expediente',
        'ccoo_acta',
        'remito',
        'factura',
        'fecha_factura',
        'importe',
        'exten'	
    ];
}
