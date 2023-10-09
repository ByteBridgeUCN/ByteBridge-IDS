<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function almacenar(Request $request){

        // Create city
        City::create(
            [
                'name' => $request->nombre
            ]
        );
    }
}
