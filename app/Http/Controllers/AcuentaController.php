<?php

namespace App\Http\Controllers;

use App\Models\Acuenta;
use Illuminate\Http\Request;

/**
 * Class AcuentaController
 * @package App\Http\Controllers
 */
class AcuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acuentas = Acuenta::paginate();

        return view('acuenta.index', compact('acuentas'))
            ->with('i', (request()->input('page', 1) - 1) * $acuentas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acuenta = new Acuenta();
        return view('acuenta.create', compact('acuenta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Acuenta::$rules);

        $acuenta = Acuenta::create($request->all());

        return redirect()->route('acuentas.index')
            ->with('success', 'Acuenta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acuenta = Acuenta::find($id);

        return view('acuenta.show', compact('acuenta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acuenta = Acuenta::find($id);

        return view('acuenta.edit', compact('acuenta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Acuenta $acuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acuenta $acuenta)
    {
        request()->validate(Acuenta::$rules);

        $acuenta->update($request->all());

        return redirect()->route('acuentas.index')
            ->with('success', 'Acuenta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $acuenta = Acuenta::find($id)->delete();

        return redirect()->route('acuentas.index')
            ->with('success', 'Acuenta deleted successfully');
    }
}
