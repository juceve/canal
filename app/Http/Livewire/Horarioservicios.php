<?php

namespace App\Http\Livewire;

use App\Models\Couch;
use App\Models\Horarioservicio;
use App\Models\Servicio;
use Livewire\Component;

class Horarioservicios extends Component
{
    public $servicio = null, $servicio_id = null, $hora = "", $couches, $selCouch;

    public function mount($servicio_id)
    {
        $this->servicio_id = $servicio_id;
        $this->servicio = new Servicio();
        $this->couches = Couch::where('status', 1)->get();
    }
    public function render()
    {
        $this->servicio = Servicio::find($this->servicio_id);
        $horarios = Horarioservicio::where('servicio_id', $this->servicio_id)->orderBy('hora', 'ASC')->get();

        return view('livewire.horarioservicios', compact('horarios'))->with('i', 1)->extends('layouts.app');
    }

    protected $rules = [
        'hora' => 'required',
        'selCouch' => 'required',
    ];

    public function agregar()
    {
        $this->validate();
        $hora = Horarioservicio::create([
            'hora' => $this->hora,
            'servicio_id' => $this->servicio->id,
            'couch_id' => $this->selCouch,
        ]);
        $this->reset('hora');
    }

    public function eliminar($id)
    {
        $horario = Horarioservicio::find($id)->delete();
        $this->reset('hora');
    }
}
