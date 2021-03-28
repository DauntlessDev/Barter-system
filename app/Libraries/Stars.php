<?php
namespace App\Libraries;

class Stars {
    public function getStars($params){
        return view('components/partials/_stars', $params);
    }
}