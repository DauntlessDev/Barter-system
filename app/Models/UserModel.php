<?php

namespace App\Models;

use CodeIgniter\Model;

// https://www.codeigniter.com/user_guide/models/model.html
class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['username', 'password', 'first_name', 'last_name'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    /**
     * Validation rules for sign up
     */
    protected $validationRules = 'signup';
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    protected $beforeInsert = ['passwordHash'];
    protected $beforeUpdate = ['passwordHash'];

    protected function passwordHash(array $data){
        if(isset($data['data']['password']))
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }
}