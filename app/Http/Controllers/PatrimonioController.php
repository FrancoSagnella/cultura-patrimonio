<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use App\Models\Proveedor;
use App\Models\TipoBien;
use App\Models\TipoIngreso;
use App\Models\Universo;
use Illuminate\Http\Request;

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

        return view('patrimonio.alta')->with('dependencias', $dependencias)
                                      ->with('proveedores', $proveedores)
                                      ->with('tipos_bien', $tipos_bien)
                                      ->with('tipos_ingreso', $tipos_ingreso)
                                      ->with('universos', $universos);
    }

    public function store(Request $request){
        dd($request->post());
    }
}
