<?php

namespace App\Http\Controllers;

use App\Models\CompraProducto;
use Illuminate\Http\Request;

/**
 * Class CompraProductoController
 * @package App\Http\Controllers
 */
class CompraProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compraProductos = CompraProducto::paginate();

        return view('compra-producto.index', compact('compraProductos'))
            ->with('i', (request()->input('page', 1) - 1) * $compraProductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compraProducto = new CompraProducto();
        return view('compra-producto.create', compact('compraProducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CompraProducto::$rules);

        $compraProducto = CompraProducto::create($request->all());

        return redirect()->route('compra-productos.index')
            ->with('success', 'CompraProducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compraProducto = CompraProducto::find($id);

        return view('compra-producto.show', compact('compraProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compraProducto = CompraProducto::find($id);

        return view('compra-producto.edit', compact('compraProducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CompraProducto $compraProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompraProducto $compraProducto)
    {
        request()->validate(CompraProducto::$rules);

        $compraProducto->update($request->all());

        return redirect()->route('compra-productos.index')
            ->with('success', 'CompraProducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $compraProducto = CompraProducto::find($id)->delete();

        return redirect()->route('compra-productos.index')
            ->with('success', 'CompraProducto deleted successfully');
    }
}
