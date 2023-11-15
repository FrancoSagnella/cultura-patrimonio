<?php

namespace App\Http\Controllers;

use App\Models\TipoIngreso;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

class TipoIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposIngreso = TipoIngreso::all();
        return view('tipo-ingreso.index')->with('tiposIngreso', $tiposIngreso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo-ingreso.alta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //creo response
        $response = new stdClass();
        $response->message = "ok";

        //se validan inputs
        $validator = Validator::make($request->all(), [
            'ingreso' => 'required|max:255',
        ]);

        //en caso de error en validacion, seteo errors en el response y devuelvo
        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");

            return response()->json($response);
        }

        //Si la validacion se pasa, hago el alta
        $tipoIngreso = new TipoIngreso();
        $tipoIngreso->ingreso = $request->get('ingreso');
        $tipoIngreso->habilitado = 1;
        $tipoIngreso->save();

        return response()->json($response);
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
        $tipoIngreso = TipoIngreso::where('id', $id)->first();
        return view('tipo-ingreso.edicion')->with('ingreso', $tipoIngreso);
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
        //creo response
        $response = new stdClass();
        $response->message = "ok";

        //se validan inputs
        $validator = Validator::make($request->all(), [
            'ingreso' => 'required|max:255',
        ]);

        //en caso de error en validacion, seteo errors en el response y devuelvo
        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");

            return response()->json($response);
        }

        //Si la validacion se pasa, hago el alta
        $tipoIngreso = TipoIngreso::where('id', $id)->first();
        $tipoIngreso->ingreso = $request->get('ingreso');
        $tipoIngreso->save();

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    /**
     * Disable the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        //creo response
        $response = new stdClass();
        $response->message = "ok";

        $tipoIngreso = TipoIngreso::where('id', $id)->first();
        $tipoIngreso->habilitado = 0;
        $tipoIngreso->save();

        return response()->json($response);
    }

    /**
     * Enable the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enable($id)
    {
        //creo response
        $response = new stdClass();
        $response->message = "ok";

        $tipoIngreso = TipoIngreso::where('id', $id)->first();
        $tipoIngreso->habilitado = 1;
        $tipoIngreso->save();

        return response()->json($response);
    }
}
