<?php

namespace App\Http\Livewire;

use App\Models\Movimiento;
use App\Models\Vwmovimiento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class RptIngresosEgresos extends Component
{
    public $fechaI = "", $fechaF = "", $tipo = "";
    public $resultados;

    public function mount()
    {
        $this->fechaI = date('Y-m-d');
        $this->fechaF = date('Y-m-d');
        // $this->resultados = Movimiento::where('status', 1)->get();
        $this->filtrar();
    }

    public function render()
    {
        if ($this->resultados) {
            $this->emit('dataTable5D');
        }

        return view('livewire.rpt-ingresos-egresos')->with('i', 1)->extends('layouts.app');
    }

    public function filtrar()
    {
        $this->resultados = Vwmovimiento::where('status', 1)
            ->where('fecha', '>=', $this->fechaI)
            ->where('fecha', '<=', $this->fechaF)
            ->get();
    }

    public function exportarDetallado()
    {
        $parametros = array($this->fechaI, $this->fechaF);
        Session::put('egresoingreso', $this->resultados);
        Session::put('parametros', $parametros);
        $this->emit('renderDetalle', 1);
    }
    public function exportarConsolidado()
    {
        $parametros = array($this->fechaI, $this->fechaF);
        $sql = "SELECT m.cuenta_id,c.nombre cuenta,c.tipo,COUNT(*) cantidad, SUM(m.importe) importe FROM movimientos m
                INNER JOIN cuentas c ON c.id = m.cuenta_id
                WHERE m.fecha >= '$this->fechaI'
                AND m.fecha <= '$this->fechaF'
                AND m.status = 1
                GROUP BY m.cuenta_id,c.nombre
                ORDER BY c.tipo ASC";
        $resultados = DB::select($sql);

        Session::put('egresoingreso', $resultados);
        Session::put('parametros', $parametros);
        $this->emit('renderDetalle', 2);
    }
}
