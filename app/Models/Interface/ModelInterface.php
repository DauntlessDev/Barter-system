<?php

namespace App\Models\Interface;

interface ModelInterface
{

    /**
     * Create records in tables.
     *
     * @param mixed $data An array that contains column data of a table.
     * Typically data will come from a FORM.
     *
     */
    public function create($data);


    /**
     * Get records from tables.
     *
     * @param array $where Values that identify that record,
     * values to be used in the `where()` query.
     * @param array $options Query options to be used.
     * Example: `limit` | `offset` | `sortBy` | `sortOrder`
     *
     */
    public function get($where, $options);


    /**
     * Update records in tables.
     *
     * @param array $data New data to be updated.
     * @param array $where Values that identify that record,
     * values to be used in the `where()` query.
     *
     */
    // public function update($data, $where);


    /**
     * Delete records from tables.
     *
     * @param array $where Values that identify that record,
     * values to be used in the `where()` query.
     * @param bool $purge Ignored value, must be set to `false`.
     *
     */
    public function delete($where, bool $purge);

}