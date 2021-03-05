<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Interface\ModelInterface;

class UserModel extends Model implements ModelInterface
{

    /* Setup of model */

    protected $table      = 'user';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;
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

    /* Validation rules for sign up */
    protected $validationRules = 'signup';

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
     * Returns rows from the `users` table as an array, given
     * certain search conditions and limit, otherwise returns all.
     * 
     * @param array $search_values values needed to query
     * @param int $limit the number of rows to find
     * @param int $offset the number of rows to skip during the search
     * 
     * `$search_values = ['first_name' => 'john', ...]`
     * 
     */
    public function getAll($search_values = null, $limit = 0, $offset = 0){
        if($search_values){
            return $this->where($search_values)
                        ->findAll($limit, $offset);
        }
        return $this->findAll($limit, $offset);
    }


    /**
      * Creates a new user into the database.
      *
      * @param array $data data of the user to be inserted.
      * @return bool `true` if successfully inserted, otherwise returns `false`.
      *
      */
    public function create($data){
        return $this->insert($data);
    }


    /**
     * Updates the details and credentials of the 
     * currently logged user.
     * 
     * @param mixed $id `user_id` of the user to be updated. Default value
     * is the current session's user.
     * @param array $data data entered from a form submitted by the user.
     * @return bool `true` if successful update, otherwise `false`.
     *
     */
    public function update($id = null, $data = null) : bool{
        if(!$id) $id = $_SESSION['user']['user_id'];
        return parent::update($id, $data);
    }

}