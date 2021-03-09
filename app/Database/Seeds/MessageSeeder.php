<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\MessageModel;
use Exception;
use Faker\Factory;
use DateInterval;
use DateTime;

class MessageSeeder extends Seeder
{
	public function run()
	{
		$faker = Factory::create();
		$messageModel = new MessageModel();
		$userConversation = [[1, 2], [2, 1], [1, 3], [3, 4]];
		$counter = 0;

		foreach($userConversation as $user) {
			for ($i = 0; $i < 3; $i++) {
				$counter += 1;
				$timeStamp = new DateTime();
				$timeStamp->add(new DateInterval("PT${counter}S"));

				$randomInt = rand(1, 2);

				$data = [
					'sender_uid' 	=> $randomInt === 1 ? $user[0] : $user[1],
					'recipient_uid' => $randomInt === 1 ? $user[1] : $user[0],
					'content' 		=> $faker->text,
					'created_at'	=> $timeStamp->format('Y-m-d H:i:s'),
				];

				$messageModel->protect(false);

				if ($messageModel->create($data) === false) {
					throw new Exception('Error while inserting using MessageModel|'.implode('|', $messageModel->errors()));
				}

				$messageModel->protect(true);
			}
		}
	}
}
