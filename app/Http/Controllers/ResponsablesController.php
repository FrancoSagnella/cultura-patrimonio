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
        $responsables = Responsable::select('responsable.id','responsable.nom','responsable.ape','responsable.dni','responsable.mail','responsable.tel','responsable.nro_asig','responsable.anio_asig','responsable.text',
                                            'tipo_asignacion.descr as desc_asign', 'tipo_responsable.descr as desc_tipo_resp')
                                    ->join('tipo_asignacion', 'responsable.tipo_asi_id', '=', 'tipo_asignacion.id')
                                    ->join('tipo_responsable', 'responsable.tipo_res_id', '=', 'tipo_responsable.id')
                                    // ->where('responsable.del', '=', 0)
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
            'nom' => 'required|max:128',
            'ape' => 'required|max:128',
            'dni' => 'required|max:20',
            'mail' => 'required|max:128',
            'tel' => 'required|max:72',
            'tipo_res_id' => 'required|max:3',
            'tipo_asi_id' => 'required|max:3',
            'nro_asig' => 'required|max:8',
            'anio_asig' => 'required|max:5',
            'text' => 'required',
            'del' => 'required|max:1'
        ]);

        //en caso de error en validacion, seteo errors en el response y devuelvo
        if($validator->fails()) {
            $response->message = "error ". $request->get('id');
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
        $tiposResponsable = TipoResponsable::all();
        $tiposAsignacion = TipoAsignacion::all();

        $responsable = Responsable::select('responsable.id','responsable.nom','responsable.ape','responsable.dni','responsable.mail','responsable.tel','responsable.nro_asig','responsable.anio_asig','responsable.text',
        'tipo_asignacion.descr as desc_asign', 'tipo_responsable.descr as desc_tipo_resp')
        ->join('tipo_asignacion', 'responsable.tipo_asi_id', '=', 'tipo_asignacion.id')
        ->join('tipo_responsable', 'responsable.tipo_res_id', '=', 'tipo_responsable.id')
        ->where('responsable.id', '=', $id)
        ->first();

    return view('responsables.edicion')->with('responsable', $responsable)->with('tiposResponsable', $tiposResponsable)->with('tiposAsignacion',$tiposAsignacion);
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
                    'nom' => 'required|max:128',
                    'ape' => 'required|max:128',
                    'dni' => 'required|max:20',
                    'mail' => 'required|max:128',
                    'tel' => 'required|max:72',
                    'tipo_res_id' => 'required|max:3',
                    'tipo_asi_id' => 'required|max:3',
                    'nro_asig' => 'required|max:8',
                    'anio_asig' => 'required|max:5',
                    'text' => 'required',
                    'del' => 'required|max:1'
                ]);
        
                //en caso de error en validacion, seteo errors en el response y devuelvo
                if($validator->fails()) {
                    $response->message = "error ". $request->get('id');
                    $response->errors = $validator->messages()->get("*");
        
                    return response()->json($response);
                }
                $responsable = Responsable::where('id', $id)->first();
                $responsable->nom = $request->get('nom');
                $responsable->ape = $request->get('ape');
                $responsable->dni = $request->get('dni');
                $responsable->mail = $request->get('mail');
                $responsable->tel = $request->get('tel');
                $responsable->tipo_res_id = $request->get('tipo_res_id');
                $responsable->tipo_asi_id = $request->get('tipo_asi_id');
                $responsable->nro_asig = $request->get('nro_asig');
                $responsable->anio_asig = $request->get('anio_asig');
                $responsable->text = $request->get('text');
                $responsable->del = $request->get('del');
                $responsable->save();
        
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
