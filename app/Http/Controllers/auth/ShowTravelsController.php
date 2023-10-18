<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\TablaExcelExport;
use App\Imports\TravelsImport;
use Maatwebsite\Excel\Facades\Excel;

class ShowTravelsController extends Controller {

    public function view() {

        return view('auth.ShowRoutes');

    }

}
