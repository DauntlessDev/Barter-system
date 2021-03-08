<?php

namespace App\Models;

use CodeIgniter\Model;
// use App\Models\Interface\ModelInterface;

class CategoryModel extends Model
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
	 * @param array $where assoc array of category_id fields and array of values.
	 * @param array $options Query options to be used.
	 *
     * Example:
	 * $where = ['category_name' => ['hardware'] ];
	 * $options = ['limit' => 1, 'offset' => 1, 'sortOrder' => 'desc'];
	 * $categoryModel->get($where, $options);
	 *
	 * @return array categories with items.
	 *
     */
    public function get($where = [], $options = null){
		$limit = $options['limit'] ?? 0;
        $offset = $options['offset'] ?? 0;
		$sortBy = $options['sortBy'] ?? 'category_name';
        $sortOrder = $options['sortOrder'] ?? 'desc';
		$builder = $this->builder();

		foreach($where as $key=>$arrayValues) {
			$builder->whereIn($key, $arrayValues);
		}

		$categoryList = $builder->orderBy($sortBy, $sortOrder)
								->get($limit, $offset)
								->getResultArray();

		return $this->getCategoryWithItems($categoryList);
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
     *
	 * [
	 *     [category1 <category_id, category_name>] => [item1, item2, item3, ...],
	 *     [category2 <category_id, category_name>] => [item1, item2, item3, ...],
	 *     [category3 <category_id, category_name>] => [item1, item2, item3, ...],
	 *     ...
	 * ]
	 *
	 */
	public function getCategoryWithItems($categoryList) {
		return array_map(function ($category) {
            $builder = $this->builder('item_listing');
            $itemListings = $builder->where('category_id', $category['category_id'])->get()->getResultArray();

            $category['items'] = array_map(function ($itemListing) {
                $itemId = $itemListing['item_id'];

                $item = $this->builder('item')->where('item_id', $itemId)->get()->getResultArray()[0];

                return $item;
            }, $itemListings);

            return $category;
        }, $categoryList);
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
	 * Don't use this, this is a BOMB! Add a field for soft deletes instead.
     */
    public function delete($where = null, bool $purge = false){
        return $this->where($where)
                    ->delete();
    }

}
