<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsable;
use App\Models\TipoAsignacion;
use App\Models\TipoResponsable;
use Paginator\Paginator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use stdClass;


class ResponsablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $responsables = Responsable::select('responsable.id','responsable.nombre','responsable.apellido','responsable.dni','responsable.mail','responsable.nro_asignacion','responsable.anio_asignacion','responsable.descripcion',
                                            'tipo_asignacion.tipo_asignacion', 'tipo_responsable.tipo_responsable')
                                    ->leftJoin('tipo_asignacion', 'responsable.tipo_asignacion_id', '=', 'tipo_asignacion.id')
                                    ->leftJoin('tipo_responsable', 'responsable.tipo_responsable_id', '=', 'tipo_responsable.id')
                                    ->where('responsable.borrado', '=', 0)
                                    ->paginate(15);

        return view('responsables.index')->with('responsables', $responsables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tiposResponsable = TipoResponsable::all();
        $tiposAsignacion = TipoAsignacion::all();
        return view('responsables.alta')->with('tiposResponsable', $tiposResponsable)->with('tiposAsignacion',$tiposAsignacion);
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
            'nombre' => 'required|max:55',
            'apellido' => 'required|max:55',
            'dni' => 'max:11',
            'mail' => 'max:55',
            'tipo_asignacion_id' => 'max:11',
            'nro_asignacion' => 'max:11',
            'anio_asignacion' => 'max:11',
        ]);

        //en caso de error en validacion, seteo errors en el response y devuelvo
        if($validator->fails()) {
            $response->message = "error";
            $response->errors = $validator->messages()->get("*");

            return response()->json($response);
        }
    
            //Si la validacion se pasa, hago el alta
            Responsable::create($request->all());
    
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
