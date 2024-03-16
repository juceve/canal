<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Stock;
use App\Models\Vntdetalleventa;
use App\Models\Vntpago;
use App\Models\Vnttipopago;
use App\Models\Vntventa;
use App\Models\Vw_producto;
use App\Models\Vwmasvendidos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pos extends Component
{
    public $search = "", $productos = [], $masVendidos;
    public $selID = "", $cantidad = "", $cart = [], $total = 0;
    public $tipopagos, $selTipoID = 1;
    public $pagado = 0, $cambio = 0;

    public $categorias;

    public function updatedSearch()
    {

        if ($this->search == "") {
            $this->reset(['productos', 'search']);
        } else {
            $this->productos = Vw_producto::where('codbarras', $this->search)
                ->orWhere('nombre', 'like', "%" . $this->search . "%")
                ->orWhere('categoria', 'like', "%" . $this->search . "%")
                ->get();
        }
    }



    public function mount()
    {

        $this->masVendidos = Vwmasvendidos::all();
        $this->tipopagos = Vnttipopago::all();
        $this->categorias = Categoria::all();
    }

    public function render()
    {
        return view('livewire.pos')->extends('layouts.app');
    }

    public function seleccionarProducto($id)
    {
        $producto = Vw_producto::find($id);
        $stock = $producto->stock;
        $b = 0;
        if ($stock > 0) {
            if (count($this->cart) > 0) {

                for ($i = 0; $i <  count($this->cart); $i++) {
                    if ($this->cart[$i][0] == $id) {
                        $b++;
                        if ($stock >= ($this->cart[$i][3] + 1)) {
                            $this->cart[$i][3]++;
                            $this->cart[$i][4] += $producto->precio;
                            $this->total += $producto->precio;
                            $this->emit('alertSuccess', $producto->nombre . " agregado correctamente.");
                        } else {
                            $this->emit('alertError', 'El Stock es insuficiente!');
                        }
                    }
                }
                if ($b == 0) {
                    $this->cart[] = array($producto->id, $producto->nombre, $producto->precio, 1, $producto->precio);
                    $this->total += $producto->precio;
                    $this->emit('alertSuccess', $producto->nombre . " agregado correctamente.");
                }
            } else {
                $this->cart[] = array($producto->id, $producto->nombre, $producto->precio, 1, $producto->precio);
                $this->total += $producto->precio;
                $this->emit('alertSuccess', $producto->nombre . " agregado correctamente.");
            }
        } else {
            $this->emit('alertError', 'El Stock es insuficiente!');
        }
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

    public function quitarProducto($id)
    {
        for ($i = 0; $i <  count($this->cart); $i++) {
            if ($this->cart[$i][0] == $id) {
                // dd('entro');
                $this->cart[$i][3]--;
                $this->cart[$i][4] -= $this->cart[$i][2];
                $this->total -= $this->cart[$i][2];
                if ($this->cart[$i][3] == 0) {
                    unset($this->cart[$i]);
                    $this->cart = array_values($this->cart);
                }
            }
        }
        $this->emit('alertWarning', 'Item descontado correctamente.');
        $this->reiniciaCalculo();
    }

    public function eliminarProducto($i)
    {
        $this->total -= $this->cart[$i][4];
        unset($this->cart[$i]);
        $this->cart = array_values($this->cart);

        $this->emit('alertError', 'Item eliminado correctamente.');
        $this->reiniciaCalculo();
    }

    public function procesar()
    {
        DB::beginTransaction();
        try {
            $venta = Vntventa::create([
                'user_id' => Auth::user()->id,
                'fecha' => date('Y-m-d'),
                'cliente' => "PREDETERMINADO",
                'observaciones' => "VENTA POS",
                'importe' => $this->total,
                'vntestadopago_id' => 2
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

                $stock = Stock::where('producto_id', $detalleventa->producto_id)->first();
                $stock->cantidad -= $detalleventa->cantidad;
                $stock->save();
            }

            $tipopago = Vnttipopago::find($this->selTipoID);

            $pago = Vntpago::create([
                "fechahora" => date('Y-m-d H:i:s'),
                "vntventa_id" => $venta->id,
                "vnttipopago_id" => $tipopago->id,
                "tipopago" => $tipopago->nombre,
                "monto" => $this->total * $tipopago->factor,
                "user_id" => Auth::user()->id,
            ]);

            DB::commit();

            return redirect()->route('pos')->with('success', 'Venta realizada con exito!');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('errorOK', $th->getMessage());
        }
    }
}
