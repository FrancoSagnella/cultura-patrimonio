<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoBaja;
use Paginator\Paginator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use stdClass;

class TipoBajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tiposBaja = TipoBaja::all();
        return view('tipo-baja.index')->with('tiposBaja',$tiposBaja);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipo-baja.alta');
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
   
           //en caso de error en validacion, seteo errors en el response y devuelvo
           if($validator->fails()) {
               $response->message = "error";
               $response->errors = $validator->messages()->get("*");
   
               return response()->json($response);
           }
       
               //Si la validacion se pasa, hago el alta
               TipoBaja::create($request->all());
       
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
        $tipoBaja = TipoBaja::where('id', $id)->first();
        return view('tipo-baja.edicion')->with('tipoBaja', $tipoBaja);
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
        $tipoBaja = TipoBaja::where('id', $id)->first();
        $tipoBaja->descr = $request->get('descr');
        $tipoBaja->text = $request->get('text');
        $tipoBaja->save();

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
        //
    }
}
