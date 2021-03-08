<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Interface\ModelInterface;

class ItemModel extends Model
{
    protected $table            = 'item';
    protected $primaryKey       = 'item_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'poster_uid', 
        'item_name',
        'photo_url',
        'avail_status',
        'desc_title',
        'desc_content',
        'rating',
    ];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    // protected $validationRules    = [];

    /* Query calls */
    /* Functions to be used on controllers */

    
    /* Create Methods */


     /**
     * Create a new item with its categories.
     * 
     * @param array $data Data of the item to be inserted.
     * 
     * **Must have:** `['item_id' => 'item_id', 'poster_uid' => 'session_user']`.
     * 
     * @param array $category_ids `id`s Of categories associated with the item.
     * @return integer|false `item_id` Of the inserted item, `false` on failure.
     * 
     */
    public function create($data, $category_ids){
        if (empty($category_ids)) return false;

        $item_id = $this->insert($data);

        $this->addCategory($item_id, $category_ids);

        return $item_id;
    }


    /* Retrieve Methods */


    /**
     * Returns an array of item with its associated categories,
     * given certain options, otherwise returns all.
     * Binds each item row with its corresponding categories.
     * 
     * @param array $where Values that identify that item.
     * 
     * **Must have:**
     * *one key-to-many values* `[count = 1]` OR 
     * *many one key-to-one value* `[count = 1 OR N]`
     * 
     * Example: `$where = ['item_id' => [001, 002, 003,...]]` OR
     *          `$where = ['poster_uid' => '000', ...]`
     * 
     * @param array $options Query options to be used.
     * 
     * Example: `limit` | `offset` | `sortBy` | `sortOrder`
     *          `$options = ['limit' => '1', 'offset' => '1', ...]`
     * 
     * Recommended values for `sortBy`: `'item_name'` | `'rating'` | `'created_at'` 
     * 
     * @return array Associative array with this format:
     *              ```
     *              [
     *                  [item1 <all columns>] => [category1 <category_id, category_name>,...],
     *                  [item2 <all columns>] => [category1 <category_id, category_name>,...],
     *                  [item3 <all columns>] => [category1 <category_id, category_name>,...],
     *                  ...
     *              ]
     *              ```
     */
    public function get($where = null, $options = null){
        $limit = $options['limit'] ?? 0;
        $offset = $options['offset'] ?? 0;
        $sortBy = $options['sortBy'] ?? 'created_at';
        $sortOrder = $options['sortOrder'] ?? 'desc';
        $builder = $this->builder();

        if (count($where) === 1){
            $col = array_key_first($where);
            $value = array_values($where);
            $builder ->whereIn($col, $value);
        }

        if (count($where) > 1){
            $builder->where($where);
        }

        $itemResults = $builder->orderBy($sortBy, $sortOrder)
                        ->get($limit, $offset)
                        ->getResultArray();

        return $this->getItemWithCategories($itemResults);
    }

    /**
     * Updates the details of the currently selected item.
     * Deletes associated old categories.
     * 
     * @param mixed $item_id `item_id` Of the item to be updated.
     * @param array $data Updated details of the item.
     * @param array $category_ids `category_id`s To be deleted.
     * @return true|false `true` If successful update otherwise, `false`.
     *
     */
    public function update($item_id = null, $data = null, $category_ids = null) : bool{
        if (!$category_ids) $this->deleteCategoriesFromItem($item_id, $category_ids);
        return parent::update($item_id, $data);
    }

    /**
     * Delete an item.
     * 
     * @param array $where Values that identify that item.
     * Delete also cascades to the `item_listing` table.
     * 
     * **Must have:** `['item_id' => 'item_id', 'poster_uid' => 'session_user']`.
     * 
     */
    public function delete($where = null, bool $purge = false){
        return $this->where($where)
                    ->delete();
    }


    /* Helper Methods */


    /**
     * Adds a set of category to the identified item as a batch.
     * 
     * @param mixed $item_id `item_id` Of the item to be categorized.
     * @param array $category_ids list Of all categories.
     * 
     */
    protected function addCategory($item_id, $category_ids){
        $data = [];

        foreach($category_ids as $category_id){
            array_push(
                $data,
                [
                    'item_id'     => $item_id,
                    'category_id' => $category_id,
                ],
            );
        }
        $builder = $this->builder('item_listing');

        return $builder->ignore()->insertBatch($data);
    }


    /**
     * Returns an array of item with its corresponding categories,
     * given a list of items to be binded.
     * 
     * @param array $itemList Rows of items from a query.
     * @return array Associative array of items with categories.
     * 
     */
    protected function getItemWithCategories($itemList) {
        return array_map(function ($item) {
            $builder = $this->builder('item_listing');
            $itemListings = $builder->where('item_id', $item['item_id'])->get()->getResultArray();

            $item['categories'] = array_map(function ($itemListing) {
                $categoryId = $itemListing['category_id'];

                $category = $this->builder('category')->where('category_id', $categoryId)->get()->getResultArray()[0];

                return $category;
            }, $itemListings);

            return $item;
        }, $itemList);
    }


    /**
     * Deletes corresponding categories from an item. 
     * Usually done when updating an item. Deletes them at the
     * `item_listing` table.
     * 
     * @param mixed $item_id `item_id` of the item selected.
     * @param array $category_ids `category_id`s To be deleted.
     * 
     */
    protected function deleteCategoriesFromItem($item_id, $category_ids){
        $builder = $this->builder('item_listing');
        return $builder->where('item_id', $item_id)
                       ->whereIn('category_id', $category_ids)
                       ->delete();
    }

}