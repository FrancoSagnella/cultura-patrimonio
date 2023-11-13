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

    //todo: crear request custom, crear un service para injectar dependencia y modularizar validaciones y demas
    public function store(Request $request){

        //validaciones
        $validator = Validator::make($request->all(), [
            'dependencia-final-seleccionada' => 'required|seleccionado|noDefault',
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

            //Si esta seleccionada al menos una dependencia, las guardo en un array para madarlos de nuevo al front y poder cargar de nuevo los selects
            $dependenciasViejas = array();
            if($request->get('dependencia-padre') !== 'default'){
                array_push($dependenciasViejas, $request->get('dependencia-padre'));
                for($i = 1;;$i++)
                {
                    //Voy iterando buscando los nombres de los inputs que se crearon dinamicamente
                    //Siempre y cuando sea diferente de default o null, es porque existia y tenia valor que tengo que recuperar
                    //Caso contrario no existia, ya sea porque no se selecciono valor, o porque la anterior era dependencia final
                    //En esos dos casos corto el loop, sino guardo el valor en el array para recuperarlo en el front
                    $nombreParaBuscar = 'dependencia-hija-'.$i;
                    if( $request->get($nombreParaBuscar) !== 'default' && $request->get($nombreParaBuscar) !== null ){
                        array_push($dependenciasViejas, $request->get($nombreParaBuscar));
                    }
                    else{
                        break;
                    }
                }
            }

            //Lo mismo de las pedendencias lo hago con los tipos de bien
            $tiposBienViejos = array();
            if($request->get('bien-padre') !== 'default'){
                array_push($tiposBienViejos, $request->get('bien-padre'));
                for($i = 1;;$i++)
                {
                    $nombreParaBuscar = 'bien-hija-'.$i;
                    if( $request->get($nombreParaBuscar) !== 'default' && $request->get($nombreParaBuscar) !== null ){
                        array_push($tiposBienViejos, $request->get($nombreParaBuscar));
                    }
                    else{
                        break;
                    }
                }
            }

            //En caso de error redirige denuevo al form, mandando los errores y los valores necesarios para recargar los inputs
            return redirect('patrimonio/create')
                ->with('dependenciasViejas', $dependenciasViejas)
                ->with('tiposBienViejos', $tiposBienViejos)
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
