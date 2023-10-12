<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchTicketController extends Controller {

    public function view() {

        return view('auth.SearchTicket');

    }

}
