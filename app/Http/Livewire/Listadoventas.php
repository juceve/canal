<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use App\Models\Suscripcione;
use App\Models\Vntpago;
use App\Models\Vntventa;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Listadoventas extends Component
{
    public $fechaI = "", $fechaF = "", $estado = "", $bandera = true;

    public function mount()
    {
        $this->fechaI = date('Y-m-d');
        $this->fechaF = date('Y-m-d');
    }

    public function render()
    {
        $ventas = "";
        if ($this->estado != "") {
            $ventas = Vntventa::where([
                ["fecha", ">=", $this->fechaI],
                ["fecha", "<=", $this->fechaF],

                ["status", $this->estado]
            ])->get();
        } else {
            $ventas = Vntventa::where([
                ["fecha", ">=", $this->fechaI],
                ["fecha", "<=", $this->fechaF],

            ])->get();
        }

        $this->emit('dataTableD');
        return view('livewire.listadoventas', compact('ventas'));
    }

    protected $listeners = ['eliminar', 'devolucion'];

    public function filtrar()
    {
        $this->bandera = !$this->bandera;
    }

    public function eliminar($id)
    {
        DB::beginTransaction();
        try {
            $venta = Vntventa::find($id);
            $detalles = $venta->vntdetalleventas;
            $pago = Vntpago::where('vntventa_id', $venta->id)->first();
            if ($pago) {
                $pago->delete();
            }
            $venta->delete();
            // dd($detalles);
            foreach ($detalles as $detalle) {
                $detalle->delete();
            }

            DB::commit();
            $this->emit('successOK', 'Registro eliminado con exito.');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('errorOK', 'Ha ocurrido un error.');
        }
    }

    public function devolucion($id)
    {
        DB::beginTransaction();
        try {
            $venta = Vntventa::find($id);
            $detalles = $venta->vntdetalleventas;
            // dd($detalles);
            foreach ($detalles as $detalle) {
                if ($detalle->producto_id) {
                    $stock = Stock::where('producto_id', $detalle->producto_id)->first();
                    if ($stock) {
                        $stock->cantidad += $detalle->cantidad;
                        $stock->save();
                    }
                }

                if ($detalle->servicio_id) {
                    $suscripcion = Suscripcione::where([
                        ['vntventa_id', $detalle->vntventa_id],
                        ['servicio_id', $detalle->servicio_id],
                    ])->first();

                    $suscripcion->status = false;
                    $suscripcion->save();
                }


                $detalle->delete();
            }

            $venta->status = false;
            $venta->save();

            $pago = Vntpago::where('vntventa_id', $venta->id)->first();
            if ($pago) {
                $pago->status = $venta->status;
                $pago->save();
            }

            DB::commit();
            $this->emit('successOK', 'Devolución realizada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('errorOK', 'Ha ocurrido un error.');
        }
    }
}
