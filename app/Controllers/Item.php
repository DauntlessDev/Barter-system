<?php

namespace App\Controllers;

class Item extends BaseController
{
	/**
	 * METHOD: GET
	*/
	public function index()
	{
		return view('pages/itemprofile');
	}
}
