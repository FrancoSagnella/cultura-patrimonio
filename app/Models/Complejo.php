<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complejo extends Model
{
    use HasFactory;

    protected $table = "com";
    protected $fillable = [
        	"nom",
            "dep_id",
            "dir_id",
            "chk_uf",
    ];

    public function getNestedData()
    {
        $nestedData = [];

        foreach ($this->ufs as $uf) {
            $pisosData = [];

            foreach ($uf->pisos as $piso) {
                $ubisData = [];

                foreach ($piso->ubis as $ubi) {
                    $ubisData[] = $ubi;
                }

                $pisosData[] = [
                    'piso' => $piso,
                    'ubi' => $ubisData,
                ];
            }

            $nestedData[] = [
                'uf' => $uf,
                'piso' => $pisosData,
            ];
        }

        return $nestedData;
    }
}
