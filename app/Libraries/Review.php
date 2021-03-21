<?php
namespace App\Libraries;

class Review{
    public function getReviews($params){
        return view('components/profile/reviews', $params);
    }
}