<?php

namespace App\Http\Controllers;

use App\Models\Complejo;
use App\Models\Direccion;
use App\Models\Provincia;
use App\Models\UnidadFuncional;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use stdClass;

class ComplejoController extends Controller
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
        $direcciones = DB::table('dir')
                        ->join('provincia', 'provincia.id', '=', 'dir.prov_id')
                        ->select('dir.*', 'provincia.nombre_provincia')
                        ->get();
        $provincias = Provincia::all();
        //Tambien se tendrian que agarrar las dependencias de X jerarquia

        return view('ubicaciones.complejo.alta')->with('direcciones', $direcciones)
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
        //creo response
        $response = new stdClass();
        $response->message = "ok";

        //Valido datos del complejo
        $validator = Validator::make($request->all(), [
            'tipoUbicacion' => 'required',
            'nombre' => 'required|max:255',
            'dependencia' => 'required',
        ]);

        //en caso de error en validacion, seteo errors en el response y devuelvo
        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");

            return response()->json($response);
        }

        //Valido si me viene tipo complejo u edificio
        $chk_uf = $request->get('tipoUbicacion') === 'complejo' ? 1 : 0;

        //Validar si venia direccion existente o no, si venia sigo, sino tengo que dar de alta una direccion nueva (validando los campos y demas)
        $direccion = $request->get('direccion');
        if($request->get('flagDireccion') === '1'){

            //Valido datos de la direccion nueva
            $direccionValidator = Validator::make($request->all(), [
                'calle' => 'required|max:255',
                'numero' => 'required|max:255',
                'codPostal' => 'required|max:255',
                'localidad' => 'required|max:255',
                'telefono' => 'required|max:255',
                'provincia' => 'required',

            ]);

            //en caso de error en validacion, seteo errors en el response y devuelvo
            if($validator->fails()) {
                $response->message = "error";
                $response->errors = $validator->messages()->get("*");

                return response()->json($response);
            }

            //si esta todo valido, doy de alta la direccion nueva
            $createdDir = Direccion::create([
                'prov_id' => $request->get('provincia'),
                'loc' => $request->get('localidad'),
                'cp' => $request->get('codPostal'),
                'calle' => $request->get('calle'),
                'nro' => $request->get('numero'),
                'tel' => $request->get('telefono'),
            ]);

            $direccion = $createdDir->id;

        }

        //Creo el complejo/edificio
        $createdCom = Complejo::create([
            'nom' => $request->get('nombre'),
            'dir_id' => $direccion,
            'dep_id' => $request->get('dependencia'),
            'chk_uf' => $chk_uf
        ]);

        //Valido si el tipoUbicacion era edificio, le tengo que crear una unidad funcional con los mismos datos
        if($chk_uf === 0){
            $createdUf = UnidadFuncional::create([
                'com_id' => $createdCom->id,
                'nom' => $request->get('nombre'),
                'dep_id' => $request->get('dependencia'),
                'dir_id' => $direccion
            ]);
        }

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
