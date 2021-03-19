<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use \CodeIgniter\Config\Services;
use Exception;

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
    public function index(int $user_id) {
        $data = [
            'user' => $this->userModel->find($user_id),
        ];
        return view('pages/auth/userProfile', $data);
    }

    /**
	 * METHOD: GET
     * Displays users Edit Profile Page
	*/
    public function edit() {
        if ($this->request->getMethod() === 'get') return view('pages/auth/userProfileEdit');
        if ($this->request->getMethod() === 'post') {
            $rules = $this->validation->getRuleGroup('editProfile');

			// validate all fields
			if (!$this->validate($rules)) return view('pages/auth/userProfileEdit', ['validation' => $this->validator]);

            $user_id = session()->get('user')['user_id'];

            if (isset($_POST['username'])) unset($_POST['username']);

            if (isset($_POST['password']))
                if ($_POST['password'] === '')
                    unset($_POST['password']);

			if ($this->userModel->update($user_id, $_POST) === false)
				throw new Exception('Error while inserting to database');

            // TODO: Update session here

			return redirect()->route('userProfileEdit')->with('msg', 'Successfully updated user!!!!!!!!!!!! >:(');
        }
    }

    public function reviews() {
        return view('pages/auth/userProfile');
    }
}
