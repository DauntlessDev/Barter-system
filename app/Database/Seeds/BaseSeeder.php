<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

// https://www.codeigniter.com/user_guide/dbmgmt/index.html
class BaseSeeder extends Seeder
{
	public function run()
	{
		// Centralize Seeders by
		// calling all of them here
		$this->call('UserSeeder');
		$this->call('MessageSeeder');
		$this->call('ReviewSeeder');
		$this->call('CategorySeeder');
		$this->call('ItemSeeder');
		$this->call('OfferSeeder');
	}
}
