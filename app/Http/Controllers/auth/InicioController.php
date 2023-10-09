<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InicioController extends Controller {

    public function crear() {

        return view('auth.inicio');

    }

}
