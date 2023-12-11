<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Imagencliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Fotosclientes extends Component
{

    use WithFileUploads;
    public $cliente_id, $files;

    public function mount($cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    protected $listeners = ['deleteFile'];

    public function render()
    {
        $cliente = Cliente::find($this->cliente_id);
        $imagenes = $cliente->imagenclientes;
        return view('livewire.fotosclientes', compact('cliente', 'imagenes'))->with('i', 1)->extends('layouts.app');
    }

    public function deleteFile($id)
    {
        DB::beginTransaction();
        try {

            $file = Imagencliente::find($id);
            $file2 = $file;
            $file->delete();
            Storage::delete($file2->url);

            DB::commit();
            $this->emit('successL', 'Imagen eliminada!');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('errorL', $th->getMessage());
        }
    }

    public function registrar()
    {
        if ($this->files) {
            try {

                foreach ($this->files as $image) {
                    $extension = $image->getClientOriginalExtension();

                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $file = $this->cliente_id . substr(str_shuffle($permitted_chars), 0, 16) . '.' . $extension;
                    
                    $ruta = storage_path() . '\app\public\imagenes\clientes/' .  $file;

                    Image::make($image)
                        ->resize(600, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($ruta);

                    $imgcli = Imagencliente::create([
                        'url' =>  'imagenes\clientes/' . $file,
                        'extension' => $extension,
                        'cliente_id' => $this->cliente_id,
                    ]);
                }
                
                return redirect()->route('fotosclientes', $this->cliente_id)->with('success', 'Imagenes registradas correctamente!');
            } catch (\Throwable $th) {
                DB::rollBack();
                $this->emit('errorL', $th->getMessage());
            }
        }
    }
}
