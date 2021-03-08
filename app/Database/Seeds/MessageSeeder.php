<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\MessageModel;
use Exception;
use Faker\Factory;

class MessageSeeder extends Seeder
{
	public function run()
	{
		$faker = Factory::create();
		$messageModel = new MessageModel();

		for ($i = 0; $i < 10; $i++) {
			$data = [
				'sender_uid' 	=> 1,
				'recipient_uid' => 2,
				'content' 		=> $faker->text,
			];

			$data = [
				'sender_uid' 	=> 2,
				'recipient_uid' => 1,
				'content' 		=> $faker->text,
			];

			// check for validation error
			if ($messageModel->create($data) === false) {
				throw new Exception('Error while inserting using MessageModel|'.implode('|', $messageModel->errors()));
			}
		}
	}
}
