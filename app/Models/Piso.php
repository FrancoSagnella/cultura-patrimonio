<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    use HasFactory;

    protected $table = "piso";
    protected $fillable = [
        	"com_id",
            "uf_id",
            "name",
            "res_piso",
    ];
}
