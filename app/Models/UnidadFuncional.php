<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadFuncional extends Model
{
    use HasFactory;

    protected $table = "uf";
    protected $fillable = [
        	"com_id",
            "nom",
            "dep_id",
            "dir_id",
    ];
}
