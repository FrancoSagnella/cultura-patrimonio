<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdificioController extends Controller
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
            ->join('provincia', 'provincia.id', '=', 'direccion.provincia_id')
            ->join('localidad', function ($join) {
                $join->on('localidad.localidad', '=', 'direccion.localidad')
                    ->on('localidad.provincia_id', '=', 'direccion.provincia_id');
            })
            ->select('direccion.*', 'provincia.descr as provincia_nombre', 'localidad.descr as localidad_nombre')
            ->get();

        $provincias = Provincia::all();
        //Tambien se tendrian que agarrar las dependencias de X jerarquia

        return view('ubicaciones.edificio.alta')->with('direcciones', $direcciones)
                                        ->with('provincias', $provincias);
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
