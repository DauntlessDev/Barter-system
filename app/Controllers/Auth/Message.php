<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Message extends BaseController
{
	public function index() {
		if ($this->request->getMethod() === 'get') return view('pages/auth/message');
	}
}
