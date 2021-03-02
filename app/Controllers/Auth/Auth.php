<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use \CodeIgniter\Config\Services;
use Exception;

class Auth extends BaseController
{
	protected $userModel;

	public function __construct() {
		helper(['form']);
		$this->validation = Services::validation();
		$this->userModel = new UserModel();
	}

	/**
	 * METHOD: `GET`/`POST`
	 * 
	 * Controls the authentication page for login.
	 * If form is submitted through `GET`, redirects back to login page.
	 * Otherwise `POST`, validates user credentials and sets a session
	 * if successful.
	 * 
	 * 
	 * LINKS: https://www.codeigniter.com/user_guide/libraries/validation.html
	 * 		  https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#available-rules
	 */
	public function login() {
		if ($this->request->getMethod() === 'get') return view('pages/login');
		if ($this->request->getMethod() === 'post') {
			$rules = $this->validation->getRuleGroup('login');  // rule located in app/Config/Validation.php

			if (!$this->validate($rules)) return view('pages/login', ['validation' => $this->validator]);

			/* at this point username and password was already validated
			   so there's no need to verify password again
			   see app/Validation/LoginRules.php & app/Config/Validation::ruleSets */
			
			/* Initial implementation */
			// $userModel = new UserModel();
			// $user = $userModel
			// 		->where('username', $_POST['username'])
			// 		->first();

			$user = $this->userModel->getUser($_POST['username']);
			$this->setSession($user);
			return redirect()->route('dashboard');
		}
	}

	/**
	 * METHOD: `GET`/`POST`
	 * 
	 * Controls the authentication page for signup.
	 * If form is submitted through `GET`, redirects back to signup page.
	 * Otherwise `POST`, validates all form details and creates a user.
	 * Redirects to login page if successful.
	 * 
	 * @throws Exception if unsuccessful creation of user account. 
	 * 
	 * LINKS: https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#available-rules
	 */
    public function signup() {
		if ($this->request->getMethod() === 'get') return view('pages/signup');
		if ($this->request->getMethod() === 'post') {
			$rules = $this->validation->getRuleGroup('signup'); // rule located in app/Config/Validation.php

			// validate all fields
			if (!$this->validate($rules)) return view('pages/signup', ['validation' => $this->validator]);

			/* Initial implementation */
			// $userModel = new UserModel();
			// if ($userModel->insert($_POST) === false) throw new Exception('Error while inserting to database');
			
			if ($this->userModel->createUser($_POST) === false)
				throw new Exception('Error while inserting to database');

			return redirect()->route('login')->with('msg', 'Registration Successful, you may now login');
		}
	}

	/**
	 * METHOD: `GET`
	 * 
	 * Logs out the current user and destroys the session.
	 * Redirects to home page in anonymous browsing.
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
