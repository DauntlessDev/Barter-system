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
		$categories = [
			['category_name' => 'category1', 'category_id' => 1, 'icon' => 'assets/home/category-sample.png'],
			['category_name' => 'category2', 'category_id' => 2, 'icon' => 'assets/home/category-sample.png'],
			['category_name' => 'category3', 'category_id' => 3, 'icon' => 'assets/home/category-sample.png'],
			['category_name' => 'category4', 'category_id' => 4, 'icon' => 'assets/home/category-sample.png'],
			['category_name' => 'category5', 'category_id' => 5, 'icon' => 'assets/home/category-sample.png'],
			['category_name' => 'category6', 'category_id' => 6, 'icon' => 'assets/home/category-sample.png'],
			['category_name' => 'category7', 'category_id' => 7, 'icon' => 'assets/home/category-sample.png'],
			['category_name' => 'category8', 'category_id' => 8, 'icon' => 'assets/home/category-sample.png'],
			['category_name' => 'category9', 'category_id' => 9, 'icon' => 'assets/home/category-sample.png'],
			['category_name' => 'category10', 'category_id' => 10, 'icon' => 'assets/home/category-sample.png'],
		];

		$data = [
			'class' => $this,
			'latestItems' => $this->getLatestItems([]),
			'categories' => $categories,
		];
		// print_r($data);
		return view('pages/home',$data);
	}

	
	function searchItemsByName($itemModel, $name){
        if ($this->request->getMethod() === 'get') {
			$items = $this->itemModel->get($name);
			print("items search result: ");
			var_dump($items);
        }

	}
	function searchItemsByCategory($category){
		$items = $this->categoryModel->getItem(['category_name' => [$category]]);
		print("items w/ category of " + $category + ": ");
		var_dump($items);
	}

	function getLatestItems($options){
		$items = $this->itemModel->get($options);
		// print("items: ");
		// print_r($items);
		return $items;

	}

	function getPosterInfo($uid){
		$poster = $this->userModel->get(['user_id' => [$uid]]);
		return $poster;
	}

	function displayProductTitle($title){
		if (strlen($title) < 20){
			echo ($title);
		}else{  
			echo substr($title, 0, 17) . "...";
		}

	}
	function displayProductDescription($content){
		if (str_word_count($content) < 15){
			echo ($content);
		}else{  
			echo substr($content, 0, 110) . "...";
		}
	}



}
