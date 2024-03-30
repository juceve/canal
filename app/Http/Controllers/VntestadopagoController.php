<?php

namespace App\Http\Controllers;

use App\Models\Vntestadopago;
use Illuminate\Http\Request;

/**
 * Class VntestadopagoController
 * @package App\Http\Controllers
 */
class VntestadopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vntestadopagos = Vntestadopago::all();

        return view('vntestadopago.index', compact('vntestadopagos'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vntestadopago = new Vntestadopago();
        return view('vntestadopago.create', compact('vntestadopago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vntestadopago::$rules);

        $vntestadopago = Vntestadopago::create($request->all());

        return redirect()->route('vntestadopagos.index')
            ->with('success', 'Vntestadopago created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vntestadopago = Vntestadopago::find($id);

        return view('vntestadopago.show', compact('vntestadopago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vntestadopago = Vntestadopago::find($id);

        return view('vntestadopago.edit', compact('vntestadopago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vntestadopago $vntestadopago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vntestadopago $vntestadopago)
    {
        request()->validate(Vntestadopago::$rules);

        $vntestadopago->update($request->all());

        return redirect()->route('vntestadopagos.index')
            ->with('success', 'Vntestadopago updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vntestadopago = Vntestadopago::find($id)->delete();

        return redirect()->route('vntestadopagos.index')
            ->with('success', 'Vntestadopago deleted successfully');
    }
}
