<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vw_producto extends Model
{
    protected $fillable = ['id', 'codbarras', 'nombre', 'descripcion', 'precio', 'categoria_id', 'categoria', 'stock'];
}
