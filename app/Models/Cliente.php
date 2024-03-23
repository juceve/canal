<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $tipodoc_id
 * @property $nrodoc
 * @property $celular
 * @property $telefono
 * @property $email
 * @property $fechanacimiento
 * @property $zona_id
 * @property $genero_id
 * @property $nObjetivos
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Datosfisico[] $datosfisicos
 * @property Detalleobjetivo[] $detalleobjetivos
 * @property Genero $genero
 * @property Imagencliente[] $imagenclientes
 * @property Tipodoc $tipodoc
 * @property Zona $zona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{

    static $rules = [
        'nombre' => 'required',
        'celular' => 'required',
        'email' => 'required',
        'fechanacimiento' => 'required',
        'zona_id' => 'required',
        'genero_id' => 'required',
        'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'direccion', 'tipodoc_id', 'nrodoc', 'celular', 'telefono', 'email', 'fechanacimiento', 'zona_id', 'genero_id', 'nObjetivos', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosfisicos()
    {
        return $this->hasMany('App\Models\Datosfisico', 'cliente_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleobjetivos()
    {
        return $this->hasMany('App\Models\Detalleobjetivo', 'cliente_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function genero()
    {
        return $this->hasOne('App\Models\Genero', 'id', 'genero_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imagenclientes()
    {
        return $this->hasMany('App\Models\Imagencliente', 'cliente_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipodoc()
    {
        return $this->hasOne('App\Models\Tipodoc', 'id', 'tipodoc_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zona()
    {
        return $this->hasOne('App\Models\Zona', 'id', 'zona_id');
    }

    public function suscripciones()
    {
        return $this->hasMany('App\Models\Suscripcione', 'cliente_id', 'id');
    }

    public function licencias()
    {
        return $this->hasMany('App\Models\Licencia', 'cliente_id', 'id');
    }
}
