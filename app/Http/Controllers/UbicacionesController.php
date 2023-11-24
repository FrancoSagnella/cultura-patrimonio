<?php

namespace App\Http\Controllers;

use App\Models\Complejo;
use App\Models\Piso;
use App\Models\TipoIngreso;
use App\Models\Ubicacion;
use App\Models\UnidadFuncional;
use Illuminate\Http\Request;

class UbicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nestedData = [];

        $complejos = Complejo::all();

        foreach($complejos as $comKey => $complejo){

            $nestedData[$comKey] = [
                'complejo' => $complejo,
                'uf' => []
            ];

            $unidadesFuncionales = UnidadFuncional::where("com_id", "=", $complejo->id)->get();

            foreach($unidadesFuncionales as $ufKey => $unidadFuncional){

                $nestedData[$comKey]['uf'][$ufKey] = [
                    'uf' => $unidadFuncional,
                    'piso' => []
                ];

                $pisos = Piso::where("com_id", "=", $complejo->id)->where("uf_id", "=", $unidadFuncional->id)->get();

                foreach($pisos as $pisoKey => $piso){

                    $nestedData[$comKey]['uf'][$ufKey]['piso'][$pisoKey] = [
                        'piso' => $piso,
                        'ubi' => []
                    ];

                    $ubicaciones = Ubicacion::where("com_id", "=", $complejo->id)->where("uf_id", "=", $unidadFuncional->id)->where("piso", "=", $piso->piso)->get();

                    foreach($ubicaciones as $ubiKey => $ubicacion){

                        $nestedData[$comKey]['uf'][$ufKey]['piso'][$pisoKey]['ubi'][$ubiKey] = [
                            'ubi' => $ubicacion,
                        ];

                    }

                }

            }

        }

        return view('ubicaciones.index')->with('complejos', $nestedData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
