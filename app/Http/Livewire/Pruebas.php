<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Servicio;
use Livewire\Component;

class Pruebas extends Component
{
    public $cliente = null, $cliente_nombre = "", $clientes = null, $cliente_id = 0, $servicios = null;
    public $pedido = array(), $selServicio = "", $totalPedido = 0, $fechas = array(), $servicioAg = null,$horarios=null;
    public $selHorario = "", $selFecha = "";

    public function mount()
    {
        $this->clientes = Cliente::where('status', 1)->get();
        $this->servicios = Servicio::where('status', 1)->get();
    }

    public function updatedSelServicio()
    {        
        $this->servicioAg = Servicio::find($this->selServicio);
        $this->horarios = $this->servicioAg->horarioservicio;
    }
    public function render()
    {
        if ($this->cliente_id) {
            $this->cliente = Cliente::find($this->cliente_id);
            $this->cliente_nombre = $this->cliente->nombre;
        }
        return view('livewire.pruebas')->extends('layouts.app');
    }
}
