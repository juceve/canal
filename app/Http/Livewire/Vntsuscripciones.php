<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Horarioservicio;
use App\Models\Servicio;
use Livewire\Component;

class Vntsuscripciones extends Component
{
    public $cliente = null, $cliente_nombre = "", $clientes = null, $cliente_id = 0, $servicios = null;
    public $pedido = array(), $selServicio = "", $totalPedido = 0, $fechas = array(), $servicioAg = null, $horarios = null;
    public $selHorario = "", $selFecha = "", $selCantidad = "1", $couch;

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

    public function updatedSelHorario()
    {
        if ($this->selHorario != "") {
            $horario = Horarioservicio::find($this->selHorario);
            $this->couch = $horario->couch ? $horario->couch->nombre : "NULL";
        } else {
            $this->couch = "";
        }
    }

    protected $rules = [];

    public function render()
    {
        if ($this->cliente_id) {
            $this->cliente = Cliente::find($this->cliente_id);
            $this->cliente_nombre = $this->cliente->nombre;
        }

        return view('livewire.vntsuscripciones')->extends('layouts.app');
    }

    protected $listeners = ['pasarParamentros'];

    public function cargafecha($fecha)
    {
        $fechas[] = $fecha;
    }


    public function limpiarCliente()
    {
        $this->reset('cliente_nombre', 'cliente', 'cliente_id');
    }

    public function agregaPedido()
    {

        if ($this->selServicio && $this->selHorario) {
            $horario = Horarioservicio::find($this->selHorario);
            $servicio = Servicio::find($this->selServicio);
            $pedido = [];
            $pedido[] = $servicio->toArray();
            $pedido[] = $this->selFecha;
            $pedido[] = array($this->selHorario, $horario->hora);
            $pedido[] = $this->selCantidad;
            $this->pedido[] = $pedido;

            $this->reset(['totalPedido', 'selServicio', 'selFecha', 'selHorario', 'selCantidad']);
            foreach ($this->pedido as $item) {

                $subtotal = $item[0]['precio'] * $item[3];
                $this->totalPedido += $subtotal;
            }
        } else {
            $this->emit('alertError', '¡Atencion! Todos los campos deben ser llenados.');
        }
    }

    public function eliminar($i)
    {
        unset($this->pedido[$i]);
        $this->pedido = array_values($this->pedido);


        $this->reset(['totalPedido', 'selServicio']);
        foreach ($this->pedido as $item) {

            $subtotal = $item[0]['precio'] * $item[3];
            $this->totalPedido += $subtotal;
        }
    }

    // public function initPago()
    // {
    //     $this->emit('obtenerFechas');

    // }

    public function pasarParamentros()
    {

        $arrParamentros = array();
        $arrParamentros[] = 'suscripcionservicio';
        $arrParamentros[] = $this->cliente->toArray();
        $arrParamentros[] = $this->pedido;
        $arrParamentros[] =  $this->totalPedido;
        $this->emitTo('modalpago', 'paramentros', $arrParamentros);
    }
}
