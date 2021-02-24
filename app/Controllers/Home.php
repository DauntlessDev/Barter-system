<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo view('templates/header');
		echo view('pages/homepage');
		echo view('templates/footer');
	}
}
