<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Interface\ModelInterface;

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
     * Creates new item into the database, together with its categories.
     * 
     * @param array $data data of the item to be inserted
     * @param array $category_ids `id`s of categories associated with the item
     * @return integer|false `item_id` of the current item, `false` on failure
     * 
     */
    public function create($data, $category_ids = null){
        $item_id = $this->insert($data);
        if($item_id && $category_ids){
            $this->addCategory($item_id, $category_ids);
        }
        return $item_id;
    }


    /**
     * Adds a set of category to the identified item as a batch.
     * 
     * @param mixed $item_id `item_id` of the item to be categorized
     * @param array $category_ids list of all categories
     * 
     */
    public function addCategory($item_id, $category_ids){
        $data = [];
        $db = db_connect();
        foreach($category_ids as $category_id){
            array_push(
                $data,
                ['item_id' => $item_id, 'category_id' => $category_id],
            );
        }
        $builder = $db->table('item_listing');
        return $builder->ignore()->insertBatch($data);
    }


    /* Retrieve Methods */


    /**
     * Returns an array of item with its associated categories,
     * given certain search conditions and limit, otherwise returns all.
     * Binds each item row with its corresponding categories.
     * 
     * @param array $search_values values needed to query
     * @param int $limit the number of rows to find
     * @param int $offset the number of rows to skip during the search
     * @param string $order defines what column used for sorting **[MUST MATCH WITH THE TABLE COLUMN NAMES]**
     * @param string $sortOrder direction of sorting
     * 
     * Example: `$search_values = ['item_id' => [001, 002, 003,...]]`
     *          OR `$search_values = ['poster_uid' => '000', ...]`
     * 
     * Recommended values for `$order`: `'item_name'` | `'rating'` | `'created_at'` 
     * 
     * @return array associative array with this format:
     *              ```
     *              [
     *                  [item1 <all columns>] => [category1 <category_id, category_name>,...],
     *                  [item2 <all columns>] => [category1 <category_id, category_name>,...],
     *                  [item3 <all columns>] => [category1 <category_id, category_name>,...],
     *                  ...
     *              ]
     *              ```
     */
    public function get($search_values = null, $limit = 0, $offset = 0, 
                        $order = 'created_at', $sortOrder = 'desc'){
        $builder = $this->builder();
        if(count($search_values) == 1){
            $col = array_key_first($search_values);
            $value = array_values($search_values);
            $builder ->whereIn($col, $value);
        }
        if(count($search_values) > 1){
            $builder->where($search_values);
        }
        $itemResults = $builder->orderBy($order, $sortOrder)
                        ->get($limit, $offset)
                        ->getResultArray();
        return $this->getItemWithCategories($itemResults);
    }


    /* Update Methods */


    /**
     * Updates the details of the current selected item.
     * Deletes 
     * 
     * @param mixed $item_id `item_id` of the item to be updated
     * @param array $data updated details of the item
     * @param array $category_ids `category_id`s to be deleted
     * @return bool `true` if successful update, otherwise `false`
     *
     */
    public function update($item_id = null, $data = null, $category_ids = null) : bool{
        if(!$category_ids) $this->deleteCategoriesFromItem($item_id, $category_ids);
        return parent::update($item_id, $data);
    }


    /* Helper Methods */

    /**
     * Returns an array of item with its corresponding categories,
     * given a list of items to be binded.
     * 
     * @param array $itemList rows of items from a query
     * 
     */
    protected function getItemWithCategories($itemList){
        $items = [];
        $db = db_connect();
        foreach($itemList as $item){
            $builder = $db->table('category');
            $item_categories = $builder->select()
                                       ->join('item_listing', 
                                               "item_listing.item_id = $item->item_id AND
                                                item_listing.category_id = category.category_id",
                                                'left')
                                       ->get()
                                       ->getResultArray();
            $items[$item] = $item_categories;
        }
        return $items;
    }


    /**
     * Deletes corresponding categories from an item. 
     * Usually done when updating an item. Deletes them at the
     * `item_listing` table.
     * 
     * @param mixed $item_id `item_id` of the item selected
     * @param array $category_ids `category_id`s to be deleted
     * 
     */
    protected function deleteCategoriesFromItem($item_id, $category_ids){
        $db = db_connect();
        $builder = $db->table('item_listing');
        return $builder->where('item_id', $item_id)
                       ->whereIn('category_id', $category_ids)
                       ->delete();
    }

}