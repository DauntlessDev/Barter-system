<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    /**
	 * METHOD: GET
	*/
    public function index() {
        return view('pages/auth/dashboard');
    }
}
