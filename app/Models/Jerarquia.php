<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jerarquia extends Model
{
    use HasFactory;
    protected $table = 'jerarquias';
    public $timestamps=false;
    protected $fillable=[
                        'descr',
                        'chk_complejo',
                        'chk_ufuncional',
                        'chk_ubicacion',
                        'chk_asignado',
                        'del'];
}
