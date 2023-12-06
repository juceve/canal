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
 * @property $created_at
 * @property $updated_at
 *
 * @property Detalleobjetivo[] $detalleobjetivos
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
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','direccion','tipodoc_id','nrodoc','celular','telefono','email','fechanacimiento','zona_id','nObjetivos','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleobjetivos()
    {
        return $this->hasMany('App\Models\Detalleobjetivo', 'cliente_id', 'id');
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
    

}
