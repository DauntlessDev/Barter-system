<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Interface\ModelInterface;

class UserModel extends Model implements ModelInterface
{

    /* Setup of model */

    protected $table      = 'user';
    protected $primaryKey = 'user_id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = [
        'username', 
        'password', 
        'first_name', 
        'last_name',
        'address',
        'contact_details',
        'photo_url',
        'item_post_count',
        'rating',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

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

    /* Query calls */
    /* Functions to be used on controllers */

    /**
     * Gets the row of the current user from a specified username.
     * 
     * @param string $username username of the user to be filtered.
     * 
     */
    public function get($username){
        return $this->where('username', $username)
                    ->first();
    }


    /**
     * Returns all rows from the `user` table given
     * certain search conditions, otherwise returns all.
     * 
     * @param array $search_values
     * Default value is `null`
     * 
     * `$search_values = ['first_name' => 'john', ...]`
     * 
     */
    public function getAll($search_values = null){
        if($search_values){
            return $this->where($search_values)
                        ->findAll();
        }
        return $this->findAll();
    }

    /**
      * Creates a new user into the database.
      *
      * @param array $data data of the user to be inserted.
      * @return true if successfully inserted, otherwise returns `false`.
      *
      */
    public function create($data){
        return $this->insert($data);
    }


    /**
     * Updates the details and credentials of the 
     * currently logged user.
     * 
     * @param array $data data entered from a form submitted by the user.
     *
     */
    public function updateUser($data){
        return $this->where('user_id', $_SESSION['user']['user_id']) /* change to user_id for initial implementation */
                    ->update($data);
    }

}