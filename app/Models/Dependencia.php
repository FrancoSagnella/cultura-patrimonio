<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;

    //De momento por lo menos uso esta
    protected $table = 'dependencia';
    public $timestamps=false;
    protected $fillable = [
                            'descr',
                            'dep_id_p',
                            'jer_id',
                            'res_id',
                            'del'];

}
