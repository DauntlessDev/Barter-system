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
    public function create(int $reviewee_uid) {
        $user_id = session()->get('user')['user_id'];

        $searchQuery = ['reviewee_uid' => $reviewee_uid, 'reviewer_uid' => $user_id];

        $data = [
            'user' => $this->userModel->find($reviewee_uid),
        ];

        // GET
        if ($this->request->getMethod() === 'get') {
            $reviews = $this->reviewModel->get($searchQuery);

            if (count($reviews) > 0) {
                return redirect()->route('userReviews', [$reviewee_uid])->with('msg', 'You can only place a review once per user.');
            }

            return view('pages/auth/reviewsCreate', $data);
        }
        // POST
        if ($this->request->getMethod() === 'post') {
            $rules = $this->validation->getRuleGroup('addEditReview');
			if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('pages/auth/reviewsEdit', $data);
            }

            $_POST['reviewee_uid'] = $reviewee_uid;
            $_POST['reviewer_uid'] = $user_id;

            if ($this->reviewModel->create($_POST) === false) {
				throw new Exception('Error while inserting using ReviewModel');
			}

            return redirect()->route('userReviews', [$reviewee_uid])->with('msg', 'Review created successfully');
        }
    }

    /**
	 * METHOD: GET/POST
     *
	*/
    public function edit(int $reviewee_uid) {
        $user_id = session()->get('user')['user_id'];
        $searchQuery = ['reviewee_uid' => $reviewee_uid, 'reviewer_uid' => $user_id];
        $review = $this->reviewModel->get($searchQuery)[0];

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

            $review_data = array_merge($_POST, $searchQuery);

            if ($this->reviewModel->create($review_data) === false) {
				throw new Exception('Error while inserting using ReviewModel');
			}

            return redirect()->route('userReviews', [$reviewee_uid])->with('msg', 'Review updated successfully');
		}
    }

    /**
	 * METHOD: GET
     *
	*/
    public function delete(int $reviewee_uid) {
        if ($this->request->getMethod() === 'get') {
            $user_id = session()->get('user')['user_id'];

            $searchQuery = ['reviewee_uid' => $reviewee_uid, 'reviewer_uid' => $user_id];
            $review = $this->reviewModel->get($searchQuery);

            if (count($review) === 0) throw new Exception('Review not found, are you attempting to break our app? :D');

            $this->reviewModel->delete($searchQuery);

            return redirect()->route('userReviews', [$reviewee_uid])->with('msg', 'Review deleted successfully');
        }
    }
}
