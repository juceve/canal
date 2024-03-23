<?php

namespace App\Http\Livewire;

use App\Models\vwproxvencimientosusc;
use Livewire\Component;

class Proxvencimientosusc extends Component
{
    public function render()
    {
        $suscripciones = vwproxvencimientosusc::all();
        return view('livewire.proxvencimientosusc', compact('suscripciones'))->with('i', 1);
    }
}
