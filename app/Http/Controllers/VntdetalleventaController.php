<?php

namespace App\Http\Controllers;

use App\Models\Vntdetalleventa;
use Illuminate\Http\Request;

/**
 * Class VntdetalleventaController
 * @package App\Http\Controllers
 */
class VntdetalleventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vntdetalleventas = Vntdetalleventa::paginate();

        return view('vntdetalleventa.index', compact('vntdetalleventas'))
            ->with('i', (request()->input('page', 1) - 1) * $vntdetalleventas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vntdetalleventa = new Vntdetalleventa();
        return view('vntdetalleventa.create', compact('vntdetalleventa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vntdetalleventa::$rules);

        $vntdetalleventa = Vntdetalleventa::create($request->all());

        return redirect()->route('vntdetalleventas.index')
            ->with('success', 'Vntdetalleventa created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vntdetalleventa = Vntdetalleventa::find($id);

        return view('vntdetalleventa.show', compact('vntdetalleventa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vntdetalleventa = Vntdetalleventa::find($id);

        return view('vntdetalleventa.edit', compact('vntdetalleventa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vntdetalleventa $vntdetalleventa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vntdetalleventa $vntdetalleventa)
    {
        request()->validate(Vntdetalleventa::$rules);

        $vntdetalleventa->update($request->all());

        return redirect()->route('vntdetalleventas.index')
            ->with('success', 'Vntdetalleventa updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vntdetalleventa = Vntdetalleventa::find($id)->delete();

        return redirect()->route('vntdetalleventas.index')
            ->with('success', 'Vntdetalleventa deleted successfully');
    }
}
