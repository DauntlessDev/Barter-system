<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ReviewModel;
use Exception;
use Faker\Factory;

class ReviewSeeder extends Seeder
{
	public function run()
	{
		$faker = Factory::create();
		$reviewModel = new ReviewModel();

		for ($i = 1; $i < 3; $i++) {
			$data = [
				'reviewer_uid' 	=> $i,
				'reviewee_uid'	=> $i+1,
				'rating' 		=> rand(0, 5),
				'content' 		=> $faker->text,
			];

			// check for validation error
			if ($reviewModel->create($data) === false) {
				throw new Exception('Error while inserting using ReviewModel');
			}
		}
	}
}
