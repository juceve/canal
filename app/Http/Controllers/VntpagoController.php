<?php

namespace App\Http\Controllers;

use App\Models\Vntpago;
use Illuminate\Http\Request;

/**
 * Class VntpagoController
 * @package App\Http\Controllers
 */
class VntpagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vntpagos = Vntpago::paginate();

        return view('vntpago.index', compact('vntpagos'))
            ->with('i', (request()->input('page', 1) - 1) * $vntpagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vntpago = new Vntpago();
        return view('vntpago.create', compact('vntpago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vntpago::$rules);

        $vntpago = Vntpago::create($request->all());

        return redirect()->route('vntpagos.index')
            ->with('success', 'Vntpago created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vntpago = Vntpago::find($id);

        return view('vntpago.show', compact('vntpago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vntpago = Vntpago::find($id);

        return view('vntpago.edit', compact('vntpago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vntpago $vntpago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vntpago $vntpago)
    {
        request()->validate(Vntpago::$rules);

        $vntpago->update($request->all());

        return redirect()->route('vntpagos.index')
            ->with('success', 'Vntpago updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vntpago = Vntpago::find($id)->delete();

        return redirect()->route('vntpagos.index')
            ->with('success', 'Vntpago deleted successfully');
    }
}
