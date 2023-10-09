<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function store(Request $request){

        // Create userRole
        UserRole::create(
            [
                'userId' => $request->userId,
                'roleId' => $request->roleId
            ]
        );
    }
}
