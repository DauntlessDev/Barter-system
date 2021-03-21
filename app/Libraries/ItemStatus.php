<?php

namespace App\Libraries;

class ItemStatus {
    public function index(array $param) {
        $param['avail_status'] = strtolower($param['avail_status']);
        return view('components/item/status', $param);
    }
}