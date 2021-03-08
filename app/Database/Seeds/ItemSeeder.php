<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ItemModel;
use Exception;
use Faker\Factory;

class ItemSeeder extends Seeder
{
	public function run()
	{
		$itemModel = new ItemModel();

		$faker = Factory::create();

		for ($i = 0; $i < 10; $i++) {
			$data = [
				'poster_uid'   => 1,
				'item_name'    => "item$i",
				'photo_url'    => 'https://via.placeholder.com/300',
				'avail_status' => 'available',
				'desc_title'   => $faker->word,
				'desc_content' => $faker->text,
			];

			// check for validation error
			if ($itemModel->create($data) === false) {
				throw new Exception('Error while inserting using ItemModel|'.implode('|', $itemModel->errors()));
			}
		}
	}
}
