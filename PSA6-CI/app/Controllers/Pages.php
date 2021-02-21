<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index() {
        return view('welcome_message');
    }

    public function view() {
        echo view('templates/header');
        echo view('pages/DogRegister');
        echo view('templates/footer');
    }
}