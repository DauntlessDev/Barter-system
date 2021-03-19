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

        
	}

    public function place()
	{

		return view('pages/auth/placeOffer');
	}
}