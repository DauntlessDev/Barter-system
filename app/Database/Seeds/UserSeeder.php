<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;
use Exception;
use Faker\Factory;

// https://www.codeigniter.com/user_guide/dbmgmt/index.html
// Don't forget to call in BaseSeeder.php
class UserSeeder extends Seeder
{
	public function run()
	{
		$userModel = new UserModel();
		$faker = Factory::create();

		$userdata = [
			[   'username' => "johnrandy",
				'first_name' => "Nicolai Randy",
				'last_name' => "Castro",
				'address' => "Manila PH",
				'contact_details' => "09748271941",
			],
			[   'username' => "dariorusty",
				'first_name' => "Dario Rusty",
				'last_name' => "Lovel",
				'address' => "Cebu PH",
				'contact_details' => "09820561012",
			],
			[   'username' => "maryann",
				'first_name' => "Mary Ann",
				'last_name' => "Bardsley",
				'address' => "Davao PH",
				'contact_details' => "09647284081",
			],
			[   'username' => "adelina",
				'first_name' => "Adelina Maximiliano",
				'last_name' => "Ashley",
				'address' => "Cebu PH",
				'contact_details' => "09747691748",
			],
			[   'username' => "delphiawardell",
				'first_name' => "Delphia Wardell",
				'last_name' => "Dickenson",
				'address' => "Pampanga PH",
				'contact_details' => "09127893842",
			],
			[   'username' => "ionabradford",
				'first_name' => "Iona Bradford",
				'last_name' => "Reed",
				'address' => "Sulu PH",
				'contact_details' => "09875392834",
			],
			[   'username' => "marissavergil",
				'first_name' => "Marissa Vergil",
				'last_name' => "Langdon",
				'address' => "Capiz PH",
				'contact_details' => "0937478192",
			],
			[   'username' => "marimiku",
				'first_name' => "Mari Miku",
				'last_name' => "Sato",
				'address' => "Iloilo PH",
				'contact_details' => "09950243892",
			],
			[   'username' => "laurenmary",
				'first_name' => "Lauren Mary",
				'last_name' => "Roach",
				'address' => "Manila PH",
				'contact_details' => "09387391092",
			],
			[   'username' => "darcie11",
				'first_name' => "Darcie Aranzazu",
				'last_name' => "Hubert",
				'address' => "Makati PH",
				'contact_details' => "09919239472",
			],
			[   'username' => "jeffreynicodemo",
				'first_name' => "Jeffrey Nicodemo",
				'last_name' => "Eliot",
				'address' => "Pasig PH",
				'contact_details' => "09112387342",
			],
			[   'username' => "daphnekeegan",
				'first_name' => "Daphne Keegan",
				'last_name' => "Ericson",
				'address' => "Marikina PH",
				'contact_details' => "09464738288",
			],
			[   'username' => "cullenismael",
				'first_name' => "Cullen Ismael",
				'last_name' => "Tennison",
				'address' => "Pasay PH",
				'contact_details' => "09994428340",
			],
			[   'username' => "jenniferlucian",
				'first_name' => "Jennifer Lucian",
				'last_name' => "Colbert",
				'address' => "Makati PH",
				'contact_details' => "09119298374",
			],
			[   'username' => "mozelleethan",
				'first_name' => "Mozelle Ethan",
				'last_name' => "Marino",
				'address' => "Cebu PH",
				'contact_details' => "09128599342",
			],
		];

		foreach($userdata as $user){
			$random_num = rand(1, 3);

			$data = [
				'username' => $user['username'].$random_num,
				'password' => '12345678',
				'first_name' => $user['first_name'],
				'last_name' => $user['last_name'],
				'address' => $user['address'],
				'photo_url' => "images/default/profile$random_num.jpg",
				'contact_details' => $user['contact_details']
			];

			// check for validation error
			if ($userModel->create($data) === false) {
				throw new Exception('Error while inserting using UserModel|'.implode('|', $userModel->errors()));
			}

		}

		$randomLowerCaseLetters = chr(rand(97,122)) . chr(rand(97,122)) . chr(rand(97,122));
		$data = [
			'username' => "user0",
			'password' => '12345678',
			'first_name' => "john $randomLowerCaseLetters",
			'last_name' => "doe $randomLowerCaseLetters",
			'address' => "PH",
			'photo_url' => "images/default/profile1.jpg",
			'contact_details' => "09999999999",
		];

		if ($userModel->create($data) === false) {
			throw new Exception('Error while inserting using UserModel|'.implode('|', $userModel->errors()));
		}
	}
}
