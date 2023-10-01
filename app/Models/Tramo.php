<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramo extends Model
{
    use HasFactory;

    protected $fillable = [
        'idAdministrador',
        'idOrigen',
        'idDestino',
        'totalAsientos',
        'tarifaBase'
    ];
}
