<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['fields'] = [
			'd_name' 	=> 'Name',
			'd_breed' 	=> 'Breed',
			'd_age' 	=> 'Age',
			'd_address' => 'Address',
			'd_color' 	=> 'Color',
			'd_height' 	=> 'Height',
			'd_weight' 	=> 'Weight',
		];

		echo view('templates/header');
        echo view('pages/DogRegister', $data);
        echo view('templates/footer');
	}
}
