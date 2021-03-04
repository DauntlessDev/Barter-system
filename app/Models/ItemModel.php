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
    // protected $validationMessages = [];
    // protected $skipValidation     = false;


    /**
     * Returns the first row from the `items` table given
     * certain search conditions.
     * 
     * @param array $search_values
     * Example: `$search_values = ['item_id' => '001', 'poster_uid' => '000', ...]`
     * 
     */
    public function get($search_values){
        return $this->where($search_values)
                    ->first();
    }

    /**
     * Returns all rows from the `items` table given
     * certain search conditions, otherwise returns all.
     * 
     * @param array $search_values
     * Default value is `null`
     * 
     * Example: `$search_values = ['poster_uid' => '000', ...]`
     * 
     */
    public function getAll($search_values = null){
        if($search_values){
            return $this->where($search_values)
                        ->findAll();
        }
        return $this->findAll();
    }

    /**
     * Creates new item into the database.
     * 
     *  @param array $data data of the item to be inserted.
     *  @return true if successfully inserted, otherwise returns `false`.
     * 
     */
    public function create($data){
        return $this->insert($data);
    }

}