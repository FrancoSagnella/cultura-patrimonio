<?php

namespace App\Http\Controllers;

use App\Models\TipoRemito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

class TipoRemitoController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposRemito = TipoRemito::all();
        return view('tipo-remito.index')->with('tiposRemito', $tiposRemito);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo-remito.alta');
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
            'descr' => 'required|max:128',
            'text' => 'required'
        ]);

        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");
            return response()->json($response);
        }

        TipoRemito::create($request->except('_token'));

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
        $tipoRemito = TipoRemito::where('id', $id)->first();
        return view('tipo-remito.edicion')->with('remito', $tipoRemito);
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
            'descr' => 'required|max:128',
            'text' => 'required'
        ]);

        //en caso de error en validacion, seteo errors en el response y devuelvo
        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");

            return response()->json($response);
        }

        //Si la validacion se pasa, hago el alta
        $tipoRemito = TipoRemito::where('id', $id)->first();
        $tipoRemito->descr = $request->get('descr');
        $tipoRemito->text = $request->get('text');
        $tipoRemito->save();

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

        $tipoRemito = TipoRemito::where('id', $id)->first();
        $tipoRemito->habilitado = 0;
        $tipoRemito->save();

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

        $tipoRemito = TipoRemito::where('id', $id)->first();
        $tipoRemito->habilitado = 1;
        $tipoRemito->save();

        return response()->json($response);
    }
}
