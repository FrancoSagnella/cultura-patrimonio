<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use App\Models\Patrimonio;
use App\Models\Proveedor;
use App\Models\Responsable;
use App\Models\TipoBien;
use App\Models\TipoIngreso;
use App\Models\Universo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatrimonioController extends Controller
{
    //
    public function index(){
        return view('patrimonio.index');
    }

    public function create(){
        //Traigo: dependencias, proveedores, tipo_ingreso, tipo_bien, universo
        $dependencias = Dependencia::all();//Esto despues lo veo bien, porque a lo mejor conviene traerlo desde un ajax
        $proveedores = Proveedor::all();//Esto despues lo veo igual, en vez de hacerlo asi tendria que hacerlo tipo buscador dinamico en el front
        $tipos_ingreso = TipoIngreso::all();
        $tipos_bien = TipoBien::all();//Esto despues lo veo bien, porque a lo mejor conviene traerlo desde un ajax
        $universos = Universo::all();
        $responsables = Responsable::all();

        return view('patrimonio.alta')->with('dependencias', $dependencias)
                                      ->with('proveedores', $proveedores)
                                      ->with('tipos_bien', $tipos_bien)
                                      ->with('tipos_ingreso', $tipos_ingreso)
                                      ->with('universos', $universos)
                                      ->with('responsables', $responsables);
    }

    public function store(Request $request){

        //validaciones
        $validator = Validator::make($request->all(), [
            // 'dependencia-final-seleccionada' => 'required|seleccionado|noDefault',
            'tipobien-final-seleccionado' => 'required|seleccionado|noDefault',
            'usuarioResponsable' => 'required_if:tipobien-final-seleccionado,322,136,63|noDefault_condicional_usuarioResponsable',//Solo requeridos y que no digan default si tipo de bien es 322, 136, 63 (que son handy, telefono celular o computadora portatil)
            'ubicacionReal' => 'required',
            'responsable' => 'required|noDefault',
            'tipoIngreso' => 'required|noDefault',
            'estado' => 'required|noDefault',
            'proveedor' => 'required|noDefault',
            'ordenCompra' => 'required_if:tipoIngreso,1',//Solo requeridos si tipo de ingreso es 1 (Orden de Compra)
            'fechaOrden' => 'required_if:tipoIngreso,1',//Solo requeridos si tipo de ingreso es 1 (Orden de Compra)
            'nroExpediente' => 'required',
            'nroCCOO' => 'required',
            'nroFactura' => 'required',
            'fechaFactura' => 'required',
            'remito' => 'required',
            'importe' => 'required',
            'nroSerie' => 'required_if:bien-padre,2,3,4,371|noDefault_condicional',//Solo requeridos y que no digan default si tipo de bien es 2, 3, 4 o 371 (que son los que tienen 434, 435, 436 y 439)
            'marca' => 'required_if:bien-padre,2,3,4,371|noDefault_condicional', //Solo requeridos y que no digan default si tipo de bien es 2, 3, 4 o 371 (que son los que tienen 434, 435, 436 y 439)
            'modelo' => 'required_if:bien-padre,2,3,4,371|noDefault_condicional', //Solo requeridos y que no digan default si tipo de bien es 2, 3, 4 o 371 (que son los que tienen 434, 435, 436 y 439)
            'descripcion' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('patrimonio/create')
                ->withErrors($validator)
                ->withInput();
        }

        //Alta
        $patrimonio = new Patrimonio();
        $patrimonio->dependencia_id = $request->input('dependencia-final-seleccionada');
        $patrimonio->tipo_bien_id = $request->input('tipobien-final-seleccionado');
        $patrimonio->proveedor_id = $request->input('proveedor');
        $patrimonio->tipo_ingreso_id = $request->input('tipoIngreso');
        $patrimonio->universo_id = $request->input('estado');
        $patrimonio->orden_compra = $request->input('ordenCompra');
        $patrimonio->fecha_orden = $request->input('fechaOrden');
        $patrimonio->nro_expediente = $request->input('nroExpediente');
        $patrimonio->nro_factura = $request->input('nroFactura');
        $patrimonio->fecha_factura = $request->input('fechaFactura');
        $patrimonio->importe = $request->input('importe');
        $patrimonio->nro_serie = $request->input('nroSerie');
        $patrimonio->descripcion_patrimonio = $request->input('descripcion');
        $patrimonio->marca = $request->input('marca');
        $patrimonio->modelo = $request->input('modelo');
        $patrimonio->usuario_responsable = $request->input('usuarioResponsable');
        $patrimonio->ubicacion_real = $request->input('ubicacionReal');
        $patrimonio->nombre_imagen = $request->input('imgBien');
        $patrimonio->remito = $request->input('remito');

        $patrimonio->save();

        return redirect()->route('patrimonio.index');
    }
}
