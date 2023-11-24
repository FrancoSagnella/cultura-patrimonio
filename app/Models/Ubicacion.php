<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = "ubi";
    protected $fillable = [
        	"com_id",
            "uf_id",
            "piso",
            "nom",
            "dep_id",
    ];
}
