<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Contextura;
use App\Models\Datosfisico;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Datosfisicos extends Component
{
    public $cliente, $contexturas;
    public $peso = "", $altura = "", $contextura_id = "", $imc = "", $alergias = "";

    public function mount($cliente_id)
    {
        $this->cliente = Cliente::find($cliente_id);
        $this->contexturas = Contextura::all()->pluck('nombre', 'id');
    }
    public function render()
    {

        return view('livewire.datosfisicos')->with('i', 0)->extends('layouts.app');
    }

    protected $rules = [
        "peso" => "required",
        "altura" => "required",
        "contextura_id" => "required",
        "imc" => "required",
        "alergias" => "required",
    ];

    public function resetear()
    {
        $this->reset([
            "peso",
            "altura",
            "contextura_id",
            "imc",
            "alergias",
        ]);
    }

    public function guardar()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $datofisico = Datosfisico::create([
                "cliente_id" => $this->cliente->id,
                "peso" => $this->peso,
                "altura" => $this->altura,
                "contextura_id" => $this->contextura_id,
                "imc" => $this->imc,
                "alergias" => $this->alergias,
            ]);
            DB::commit();
            return redirect()->route('datosfisicos', $this->cliente->id)->with('success', 'Datos registrados correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('errorOK', 'Ha ocurrido un error.');
        }
    }
}
