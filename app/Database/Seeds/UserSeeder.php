<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

// https://www.codeigniter.com/user_guide/dbmgmt/index.html
// Don't forget to call in BaseSeeder.php
class UserSeeder extends Seeder
{
	public function run()
	{
		$userModel = new UserModel();

		for ($i = 0; $i < 10; $i++) {
			$data = [
				'username' => "user$i",
				'password' => 'password',
			];

			$userModel->insert($data);
		}
	}
}
