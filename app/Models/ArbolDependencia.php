<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArbolDependencia extends Model
{
    use HasFactory;
    protected $table = 'arbol_dep';
    public $timestamps=false;
    protected $fillable=[
        'dep_id_p',
        'pos',
        'dep_id_h'
    ];
}
