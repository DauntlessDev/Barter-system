<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CategoryModel;
use Exception;

class CategorySeeder extends Seeder
{
	public function run()
	{
		$categoryModel = new CategoryModel();

		$categories = ['Clothing', 'Entertainment', 'Gadgets', 'Hardware', 'Home',
					   'School', 'Sports', 'Toys', 'Office', 'Others'];

		foreach ($categories as $category) {
			$data = [
				'category_name' => $category,
				'icon' 			=> 'assets/home/categories/'. strtolower($category) .'.png',
			];
			// check for validation error
			if ($categoryModel->create($data) === false) {
				throw new Exception('Error while inserting using CategoryModel|'.implode('|', $categoryModel->errors()));
			}
		}
	}
}
