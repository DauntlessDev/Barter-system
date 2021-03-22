<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ReviewModel;
use \CodeIgniter\Config\Services;
use Exception;

class Review extends BaseController
{
    protected $userModel;

	public function __construct() {
		helper(['form']);
		$this->validation = Services::validation();
		$this->userModel = new UserModel();
        $this->reviewModel = new ReviewModel();
	}

    /**
	 * METHOD: GET/POST
     * 
	*/

    public function edit(int $user_id) {
        $reviews = $this->reviewModel->get(['reviewee_uid' => $user_id]);

        $data = [
            'reviews' => $reviews,
            'user' => $this->userModel->find($user_id),
        ];

        if ($this->request->getMethod() === 'get') return view('pages/auth/reviewsEdit', $data);

        if ($this->request->getMethod() === 'post') {

            var_dump($_POST);

		}
    }
}

