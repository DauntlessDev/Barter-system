<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ItemModel;

class Dummy extends BaseController
{
	/**
	 * METHOD: GET
	*/
	public function index()
	{
        $data = [
            'itemModel' => new ItemModel(),
			'categoryModel' => new CategoryModel(),
        ];

		return view('pages/dummy', $data);
	}
}
