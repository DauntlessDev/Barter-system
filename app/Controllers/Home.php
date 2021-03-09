<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ItemModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
	/**
	 * METHOD: GET
	*/

	
	protected $userModel;
	protected $itemModel;
	protected $categoryModel;

	public function __construct() {
		$this->userModel = new UserModel();
		$this->itemModel = new ItemModel();
		$this->categoryModel = new CategoryModel();
	}

	public function index()
	{
		return view('pages/home');
	}


	public function searchItemsByName(){

	}
	public function searchItemsByCategory(){

	}

	public function getLatestItems(){

	}
}
