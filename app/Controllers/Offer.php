<?php

namespace App\Controllers;
use App\Models\ItemModel;
use App\Models\UserModel;
use App\Models\CategoryModel;
use Config\Services;
use Exception;

class Offer extends BaseController
{
    public function place()
	{

		if ($this->request->getMethod() === 'get') return view('pages/auth/placeOffer');
		if ($this->request->getMethod() === 'post') {
			// do form validation
			// update database
			// check for error
			return "Process editing of item";
		}
	}
}