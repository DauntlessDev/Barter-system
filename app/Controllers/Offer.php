<?php

namespace App\Controllers;
use App\Models\ItemModel;
use App\Models\UserModel;
use App\Models\CategoryModel;
use Config\Services;
use Exception;

class Offer extends BaseController
{
	public function __construct()
	{
		helper(['form']);
	}

    public function create()
	{
        if ($this->request->getMethod() === 'get') return view('pages/auth/placeOffer');
		if ($this->request->getMethod() === 'post') {
			// do form validation
			// update database
			// check for error
			var_dump($_POST);
			return view('pages/auth/placeOffer');
		}
	}
}