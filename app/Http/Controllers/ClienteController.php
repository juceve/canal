<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Detalleobjetivo;
use App\Models\Imagencliente;
use App\Models\Objetivo;
use App\Models\Tipodoc;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('cliente.index', compact('clientes'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();
        $tipodocs = Tipodoc::all()->pluck('nombre', 'id');
        $zonas = Zona::all()->pluck('nombre', 'id');
        $objetivos = Objetivo::all();
        return view('cliente.create', compact('cliente', 'tipodocs', 'zonas', 'objetivos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'celular' => 'required',
            'email' => 'required|email',
            'fechanacimiento' => 'required',
            'zona_id' => 'required',
        ]);


        DB::beginTransaction();
        try {
            $cliente = Cliente::create($request->all());

            $objetivos = $request->objetivos;

            if ($objetivos) {
                foreach ($objetivos as $objetivo_id) {
                    $detalle = Detalleobjetivo::create([
                        'cliente_id' => $cliente->id,
                        'objetivo_id' => $objetivo_id,
                    ]);
                }
            }

            if (!$request->otro) {
                $cliente->nObjetivos = NULL;
                $cliente->save();
            }

            if ($request->hasFile('imagenes')) {
                $imagenes = $request->file('imagenes');
                $i = 1;
                foreach ($imagenes as $image) {
                    $extension = $image->getClientOriginalExtension();

                    $ruta = storage_path() . '\app\public\imagenes\clientes/' . $cliente->id . "_" . $i . "." . $extension;

                    Image::make($image)
                        ->resize(600, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($ruta);

                    $imgcli = Imagencliente::create([
                        'url' =>  'imagenes\clientes/' . $cliente->id . "_" . $i . "." . $extension,
                        'extension' => $extension,
                        'cliente_id' => $cliente->id,
                    ]);

                    $i++;
                }
            }


            DB::commit();

            return redirect()->route('clientes.index')
                ->with('success', 'Cliente creado correctamente.');
        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->route('clientes.create')
                ->with('error', $th->getMessage());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }


    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $tipodocs = Tipodoc::all()->pluck('nombre', 'id');
        $zonas = Zona::all()->pluck('nombre', 'id');
        $objetivos = Objetivo::all();
        return view('cliente.edit', compact('cliente', 'tipodocs', 'zonas', 'objetivos'));
    }


    public function update(Request $request, Cliente $cliente)
    {
        request()->validate([
            'nombre' => 'required',
            'celular' => 'required',
            'email' => 'required|email|unique:clientes,id,' . $cliente->id,
            'fechanacimiento' => 'required',
            'zona_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $cliente->update($request->all());

            $detalles = Detalleobjetivo::where('cliente_id', $cliente->id)->delete();

            $objetivos = $request->objetivos;
            if ($objetivos) {
                foreach ($objetivos as $objetivo_id) {
                    $detalle = Detalleobjetivo::create([
                        'cliente_id' => $cliente->id,
                        'objetivo_id' => $objetivo_id,
                    ]);
                }
            }

            if (!$request->otro) {
                $cliente->nObjetivos = NULL;
                $cliente->save();
            }

            DB::commit();
            return redirect()->route('clientes.index')
                ->with('success', 'Cliente editado correctamente');
        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->route('clientes.index')
                ->with('error', 'Ha ocurrido un error.');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        
        Detalleobjetivo::where('cliente_id', $id)->delete();
        Imagencliente::where('cliente_id', $id)->delete();
        $cliente = Cliente::find($id)->delete();
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente');
    }

    public function statuschange($id)
    {
        $cliente = Cliente::find($id);
        $cliente->status = !$cliente->status;
        $cliente->save();

        return redirect()->route('clientes.index')
            ->with('success', 'Estado modificado correctamente');
    }
}
