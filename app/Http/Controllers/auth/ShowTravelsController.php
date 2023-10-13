<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\TablaExcelExport;
use App\Imports\TravelsImport;
use App\Imports\OriginImport;
use App\Imports\DestinationImport;
use Maatwebsite\Excel\Facades\Excel;

class ShowTravelsController extends Controller {

    public function view() {

        return view('auth.ShowRoutes');

    }

}
