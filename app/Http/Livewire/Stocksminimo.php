<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Vw_producto;
use Livewire\Component;

class Stocksminimo extends Component
{
    public function render()
    {
        $productos = Vw_producto::where([
            ["pos", 1],
            ["stock", "<=", 4],
        ])->get();

        return view('livewire.stocksminimo', compact('productos'));
    }
}
