<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller {

    public function store(Request $request) {

        // Create role
        Role::create(
            [
                'name' => $request->name
            ]
        );

    }

}
