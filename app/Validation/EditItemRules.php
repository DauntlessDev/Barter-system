<?php

namespace App\Validation;

class EditItemRules {
    public function is_poster($poster_uid, string &$error = null): bool {

        $user_id = (int)session()->get('user')['user_id'];
        if(!$user_id === $poster_uid){
            $error = 'Not allowed to edit this item.';
            return false;
        }
        return true;
    }
}