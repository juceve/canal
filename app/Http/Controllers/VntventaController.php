<?php

namespace App\Http\Controllers;

use App\Models\Vntpago;
use App\Models\Vntventa;
use Illuminate\Http\Request;

/**
 * Class VntventaController
 * @package App\Http\Controllers
 */
class VntventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vntventa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vntventa = new Vntventa();
        return view('vntventa.create', compact('vntventa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vntventa::$rules);

        $vntventa = Vntventa::create($request->all());

        return redirect()->route('vntventas.index')
            ->with('success', 'Vntventa created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vntventa = Vntventa::find($id);

        return view('vntventa.show', compact('vntventa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vntventa = Vntventa::find($id);

        return view('vntventa.edit', compact('vntventa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vntventa $vntventa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // request()->validate(Vntventa::$rules);
        $venta = Vntventa::find($id);
        $venta->cliente = $request->cliente;
        $venta->observaciones = $request->observaciones;
        $venta->status = $request->status;
        $venta->save();

        $pago = Vntpago::where('vntventa_id', $venta->id)->first();
        if ($pago) {
            $pago->status = $venta->status;
            $pago->save();
        }



        return redirect()->route('vntventas.index')
            ->with('success', 'Venta editada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vntventa = Vntventa::find($id)->delete();

        return redirect()->route('vntventas.index')
            ->with('success', 'Vntventa deleted successfully');
    }
}
