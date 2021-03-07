<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Models\Interface\ModelInterface;

class UserModel implements ModelInterface
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }

    
    /* Query calls */
    /* Functions to be used on controllers */


    /* Create Methods */


    public function create($data){
        $builder = $this->db->table('offers');
        return $builder->insert($data);
    }


    /* Retrieve Methods */


    /**
     * Gets the offers for the current item, given its
     * `item_id`.
     * 
     * @param mixed $item_id `item_id` of the currently viewed item
     * @param int $limit number of rows to be returned
     * @param int $offset the number of rows to skip during the search
     * @param string $order defines what column used for sorting **[MUST MATCH WITH THE TABLE COLUMN NAMES]**
     * @param string $sortOrder direction of sorting.
     * 
     */
    public function get($item_id, $limit = 0, $offset = 0,
                        $order = 'created_at', $sortOrder = 'desc'){
        $builder = $this->db->table('offers');
        return $builder->where('item_id', $item_id)
                        ->orderBy($order, $sortOrder)
                        ->get($limit, $offset)
                        ->getResultArray();
    }


    /* Update Methods */


    /**
     * Updates the current user's offer to a selected item.
     * 
     * @param array $data data to be updated, usually comes from a form
     * @param mixed $item_id `item_id` of the current item
     * @param mixed $poster_uid `user_id` of the poster of the item
     * @param mixed $customer_uid `user_id` of the current user, usually should
     * default to the current user in session.
     * 
     */
    public function updateOffer($data, $item_id, $poster_uid, $customer_uid){
        $where = [
            'item_id'       => $item_id,
            'poster_uid'    => $poster_uid,
            'customer_uid'  => $customer_uid,
        ];
        $data += $where;
        $builder = $this->db->table('offers');
        return $builder->update($data, $where);
    }
}