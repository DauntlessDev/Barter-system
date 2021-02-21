<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BaseSeeder extends Seeder
{
	public function run()
	{
		// Centralize Seeders by
		// calling all of them here
		$this->call('DogSeeder');
	}
}
