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
    public function create(int $user_id) {
        $data = [
            'user_id' => $user_id,
        ];

        if ($this->request->getMethod() === 'get') return view('pages/auth/reviewsCreate', $data);
        if ($this->request->getMethod() === 'post') {
            var_dump($_POST);
        }
    }

    /**
	 * METHOD: GET/POST
     *
	*/
    public function edit(int $reviewee_uid) {
        $user_id = session()->get('user')['user_id'];
        $searchQuery = ['reviewee_uid' => $reviewee_uid, 'reviewer_uid' => $user_id];
        $review = $this->reviewModel->get($searchQuery)[0]; // TODO: needs fixing, this would not get the unique review

        $data = [
            'review' => $review,
            'user' => $this->userModel->find($reviewee_uid),
        ];

        if ($this->request->getMethod() === 'get') return view('pages/auth/reviewsEdit', $data);
        if ($this->request->getMethod() === 'post') {
            $rules = $this->validation->getRuleGroup('addEditReview');
			if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('pages/auth/reviewsEdit', $data);
            }

            if ($this->reviewModel->update($_POST, $searchQuery) === false) {
				throw new Exception('Error while inserting using ReviewModel');
			}

            return redirect()->route('reviewsEdit', [$reviewee_uid])->with('msg', 'Review successfully update');
		}
    }
}

