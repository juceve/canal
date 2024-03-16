<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class CompraController
 * @package App\Http\Controllers
 */
class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::all();

        return view('compra.index', compact('compras'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compra = new Compra();
        return view('compra.create', compact('compra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Compra::$rules);

        $compra = Compra::create($request->all());

        return redirect()->route('compras.index')
            ->with('success', 'Compra created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra = Compra::find($id);

        return view('compra.show', compact('compra'))->with('i', 1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = Compra::find($id);

        return view('compra.edit', compact('compra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Compra $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        request()->validate(Compra::$rules);

        $compra->update($request->all());

        return redirect()->route('compras.index')
            ->with('success', 'Compra updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $compra = Compra::find($id);
            foreach ($compra->compraProductos as $item) {
                $stock = Stock::where('producto_id', $item->producto_id)->first();
                $stock->cantidad -= $item->cantidad;
                $stock->save();

                $item->delete();
            }
            $compra->delete();

            DB::commit();
            return redirect()->route('compras.index')
                ->with('success', 'Compra eliminada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('compras.index')
                ->with('error', 'Ha ocurrido un error, no se elimino el registro.');
        }
    }

    public function anular($id)
    {
        DB::beginTransaction();
        try {
            $compra = Compra::find($id);
            foreach ($compra->compraProductos as $item) {
                $stock = Stock::where('producto_id', $item->producto_id)->first();
                $stock->cantidad -= $item->cantidad;
                $stock->save();

                // $item->delete();
            }
            $compra->estado = 0;
            $compra->save();

            DB::commit();
            return redirect()->route('compras.index')
                ->with('success', 'Compra anulada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('compras.index')
                ->with('error', 'Ha ocurrido un error, no se elimino el registro.');
        }
        $compra = Compra::find($id);
        $compra->estado = 0;
        $compra->save();
        return redirect()->route('compras.index')
            ->with('success', 'Compra anulada correctamente');
    }
}
