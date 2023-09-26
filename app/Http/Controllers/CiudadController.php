<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function store(Request $request){

        // Creamos la ciudad
        Ciudad::create(
            [
                'nombre' => $request->nombre
            ]
        );
    }
}
