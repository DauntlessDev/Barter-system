<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Interface\ModelInterface;

class CategoryModel extends Model implements ModelInterface 
{
	protected $table                = 'category';
	protected $primaryKey           = 'category_id';
	protected $useAutoIncrement     = true;
	protected $allowedFields        = ['category_name'];

	protected $useTimestamps        = true;
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	// protected $validationRules      = [];

	
	/* Query calls */
    /* Functions to be used on controllers */
	
	
	/* Create Methods */


	/**
     * Creates new category into the database.
     * 
     *  @param array $data data of the category to be inserted.
     *  @return bool `true` if successfully inserted, otherwise returns `false`.
     * 
     */
    public function create($data){
        return $this->insert($data, false);
    }


	/* Retrieve Methods */


	/**
     * Returns rows from the `category` table as an array, given
     * a certain limit.
	 * 
	 * @param array $category_ids list of `category_id`s
	 * @param string $order alphabetical order of category names
	 * 
     */
    public function get($category_ids = null, $limit = 0, $offset = 0, $sortOrder = 'asc'){
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
	 * @param array $category_ids list of `category_ids` to be searched
	 * @param int $limit the number of rows to find
	 * @param int $offset the number of rows to skip during the search
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
	public function getCategoryWithItems($category_ids = null, $limit = 0, $offset = 0){
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
     * Updates the details of a category.
     * 
     * @param mixed $id `category_id` of the category to be updated.
     * @param array $data updated details of the category: `category_name`.
     * @return bool `true` if successful update, otherwise `false`.
     *
     */
    public function update($id = null, $data = null) : bool{
        return parent::update($id, $data);
    }

}
