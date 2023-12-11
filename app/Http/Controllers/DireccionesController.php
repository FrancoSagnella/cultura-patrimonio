<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Provincia;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use stdClass;

class DireccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones = DB::table('direccion')
                            ->join('provincia', 'provincia.id', '=', 'direccion.provincia_id')
                            ->join('localidad', 'localidad.localidad', '=', 'direccion.localidad')
                            ->select('direccion.*', 'provincia.descr as descr_prov', 'localidad.descr as descr_loc')
                            ->get();
        return view('direcciones.index')->with('direcciones', $direcciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias = Provincia::all();
        return view('direcciones.alta')->with('provincias', $provincias)->with('fromAltaDirecciones', true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGeneric()
    {
        $provincias = Provincia::all();
        return view('direcciones.alta')->with('provincias', $provincias)->with('fromAltaDirecciones', false);
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
            'provincia_id' => 'required',
            'localidad' => 'required',
            'cp' => 'required|max:255',
            'calle' => 'required|max:255',
            'nro' => 'required|max:255',
            'tel' => 'required|max:255'
        ]);

        //en caso de error en validacion, seteo errors en el response y devuelvo
        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");

            return response()->json($response);
        }

        //Si la validacion se pasa, hago el alta
        Direccion::create($request->except('_token'));

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
        $direccion = Direccion::where('id', $id)->first();
        $provincias = Provincia::all();
        return view('direcciones.edicion')->with('direccion', $direccion)
                                            ->with('provincias', $provincias);
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
            'provincia_id' => 'required',
            'localidad' => 'required',
            'cp' => 'required|max:255',
            'calle' => 'required|max:255',
            'nro' => 'required|max:255',
            'tel' => 'required|max:255'
        ]);

        //en caso de error en validacion, seteo errors en el response y devuelvo
        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");

            return response()->json($response);
        }

        //Si la validacion se pasa, hago el alta
        $direccion = Direccion::where('id', $id)->first();
        $direccion->provincia_id = $request->get('provincia_id');
        $direccion->localidad = $request->get('localidad');
        $direccion->cp = $request->get('cp');
        $direccion->calle = $request->get('calle');
        $direccion->nro = $request->get('nro');
        $direccion->tel = $request->get('tel');
        $direccion->save();

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
