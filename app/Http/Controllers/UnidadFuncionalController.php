<?php

namespace App\Http\Controllers;

use App\Models\Complejo;
use App\Models\Provincia;
use App\Models\UnidadFuncional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnidadFuncionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direcciones = DB::table('direccion')
                ->join('provincia', 'provincia.id', '=', 'direccion.prov_id')
                ->select('direccion.*', 'provincia.nombre_provincia')
                ->get();
        $provincias = Provincia::all();
        $complejos = Complejo::where('chk_uf', '=', 1)->get();
        //Tambien se tendrian que agarrar las dependencias de X jerarquia

        return view('ubicaciones.unidadFuncional.alta')->with('direcciones', $direcciones)
                                        ->with('provincias', $provincias)
                                        ->with('complejos', $complejos);
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

    /**
     * Devuelve todas las unidades funcionales que pertenezcan a un complejo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getByComplejo($idComplejo)
    {
        $ufs = UnidadFuncional::where('com_id', '=', $idComplejo)->get();
        return response()->json($ufs);
    }

    /**
     * Devuelve una vista que tiene un select cargado con todas las UF del complejo elegido.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSelectByComplejo($idComplejo)
    {
        $ufs = UnidadFuncional::where('com_id', '=', $idComplejo)->get();
        return view('ubicaciones.unidadFuncional.select')->with('ufs', $ufs);
    }
}
