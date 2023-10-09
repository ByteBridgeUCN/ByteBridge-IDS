<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrarController extends Controller {

    public function crear() {

        return view('auth.register');

    }

}
