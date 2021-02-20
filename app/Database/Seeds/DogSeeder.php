<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

// Don't forget to call in BaseSeeder.php
class DogSeeder extends Seeder
{
	public function run()
	{
		// field name => value
		$data = [
			'd_name' => 'Doggo',
			'd_breed' => 'Unknown',
			'd_age' => 999,
			'd_add' => 'Somewhere in the world',
			'd_color' => 'Transparent',
			'd_height' => '3 ft',
			'd_weight' => 80.8,
		];

		$this->db->table('dogs')->insert($data);
	}
}
