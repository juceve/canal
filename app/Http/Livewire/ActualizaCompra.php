<?php

namespace App\Http\Livewire;

use App\Models\Compra;
use App\Models\CompraProducto;
use App\Models\Producto;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActualizaCompra extends Component
{
    public
        $fecha = "",
        $producto_id = "",
        $cantidad = "",
        $precio = "",
        $arrProductos = [];
    public $compra, $compraProductos;

    public function mount($compra_id)
    {
        $this->compra = Compra::find($compra_id);
        $this->fecha = $this->compra->fecha;

        $this->compraProductos = $this->compra->compraProductos;
        foreach ($this->compraProductos as $item) {
            $producto = Producto::find($item->producto_id);
            $this->arrProductos[] = array($producto->id, $producto->nombre, $item->cantidad, $item->precio);
        }
    }

    public function render()
    {

        $productos = Producto::all()->pluck('nombre', 'id');
        return view('livewire.actualiza-compra', compact('productos'))->with('i', 1);
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
        unset($this->arrProductos[$id]);
        $this->arrProductos = array_values($this->arrProductos);
    }


    public function actualizar()
    {
        if (count($this->arrProductos)) {
            $this->validate([
                'fecha' => 'required'
            ]);
            DB::beginTransaction();
            try {
                $this->compra->fecha = $this->fecha;
                $this->compra->user_id = Auth::user()->id;
                $this->compra->save();

                foreach ($this->compraProductos as $item) {
                    $stock = Stock::where('producto_id', $item->producto_id)->first();
                    $stock->cantidad -= $item->cantidad;
                    $stock->save();

                    $item->delete();
                }

                foreach ($this->arrProductos as $producto) {
                    $compraProducto = CompraProducto::create([
                        'producto_id' => $producto[0],
                        'compra_id' => $this->compra->id,
                        'cantidad' => $producto[2],
                        'precio' => $producto[3],
                    ]);

                    $stock = Stock::where('producto_id', $producto[0])->first();
                    $stock->cantidad += $producto[2];
                    $stock->save();
                }

                DB::commit();
                $this->reset(['arrProductos']);

                return redirect()->route('compras.index')
                    ->with('success', 'Compra editada correctamente');
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
