<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\OfferModel;
use Exception;
use Faker\Factory;

class OfferSeeder extends Seeder
{
	public function run()
	{
		$faker = Factory::create();
		$offerModel = new OfferModel();

		for ($i = 1; $i < 3; $i++) {
			$data = [
				'item_id' 			=> 1,
				'customer_uid' 		=> 4,
				'offer_msg_title' 	=> $faker->word,
				'offer_msg_content' => $faker->text,
			];

			// check for validation error
			if ($offerModel->create($data) === false) {
				throw new Exception('Error while inserting using OfferModel');
			}

			$data = [
				'item_id' 			=> 1,
				'customer_uid' 		=> 2,
				'offer_msg_title' 	=> $faker->word,
				'offer_msg_content' => $faker->text,
			];

			// check for validation error
			if ($offerModel->create($data) === false) {
				throw new Exception('Error while inserting using OfferModel');
			}
		}
	}
}
