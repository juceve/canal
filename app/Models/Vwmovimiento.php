<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vwmovimiento extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'glosa', 'observaciones', 'model_id', 'model_type', 'cuenta_id', 'importe', 'user_id', 'status', 'cuenta', 'tipo'];
}
