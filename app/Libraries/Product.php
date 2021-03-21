<?php
namespace App\Libraries;

class Product{
    public function getItem($params){
        return view('components/home/product', $params);
    }
}