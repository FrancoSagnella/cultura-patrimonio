<?php

namespace App\Http\Controllers;

use App\Models\Complejo;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class OficinaController extends Controller
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
        $complejos = Complejo::all();
        return view('ubicaciones.oficina.alta')->with('complejos', $complejos);
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
    public function getByUF($idPiso)
    {
        $oficinas = Ubicacion::where('piso', '=', $idPiso)->get();
        return response()->json($oficinas);
    }

    /**
     * Devuelve una vista que tiene un select cargado con todas las UF del complejo elegido.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSelectByUF($idPiso)
    {
        $oficinas = Ubicacion::where('piso', '=', $idPiso)->get();
        return view('ubicaciones.piso.select')->with('oficinas', $oficinas);
    }
}
