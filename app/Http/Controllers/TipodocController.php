<?php

namespace App\Http\Controllers;

use App\Models\Tipodoc;
use Illuminate\Http\Request;

/**
 * Class TipodocController
 * @package App\Http\Controllers
 */
class TipodocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipodocs = Tipodoc::paginate();

        return view('tipodoc.index', compact('tipodocs'))
            ->with('i', (request()->input('page', 1) - 1) * $tipodocs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipodoc = new Tipodoc();
        return view('tipodoc.create', compact('tipodoc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipodoc::$rules);

        $tipodoc = Tipodoc::create($request->all());

        return redirect()->route('tipodocs.index')
            ->with('success', 'Tipodoc created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipodoc = Tipodoc::find($id);

        return view('tipodoc.show', compact('tipodoc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipodoc = Tipodoc::find($id);

        return view('tipodoc.edit', compact('tipodoc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipodoc $tipodoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipodoc $tipodoc)
    {
        request()->validate(Tipodoc::$rules);

        $tipodoc->update($request->all());

        return redirect()->route('tipodocs.index')
            ->with('success', 'Tipodoc updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipodoc = Tipodoc::find($id)->delete();

        return redirect()->route('tipodocs.index')
            ->with('success', 'Tipodoc deleted successfully');
    }
}
