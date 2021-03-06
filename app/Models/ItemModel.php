<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Interface\ModelInterface;

class ItemModel extends Model implements ModelInterface
{
    protected $table      = 'item';
    protected $primaryKey = 'item_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'poster_uid', 
        'item_name',
        'photo_url',
        'avail_status',
        'desc_title',
        'desc_content',
        'rating',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // protected $validationRules    = [];

    /* Query calls */
    /* Functions to be used on controllers */

    
    /* Create Methods */


     /**
     * Creates new item into the database.
     * 
     *  @param array $data data of the item to be inserted.
     *  @return bool `true` if successfully inserted, otherwise returns `false`.
     * 
     */
    public function create($data){
        return $this->insert($data);
    }


    /* Retrieve Methods */

    /**
     * Returns rows from the `items` table as an array, given
     * certain search conditions and limit, otherwise returns all.
     * 
     * @param array $search_values values needed to query
     * @param int $limit the number of rows to find
     * @param int $offset the number of rows to skip during the search
     * @param string $order defines what column used for sorting **[MUST MATCH WITH THE TABLE COLUMN NAMES]**
     * @param string $sortOrder direction of sorting.
     * 
     * Example: `$search_values = ['item_id' => [001, 002, 003,...]]`
     *          OR `$search_values = ['poster_uid' => '000', ...]`
     * 
     * Recommended values for `$order`: `'item_name'` | `'rating'` | `'created_at'` 
     * 
     */
    public function get($search_values = null, $limit = 0, $offset = 0, 
                        $order = 'created_at', $sortOrder = 'asc'){
        $builder = $this->builder();
        if(count($search_values) == 1){
            $col = array_key_first($search_values);
            $value = array_values($search_values);
            $builder ->whereIn($col, $value);
        }
        if(count($search_values) > 1){
            $builder->where($search_values);
        }
        return $builder->orderBy($order, $sortOrder)
                        ->get($limit, $offset)
                        ->getResultArray();
    }


    /* Update Methods */


    /**
     * Updates the details of the current selected item.
     * 
     * @param mixed $id `item_id` of the item to be updated.
     * @param array $data updated details of the item.
     * @return bool `true` if successful update, otherwise `false`.
     *
     */
    public function update($id = null, $data = null) : bool{
        return parent::update($id, $data);
    }

}