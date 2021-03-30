<?php
namespace App\Libraries;

class Stars {
    public function getStars($params){
        $params['rating'] = round($params['rating']);
        return view('components/partials/_stars', $params);
    }
}