<?php

namespace App\Models\Interface;

interface ModelInterface
{

    /**
     * Implement in queries for retrieving a data from a table.
     * 
     * @param array $search_values unique value(s) needed for a query, 
     * used when using `where()` query.
     * 
     * 
     * _Example implementation (`AnyModel.php`):_
     * ```
     * 
     * public function get($search_values){
     * 
     *      // $search_values = ['username' => 'johndoe', ...]
     *      return $this->where($search_values)->first();
     * }
     * 
     * ```
     */
    public function get($search_values);


    /**
     * Implement in queries to get all records from a table
     * with certain conditions.
     * 
     * @param array $search_values unique value(s) needed for a query, 
     * used when using `where()` query.
     * 
     */
    public function getAll($search_values);


    /**
     * Implement to create a record in a table.
     * 
     * @param mixed $data an array that contains column data of a table.
     * Typically data will come from a FORM.
     * 
     */
    public function create($data);
}