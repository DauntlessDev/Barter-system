<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ItemModel;
use App\Models\CategoryModel;
use App\Controllers\BaseController;

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

		$data = [
			'class' => $this,
			'latestItems' => $this->getLatestItems([]),
			'categories' => $this->getCategory(),
		];
		return view('pages/home',$data);
	}

	
	public function categoryPage($category_id = 1)
	{	
		$data = [
			'class' => $this,
			'category' => $this->getCategory(['category_id' => [$category_id]])[0],
			'categories' => $this->getCategory(),
		];
		// print_r($data['category']);
		return view('pages/category',$data);	
	}

	
	public function resultPage()
	{	
		if(isset($_GET['search'])){
			$data = [
				'class' => $this,
				'results' => $this->searchItemsByName($_GET['item_name']),
			];
			
			return view('pages/result', $data);	
		}else{
			$this->index();
		}
	}


	function searchItemsByName($item_name){
		$items = $this->itemModel->like('item_name', $item_name)->findAll();
		return $items;

	}


	function getLatestItems($options){
		$items = $this->itemModel->get($options);
		return $items;

	}
	
	function getCategory($search_value = []){
		$categories = $this->categoryModel->get($search_value);
		return $categories;

	}
	
	function getPosterInfo($uid){
		$poster = $this->userModel->get(['user_id' => [$uid]]);
		return $poster;
	}

}
