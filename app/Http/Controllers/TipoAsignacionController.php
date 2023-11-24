<?php

namespace App\Http\Controllers;
use App\Models\TipoAsignacion;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

class TipoAsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposAsignacion = TipoAsignacion::all();
        return view('tipo-asignacion.index')->with('tiposAsignacion', $tiposAsignacion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo-asignacion.alta');
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

        
        try{
        $response->message = "ok";

        //se validan inputs
        $validator = Validator::make($request->all(), [
            'tipo_asignacion' => 'required|max:252',
            'descripcion' => 'required|max:500'
        ]);

        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");
            return response()->json($response);
        }

            
            TipoIngreso::create($request->except('_token'));
        } catch(Exception $e){
            
            return response()->json($response);

        }
        

        
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
