<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vwmovimiento extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'glosa', 'model_id', 'model_type', 'cuenta_id', 'importe', 'user_id', 'status', 'cuenta', 'tipo'];
}
