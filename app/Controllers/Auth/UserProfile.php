<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ItemModel;
use App\Models\ReviewModel;
use \CodeIgniter\Config\Services;
use Exception;

class UserProfile extends BaseController
{
    protected $userModel;

	public function __construct() {
		helper(['form']);
		$this->validation = Services::validation();
		$this->userModel = new UserModel();
        $this->itemModel = new ItemModel();
        $this->reviewModel = new ReviewModel();
	}

    /**
	 * METHOD: GET
	*/
    public function index(int $user_id) {
        $items = $this->itemModel->get(['poster_uid' => [$user_id]]);

        $data = [
            'items' => $items,
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

            $user = $this->userModel->where([ 'user_id' => $user_id ])->first();
            session()->set(['user' => $user]);

			return redirect()->route('userProfileEdit')->with('msg', 'Successfully updated user!');
        }
    }

    public function reviews(int $reviewee_uid) {
        $reviews = $this->reviewModel->get(['reviewee_uid' => $reviewee_uid]);
        $reviewCount = 0;

        if (session()->get('user') !== null) {
            $user_id = session()->get('user')['user_id'];
            $reviewCount = count($this->reviewModel->get(['reviewee_uid' => $reviewee_uid, 'reviewer_uid' => $user_id]));
        }

        $data = [
            'reviews' => $reviews,
            'user' => $this->userModel->find($reviewee_uid),
            'AddButton' => [
                'status' => $reviewCount === 0,
                'msg' => 'You can only place one review per user.'
            ]
        ];

        return view('pages/auth/reviews', $data);
    }
}
