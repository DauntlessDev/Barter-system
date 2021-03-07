<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use \CodeIgniter\Config\Services;

class UserProfile extends BaseController
{
    protected $userModel;

	public function __construct() {
		helper(['form']);
		$this->validation = Services::validation();
		$this->userModel = new UserModel();
	}

    /**
	 * METHOD: GET
	*/
    public function index() {
        return view('pages/auth/userProfile');
    }

    /**
	 * METHOD: GET
     * Displays users Edit Profile Page
	*/
    public function edit() {
        if ($this->request->getMethod() === 'get') return view('pages/auth/userProfileEdit');
        if ($this->request->getMethod() === 'post') {
            // TODO: UPDATE USER HERE AFTER MERGING MODELS BRANCH
            print_r($_POST);
        }
    }
}
