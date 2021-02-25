<?php

namespace App\Models;

use CodeIgniter\Model;

// https://www.codeigniter.com/user_guide/models/model.html
class UserModel extends Model
{
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[30]|alpha_numeric',
		'password' => 'required|min_length[8]|max_length[255]'
    ];

    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['username', 'password'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
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