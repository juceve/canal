<?php

namespace App\Http\Livewire;

use App\Models\Horarioservicio;
use App\Models\Servicio;
use Livewire\Component;

class Horarioservicios extends Component
{
    public $servicio = null, $servicio_id = null, $hora = "";

    public function mount($servicio_id)
    {
        $this->servicio_id = $servicio_id;
        $this->servicio = new Servicio();
    }
    public function render()
    {
        $this->servicio = Servicio::find($this->servicio_id);
        $horarios = Horarioservicio::where('servicio_id', $this->servicio_id)->orderBy('hora', 'ASC')->get();

        return view('livewire.horarioservicios', compact('horarios'))->with('i', 1)->extends('layouts.app');
    }

    protected $rules = [
        'hora' => 'required',
    ];

    public function agregar()
    {
        $this->validate();
        $hora = Horarioservicio::create([
            'hora' => $this->hora,
            'servicio_id' => $this->servicio->id,
        ]);
        $this->reset('hora');
    }

    public function eliminar($id)
    {
        $horario = Horarioservicio::find($id)->delete();
        $this->reset('hora');
    }
}
