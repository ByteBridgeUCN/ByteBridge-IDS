<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {

    public function store(Request $request) {

        // Create User
        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'state' => $request->state,
            ]
        );

    }

}
