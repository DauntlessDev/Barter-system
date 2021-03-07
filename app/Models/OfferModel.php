<?php

namespace App\Models;

use Config\Database;
use App\Models\Interface\ModelInterface;

class OfferModel implements ModelInterface
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->builder = $this->db->table('offers');
    }

    /* Query calls */
    /* Functions to be used on controllers */


    /* Create Methods */

    public function create($data){
        return $this->builder->insert($data);
    }


    /* Retrieve Methods */


    /**
     * Gets the offers for the current item, given its
     * `item_id`.
     *
     * @param array $item_id `item_id` of the currently viewed item
     * @param array $options list of options
     * Default Values
     * $options['limit'] = 0
     * $options['offset'] = 0
     * $options['order'] = 'created_at'
     * $options['sortOrder'] = 'desc'
     *
     * int $limit number of rows to be returned
     * int $offset the number of rows to skip during the search
     * string $order defines what column used for sorting **[MUST MATCH WITH THE TABLE COLUMN NAMES]**
     * string $sortOrder direction of sorting.
     *
     */
    public function get($item_id, $options){
        $limit = $options['limit'] ?? 0;
        $offset = $options['offset'] ?? 0;
        $order = $options['order'] ?? 'created_at';
        $sortOrder = $options['sortOrder'] ?? 'desc';

        return $this->builder->where('item_id', $item_id)
                        ->orderBy($order, $sortOrder)
                        ->get($limit, $offset)
                        ->getResultArray();
    }


    /* Update Methods */


    /**
     * Updates the current user's offer to a selected item.
     *
     * @param array $data data to be updated, usually comes from a form
     * @param array $options list of options
     * $options = ['item_id' => 1, 'poster_uid' => 1, 'customer_uid' => 1];
     *
     * 'item_id' `item_id` of the current item
     * 'poster_uid' `user_id` of the poster of the item
     * 'customer_uid' `user_id` of the current user, usually should
     * default to the current user in session.
     *
     */
    public function update($data, $options){
        $item_id = $options['item_id'];
        $poster_uid = $options['poster_uid'];
        $customer_uid = $options['customer_uid'];

        return $this->builder
                ->where('item_id', $item_id)
                ->where('poster_uid', $poster_uid)
                ->where('customer_uid', $customer_uid)
                ->update($data);
    }

    /**
     * Deletes the user's offer.
     *
     * @param array $data must contain item_id, poster_uid and customer_uid
     * $data = ['item_id' => 1, 'poster_uid' => 1, 'customer_uid' => 1];
     *
     */
    public function delete($data){
        return $this->builder
                ->where('item_id', $data['item_id'])
                ->where('poster_uid', $data['poster_uid'])
                ->where('customer_uid', $data['customer_uid'])
                ->delete();
    }
}