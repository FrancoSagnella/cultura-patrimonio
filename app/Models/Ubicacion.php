<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = "ubicacion";
    public $timestamps=false;
    protected $fillable = [
        	"com_id",
            "uf",// "uf_id",
            "piso",
            "ubi",
            "descr",
            "dep_id",
            "dep_id_asign",
            "del"
    ];
}
