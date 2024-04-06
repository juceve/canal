<?php

namespace App\Http\Livewire;

use App\Exports\ExcelMovimientos;
use App\Models\Movimiento;
use App\Models\Vwmovimiento;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ListadoMovimientos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $fechaI = "", $fechaF = "", $search = "";


    public function mount()
    {
        $this->fechaI = date('Y-m-d');
        $this->fechaF = date('Y-m-d');
    }
    public function render()
    {
        $movimientos = Vwmovimiento::where([
            ['fecha', '>=', $this->fechaI],
            ['fecha', '<=', $this->fechaF],
            ['glosa', 'like', '%' . $this->search . '%']
        ])->orWhere([
            ['fecha', '>=', $this->fechaI],
            ['fecha', '<=', $this->fechaF],
            ['cuenta', 'like', '%' . $this->search . '%']
        ])->paginate(10);

        return view('livewire.listado-movimientos', compact('movimientos'))
            ->with('i', 0);
    }

    public function exportExcel()
    {
        $movimientos = Vwmovimiento::where([
            ['fecha', '>=', $this->fechaI],
            ['fecha', '<=', $this->fechaF],
            ['glosa', 'like', '%' . $this->search . '%']
        ])->orWhere([
            ['fecha', '>=', $this->fechaI],
            ['fecha', '<=', $this->fechaF],
            ['cuenta', 'like', '%' . $this->search . '%']
        ])->get();

        return Excel::download(new ExcelMovimientos($movimientos, $this->fechaI, $this->fechaF), 'Movimientos_' . date('His') . '.xlsx');
    }

    public function exportPDF()
    {
        $movimientos = Vwmovimiento::where([
            ['fecha', '>=', $this->fechaI],
            ['fecha', '<=', $this->fechaF],
            ['glosa', 'like', '%' . $this->search . '%']
        ])->orWhere([
            ['fecha', '>=', $this->fechaI],
            ['fecha', '<=', $this->fechaF],
            ['cuenta', 'like', '%' . $this->search . '%']
        ])->get();

        $parametros = array($this->fechaI, $this->fechaF);
        Session::put('contenedor1', $movimientos);
        Session::put('parametros', $parametros);
        $this->emit('renderMovimientos');
    }

    public function updatedFechaI()
    {
        $this->resetPage();
    }
    public function updatedFechaF()
    {
        $this->resetPage();
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
}
