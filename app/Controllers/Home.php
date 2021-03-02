<?php

namespace App\Controllers;

class Home extends BaseController
{
	/**
	 * METHOD: GET
	*/
	public function index()
	{
		return view('pages/home');
	}
}
