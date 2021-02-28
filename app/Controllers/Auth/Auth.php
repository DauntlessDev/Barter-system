<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use \CodeIgniter\Config\Services;
use Exception;

class Auth extends BaseController
{
	public function __construct() {
		helper(['form']);
		$this->validation = Services::validation();
	}

	/**
	 * METHOD: GET/POST
	 * https://www.codeigniter.com/user_guide/libraries/validation.html
	*/
	public function login() {
		if ($this->request->getMethod() === 'get') return view('pages/login');

		if ($this->request->getMethod() === 'post') {
			// rules https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#available-rules
			$rules = $this->validation->getRuleGroup('login');  // rule located in app/Config/Validation.php

			if (!$this->validate($rules)) return view('pages/login', ['validation' => $this->validator]);

			// check if username & password exists in database through UserModel.php
			$userModel = new UserModel();
			$user = $userModel
					->where('username', $_POST['username'])
					->first();

			$this->setSession($user);
			return redirect()->route('dashboard');
		}
	}

	/**
	 * METHOD: GET/POST
	*/
    public function signup() {
		if ($this->request->getMethod() === 'get') return view('pages/signup');

		if ($this->request->getMethod() === 'post') {
			// rules https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#available-rules
			$rules = $this->validation->getRuleGroup('signup'); // rule located in app/Config/Validation.php

			// validate all fields
			if (!$this->validate($rules)) return view('pages/signup', ['validation' => $this->validator]);

			$userModel = new UserModel();
			if ($userModel->insert($_POST) === false) throw new Exception('Error while inserting to database');

			return redirect()->route('login')->with('msg', 'Registration Successful, you may now login');
		}
	}

	/**
	 * METHOD: GET
	*/
	public function logout(){
		if ($this->request->getMethod() === 'get') {
			session()->destroy();
			return redirect()->route('home');
		}
	}


	private function setSession($user) {
		$data = [
			'user' => $user,
			'isLoggedIn' => true,
		];

		session()->set($data);
	}
}
