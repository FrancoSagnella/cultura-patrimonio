<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    use HasFactory;

    protected $table = "piso";
    public $timestamps=false;
    protected $fillable = [
        	"com_id",
            "uf",//uf_id
            "piso",
            "descr",
            "res_id",//"res_piso"
            "del"
    ];
}
