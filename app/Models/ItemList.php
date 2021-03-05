<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

/*  Model for `item_listing` table. Should be used 
    when there will be interactions between `items` 
    and `catrgory` tables. */
class ItemList
{
    protected $db;

    public function __construct(ConnectionInterface &$db){
        $this->db = &$db;
    }


    /* Query calls */
    /* Functions to be used on controllers */


    /* Create Methods */


    /**
     * Adds a set of category to the identified item as a batch.
     * 
     * @param mixed $item_id `item_id` of the item to be categorized.
     * @param array $category_ids list of all categories.
     * 
     */
    public function addCategory($item_id, $category_ids){
        $data = [];
        foreach($category_ids as $category_id){
            array_push(
                $data,
                ['item_id' => $item_id, 'category_id' => $category_id],
            );
        }
        $builder = $this->db->table('item_listing');
        $builder->ignore()->insertBatch($data);
    }


    /* Retrieve Methods */

    
    /**
     * Gets all the `category_ids` of an `item` given its id.
     * 
     * @param mixed $item_id `item_id` of the selected item.
     * 
     */
    public function getCategoriesFromItem($item_id){
        $builder = $this->db->table('item_listing');
        return $builder->select('category_id')
                        ->where('item_id', $item_id)
                        ->get()
                        ->getResultArray();
    }


    /**
     * Gets all the `item_id`s from a list of `category_id`s.
     * 
     * @param array $category_ids list of`category_id`s.
     * 
     */
    public function getItemsFromCategory($category_ids){
        $builder = $this->db->table('item_listing');
        return $builder->select('item_id')
                        ->distinct()
                        ->whereIn('category_id', $category_ids)
                        ->get()
                        ->getResultArray();
    }
}