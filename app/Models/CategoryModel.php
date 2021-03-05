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


	/**
     * Returns the first row from the `category` table given
     * certain search conditions.
     * 
     * @param array $search_values
     * Example: `$search_values = ['category_name' => 'fashion', ...]`
     * 
     */
	public function get($search_values){
		return $this->where($search_values)
                    ->first();
	}

	/**
     * Returns all category names as an indexed array.
     * 
     */
    public function getAll($search_values = null, $limit = 0, $offset = 0){
        return $this->findColumn('category_name');
    }

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
