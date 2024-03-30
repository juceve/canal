<?php

namespace App\Http\Livewire;

use App\Models\Acuenta;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Movimiento;
use App\Models\Vntdetalleventa;
use App\Models\Vntpago;
use App\Models\Vnttipopago;
use App\Models\Vntventa;
use App\Models\Vwacuenta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Acuentacli extends Component
{
    public $tipopagos, $selTipoID = 1;
    public $pagado = 0, $cambio = 0;
    public $cliente_id, $clientes, $cart = [], $total = 0;

    public $categorias, $acuentas;

    public function mount()
    {
        $this->tipopagos = Vnttipopago::all();
        $this->categorias = Categoria::all();
        $this->acuentas = Vwacuenta::all();
    }

    public function render()
    {
        return view('livewire.acuentacli')->extends('layouts.app');
    }

    public function procesar($cliente_id)
    {
        $this->cliente_id = $cliente_id;
        $acuentas = Acuenta::where('cliente_id', $cliente_id)->get();

        foreach ($acuentas as $item) {
            $this->cart[] = array($item->producto->id, $item->producto->nombre, $item->producto->precio, $item->cantidad, $item->producto->precio, $item->id);
            $this->total += $item->producto->precio;
        }
    }

    public function eliminarProducto($i)
    {
        $this->total -= $this->cart[$i][4];
        unset($this->cart[$i]);
        $this->cart = array_values($this->cart);

        $this->emit('alertError', 'Item eliminado correctamente.');
        $this->reiniciaCalculo();
    }

    public function calcularCambio($monto)
    {
        if ($monto == 0) {
            $this->pagado = $this->total;
            $this->cambio = 0;
        } else {
            $this->pagado += $monto;
            $this->cambio = $this->pagado - $this->total;
        }
    }

    public function reiniciaCalculo()
    {
        $this->reset(['pagado', 'cambio']);
    }

    public function finalizar()
    {
        DB::beginTransaction();
        $cliente = Cliente::find($this->cliente_id);
        try {
            $tipopago = Vnttipopago::find($this->selTipoID);
            $venta = Vntventa::create([
                'user_id' => Auth::user()->id,
                'fecha' => date('Y-m-d'),
                'cliente' => $cliente->nombre,
                'observaciones' => "VENTA POS",
                'importe' => $this->total,
                'vntestadopago_id' => 2
            ]);

            $movimiento = Movimiento::create([
                'fecha' => date('Y-m-d'),
                'user_id' => Auth::user()->id,
                'importe' => $this->arrParamentros[3] * $tipopago->factor,
                'glosa' => "VENTA POS",
                'cuenta_tipo' => 3,
                'model_id' => $venta->id,
                'model_type' => Vntventa::class,
            ]);

            foreach ($this->cart as $cart) {
                $detalleventa = Vntdetalleventa::create([
                    'vntventa_id' => $venta->id,
                    'producto_id' => $cart[0],
                    'detalle' => $cart[1],
                    'cantidad' => $cart[3],
                    'preciounitario' => $cart[2],
                    'subtotal' => $cart[3] * $cart[2],
                ]);

                $acuenta = Acuenta::find($cart[5])->delete();
            }



            $pago = Vntpago::create([
                "fechahora" => date('Y-m-d H:i:s'),
                "vntventa_id" => $venta->id,
                "vnttipopago_id" => $tipopago->id,
                "tipopago" => $tipopago->nombre,
                "monto" => $this->total * $tipopago->factor,
                "user_id" => Auth::user()->id,
            ]);

            DB::commit();

            return redirect()->route('acuentas')->with('success', 'Credito finalizado con exito!');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('errorOK', $th->getMessage());
        }
    }
}
