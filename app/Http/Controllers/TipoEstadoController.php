<?php

namespace App\Http\Controllers;

use App\Models\TipoEstado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

class TipoEstadoController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposEstado = TipoEstado::all();
        return view('tipo-estado.index')->with('tiposEstado', $tiposEstado);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo-estado.alta');
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
            'universo' => 'required|max:252'
        ]);

        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");
            return response()->json($response);
        }

        TipoEstado::create($request->except('_token'));
        return response()->json($response);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoEstado = TipoEstado::where('id', $id)->first();
        return view('tipo-estado.edicion')->with('tipoEstado', $tipoEstado);
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
            'universo' => 'required|max:252'
        ]);

        //en caso de error en validacion, seteo errors en el response y devuelvo
        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");

            return response()->json($response);
        }

        //Si la validacion se pasa, hago el alta
        $tipoEstado = TipoEstado::where('id', $id)->first();
        $tipoEstado->universo = $request->get('universo');
        $tipoEstado->save();

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

        $tipoEstado = TipoEstado::where('id', $id)->first();
        $tipoEstado->habilitado = 0;
        $tipoEstado->save();

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

        $tiposEstado = TipoEstado::where('id', $id)->first();
        $tiposEstado->habilitado = 1;
        $tiposEstado->save();

        return response()->json($response);
    }
}
