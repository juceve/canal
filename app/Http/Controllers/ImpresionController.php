<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    public function reciboServicios($data){
        return view('impresiones.reciboservicios',compact('data'));
    }
}
