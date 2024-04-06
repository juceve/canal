<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Servicio;
use Livewire\Component;

class Pruebas extends Component
{

    public function render()
    {

        return view('livewire.pruebas')->extends('layouts.app');
    }
}
