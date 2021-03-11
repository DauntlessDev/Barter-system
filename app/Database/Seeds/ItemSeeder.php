<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ItemModel;
use App\Models\CategoryModel;
use Exception;
use Faker\Factory;

class ItemSeeder extends Seeder
{
	public function run()
	{
		$itemModel = new ItemModel();
		$categoryModel = new CategoryModel();

		$faker = Factory::create();

		$categories = $categoryModel->findAll();

		foreach($categories as $category) {
			for ($i = 0; $i < rand(1, 5); $i++) {
				$data = [
					'poster_uid'   => rand(1, 10),
					'item_name'    => "item".$faker->word,
					'photo_url'    => 'https://via.placeholder.com/300',
					'avail_status' => 'available',
					'desc_title'   => $faker->word,
					'desc_content' => $faker->text,
				];

				// check for validation error
				if ($itemModel->create($data, [$category['category_id'], rand(1, 10)]) === false) {
					throw new Exception('Error while inserting using ItemModel|'.implode('|', $itemModel->errors()));
				}
			}
		}
	}
}
