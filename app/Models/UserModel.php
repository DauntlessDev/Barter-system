<?php

namespace App\Models;

use CodeIgniter\Model;

// https://www.codeigniter.com/user_guide/models/model.html
class UserModel extends Model
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
    protected $createdField  = 'user_created_at';
    protected $updatedField  = 'user_updated_at';

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
      * getUser
      *
      * Gets the row of the current user from a specified username.
      *
      * @param string $username username of the user to be filtered.
      * 
      */
     public function getUser($username){
        return $this->where('username', $username)
                    ->first();
     }


     /**
      * getUser
      *
      * Creates a new user into the database.
      *
      * @param array $data data of the user to be inserted.
      * @return true if successfully inserted, otherwise returns `false`.
      *
      */
      public function createUser($data){
          return $this->insert($data);
      }


      /**
       * updateUser
       * 
       * Updates the details and credentials of the 
       * currently logged user.
       * 
       * @param array $data data entered from a form submitted by the user.
       * 
       */
      public function updateUser($data){
          return $this->where('user_id', $_SESSION['user']['id']) /* change to user_id for initial implementation */
                    ->update($data);
      }

}