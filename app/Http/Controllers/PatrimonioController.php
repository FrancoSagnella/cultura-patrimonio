<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatrimonioController extends Controller
{
    //
    public function index(){
        return view('patrimonio.index');
    }

    public function create(){
        return view('patrimonio.alta');
    }

    public function store(){
        dd('entra al alta');
    }
}
