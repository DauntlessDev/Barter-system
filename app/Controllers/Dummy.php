<?php

namespace App\Controllers;

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
        ];

		return view('pages/dummy', $data);
	}
}
