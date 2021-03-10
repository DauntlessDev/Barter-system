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


	function getLatestItems($options){
		$items = $this->itemModel->get($options);
		return $items;

	}
	
	function getCategory($search_value = []){
		$categories = $this->categoryModel->get($search_value);
		return $categories;

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
