<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadFuncional extends Model
{
    use HasFactory;

    protected $table = "ufuncional";
    public $timestamps=false;
    protected $fillable = [
        	"com_id",
            "descr",
            "dep_id",
            "dir_id",
            "del"
    ];
}
