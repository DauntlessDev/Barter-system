<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Interface\ModelInterface;

class CategoryModel extends Model implements ModelInterface 
{
	protected $table 			= 'category';
	protected $primaryKey       = 'category_id';
	protected $useAutoIncrement	= true;
	protected $allowedFields    = ['category_name'];

	protected $useTimestamps    = true;
	protected $createdField     = 'created_at';
	protected $updatedField     = 'updated_at';

	// protected $validationRules      = [];

	
	/* Query calls */
    /* Functions to be used on controllers */
	
	
	/* Create Methods */


	/**
     * Create a new category.
     * 
     *  @param array $data Data of the category to be inserted.
     *  @return integer|false `category_id` Of the inserted category, `false` on failure.
     * 
     */
    public function create($data){
        return $this->insert($data, false);
    }


	/* Retrieve Methods */


	/**
     * Returns rows from the `category` table as an array, 
	 * given certain options.
	 * 
	 * @param array $category_ids List of `category_id`s.
	 * @param array $options Query options to be used.
	 * 
     * Example: `limit` | `offset`
	 * 			`$options = ['limit' => '1', 'offset' => '1', ...]`
	 * 
	 * @return array `ResultArray` of categories with its`category_id`.
	 * 
     */
    public function get($category_ids = null, $options){
		$limit = $options['limit'] ?? 0;
        $offset = $options['offset'] ?? 0;
        $sortOrder = $options['sortOrder'] ?? 'asc';

		$builder = $this->builder();
		if($category_ids){
			$builder->select()
					->whereIn('category_id', $category_ids);
		}
        return $builder->orderBy('category_name', $sortOrder)
						->get($limit, $offset)
						->getResultArray();
    }
	

	/**
	 * Returns an array of categories with its associated items.
	 * Binds each category row with its matching items.
	 * 
	 * @param array $category_ids List of `category_ids` to be searched.
	 * @param array $options Query options to be used.
	 * 
     * Example: `limit` | `offset`
	 * 			`$options = ['limit' => '1', 'offset' => '1', ...]`
	 * 
	 * @return array associative array with this format:
     *              ```
     *              [
     *                  [category1 <category_id, category_name>] => [item1, item2, item3, ...],
     *                  [category2 <category_id, category_name>] => [item1, item2, item3, ...],
     *                  [category3 <category_id, category_name>] => [item1, item2, item3, ...],
     *                  ...
     *              ]
     *              ``` 
	 * 
	 */
	public function getCategoryWithItems($category_ids = null, $options){
		$limit = $options['limit'] ?? 0;
        $offset = $options['offset'] ?? 0;

		$categoryResults = $this->get($category_ids, $limit, $offset);
		$categories = [];
		foreach($categoryResults as $category){
			$builder = $this->builder('item');
			$categoryItems = $builder->select()
									 ->join('item_listing',
									 		"item_listing.category_id = $category->category_id AND
									 		 item_listing.item_id = item.item_id",
									 		 'left')
									 ->get()
									 ->getResultArray();
			$categories[$category] = $categoryItems;
		}
		return $categories;
	}


	/* Update Methods */


	/**
     * Update a category.
     * 
     * @param mixed $id `category_id` Of the category to be updated.
     * @param array $data Updated details of the category: `category_name`.
     * @return true|false `true` If successful update otherwise, `false`.
     *
     */
    public function update($id = null, $data = null) : bool{
        return parent::update($id, $data);
    }


	/* Delete Methods */


    /**
     * Delete a category.
     * 
     * @param array $where Values that identify that category.
     * Delete cascades to the `item_listing` table as well.
	 * 
     * **Must have:** `['category_id' => 'some_category_id, ...']`.
     * 
     */
    public function delete($where = null, bool $purge = false){
        return $this->where($where)
                    ->delete();
    }

}
