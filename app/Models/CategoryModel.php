<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Interface\ModelInterface;

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
     * a certain limit, otherwise returns all.
	 * 
     */
    public function get($search_values = null, $limit = 0, $offset = 0){
        return $this->findAll($limit, $offset);
    }


	/**
	 * Gets the all the category names given a list of `category_id`s,
	 * otherwise returns all category names from the table;
	 * (Useful after getting the `category_id`s of an item,
	 * after interaction with the `item_listing` table).
	 * 
	 * @param array $category_ids list of `category_id`s.
	 * @param string $order alphabetical order of category names.
	 * 
	 */
	public function getCategoryNames($category_ids = null, $order = 'asc'){
		if($category_ids){
			$builder = $this->builder();
			return $builder->select('category_name')
					->whereIn('category_id', $category_ids)
					->orderBy($order)
					->get()
					->getResultArray();
		}
		else {
			return $this->orderBy('category_name', $order)
						->findColumn('category_name');				
		}
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
