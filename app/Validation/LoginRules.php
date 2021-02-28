<?php

namespace App\Validation;

use App\Models\UserModel;

class LoginRules {
    public function is_correct_password($str, string $fields, array $data, string &$error = null): bool {
        $userModel = new UserModel();

        $user = $userModel
					->where('username', $data['username'])
					->first();

        if(!$user) {
            $error = 'incorrect username';
            return false;
        }
        $isCorrectPassword = password_verify($str, $user['password']);
        if(!$isCorrectPassword) {
            $error = 'incorrect password';
            return false;
        }

        return true;
    }
}