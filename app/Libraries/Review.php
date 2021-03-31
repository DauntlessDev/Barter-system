<?php
namespace App\Libraries;

class Review{
    public function getReview($params){
        return view('components/profile/review', $params);
    }
}