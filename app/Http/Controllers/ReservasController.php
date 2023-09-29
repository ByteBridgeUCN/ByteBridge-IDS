<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscarReservaController extends Controller
{
    public function index()
    {
        return view('buscarReservas');
    }
}
