<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Licencia;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LicenciasCliente extends Component
{
    public $cliente, $fecha = "";

    public function mount($cliente_id)
    {
        $this->cliente = Cliente::find($cliente_id);
    }
    public function render()
    {
        return view('livewire.licencias-cliente')->extends('layouts.app');
    }

    protected $listeners = ['eliminar'];

    protected $rules = [
        "fecha" => "required",
    ];

    public function agregar()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $licencia = Licencia::create([
                "fecha" => $this->fecha,
                "cliente_id" => $this->cliente->id,
            ]);
            adLicSusCli($this->fecha, $this->cliente->id);
            DB::commit();
            $this->reset(['fecha']);
            return redirect()->route('licenciascliente', $this->cliente->id)->with('success', 'Licencia agregada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('errorOK', 'Ha ocurrido un error.');
        }
    }

    public function eliminar($id)
    {
        DB::beginTransaction();
        try {
            $licencia = Licencia::find($id);
            remLicSusCli($licencia->fecha, $this->cliente->id);
            $licencia->delete();
            DB::commit();
            return redirect()->route('licenciascliente', $this->cliente->id)->with('success', 'Licencia eliminada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('errorOK', 'Ha ocurrido un error.');
        }
    }
}
