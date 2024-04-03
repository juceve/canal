<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PdfController extends Controller
{
    public function ingresosegresos($data = null)
    {

        $parametros = Session::get('parametros');
        $movimientos = Session::get('egresoingreso');

        if ($data == 1) {
            $pdf = Pdf::loadView('pdf.ingresos-egresos', compact('movimientos', 'parametros'))
                ->setPaper('letter', 'portrait');

            return $pdf->stream();

            // return view('pdf.ingresos-egresos', compact('movimientos'));
        } else {
            $pdf = Pdf::loadView('pdf.ingresos-egresos-consolidado', compact('movimientos', 'parametros'))
                ->setPaper('letter', 'portrait');

            return $pdf->stream();

            // return view('pdf.ingresos-egresos', compact('movimientos'));
        }
    }
}
