<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ItemModel;
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
        $this->itemModel = new ItemModel();
        $this->reviewModel = new ReviewModel();
	}

    /**
	 * METHOD: GET
	*/
    public function index(int $user_id) {
        $reviews = $this->reviewModel->get(['reviewee_uid' => $user_id]);

        $data = [
            'reviews' => $reviews,
            'user' => $this->userModel->find($user_id),
        ];

        return view('pages/auth/reviewsEdit', $data);
    }

    /**
	 * METHOD: GET
     * Displays users Edit Profile Page
	*/
    public function edit() {
        
        return redirect()->route('reviewsEdit')->with('msg', 'Successfully updated review!');
    }
}

