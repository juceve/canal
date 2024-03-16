<?php

namespace App\Http\Livewire;

use App\Models\Compra;
use App\Models\CompraProducto;
use App\Models\Producto;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RegistroCompra extends Component
{
    public
        $fecha = "",
        $producto_id = "",
        $cantidad = "",
        $precio = "",
        $arrProductos = [],
        $total = 0;

    public function mount()
    {
        $this->fecha = date('Y-m-d');
    }

    public function render()
    {
        // $compra = new Compra();
        $compraProducto = new CompraProducto();
        $productos = Producto::all()->pluck('nombre', 'id');
        return view('livewire.registro-compra', compact('compraProducto', 'productos'))->with('i', 1);
    }

    protected $rules = [
        'producto_id' => 'required',
        'cantidad' => 'required',
        'precio' => 'required',
    ];

    public function agregar()
    {
        $this->validate();
        $producto = Producto::find($this->producto_id);
        $fila = array(
            $this->producto_id, $producto->nombre, $this->cantidad, $this->precio
        );
        $this->total += $this->precio;
        $this->arrProductos[] = $fila;
        $this->reset([
            'producto_id',
            'cantidad',
            'precio'
        ]);
        $this->emit('resetInput', '');
    }

    public function eliminarItem($id)
    {
        $this->total -= $this->arrProductos[$id][3];
        unset($this->arrProductos[$id]);
        $this->arrProductos = array_values($this->arrProductos);
    }


    public function registrar()
    {
        if (count($this->arrProductos)) {
            $this->validate([
                'fecha' => 'required'
            ]);
            DB::beginTransaction();
            try {
                $compra = Compra::create([
                    'fecha' => $this->fecha,
                    'user_id' => Auth::user()->id,
                ]);
                foreach ($this->arrProductos as $producto) {
                    $compraProducto = CompraProducto::create([
                        'producto_id' => $producto[0],
                        'compra_id' => $compra->id,
                        'nombreproducto' => $producto[1],
                        'cantidad' => $producto[2],
                        'precio' => $producto[3],
                    ]);

                    $stock = Stock::where('producto_id', $producto[0])->first();
                    $stock->cantidad += $producto[2];
                    $stock->save();
                }

                DB::commit();
                $this->reset(['arrProductos', 'total', 'fecha']);

                $this->emit('successOK', 'Compra registrada correctamente.');
                $this->fecha = date('Y-m-d');
            } catch (\Throwable $th) {
                DB::rollBack();
                $this->emit('errorOK', 'Ha ocurrido un error.');
            }
        } else {
            $this->emit('errorOK', 'Debe añadir productos a la lista.');
        }
    }
}
