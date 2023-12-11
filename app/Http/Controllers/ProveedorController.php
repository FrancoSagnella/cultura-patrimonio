<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Provincia;
use Paginator\Paginator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use stdClass;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$proveedores = Proveedor::select("proveedor.id", "proveedor.nombre_proveedor", "proveedor.descripcion_proveedor")->paginate(15);
        $proveedores = Proveedor::select("proveedor.*", 'provincia.descr as descr_prov', 'localidad.descr as descr_loc')                            
                                ->join('provincia', 'provincia.id', '=', 'proveedor.provincia_id')
                                ->join('localidad', 'localidad.localidad', '=', 'proveedor.localidad')
                                ->paginate(15);

        return view('proveedor.index')->with('proveedores', $proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $provincias = Provincia::all();
        return view('proveedor.alta')->with('provincias', $provincias);
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
            'nom' => 'required|max:128',
            'ape' => 'required|max:128',
            'provincia_id' => 'required',
            'localidad' => 'required',
            'cp' => 'required|max:255',
            'calle' => 'required|max:255',
            'nro' => 'required|max:255',
            'piso' => 'required|max:255',
            'depto' => 'required|max:255',
            'tel' => 'required|max:255'
        ]);

        //en caso de error en validacion, seteo errors en el response y devuelvo
        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");

            return response()->json($response);
        }
    
            //Si la validacion se pasa, hago el alta
            Proveedor::create($request->all());
    
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
        //
        $proveedor = Proveedor::where('id', $id)->first();
        $provincias = Provincia::all();
        return view('proveedor.edicion')->with('proveedor', $proveedor)
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
