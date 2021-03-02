<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;
use Exception;

// https://www.codeigniter.com/user_guide/dbmgmt/index.html
// Don't forget to call in BaseSeeder.php
class UserSeeder extends Seeder
{
	public function run()
	{
		$userModel = new UserModel();

		for ($i = 0; $i < 10; $i++) {
			$randomLowerCaseLetters = chr(rand(97,122)) . chr(rand(97,122)) . chr(rand(97,122));

			$data = [
				'username' => "user$i",
				'password' => '12345678',
				'first_name' => "john $randomLowerCaseLetters",
				'last_name' => "doe $randomLowerCaseLetters",
			];

			// check for validation error
			if ($userModel->insert($data) === false) {
				throw new Exception('Error while inserting using UserModel|'.implode('|', $userModel->errors()));
			}
		}
	}
}
