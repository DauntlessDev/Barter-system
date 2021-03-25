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

		$counter = 0;

		for ($i = 1; $i < 3; $i++) {
			$counter += 1;

			$data = [
				'item_id' 			=> 1 * $i,
				'customer_uid' 		=> 2 * $i,
				'offer_msg_title' 	=> 'Offer' . $counter,
				'offer_msg_content' => $faker->text,
			];

			// check for validation error
			if ($offerModel->create($data) === false) {
				throw new Exception('Error while inserting using OfferModel');
			}

			$data = [
				'item_id' 			=> 2 * $i,
				'customer_uid' 		=> 3 * $i,
				'offer_msg_title' 	=> 'Offer' . $counter,
				'offer_msg_content' => $faker->text,
			];

			// check for validation error
			if ($offerModel->create($data) === false) {
				throw new Exception('Error while inserting using OfferModel');
			}
		}
	}
}
