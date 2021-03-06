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


    /* Create Methods */


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


    /* Retrieve Methods */


    /**
     * Returns rows from the `users` table as an array, given
     * certain search conditions and limit, otherwise returns all.
     * 
     * @param array $search_values values needed to query
     * @param int $limit the number of rows to find
     * @param int $offset the number of rows to skip during the search
     * 
     * Example: `$search_values = ['username' => 'johndoe', ...]` OR
     *          `$search_values = ['first_name' => 'john', 'lastt_name' => 'john', ...]`
     * 
     */
    public function get($search_values = null, $limit = 0, $offset = 0){
        $builder = $this->builder();
        if(count($search_values) == 1){
            $col = array_key_first($search_values);
            $value = array_values($search_values);
            $builder->whereIn($col, $value);
        }
        if(count($search_values) > 1){
            $builder->where($search_values);
        }
        return $builder->get($limit, $offset)
                        ->getResultArray();
    }


    /* Update Methods */


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