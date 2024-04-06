<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExcelMovimientos implements FromView, ShouldAutoSize
{
    public $contenedor, $fechai, $fechaf;

    public function __construct($contenedor, $fechai, $fechaf)
    {
        $this->contenedor = $contenedor;
        $this->fechai = $fechai;
        $this->fechaf = $fechaf;
    }

    public function view(): View
    {
        return view('export.excel-movimientos', ["movimientos" => $this->contenedor, "fechaI" => $this->fechai, "fechaF" => $this->fechaf])->with('i', 0);
    }
}
