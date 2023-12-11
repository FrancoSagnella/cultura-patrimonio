<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBien extends Model
{
    use HasFactory;

    //De momento por lo menos uso esta
    protected $table = 'tipo_bien';
    public $timestamps=false;
    protected $fillable =[
                            'cod_presup',
                            'tipo_bien',
                            'text',
                            'descr',
                            'amortizacion',
                            'alicuota'
                        ];

}
