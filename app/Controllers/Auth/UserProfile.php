<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class UserProfile extends BaseController
{
    /**
	 * METHOD: GET
	*/
    public function index() {
        return view('pages/auth/userProfile');
    }
}
