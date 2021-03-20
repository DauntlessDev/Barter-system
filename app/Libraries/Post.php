<?php namespace App\Libraries;

class Post{
    public function getPost($params){
        return view('components/profile/items', $params);
    }
}




?>