<?php

namespace App\Http\Controllers;

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
        $vntventas = Vntventa::paginate();

        return view('vntventa.index', compact('vntventas'))
            ->with('i', (request()->input('page', 1) - 1) * $vntventas->perPage());
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
    public function update(Request $request, Vntventa $vntventa)
    {
        request()->validate(Vntventa::$rules);

        $vntventa->update($request->all());

        return redirect()->route('vntventas.index')
            ->with('success', 'Vntventa updated successfully');
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
