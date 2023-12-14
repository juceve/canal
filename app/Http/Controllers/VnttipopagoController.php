<?php

namespace App\Http\Controllers;

use App\Models\Vnttipopago;
use Illuminate\Http\Request;

/**
 * Class VnttipopagoController
 * @package App\Http\Controllers
 */
class VnttipopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vnttipopagos = Vnttipopago::paginate();

        return view('vnttipopago.index', compact('vnttipopagos'))
            ->with('i', (request()->input('page', 1) - 1) * $vnttipopagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vnttipopago = new Vnttipopago();
        return view('vnttipopago.create', compact('vnttipopago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vnttipopago::$rules);

        $vnttipopago = Vnttipopago::create($request->all());

        return redirect()->route('vnttipopagos.index')
            ->with('success', 'Vnttipopago created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vnttipopago = Vnttipopago::find($id);

        return view('vnttipopago.show', compact('vnttipopago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vnttipopago = Vnttipopago::find($id);

        return view('vnttipopago.edit', compact('vnttipopago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vnttipopago $vnttipopago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vnttipopago $vnttipopago)
    {
        request()->validate(Vnttipopago::$rules);

        $vnttipopago->update($request->all());

        return redirect()->route('vnttipopagos.index')
            ->with('success', 'Vnttipopago updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vnttipopago = Vnttipopago::find($id)->delete();

        return redirect()->route('vnttipopagos.index')
            ->with('success', 'Vnttipopago deleted successfully');
    }
}
