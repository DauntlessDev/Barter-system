<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ItemModel;
use App\Models\OfferModel;
use App\Models\UserModel;

class Dummy extends BaseController
{
	/**
	 * METHOD: GET
	*/
	public function index()
	{
        $data = [
            'itemModel' 	=> new ItemModel(),
			'categoryModel' => new CategoryModel(),
			'userModel' 	=> new UserModel(),
			'offerModel' 	=> new OfferModel(),
        ];

		return view('pages/dummy', $data);
	}
}
