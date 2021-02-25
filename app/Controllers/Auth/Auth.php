<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use \CodeIgniter\Config\Services;

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
		// deprecated param https://www.codeigniter.com/user_guide/incoming/request.html?highlight=request#getMethod
		if ($this->request->getMethod() === 'get') return view('pages/login');

		if ($this->request->getMethod() === 'post') {
			// rules https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#available-rules

			// check if username & password exists in database through MODELS
			$userModel = new UserModel();

			$rules = $userModel->validationRules;

			if ($this->validate($rules)) {
				$user = $userModel
						->where('username', $_POST['username'])
						->first();

				$isCorrectPassword = password_verify($_POST['password'], $user['password']);

				if ($isCorrectPassword) {
					$this->setSession($user);
					return redirect()->route('dashboard');
				}
			}

			return view('pages/login', [
				'error' => 'Invalid username or password'
			]);
		}
	}

	/**
	 * METHOD: GET/POST
	*/
    public function signup() {
		$data = [
			'msg' => 'Please code me'
		];

		if ($this->request->getMethod() === 'get') return view('pages/signup', $data);

		if ($this->request->getMethod() === 'post') {
			$rules = $this->validation->getRuleGroup('signup'); // rule located in app/Config/Validation.php

			if ($this->validate($rules)) {
				// TODO: Store user to database through models
				// TODO: Check if there's error in models
				return redirect()->route('login');
			}
		}
	}

	public function logout(){
		session()->destroy();
		return redirect()->route('home');
	}


	private function setSession($user) {
		$data = [
			'user' => $user,
			'isLoggedIn' => true,
		];

		session()->set($data);
	}
}
