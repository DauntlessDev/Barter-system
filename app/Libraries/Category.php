<?php namespace App\Libraries;

class Category{
    public function getCategory($params){
        return view('components/home/category', $params);
    }
}




?>